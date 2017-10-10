<?php


/**
 * Created by PhpStorm.
 * User: Phillip Madsen
 * Date: 1/30/2017
 * Time: 4:03 PM
 */

use Carbon\Carbon;

Route::get('sitemap', function(){

	$sitemap = App::make("sitemap");
	$sitemap->setCache('laravel.sitemap', 60);


	if (!$sitemap->isCached()){
		$now = Carbon::now();
		// add item to the sitemap (url, date, priority, freq)
		$sitemap->add(URL::to(getLang().'/'), $now, '1.0', 'daily');
		$sitemap->add(URL::to(getLang().'/shop'), $now, '1.0', 'daily');
		$sitemap->add(URL::to(getLang().'/contact'), $now, '1.0', 'daily');
		$sitemap->add(URL::to(getLang().'/sewing-machines'), $now, '1.0', 'daily');
			$sitemap->add(URL::to(getLang().'/sewing-machines/qnique21 '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/sewing-machines/qnique14 '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/sewing-machines/features '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/sewing-machines/specs '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/sewing-machines/accessories '), $now, '0.8', 'daily');
		$sitemap->add(URL::to(getLang().'/hand-quilting'), $now, '1.0', 'daily');
			$sitemap->add(URL::to(getLang().'/hand-quilting/z44-frame'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/hand-quilting/start-right-ez3'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/hand-quilting/grace-hoop-2'), $now, '0.8', 'daily');
			//$sitemap->add(URL::to(getLang().'/hand-quilting/grace-lap-hoops'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/hand-quilting/graciebee'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/hand-quilting/accessories'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/hand-quilting/compare-frames'), $now, '0.8', 'daily');
		$sitemap->add(URL::to(getLang().'/machine-frames'), $now, '1.0', 'daily');
			$sitemap->add(URL::to(getLang().'/machine-frames/gq-frame'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/machine-frames/compare-machine-frames'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/machine-frames/accessories'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/machine-frames/gracie-kq'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/machine-frames/sr-2-frame'), $now, '0.8', 'daily');
		$sitemap->add(URL::to(getLang().'/automation/qct'), $now, '1.0', 'daily');
			$sitemap->add(URL::to(getLang().'/automation/qct/features'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/automation/qct/compare'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/automation/qct/specs'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/automation/qct/tutorials'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/automation/qct/support'), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/automation/qct/purchase'), $now, '0.8', 'daily');
		$sitemap->add(URL::to(getLang().'/truecut'), $now, '1.0', 'daily');
			$sitemap->add(URL::to(getLang().'/truecut/comfort-cutter '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/truecut/cutting-mats '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/truecut/cutting-table '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/truecut/linear-sharpener '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/truecut/rotary-cutting-accessories '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/truecut/rulers '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/truecut/truesharp '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/truecut/truecut360 '), $now, '0.8', 'daily');
		$sitemap->add(URL::to(getLang().'/accessories'), $now, '1.0', 'daily');
			$sitemap->add(URL::to(getLang().'/accessories/luminess '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/accessories/quilting-machines '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/accessories/plastic-pattern-perfect '), $now, '0.8', 'daily');
			$sitemap->add(URL::to(getLang().'/accessories/quilt-clips '), $now, '0.8', 'daily');
		$sitemap->add(URL::to(getLang().'/resources/blog'), $now, '1.0', 'daily');
		$sitemap->add(URL::to(getLang().'/resources/support'), $now, '1.0', 'daily');
		$sitemap->add(URL::to(getLang().'/resources/support/instructions'), $now, '1.0', 'daily');
		$sitemap->add(URL::to(getLang().'/resources/support/videos'), $now, '1.0', 'daily');
		$sitemap->add(URL::to(getLang().'/resources/videos'), $now, '1.0', 'daily');
//		$sitemap->add(URL::to(getLang().'/resources/community'), $now, '1.0', 'daily');
		$sitemap->add(URL::to(getLang().'/resources/'), $now, '1.0', 'daily');
		$sitemap->add(URL::to(getLang().'/resources/support'), $now, '1.0', 'daily');

		$articles = DB::table('articles')->orderBy('created_at', 'desc')->get();


		foreach($articles as $article)
		{
			$sitemap->add(URL::to(getlang().'/resources/blog/'. $article->slug. '/'), date('Y-m-dTG:i:s P', strtotime($article->created_at)),'0.8', 'monthly');

		}

		$tags = DB::table('tags')->orderBy('created_at', 'desc')->get();

		foreach ($tags as $tag)
		{
			$sitemap->add(URL::to(getlang().'/tag/'. $tag->slug. '/'), date('Y-m-dTG:i:s P', strtotime($tag->created_at)), '0.5', 'monthly');
		}

		$products = DB::table('products')->orderBy('created_at', 'desc')->get();

		foreach($products as $product)
		{
			$sitemap->add(URL::to(getlang().'/product/'. $product->slug. '/'), date('Y-m-dTG:i:s P', strtotime($product->updated_at)),'0.9', 'weekly');

		}
	}

	$sitemap->store('xml', 'sitemap');

	return $sitemap->render('xml');

});


Route::get('sitemap-articles', function()
{
	// create sitemap
	$sitemap_articles = App::make("sitemap");

	// set cache
	$sitemap_articles->setCache('laravel.sitemap-articles', 3600);

	// add items
	$articles = DB::table('articles')->orderBy('created_at', 'desc')->get();

	foreach($articles as $article)
	{
		$sitemap_articles->add(URL::to(getlang().'/resources/blog/'. $article->slug. '/'), date('Y-m-dTG:i:s P', strtotime($article->created_at)),'1.0', 'monthly');

	}
	$sitemap_articles->store('xml', 'sitemap-articles');
	// show sitemap
	return $sitemap_articles->render('xml');
});


Route::get('sitemap-tags', function()
{
$tags = DB::table('tags')->get();

	foreach ($tags as $tag)
	{
		$sitemap_tags->add(URL::to(getlang().'/tag/'. $tag->slug. '/'), null, '0.5', 'weekly');
	}

	// create file sitemap-tags.xml in your public folder (format, filename)
	$sitemap_tags->store('xml','sitemap-tags');
});



Route::get('sitemap-products', function()
{
	// create sitemap
	$sitemap_products = App::make("sitemap");

	// set cache
	$sitemap_products->setCache('laravel.sitemap-products', 3600);

	// add items
	$products = DB::table('products')->orderBy('created_at', 'desc')->get();

	foreach($products as $product)
	{
		$sitemap_products->add(URL::to(getlang().'/product/'. $product->slug. '/'), date('Y-m-dTG:i:s P', strtotime($product->created_at)),'1.0', 'monthly');

	}
	$sitemap_products->store('xml', 'sitemap-products');
	// show sitemap
	return $sitemap_products->render('xml');
});

Route::get('sitemap-store', function()
{
	// create sitemap
	$sitemap_articles = App::make("sitemap");

	// add items
	$articles = DB::table('articles')->orderBy('created_at', 'desc')->get();
	foreach ($articles as $article)
	{
		$sitemap_articles->add(URL::to(getlang().'/'. $article->slug. '/'), date('Y-m-dTG:i:s P', strtotime($article->created_at)),'1.0', 'monthly');
	}

	// create file sitemap-articles.xml in your public folder (format, filename)
	$sitemap_articles->store('xml','sitemap-articles');

	// create sitemap
	$sitemap_tags = App::make("sitemap");

	// add items
	$tags = DB::table('tags')->get();

	foreach ($tags as $tag)
	{
		$sitemap_tags->add(URL::to(getlang().'/tag/'. $tag->slug. '/'), null, '0.5', 'weekly');
	}

	// create file sitemap-tags.xml in your public folder (format, filename)
	$sitemap_tags->store('xml','sitemap-tags');

	// create sitemap index
	$sitemap = App::make ("sitemap");

	// add sitemaps (loc, lastmod (optional))
	$sitemap->addSitemap(URL::to('sitemap-articles'));
	$sitemap->addSitemap(URL::to('sitemap-tags'));

	// create file sitemap.xml in your public folder (format, filename)
	$sitemap->store('sitemapindex','sitemap');
});


Route::get('BigSitemap', function() {
	// create new sitemap object
	$sitemap = App::make("sitemap");

	// get all products from db (or wherever you store them)
	$products = DB::table('products')->orderBy('created_at', 'desc')->get();

	// counters
	$counter = 0;
	$sitemapCounter = 0;

	// add every product to multiple sitemaps with one sitemapindex
	foreach ($products as $p)
	{
		if ($counter == 50000)
		{
			// generate new sitemap file
			$sitemap->store('xml','sitemap-'.$sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('sitemap-'.$sitemapCounter.'.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			$counter = 0;
			// count generated sitemap
			$sitemapCounter++;
		}

		// add product to items array
		$sitemap->add(URL::to(getlang().'/product/'.$p->slug), date('Y-m-dTG:i:s P', strtotime($product->updated_at)),'1.0', 'monthly');
		// count number of elements
		$counter++;
	}

	// you need to check for unused items
	if (!empty($sitemap->model->getItems()))
	{
		// generate sitemap with last items
		$sitemap->store('xml','sitemap-'.$sitemapCounter);
		// add sitemap to sitemaps array
		$sitemap->addSitemap(secure_url('sitemap-'.$sitemapCounter.'.xml'));
		// reset items array
		$sitemap->model->resetItems();
	}

	// generate new sitemapindex that will contain all generated sitemaps above
	$sitemap->store('sitemapindex','sitemap');
});




Route::get('sitemap-pages', function()
{
	$now = Carbon::now();
	// create sitemap
	$sitemap_pages = App::make("sitemap");

	// set cache
	$sitemap_pages->setCache('laravel.sitemap-pages', 3600);


	$sitemap_pages->add(URL::to(getLang().'/'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/shop'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/contact'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/sewing-machines'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/sewing-machines/qnique21 '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/sewing-machines/qnique14 '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/sewing-machines/features '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/sewing-machines/specs '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/sewing-machines/accessories '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/hand-quilting'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/hand-quilting/z44-frame'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/hand-quilting/start-right-ez3'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/hand-quilting/grace-hoop-2'), $now, '0.8', 'daily');
	//$sitemap_pages->add(URL::to(getLang().'/hand-quilting/grace-lap-hoops'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/hand-quilting/graciebee'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/hand-quilting/accessories'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/hand-quilting/compare-frames'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/machine-frames'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/machine-frames/gq-frame'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/machine-frames/compare-machine-frames'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/machine-frames/accessories'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/machine-frames/gracie-kq'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/machine-frames/sr-2-frame'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/automation/qct'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/automation/qct/features'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/automation/qct/compare'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/automation/qct/specs'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/automation/qct/tutorials'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/automation/qct/support'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/automation/qct/purchase'), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/truecut'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/truecut/comfort-cutter '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/truecut/cutting-mats '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/truecut/cutting-table '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/truecut/linear-sharpener '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/truecut/rotary-cutting-accessories '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/truecut/rulers '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/truecut/truesharp '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/truecut/truecut360 '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/accessories'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/accessories/luminess '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/accessories/quilting-machines '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/accessories/plastic-pattern-perfect '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/accessories/quilt-clips '), $now, '0.8', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/resources/blog'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/resources/support'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/resources/support/instructions'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/resources/support/videos'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/resources/videos'), $now, '1.0', 'daily');
	//		$sitemap_pages->add(URL::to(getLang().'/resources/community'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/resources/'), $now, '1.0', 'daily');
	$sitemap_pages->add(URL::to(getLang().'/resources/support'), $now, '1.0', 'daily');



	// add items
	$pages = DB::table('pages')->orderBy('created_at', 'desc')->get();

	foreach($pages as $page)
	{
		$sitemap_pages->add(URL::to(getlang().'/page/'. $page->slug. '/'), date('Y-m-dTG:i:s P', strtotime($page->updated_at)),'1.0', 'monthly');

	}
	$sitemap_pages->store('xml', 'sitemap-pages');
	$sitemap_pages->store('html', 'sitemap-pages');
	// show sitemap
	return $sitemap_pages->render('xml');
});