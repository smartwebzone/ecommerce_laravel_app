<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Config;
use LaravelLocalization;

/**
 * Class FaqController.
 *
 
 */
class LanguageController extends Controller
{
    public function setLocale($language)
    {
        //var_dump($language);

        //var_dump(Config::get('app.locale'));
        LaravelLocalization::setLocale($language);
        //var_dump(Config::get('app.locale'));
    }
}
