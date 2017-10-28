<?php

namespace App\Http\Controllers;

use App\Repositories\Store\StoreInterface;
use App\Repositories\Store\StoreRepository as Store;
use App\Services\Pagination;
use Ecommerce\helperFunctions;
use Illuminate\Http\Request;
use View;
use App\Models\State;
use Session;
use Sentinel;

/**
 * Class StoreController.
 *
 */
class StoreController extends Controller {

    public function __construct() {
        View::share('active', 'cart');
    }

    public function index(Request $request) {
        $state = State::get();

        return view('frontend.store.index', compact('state'))->with('cart', 'total');
    }

    public function selectSchool(Request $request) {
        $this->validate($request, [
            'state' => 'required',
            'school' => 'required',
            'standard' => 'required',
        ]);

        Session::put('state', $request->state);
        Session::put('school', $request->school);
        Session::put('standard', $request->standard);
        if (Sentinel::getUser()) {
            return \Redirect::route('store.selectProduct');
        } else {
            return \Redirect('/signin');
        }
    }

    public function selectProduct(Request $request) {
        $state = Session::get('state');
        $school = Session::get('school');
        $standard = Session::get('standard');
        if ($state && $school && $standard) {
            $product = \App\Models\Product::where(['school_id' => $school, 'standard_id' => $standard])->get();
            $school = \App\Models\School::find($school);
            $standard = \App\Models\Standard::find($standard);
            return view('frontend.store.selectproduct', compact('school', 'standard', 'product'))->with('cart', 'total');
        } else {
            return \Redirect('en/store');
        }
    }

    public function confirm(Request $request) {
        if (!Session::get('product')) {
            $this->validate($request, [
                'product' => 'required'
            ]);
        }
        if ($request->product) {
            Session::put('product', $request->product);
            return \Redirect::route('store.confirm');
        }
        $school = Session::get('school');
        $standard = Session::get('standard');
        $product = \App\Models\Product::find(Session::get('product'));
        $school = \App\Models\School::find($school);
        $standard = \App\Models\Standard::find($standard);
        return view('frontend.store.confirm', compact('product', 'school', 'standard'))->with('cart', 'total');
    }

    public function cart(Request $request) {
        if (!Session::get('shipping')) {
            $this->validate($request, [
                'address1' => 'required',
                'area' => 'required',
                'city' => 'required',
                'state' => 'required',
                'zip' => 'required',
                'month' => 'required',
                'date' => 'required',
            ]);
        }
        $product = \App\Models\Product::find(Session::get('product'));
        if ($request->address1) {
            $data = array(
                'address_type' => 'shipping',
                'address1' => $request->address1,
                'address1' => $request->address2,
                'area' => $request->area,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'added_by' => Sentinel::getuser()->id,
            );
            $address = \App\Models\Address::create($data);
            $user = \App\Models\User::find(Sentinel::getuser()->id);
            $address->users()->attach($user);
            $carts=array();
            foreach ($product as $ps):
                $cart= array(
                    'user_id' => Sentinel::getuser()->id,
                    'product_id' => $ps->id,
                    'total_price' => $ps->price
                );
                $cart = \App\Models\Cart::create($cart);    
                $carts[]=$cart;
            endforeach;
            
            Session::push('cart', $carts);
            Session::put('shipping', $data);
            return \Redirect::route('store.cart');
        }
        return view('frontend.store.cart',compact('product'));
    }

}
