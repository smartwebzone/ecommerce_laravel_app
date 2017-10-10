<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OptionValue;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\UserInfo;
use Ecommerce\helperFunctions;
use File;
use Illuminate\Http\Request;
use Sentinel;
use Input;
use Validator;
use Redirect;
use Flash;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Webpatser\Uuid\Uuid;

class UserController extends Controller {

//    public function __construct()
//    {
//        $this->middleware('sentinal.auth', ['only' => [
//            'dashboard',
//            'editAccount',
//            'editInfo',
//        ]]);
//    }

    public function dashboard() {
        $user = User::find(Sentinel::getUser()->id);

        $ownshipping=array();
        if ($user->isDealer) {
             return Redirect::route('admin.dashboard');
            $dealer = $user->dealer()->first();
//            $dealer_id = $dealer->id;
//            $dealerLocation = $dealer->locations;
//            $dealerUser = $dealer->user;
            $ownshipping = $dealer->shippingAccount;
        }
        $userLocation = $user->location;

        

        $billing = $userLocation->where('location_type', 'billing')->first();

        $shipping = $userLocation->where('location_type', 'shipping')->first();

        helperFunctions::getCartInfo($cart, $total);
        $orders = Order::where('user_id', Sentinel::getUser()->id)->orderBy('id', 'desc')->get();
        foreach ($orders as $key => $item):
            $orders[$key]['product'] = OrderProduct::where('order_id', $item->id)->get();

            if (!(count($orders[$key]['product']))) {
                unset($orders[$key]);
            }
        endforeach;
        $options = new Collection();
        $option_added = [];
        foreach ($orders as $ord) {
            foreach ($ord->product as $detail) {
                if ($detail->options) {
                    $values = explode(',', $detail->options);
                    foreach ($values as $value) {
                        if (!in_array($value, $option_added)) {
                            $options->add(OptionValue::find($value));
                            $option_added[] = $value;
                        }
                    }
                }
            }
        }
        $wishlist = $user->wishlist()->get();
        //$wishlist=  \App\Models\Wishlist::whereUserId(Sentinel::getUser()->id)->first();


        return view('frontend.account.user-dashboard', compact('total', 'ownshipping', 'shipping', 'billing', 'wishlist', 'cart', 'user', 'orders', 'options'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'email' => 'required',
        ]);

        $user = User::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'username' => $request->first_name . ' ' . $request->last_name,
                    'slug' => str_slug(($request->first_name . ' ' . $request->last_name), '-'),
                    'isAdmin' => 0,
                    'password' => bcrypt($request->password),
                    'email' => $request->email,
                    'uuid' => Uuid::generate(3, $request->first_name . $request->last_name, Uuid::NS_DNS)
        ]);

        $user->isAdmin = $request->isAdmin;
        $user->save();

        File::makeDirectory(public_path() . '/users/' . $user->slug);
        File::makeDirectory(public_path() . '/users/' . $user->slug . '/photos/');
        $dest = public_path() . '/users/' . $user->slug . '/photos/profile.png';
        $file = public_path() . '/img/profile.png';
        File::copy($file, $dest);
        UserInfo::create([
            'user_id' => $user->id,
            'photo' => '/users/' . $user->slug . '/photos/profile.png',
        ]);

        return \Redirect('/admin/users')->with([
                    'flash_message' => 'User Successfully Added !',
        ]);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id) {
        $user = User::find($id);
        File::deleteDirectory(public_path() . '/content/' . $user->username);
        $user->delete();

        return \Redirect('/admin/users')->with([
                    'flash_message' => 'User has been Successfully removed',
                    'flash-warning' => true,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) {
        try {
            $rules = array(
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'min:4',
                'confirm-password' => 'same:password',
            );
            $input = Input::all();
            if (!$input['password'])
                unset($input['password']);
            else
                $input['password'] = bcrypt($input['password']);

            $validation = Validator::make($input, $rules);

            if ($validation->fails()) {
                return Redirect::to(getLang() . '/dashboard' . '#tab-edit')->withErrors($validation)->withInput();
            }
            $user = User::find($id);
            $user->update($input);
            $infodata = $request->userInfo;
            $infodata['dob'] = Carbon::parse($infodata['dob'])->format('Y-m-d H:i:s');
            //dd($infodata);

            Userinfo::updateOrCreate(array('user_id' => $id), $infodata);
            if ($request->hasFile('userInfo')) {
                $dest = 'uploads/users/' . $user->username . '/photos/';
                File::delete(public_path() . $user->userInfo->photo);
                $name = str_random(11) . '_' . $request->file('userInfo')['photo']->getClientOriginalName();
                $request->file('userInfo')['photo']->move($dest, $name);

                $user->userInfo->where('user_id', $user->id)->update(['photo' => '/' . $dest . $name]);
            }


            Flash::message('Profile Info Sucessfully Updated');
            return Redirect::to(getLang() . '/dashboard' . '#tab-edit');
        } catch (ValidationException $e) {
            return Redirect::to(getLang() . '/dashboard' . '#tab-edit')->withInput()->withErrors($e->getErrors());
        }
    }

    public function edit(Request $request, $id) {
        $user = User::find($id);
        $user->isAdmin = $request->isAdmin;
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->first_name . ' ' . $request->last_name,
            'slug' => str_slug(($request->first_name . ' ' . $request->last_name), '-'),
            'email' => $request->email,
        ]);

        $user->userInfo()->update([
            'photo' => $request->photo,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'country' => $request->country,
            'about_me' => $request->about_me,
            'website' => $request->website,
            'company' => $request->company,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'mobile' => $request->mobile,
            'work' => $request->work,
            'other' => $request->other,
            'dob' => $request->dob,
            'skypeid' => $request->skypeid,
            'githubid' => $request->githubid,
            'twitter_username' => $request->twitter_username,
            'instagram_username' => $request->instagram_username,
            'facebook_username' => $request->facebook_username,
            'facebook_url' => $request->facebook_url,
            'linked_in_url' => $request->linked_in_url,
            'google_plus_url' => $request->google_plus_url,
            'display_name' => $request->display_name,
        ]);

        FlashAlert()->success('Success!', 'User Successfully Edited');

        return \Redirect()->back();
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editAccount(Request $request) {
        $user = Sentinel::getUser();
        $this->validate($request, [
            'photo' => 'image',
            'new_password' => 'confirmed',
        ]);
        if (\Hash::check($request->old_password, $user->password)) {
            Sentinel::getUser()->update(['password' => bcrypt($request->new_password)]);
        }
        if ($request->hasFile('photo')) {
            $dest = 'users/' . $user->username . '/photos/';
            File::delete(public_path() . $user->userInfo->photo);
            $name = str_random(11) . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move($dest, $name);

            UserInfo::where('user_id', $user->id)->update(['photo' => '/' . $dest . $name]);
        }
        $user->update([
            'email' => $request->email,
        ]);

        return \Redirect()->back();
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editInfo(Request $request) {
        UserInfo::where('user_id', Sentinel::getUser()->id)->update($request->except('_token'));

        return \Redirect()->back()->with([
                    'flash_message' => 'Successfully saved !',
        ]);
    }

}
