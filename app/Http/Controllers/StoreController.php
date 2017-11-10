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
use Mail;
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
            return Redirect::route('store.selectProduct');
        } else {
            return Redirect('/signin');
        }
    }

    public function selectProduct(Request $request) {
        if (Session::get('product')) {
            Session::forget('product');
        }
        $state = Session::get('state');
        $school = Session::get('school');
        $standard = Session::get('standard');
        if ($state && $school && $standard) {
            $shipping_address = getUserAddress('shipping');

            $product = \App\Models\Product::where(['school_id' => $school, 'standard_id' => $standard])->active()->get();
            //dd($shipping_address->state,$product[0]->company->state);
            $school = \App\Models\School::find($school);
            $standard = \App\Models\Standard::find($standard);
            return view('frontend.store.selectproduct', compact('school', 'standard', 'product', 'shipping_address'))->with('cart', 'total');
        } else {
            return Redirect::route('store.selectSchool');
        }
    }

    public function confirm(Request $request) {
        if (!Sentinel::check()) {
            return Redirect::route('signin');
        }
        if ($request->action == 'confirm') {
            if ($request->product) {
                Session::put('product', $request->product);
                return Redirect::route('store.confirm');
            } else {
                return Redirect::route('store.selectProduct')->with('error', 'Please select atleast 1 product to proceed.');
            }
        }
        if (!Session::get('product')) {
            return Redirect::route('store.selectSchool');
        }
        $school = Session::get('school');
        $standard = Session::get('standard');
        $product = \App\Models\Product::find(Session::get('product'));
        $school = \App\Models\School::find($school);
        $standard = \App\Models\Standard::find($standard);
        $shipping_address = getUserAddress('shipping');
        return view('frontend.store.confirm', compact('product', 'school', 'standard', 'shipping_address'))->with('cart', 'total');
    }

    public function cart(Request $request) {
        if (!Sentinel::check()) {
            return Redirect::route('signin');
        }

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
            $user = \App\Models\User::find(Sentinel::getuser()->id);
            if ($user->address()->where('address_type', 'shipping')->count() > 0) {
                $sid = $user->address()->where('address_type', 'shipping')->get();
                $sid = $sid[0]['id'];
                $address = \App\Models\Address::where('id', $sid)->update($data);
            } else {
                $address = \App\Models\Address::create($data);
                $address->users()->attach($user);
            }
            $product = \App\Models\Product::find(Session::get('product'));
            $preferred_delivery_date = NULL;
            if ($request->month && $request->date) {
                $date = date_parse($request->month);
                $pdate = date('Y') . '-' . $date['month'] . '-' . $request->date;
                $preferred_delivery_date = date('Y-m-d', strtotime($pdate));
            }
            if ($preferred_delivery_date == '0000-00-00') {
                $preferred_delivery_date = NULL;
            }
            $delete_cart = \App\Models\Cart::where('user_id', Sentinel::getuser()->id)->delete();
            $carts = array();
            foreach ($product as $ps):
                $cartdata = array(
                    'user_id' => Sentinel::getuser()->id,
                    'product_id' => $ps->id,
                    'preferred_delivery_date' => $preferred_delivery_date
                );
                $cart = \App\Models\Cart::create($cartdata);
                $carts[] = $cartdata;
            endforeach;

            Session::forget('product');
            return Redirect::route('store.cart');
        }

        $cart_data = \App\Models\Cart::where(['user_id' => Sentinel::getuser()->id])->get();
        $orders = \App\Models\Order::where(['user_id' => Sentinel::getuser()->id])->whereRaw('DATE(NOW()) = DATE(order_date)')->get();

        $total_products = count($cart_data) + count($orders);

        return view('frontend.store.cart', compact('product', 'cart_data', 'orders', 'total_products'));
    }

    public function pay(Request $request) {
        if (!Sentinel::check()) {
            return Redirect::route('signin');
        }
        if ($request->product_id) {
            $product_id = $request->product_id;
            $ps = \App\Models\Product::find($product_id);
            $subtotal = 0;
            $totaltax = 0;
            $totalmrp = 0;
            $totalshipping = 0;
            foreach ($ps->books as $book):
                $subtotal += $book->price;
                $totalmrp += $book->price_after_tax;
                $totaltax += $book->price_after_tax - $book->price;
            endforeach;
            $shippingtax = (($ps->shipping_state * 18) / 100);
            $totalshipping = $shippingtax + $ps->shipping_state;
            $user = \App\Models\User::find(Sentinel::getuser()->id);
            $billing = $user->address()->where('address_type', 'billing')->first();
            $shipping = $user->address()->where('address_type', 'shipping')->first();
            if (!$billing) {
                $billing = $shipping;
            }
            $order = array('user_id' => Sentinel::getuser()->id,
                'amount' => $subtotal,
                'tax' => $totaltax,
                'shipping' => $totalshipping,
                'total_amount' => $ps->price,
                'status_id' => 1,
                'preferred_delivery_date' => $request->preferred_delivery_date,
                'billing_address1' => $billing->address1,
                'billing_address2' => $billing->address2,
                'billing_area' => $billing->area,
                'billing_city' => $billing->city,
                'billing_state' => $billing->state,
                'billing_zip' => $billing->zip,
                'shipping_address1' => $shipping->address1,
                'shipping_address2' => $shipping->address2,
                'shipping_area' => $shipping->area,
                'shipping_city' => $shipping->city,
                'shipping_state' => $shipping->state,
                'shipping_zip' => $shipping->zip,
            );
            $ord = \App\Models\Order::Create($order);
            $ord_prod = \App\Models\OrderProduct::Create(['order_id' => $ord->id,
                        'product_id' => $ps->id,
                        'qty' => 1,
                        'price' => $ps->price]);
            $ord = \App\Models\Order::find($ord->id);

            $template = \App\Models\Email::where(['template' => 'Order'])->get();
            // Send the welcome email
            if ($template) {
                $body = str_replace('<<student_name>>', 'ds', $template[0]->body);


                $body = nl2br($body);
                $body = explode("<<order_details>>", $body);
                $head = explode("\n", $body[0]);
                $foot = explode("\n", $body[1]);
                Mail::send('emails.orders', ['order' => $ord, 'head' => $head, 'foot' => $foot], function ($m) use ($user,$template) {
                    $m->from('noreply@jeevandeep.com', 'Jeevandeep');
                    $m->to($user->email, $user->first_name . ' ' . $user->last_name);
                    $m->subject($template[0]->subject);
                });
            }
            $delete_cart = \App\Models\Cart::where('user_id', Sentinel::getuser()->id)->where('product_id', $product_id)->delete();
        }
        return Redirect::route('store.cart', ['success' => '1']);
    }

    public function unavailable_school(Request $request) {
        if ($request->action == 'add') {
            $missing_school = \App\Models\Missingschool::Create(['name' => $request->name,
                        'description' => $request->description]);
            return Redirect::route('store.selectSchool')->with('success', 'Your request to add new school sent successfully.');
        }
        return View('frontend.store.unavailable_school');
    }

    public function unavailable_standard(Request $request) {
        if ($request->action == 'add') {
            $missing_standard = \App\Models\Missingstandard::Create(['name' => $request->name,
                        'description' => $request->description]);
            return Redirect::route('store.selectSchool')->with('success', 'Your request to add new standard sent successfully.');
        }
        return View('frontend.store.unavailable_standard');
    }

}
