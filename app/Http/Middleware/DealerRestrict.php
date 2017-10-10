<?php

namespace App\Http\Middleware;

use Closure;
use Flash;
use Redirect;
use Sentinel;

class DealerRestrict {

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Sentinel::check() && Sentinel::inRole('dealer')) {
            return Redirect::to(getLang() . '/');
        }

        return $next($request);
    }

}
