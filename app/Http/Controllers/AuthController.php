<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\Request;
use Lang;
use Mail;
use Redirect;
use Reminder;
use File;
use Sentinel;
use URL;
use Validator;
use View;
use Session;
use \Ecommerce\helperFunctions;
use App\Http\Controllers\CartController;
use App\Models\FraudIp;
use App\Models\User;
use App\Models\Tier;
use App\Models\UserInfo;
use App\Models\Cart;
use App\Models\Location;
use App\Models\DealerLocation;
use Activation;
use Auth;
use Str;
use Illuminate\Support\MessageBag;

class AuthController extends Controller {

    /**
     * Account sign in.
     *
     * @return View
     */
    protected $messageBag;

    public function __construct(MessageBag $messageBag) {
        $this->messageBag = $messageBag;
    }

    public function getSignin(Request $request) {
        $user = Auth::user();
        $userinfo = NULL;
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('dashboard');
        }
        $redirect = $request->redirect;
        $refrer = $request->refrer;
        helperFunctions::getCartInfo($cart, $total);

        return view('frontend/auth/signin-signup', compact('page', 'cart', 'total', 'user', 'userinfo', 'redirect', 'refrer'));
    }

    public function getForgotPassword() {
        if (!Sentinel::check()) {
            return view('frontend/auth/forgot-password');
        }

        return Redirect::route('dashboard');
    }

    /**
     * Account sign in form processing.
     * @param Request $request
     * @return Redirect
     */
    public function postSignin(Request $request) {
        $cart_old = Session::get('cart');

        try {
            // Try to log the user in
            $ip_subnet = getIpSubnetMarkFromEmail($request->get('email'));
            $Fraud = FraudIp::where('ip_addr', $ip_subnet)->first();
            if ($Fraud) {
                $this->messageBag->add('general_login', Lang::get('Unable to perform the request. Try again later.'));
                if ($request->get('top-login')) {
                    $this->messageBag->add('top-login', Lang::get('Unable to perform the request. Try again later.'));
                }
                return back()->withInput()->withErrors($this->messageBag);
            }
            if (Sentinel::authenticate($request->only(['email', 'password']), $request->get('remember-me', false))) {
                $user = User::find(Sentinel::getUser()->id);
                if (!$user->userInfo->is_active) {
                    //if ($user->isDealer) {
                    Session::flush('cart');
                    Sentinel::logout();
                    return Redirect::route('signin')->with('error', 'Your account isn\'t active. Contact administrator for further assistance.');
                    //}
                }

                // If Cart has value in
                if (Session::has('cart')) {
                    // Insert cart value in DB
                    foreach ($cart_old as $crt):
                        $cart = new CartController;
                        $request->qty = $crt['quantity'];
                        $request->price_id = $crt['price_id'];
                        $request->options = (@$crt['options']) ? explode(',', @$crt['options']) : NULL;
                        $request->sub_options = (@$crt['sub_options']) ? @$crt['sub_options'] : NULL;
                        $request->sub_product = (@$crt['sub_product']) ? $crt['sub_product'] : '';
                        $request->sub_price_id = (@$crt['sub_price_id']) ? $crt['sub_price_id'] : '';

                        $cart->add($crt['product_id'], $request, TRUE);

                    endforeach;
                }
                if ($request->redirect) {
                    return Redirect::route("checkout");
                } else if ($request->refrer) {
                    return Redirect::to($request->refrer);
                }else if($user->isDealer){
                    return Redirect::route('admin.dashboard');
                } else {


                    return back()->with('success', Lang::get('auth/message.signin.success'));
                }
            }
            //dd($request->get('email'));
            $user = Sentinel::findByCredentials(['email' => $request->get('email')]);
            if ($user) {
                $msg = 'Wrong username or password';
            } else {
                $msg = 'Account not found';
            }
            if ($request->get('top-login')) {
                $this->messageBag->add('top-login', Lang::get($msg));
            }
            $this->messageBag->add('email', Lang::get($msg));
        } catch (NotActivatedException $e) {
            if ($request->get('top-login')) {
                $this->messageBag->add('top-login', Lang::get('Account not activated'));
            }
            $this->messageBag->add('email', Lang::get('Account not activated'));
        } catch (ThrottlingException $e) {
            dd($e);
            if ($request->get('top-login')) {
                $this->messageBag->add('top-login', Lang::get('Account suspended', compact('delay')));
            }
            $delay = $e->getDelay();
            $this->messageBag->add('email', Lang::get('Account suspended', compact('delay')));
        }

        // Ooops.. something went wrong
        return back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postSignup(Request $request) {
        $cart_old = Session::get('cart');
        // Declare the rules for the form validation
        $request['phone'] = preg_replace("/[^0-9]/", "", $request['phone']);

        $rules = array(
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email_signup' => 'required|email|unique:users,email',
            'email_confirm' => 'required|email|same:email_signup',
            'phone' => 'required|between:10,16',
            'password_signup' => 'required|between:3,32',
            'password_confirm' => 'required|same:password_signup',
        );
        if ($request->get('dealer')):
            $rules['dealer_name']='required';
            $rules['website']='required';
            $rules['address']='required';
            $rules['street']='required';
            $rules['city']='required';
            $rules['state']='required';
            $rules['country']='required';
            $rules['region']='required';
            $rules['zip']='required';
        endif;

        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        $validator->setAttributeNames(['first_name' => 'First name',
            'last_name' => 'Last name',
            'email_signup' => 'Email address',
            'tier' => 'Tier',
            'email_confirm' => 'Email address',
            'phone' => 'Phone number',
            'password_signup' => 'Password',
            'password_confirm' => 'Password']);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous() . '#toregister')->withInput()->withErrors($validator);
        }

        try {
            $ip_subnet = getIpSubnetMarkFromEmail($request->get('email_signup'));
            $Fraud = FraudIp::where('ip_addr', $ip_subnet)->first();
            if ($Fraud) {
                $this->messageBag->add('general_signup', Lang::get('Unable to perform the request. Try again later.'));

                return Redirect::back()->withInput()->withErrors($this->messageBag);
            }
            // Register the user
            $user = Sentinel::registerAndActivate(array(
                        'first_name' => $request->get('first_name'),
                        'last_name' => $request->get('last_name'),
                        'username' => $request->get('first_name') . " " . $request->get('last_name'),
                        'slug' => Str::slug($request->get('first_name') . " " . $request->get('last_name'), '-'),
                        'isAdmin' => ($request->get('dealer'))?1:0,
                        'email' => $request->get('email_signup'),
                        'password' => $request->get('password_signup')
            ));
            $active = 0;
            //add user to 'User' group
            if ($request->get('dealer')):
                $role = Sentinel::findRoleByName('Dealer');
                $uuser = User::find($user->id);
                if($request->file('dealer_logo')):
                    $destinationPath = public_path() . "/uploads/dealer/";
                    File::exists($destinationPath) or File::makeDirectory($destinationPath);
                    $name = str_random(11) . '_' . $request->file('dealer_logo')->getClientOriginalName();
                    $request->file('dealer_logo')->move($destinationPath, $name);
                endif;
                
                $data=array('dealer' => $request->get('dealer_name'),
                    'logo' => $name,
                    'tier' => '1');
                $dealer=\App\Models\Dealer::Create($data);
                $shipping = array('location_type' => 'dealer_location',
                    'nickname' => $request->get('dealer_name'),
                    'address' => $request->get('address'),
                    'street' => $request->get('street'),
                    'city' => $request->get('city'),
                    'website' => $request->get('website'),
                    'state' => $request->get('state'),
                    'country' => $request->get('country'),
                    'zip' => $request->get('zip'),
                    'region' => $request->get('region'));
                $location = Location::Create($shipping);
                DealerLocation::Create(['location_id' => $location->id, 'dealer_id' => $dealer->id]);
                
                \App\Models\DealerUser::Create(['user_id' => $user->id, 'dealer_id' => $dealer->id,'user_type'=>'dealer_admin']);
                //When dealer sign up, assign default Tier 1 to dealer and later admin can change dealer tier
                $uuser->tier()->attach(1);
            else:
                $active = 1;
                $role = Sentinel::findRoleByName('Customer');
            endif;
            $role->users()->attach($user);
            UserInfo::create([
                'user_id' => $user->id,
                'is_active' => $active,
                'photo' => '/users/' . $user->slug . '/photos/profile.png',
                'phone' => $request->get('phone')
            ]);



            //un-comment below code incase if user have to activate manually
            // Data to be used on the email view
            $data = array(
                'user' => $user,
                'pass' => $request->get('password_signup')
            );
//              ,
//              'activationUrl' => URL::route('activate', $user->getActivationCode()),
            // Send the activation code through email
            Mail::send('emails.welcome', $data, function ($m) use ($user) {
                $m->from('noreply@graceframe.com', 'Grace');
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Welcome to Grace Frames');
            });
            
            if ($request->get('dealer')){
                return \Redirect()->back()->with([
                            'dealer_registered' => 1
                ]);
            }else{
                //Redirect to login page
                //return Redirect::to("signin")->with('success', Lang::get('auth/message.signup.success'));
                // login user automatically
                // Log the user in
                Sentinel::login($user, false);
                // If Cart has value in
                if (Session::has('cart')) {
                    // Insert cart value in DB
                    foreach ($cart_old as $crt):
                        $cart = new CartController;
                        $request->qty = $crt['quantity'];
                        $request->price_id = $crt['price_id'];
                        $request->options = (@$crt['options']) ? explode(',', @$crt['options']) : NULL;
                        $request->sub_options = (@$crt['sub_options']) ? explode(',', @$crt['sub_options']) : NULL;
                        $request->sub_product = (@$crt['sub_product']) ? @$crt['sub_product'] : '';
                        $request->sub_price_id = (@$crt['sub_price_id']) ? @$crt['sub_price_id'] : '';
                        $cart->add($crt['product_id'], $request, TRUE);

                    endforeach;
                }
                if ($request->redirect) {
                    return Redirect::route("checkout");
                } else if ($request->refrer) {
                    return Redirect::to($request->refrer);
                } else {
                    // Redirect to the home page with success menu
                    return Redirect::route("dashboard")->with('success', Lang::get('auth/message.signup.success'));
                }
            }
        } catch (UserExistsException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    /**
     * User account activation page.
     *
     * @param number $userId
     * @param string $activationCode
     * @return
     */
    public function getActivate($userId, $activationCode = null) {
        // Is user logged in?
        if (Sentinel::check()) {
            return Redirect::route('dashboard');
        }

        $user = Sentinel::findById($userId);
        $activation = Activation::create($user);

        if (Activation::complete($user, $activation->code)) {
            // Activation was successful
            // Redirect to the login page
            return Redirect::route('signin')->with('success', Lang::get('auth/message.activate.success'));
        } else {
            // Activation not found or not completed.
            $error = Lang::get('auth/message.activate.error');
            return Redirect::route('signin')->with('error', $error);
        }
    }

    /**
     * Forgot password form processing page.
     * @param Request $request
     *
     * @return Redirect
     */
    public function postForgotPassword(Request $request) {
        // Declare the rules for the validator
        $rules = array(
            'email' => 'required|email',
        );

        // Create a new validator instance from our dynamic rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous() . '#toforgot')->withInput()->withErrors($validator);
        }

        try {
            // Get the user password recovery code
            $user = Sentinel::findByCredentials(['email' => $request->get('email')]);

            if (!$user) {
                return Redirect::route('forgot.password')->with('error', 'Account not found');
            }
            $activation = Activation::completed($user);
            if (!$activation) {
                return Redirect::route('forgot.password')->with('error', 'Account not activated');
            }
            $reminder = Reminder::exists($user) ? : Reminder::create($user);
            // Data to be used on the email view
            $data = array(
                'user' => $user,
                //'forgotPasswordUrl' => URL::route('forgot-password-confirm', $user->getResetPasswordCode()),
                'forgotPasswordUrl' => URL::route('forgot.password.confirm', [$user->id, $reminder->code]),
            );

            // Send the activation code through email
            Mail::send('emails.password', $data, function ($m) use ($user) {
                $m->from('noreply@graceframe.com', 'Grace');
                $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                $m->subject('Account Password Recovery');
            });
        } catch (UserNotFoundException $e) {
            // Even though the email was not found, we will pretend
            // we have sent the password reset code through email,
            // this is a security measure against hackers.
        }

        //  Redirect to the forgot password
        return Redirect::to(URL::previous() . '#toforgot')->with('success', 'Check email to reset password.');
    }

    /**
     * Forgot Password Confirmation page.
     *
     * @param number $userId
     * @param  string $passwordResetCode
     * @return View
     */
    public function getForgotPasswordConfirm($userId, $passwordResetCode = null) {
        // Find the user using the password reset code
        if (!$user = Sentinel::findById($userId)) {
            // Redirect to the forgot password page
            return Redirect::route('forgot-password')->with('error', Lang::get('auth/message.account_not_found'));
        }

        if ($reminder = Reminder::exists($user)) {
            if ($passwordResetCode == $reminder->code) {
                return View('frontend.auth.forgot-password-confirm', compact('passwordResetCode', 'userId'));
            } else {
                return 'code does not match';
            }
        } else {
            return 'does not exists';
        }

        // Show the page
        // return View('admin.auth.forgot-password-confirm');
    }

    /**
     * Forgot Password Confirmation form processing page.
     *
     * @param Request $request
     * @param number $userId
     * @param  string   $passwordResetCode
     * @return Redirect
     */
    public function postForgotPasswordConfirm(Request $request, $userId, $passwordResetCode = null) {
        // Declare the rules for the form validation
        $rules = array(
            'password' => 'required|between:3,32',
            'password_confirm' => 'required|same:password'
        );

        // Create a new validator instance from our dynamic rules
        $validator = Validator::make($request->all(), $rules);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::route('forgot.password.confirm', [$userId, $passwordResetCode])->withInput()->withErrors($validator);
        }

        // Find the user using the password reset code
        $user = Sentinel::findById($userId);
        if (!$reminder = Reminder::complete($user, $passwordResetCode, $request->get('password'))) {
            // Ooops.. something went wrong
            return Redirect::route('signin')->with('error', 'Ooops.. something went wrong');
        }

        // Password successfully reseted
        return Redirect::route('signin')->with('success', 'Password successfully reseted');
    }

    /**
     * Logout page.
     *
     * @return Redirect
     */
    public function getLogout() {
        // Log the user out
        Session::flush('cart');
        Sentinel::logout();

        // Redirect to the users page
        return Redirect::to(getLang() . '/signin')->with('success', 'You have successfully logged out!');
    }

    /**
     * Account sign up form processing for signup page
     *
     * @param Request $request
     *
     * @return Redirect
     */
}
