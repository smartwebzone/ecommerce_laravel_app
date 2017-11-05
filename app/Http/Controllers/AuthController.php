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
    public function getSignout(Request $request) {
         $request->session()->flush();

        return redirect('/');
        
    }
    public function getSignin(Request $request) {
        $user = Auth::user();
        $userinfo = NULL;
        // Is the user logged in?
        if (Sentinel::check()) {
            return Redirect::route('store.selectProduct');
        }
        $redirect = $request->redirect;
        $refrer = $request->refrer;

        return view('frontend/auth/signin-signup', compact('page', 'cart', 'total', 'user', 'userinfo', 'redirect', 'refrer'));
    }

    public function getForgotPassword() {
        if (!Sentinel::check()) {
            return view('frontend/auth/forgot-password');
        }

        return Redirect::route('dashboard');
    }

    public function getconfirmEmail(Request $request) {
        if (!Sentinel::check() && $request->secret) {
            $user = User::where(['verify' => $request->secret])->first();

            if ($user) {
                $user->is_active = 1;
                $user->verify = 'COMPLETED';
                $user->save();
                Sentinel::activate($user);
                Sentinel::authenticate($user);
                $role = Sentinel::findRoleByName('Student');
                $role->users()->attach($user);
                return Redirect::to('profile');
            }
        }

        return Redirect::to('validate');
    }

    public function getProfile(Request $request) {
        if (!Sentinel::check()) {
            return Redirect::to('signin');
        }
        $user = User::find(Sentinel::getUser()->id);
        $billing_address = array();
        if($user->address()->where('address_type','billing')->count() > 0){
            $billing_address = $user->address()->where('address_type','billing')->get();
            $billing_address = $billing_address[0];
        }
        $shipping_address = array();
        if($user->address()->where('address_type','shipping')->count() > 0){
            $shipping_address = $user->address()->where('address_type','shipping')->get();
            $shipping_address = $shipping_address[0];
        }
        $state = \App\Models\State::lists('name', 'name')->toArray();
        $state = [null => 'STATE'] + $state;
        return View('frontend.auth.profile', compact('user','state','billing_address','shipping_address'));
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

            if (Sentinel::authenticate($request->only(['email', 'password']), $request->get('remember-me', false))) {
                $user = User::find(Sentinel::getUser()->id);
                if (!$user->is_active) {
                    Session::flush('cart');
                    Sentinel::logout();
                    return Redirect::route('signin')->with('error', 'Your account isn\'t active. Check email for activation link or contact administrator for further assistance.');
                }



                if ($request->redirect) {
                    return Redirect::route("checkout");
                } else if ($request->refrer) {
                    return Redirect::to($request->refrer);
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

    public function postRegisterEmail(Request $request) {
        $rules = array(
            'email_signup' => 'required|email|unique:users,email',
        );

        $validator = Validator::make($request->all(), $rules);

        $validator->setAttributeNames([
            'email_signup' => 'Email address']);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous() . '#toregister')->withInput()->withErrors($validator);
        }
        $user = User::create(array(
                    'isAdmin' => 0,
                    'email' => $request->get('email_signup'),
                    'password' => bcrypt('test123'),
                    'verify' => str_random(16)
        ));
        $data = array(
            'link' => url('/confirmEmail?secret=' . $user->verify)
        );
        Mail::send('emails.verify', $data, function ($m) use ($user) {
            $m->from('noreply@jeevandeep.com', 'Jeevandeep');
            $m->to($user->email, 'User');
            $m->subject('Welcome to Jeevandeep');
        });
        return Redirect::to('validate');
    }

    /**
     * Account sign up form processing.
     *
     * @return Redirect
     */
    public function postSignup(Request $request) {
        if (!Sentinel::check()) {
            return Redirect::to('signin');
        }

        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'parent_first_name' => 'required',
            'parent_last_name' => 'required',
            'mobile' => 'required',
            'address1' => 'required',
            'billaddress1' => 'required',
            'city' => 'required',
            'billcity' => 'required',
            'zip' => 'required',
            'billzip' => 'required',
            'state' => 'required',
            'billstate' => 'required',
        );

        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        $validator->setAttributeNames(['first_name' => 'First name',
            'last_name' => 'Last name',
            'parent_first_name' => 'Parent First name',
            'parent_last_name' => 'Parent Last name',
            'mobile' => 'Mobile number',
            'address1' => 'Address1',
            'billaddress1' => 'Address1',
            'city' => 'City',
            'billcity' => 'City',
            'zip' => 'Pincode',
            'billzip' => 'Pincode',
            'state' => 'State',
            'billstate' => 'State']);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            // Ooops.. something went wrong
            return Redirect::to(URL::previous() . '#toregister')->withInput()->withErrors($validator);
        }

        try {
            // update the user
            $user = User::find(Sentinel::getUser()->id);
            $user->first_name = $request->get('first_name');
            $user->middle_name = $request->get('middle_name');
            $user->last_name = $request->get('last_name');
            $user->parent_first_name = $request->get('parent_first_name');
            $user->parent_last_name = $request->get('parent_last_name');
            $user->parent_middle_name = $request->get('parent_middle_name');
            $user->mobile = $request->get('mobile');
            $user->landline = $request->get('landline');
            $user->save();

            $data = array(
                'address_type' => 'shipping',
                'address1' => $request->address1,
                'address2' => $request->address2,
                'area' => $request->area,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'added_by' => Sentinel::getuser()->id,
            );
            if($user->address()->where('address_type','shipping')->count() > 0){
                $sid = $user->address()->where('address_type','shipping')->get();
                $sid = $sid[0]['id'];
                $address = \App\Models\Address::where('id',$sid)->update($data);
            }else{
                $address = \App\Models\Address::create($data);
                $address->users()->attach($user);
            }
            $data = array(
                'address_type' => 'billing',
                'address1' => $request->billaddress1,
                'address2' => $request->billaddress2,
                'area' => $request->billarea,
                'city' => $request->billcity,
                'state' => $request->billstate,
                'zip' => $request->billzip,
                'added_by' => Sentinel::getuser()->id,
            );
            if($user->address()->where('address_type','billing')->count() > 0){
                $bid = $user->address()->where('address_type','billing')->get();
                $bid = $bid[0]['id'];
                $address = \App\Models\Address::where('id',$bid)->update($data);
            }else{
                $address = \App\Models\Address::create($data);
                $address->users()->attach($user);
            }
            return Redirect::to('create-password');
        } catch (UserExistsException $e) {
            $this->messageBag->add('email', Lang::get('auth/message.account_already_exists'));
        }

        // Ooops.. something went wrong
        return Redirect::back()->withInput()->withErrors($this->messageBag);
    }

    public function postCreatePass(Request $request) {
        if (!Sentinel::check()) {
            return Redirect::to('signin');
        }
        $rules = array(
            'password_signup' => 'required|between:3,32',
            'password_confirm' => 'required|same:password_signup');
        // Create a new validator instance from our validation rules
        $validator = Validator::make($request->all(), $rules);

        $validator->setAttributeNames(['password_signup' => 'Password',
            'last_name' => 'Confirm Password']);

        // If validation fails, we'll exit the operation now.
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $user = User::find(Sentinel::getUser()->id);
        $user->password = bcrypt($request->password_signup);
        $user->save();
        return Redirect::route('store.selectProduct');
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
                $m->from('noreply@jeevandeepframe.com', 'Grace');
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
