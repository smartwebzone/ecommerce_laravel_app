<?php

namespace App\Http\Middleware;

use Closure;
use Menu;

class MenuMiddleware
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
        Menu::make('live_primary', function ($menu) {
            $menu->add('Home', '/');
            $menu->add('Sewing Machines', getLang().'/sewing-machines');
            $menu->add('Machine Frames', getLang().'/machine-frames');
            $menu->add('Hand Quilting', getLang().'/hand-quilting');
            $menu->add('Automated', getLang().'/automation/qct');
            $menu->add('truecut', getLang().'/');
            $menu->add('Community', getLang().'/community');
            $shop = $menu->add('Shop', getLang().'/shop', ['class' => 'sf-menu']);
	            $shop->add('Cart', getLang().'/shop/cart');
	            $shop->add('Checkout', getLang().'/shop/checkout');
            $menu->add('Blog', getLang().'/articles');
            $menu->add('Contact', getLang().'/contact');
        });

        Menu::make('disclosures', function ($menu) {
            // $menu->add('About Us', getLang().'/page/about-us');
            $menu->add('Terms Conditions', getLang().'/page/tos');
            $menu->add('Privacy Policy', getLang().'/page/pp');
            $menu->add('Returns', getLang().'/page/returns');
            //$menu->add('Support', getLang() . '/page/support');
            $menu->add('Copyright', getLang().'/page/copyright');
            $menu->add('Shipping Policy', getLang().'/page/shipping-policy');
            $menu->add('Warranty', getLang() . '/page/warranty');
            // $menu->add('Sitemap', getLang() . '/sitemap');
            // $menu->add('Blog', getLang() . '/community/blog');
            //$menu->add('admin', 'admin/login');
        });

        Menu::make('pagedisclusures', function ($menu) {
            $menu->add('Copyright', getLang().'/page/copyright');
            $menu->add('Privacy Policy', getLang().'/page/pp');
            $menu->add('Returns', getLang().'/page/returns');
            $menu->add('Shipping Policy', getLang().'/page/shipping-policy');
            //$menu->add('Support', getLang() . '/page/support');
            $menu->add('Terms Conditions', getLang().'/page/tos');
            $menu->add('Warranty', getLang() . '/page/warranty');
        });

        Menu::make('account', function ($menu) {
            $menu->add('My Account', getLang().'/dashboard')->icon('user');
            $menu->add('Purchase History', getLang().'/dashboard');
            // $menu->add('Shipping Details', getLang() . '/dashboard');
            // $menu->add('Refunds', getLang() . '/dashboard');
            // $menu->add('Support', getLang() . '/dashboard');
        });

        Menu::make('contact', function ($menu) {
            $menu->add('My Account', getLang().'/dashboard')->icon('user');
            //$menu->add('Support', getLang().'/');
            // $menu->add('Shipping Details', getLang() . '/dashboard');
            // $menu->add('Refunds', getLang() . '/dashboard');
            // $menu->add('Support', getLang() . '/dashboard');
        });

        Menu::make('category', function ($menu) {
//            $menu->add('TrueCut', getLang().'/category/truecut');
//            $menu->add('Hand Quilting', getLang().'/category/hand-quilting');
//            $menu->add('Machine Quilting', getLang().'/category/machine-quilting');
//            $menu->add('Qnique', getLang().'/category/qnique');
            //$menu->add('Accessories', getLang() . '/category/accessories');
        });

        Menu::make('addons', function ($menu) {
                //$menu->add('Accessories', getLang().'/accessories');
	        $menu->add('Luminess', getLang().'/accessories/luminess');
	        $menu->add('Machine Accessories', getLang().'/sewing-machines/accessories');
	        $menu->add('Pattern Perfect', getLang().'/accessories/plastic-pattern-perfect');
	        $menu->add('Quilt Clips', getLang().'/accessories/quilt-clips');
	        $menu->add('All Quilting Accessories', getLang().'/shop');
        });

        Menu::make('shop', function ($menu) {
            // $menu->add('Shop', getLang() . '/shop')->icon('cart');
                // $menu->add('Cart', getLang() . '/shop/cart');
                // $menu->add('Checkout', getLang() . '/shop/cart/checkout');
        });

        Menu::make('truecut', function ($menu) {
            //$menu->add('TrueCut', getLang() . '/truecut');
            $menu->add('My Comfort Cutter', getLang().'/truecut/comfort-cutter/');
            $menu->add('Rulers', getLang().'/truecut/rulers');
            $menu->add('TrueSharp 2', getLang().'/truecut/truesharp');
            $menu->add('Linear Sharpener', getLang().'/truecut/linear-sharpener');
            $menu->add('TrueCut 360', getLang().'/truecut/truecut360');
            $menu->add('Cutting Mats', getLang().'/truecut/cutting-mats');
//            $menu->add('Cutting Table', getLang().'/truecut/cutting-table');
            $menu->add('Accessories', getLang().'/truecut/rotary-cutting-accessories');
        });


        Menu::make('homepage', function ($menu) {
            $menu->add('Community', getLang().'/community/blog');
            $menu->add('Shop Now', getLang().'/shop');
        });

        Menu::make('qct', function ($menu) {
            //$menu->add('Quilter&#39;s Creative Touch 4', getLang().'/automation/qct');
            $menu->add('Feature List', getLang().'/automation/qct/features');
            $menu->add('Compare Versions', getLang().'/automation/qct/compare');
            $menu->add('Specs', getLang().'/automation/qct/specs');
            //$menu->add('Tutorials', getLang() . '/automation/qct/tutorials');
            //$menu->add('Support', getLang().'/automation/qct/support');
            //$menu->add('Get QCT4 Now', getLang().'/product/qct4');
            //$menu->add('Get QCT Now', getLang() . '/automation/qct/purchase', ['class' => 'button button-rounded button-border']);
        });

        Menu::make('hand', function ($menu) {
            //$menu->add('Hand Quilting', getLang().'/hand-quilting');
            $menu->add('Z44 Frame', getLang().'/hand-quilting/z44-frame');
            $menu->add('Start-Right EZ3', getLang().'/hand-quilting/start-right-ez3');
            //$menu->add('Grace Hoop 2', getLang().'/hand-quilting/grace-hoop-2');
            //$menu->add('Lap Hoops', getLang().'/hand-quilting/grace-lap-hoops');
            $menu->add('GracieBee', getLang().'/hand-quilting/graciebee');
            $menu->add('Accessories', getLang().'/hand-quilting/accessories');
            $menu->add('Compare Frames', getLang().'/hand-quilting/compare-frames');
        });

        Menu::make('machine', function ($menu) {
            //$menu->add('Machine Quilting Frames', getLang().'/machine-frames');
	    $menu->add('Continuum Frame', getLang().'/machine-frames/continuum-frame');	
            $menu->add('GQ Frame', getLang().'/machine-frames/gq-frame');
            //$menu->add('Gracie King & Queen', getLang().'/machine-frames/gracie-kq');
            $menu->add('SR-2 Frame', getLang().'/machine-frames/sr-2-frame');
            $menu->add('Accessories', getLang().'/machine-frames/accessories');
            $menu->add('Compare Frames', getLang().'/machine-frames/compare-machine-frames');
        });

        Menu::make('industry', function ($menu) {
//            $menu->add('Promos', getLang().'/community/');
//            $menu->add('Contests', getLang().'/community/');
//            $menu->add('FAQ\'S', getLang().'/community/');
//            $menu->add('Forum', getLang().'/community/');
//            $menu->add('Videos', getLang().'/community/');
//            $menu->add('Tutorials', getLang().'/community/');
        });

        Menu::make('qnique', function ($menu) {
            $menu->add('Qnique 21"', getLang().'/sewing-machines/qnique21');
	    $menu->add('Qnique 21 Sit-Down', getLang().'/sewing-machines/qnique21-sitdown');	
            $menu->add('Qnique 14"', getLang().'/sewing-machines/qnique14');
            $menu->add('Qnique 14 Sit-Down', getLang().'/sewing-machines/qnique14-sitdown');
            // $menu->add('Features', getLang() . '/sewing-machines/qnique/features');
            // $menu->add('Specs', getLang() . '/sewing-machines/qnique/specs');
            $menu->add('Accessories', getLang().'/sewing-machines/accessories');
            //   $menu->add('Comparison', getLang() . '/sewing-machines/qnique/comparison');
        });

        Menu::make('blog', function ($menu) {
            // $menu->add('News', getLang() . '/news');
            // $menu->add('Events', getLang() . '/events');
            // $menu->add('Promos', getLang() . '/');
            // $menu->add('Contests', getLang() . '/');
            // $menu->add('Forum', getLang() . '/');
        });

        Menu::make('popular', function ($menu) {
//            $menu->add('Documentation', getLang().'/docs');
//            $menu->add('Software', getLang().'/');
//            $menu->add('FAQ\'s', getLang().'/');
//            $menu->add('Support Forums', getLang().'/');
//            $menu->add('Press & News', getLang().'/');
            $menu->add('Blog', getLang().'/resources/blog');
//            $menu->add('Quilting Community', getLang().'/');
	        $menu->add('Sewing Machines', getLang().'/sewing-machines');
	        $menu->add('Machine Frames', getLang().'/machine-frames');
	        $menu->add('Hand Quilting', getLang().'/hand-quilting');
	        $menu->add('Automated', getLang().'/automation/qct');
	        $menu->add('TrueCut', getLang().'/truecut');

	        $shop = $menu->add('Shop', getLang().'/shop', ['class' => 'sf-menu']);
//	        $shop->add('Cart', getLang().'/shop/cart');
//	        $shop->add('Checkout', getLang().'/shop/checkout');
//	        $menu->add('Blog', getLang().'/articles');
	        $menu->add('Contact', getLang().'/contact');
        });

        Menu::make('page', function ($menu) {
           // $menu->add('Community', getLang().'/docs');
//            $menu->add('Support Forums', getLang().'/');
//            $menu->add('Press & News', getLang().'/');
//            $menu->add('Blog', getLang().'/resources/blog');
//            $menu->add('Quilting Community', getLang().'/');
        });

        return $next($request);
    }
}
