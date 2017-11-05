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
use Illuminate\Support\Facades\Redirect;

/**
 * Class StoreController.
 *
 */
class StoreController extends Controller {

    public function __construct() {
        View::share('active', 'cart');
    }

    public function index(Request $request) {
        return view('frontend.store.store')->with('cart', 'total');
    }

    public function selectSchool(Request $request) {
        $state = State::get();

        return view('frontend.store.index', compact('state'))->with('cart', 'total');
    }

    public function selectSchoolPost(Request $request) {
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
            return Redirect::route('store.selectSchool');
        }
    }

    public function confirm(Request $request) {
        if (!Sentinel::check()) {
            return Redirect::route('signin');
        }
        if (!Session::get('product')) {
            if ($request->product) {
                Session::put('product', $request->product);
                return \Redirect::route('store.confirm');
            } else {
                $this->validate($request, [
                    'product' => 'required'
                ]);
                return \Redirect::route('store.selectProduct');
            }
        }
        $school = Session::get('school');
        $standard = Session::get('standard');
        $product = \App\Models\Product::find(Session::get('product'));
        $school = \App\Models\School::find($school);
        $standard = \App\Models\Standard::find($standard);
        return view('frontend.store.confirm', compact('product', 'school', 'standard'))->with('cart', 'total');
    }

    public function cart(Request $request) {
        if (!Sentinel::check()) {
            return Redirect::route('signin');
        }
        $product = \App\Models\Product::find(Session::get('product'));
        $orders=  \App\Models\Order::where(['user_id'=>Sentinel::getuser()->id])->get();
        
                
        if ($request->address1) {
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
            $address = \App\Models\Address::create($data);
            $user = \App\Models\User::find(Sentinel::getuser()->id);
            $address->users()->attach($user);
            $carts = array();
            foreach ($product as $ps):
                $cartdata = array(
                    'user_id' => Sentinel::getuser()->id,
                    'product_id' => $ps->id,
                    'total_price' => $ps->price
                );
                $cart = \App\Models\Cart::create($cartdata);
                $carts[] = $cartdata;
            endforeach;

            Session::push('cart', $carts);
            Session::put('shipping', $data);
            return \Redirect::route('store.cart');
        }
        return view('frontend.store.cart', compact('product','orders'));
    }

    public function pay(Request $request) {
        if (!Sentinel::check()) {
            return Redirect::route('signin');
        }
        if ($request->product_id && in_array($request->product_id, Session::get('product')) && Session::get('cart') && isset(Session::get('cart')[0])) {
            $exist = 0;
            foreach (Session::get('cart')[0] as $crt):
                if ($crt['product_id'] == $request->product_id):
                    $exist = $crt;
                endif;
            endforeach;
            if ($exist) {

                $ps = \App\Models\Product::find($exist['product_id']);
                $subtotal = 0;
                $totaltax = 0;
                $totalmrp = 0;
                $totalshipping = 0;
                foreach ($ps->books as $book):
                    $subtotal+=$book->price;
                    $totalmrp+=$book->price_after_tax;
                    $totaltax+=$book->price_after_tax - $book->price;
                endforeach;
                $shippingtax = (($ps->instate_shipping_charges * 18) / 100);
                $totalshipping = $shippingtax + $ps->instate_shipping_charges;


                $order = array('user_id' => Sentinel::getuser()->id,
                    'amount' => $subtotal,
                    'tax' => $totaltax,
                    'shipping' => $totalshipping,
                    'total_amount' => $ps->price,
                    'status_id' => 1
                );
                $ord = \App\Models\Order::Create($order);
                $ord_prod = \App\Models\OrderProduct::Create(['order_id' => $ord->id,
                            'product_id' => $ps->id,
                            'qty' => 1,
                            'price' => $ps->price]);
                $cart = Session::get('cart');
                foreach ($cart[0] as $key => $crt):
                    if ($crt['product_id'] == $ps->id):
                        unset($cart[0][$key]);
                    endif;
                endforeach;
                $productcart = Session::get('product');
                foreach ($productcart as $k => $pc):
                    if ($pc == $ps->id):
                        unset($productcart[$k]);
                    endif;
                endforeach;

                Session::put('product', $productcart);
                Session::put('cart', $cart);
            }

            $productcart = Session::get('product');
            if ($productcart) {
                foreach ($productcart as $k => $pc):
                    if ($pc == $request->product_id):
                        unset($productcart[$k]);
                    endif;
                endforeach;
                Session::put('product', $productcart);
            }
        }
        return \Redirect::route('store.cart');
    }

}
