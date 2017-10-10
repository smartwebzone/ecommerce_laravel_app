<?php

namespace Ecommerce;

use App\Models\Cart;
use App\Models\Price;
use Illuminate\Database\Eloquent\Collection;
use App\Models\ProductSubProducts;
use App\Models\Product;
use Sentinel;
use Session;

class helperFunctions {

    /**
     * @param $cart
     * @param $total
     */
    public static function getCartInfo(&$cart, &$total) {
        if (Sentinel::check()) {

            //$cart = Sentinel::getUser()->cart;
            $cart = Cart::where('user_id', Sentinel::getUser()->id)->get();
             foreach($cart as &$c):
                $c->sub_product=(json_decode($c->sub_product));
                $c->sub_price_id=(json_decode($c->sub_price_id));
            endforeach;
        } else {
            $cart = new Collection();
            if (Session::has('cart')) {
                foreach (Session::get('cart') as $item) {
                    $elem = new Cart();
                    $elem->product_id = $item['product_id'];
                    $elem->amount = $item['quantity'];
                    $elem->sub_product = $item['sub_product'];
                    $elem->sub_price_id = $item['sub_price_id'];
                    $elem->price_id = $item['price_id'];
                    if (isset($item['options'])) {
                        $elem->options = $item['options'];
                    }
                    $cart->add($elem);
                }
            }
        }
        $total = 0;
        //dd($cart);
        if ($cart) {
            foreach ($cart as $item) {
                $pric = Price::find($item->price_id)->final_price;

                if ($item->sub_product) {
                    //dd($item->sub_product);
                    foreach ($item->sub_product as $key=>$sub_product) {
                        $sub_prd = ProductSubProducts::find($sub_product);

                        $prods_price = Product::find($sub_prd->sub_product_id)->prices->first();
                        $prods_price_id = $prods_price->id;
                            //dd($item['sub_price_id'][$key]);
                            if ($item['sub_price_id'][$key]) {
                                $prods_price_id = $item['sub_price_id'][$key];
                            }
                        $pric+=(floatval(preg_replace('/[\$,]/', '', Price::find($prods_price_id)->final_price)) * $sub_prd->quantity);
                    }
                }
                $total += $pric * $item->amount;
            }
        } else {
            $cart = new Collection();
        }
    }

}
