<?php

namespace App\Http\Controllers;

use Ecommerce\helperFunctions;
use LaravelLocalization;

/**
 * Class HomeController.
 *
 */
class HomeController extends Controller
{
    public function index()
    {
	    
        $languages = LaravelLocalization::getSupportedLocales();


        return view('frontend/layout/homepage', compact('languages'));
    }
}
