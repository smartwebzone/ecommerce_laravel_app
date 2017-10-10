<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\FormPost;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //$formPosts = FormPost::orderBy('created_at', 'DESC')->where('lang', getLang())->where('is_answered','0')->get();
        //dd($formPosts);

	//    view()->share('formPostMessage', $formPosts);
        //
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
