<?php

namespace App\Http\Middleware;

use Closure;
use Flash;
use Redirect;
use Sentinel;

class SentinelPermission
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Sentinel::check()) {
//            if(Sentinel::inRole('dealer')){
//                if(!Sentinel::getUser()->isAdmin)
//                return Redirect::to(getLang() . '/');
//            }else 
            
                if (!Sentinel::inRole('superadmin') && !Sentinel::inRole('dealer')) {
                if (!$request->route()->getName()) {
                    return $next($request);
                }
                if (Sentinel::inRole('customer')) {
                    return Redirect::to(getLang() . '/');
                }
//                if (Sentinel::inRole('dealer')) {
//                    return Redirect::to(getLang() . '/');
//                }
                if ($request->route()->getName() != 'admin.dashboard' && !Sentinel::hasAccess($request->route()->getName())) {
                    Flash::error('You are not permitted to access this area');

                    return Redirect::route('admin.dashboard')->withErrors('Permission denied.');
                }
            }
        }

        return $next($request);
    }
}
