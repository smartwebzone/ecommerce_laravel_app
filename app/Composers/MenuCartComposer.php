<?php

namespace App\Composers;

use Ecommerce\helperFunctions;

class MenuCartComposer {

    /**
     * @param $view
     */
    public function compose($view) {
        helperFunctions::getCartInfo($cart, $total);
        $total = number_format($total, 2, '.', ',');
        $view->with('cart', $cart)->with('total', $total);
    }

}
