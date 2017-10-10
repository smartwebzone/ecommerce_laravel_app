<?php
return [
	'cache'           => false,
	'per_page'        => 10,
	'youtube_api_key' => 'AIzaSyA8pvkI_Sts0T1oGcMkcuFLwZ3OP-jv3Vg',
	/*
	|--------------------------------------------------------------------------
	| Modules config
	|--------------------------------------------------------------------------
	 */
	'modules'         => [
		'account'         => [],
		'admin'        => [],
		'photo_gallery' => [
			'thumb_size' => ['width' => 150, 'height' => 150],
			'image_dir'  => '/uploads/dropzone/',
			'per_page'   => 10
		],
		'slider'        => [
			'image_size' => ['width' => null, 'height' => 600],
			'image_dir'  => '/uploads/slider/'
		],
		'article'       => [
			'image_size' => ['width' => 730, 'height' => 490],
			'thumb_size' => ['width' => 64, 'height' => 64],
			'loop_size'  => ['width' => 400, 'height' => 300],
			'image_dir'  => '/uploads/article/',
			'thumb_dir'  => '/uploads/article/thumb/',
			'loop_dir'   => '/uploads/article/loop/',
			'per_page'   => 5
		],
		'news'          => [
			'image_size' => ['width' => 240, 'height' => 150],
			'image_dir'  => '/uploads/news/',
			'per_page'   => 10
		],
		'project'       => [
			'image_size' => ['width' => 750, 'height' => 600],
			'thumb_size' => ['width' => 370, 'height' => 250],
			'image_dir'  => '/uploads/project/',
			// 'category'   => ['Bootstrap', 'HTML', 'CSS'],
			'per_page'   => 10
		],
		'category'      => [
			'per_page'   => 20,
			'image_size' => ['width' => 2000, 'height' => 1329],
			'thumb_size' => ['width' => 150, 'height' => 150],
			'image_dir'  => '/uploads/category/',
			'thumb_dir'  => '/uploads/category/thumb/',
		],
		'faq'           => [
			'image_size' => ['width' => 240, 'height' => 240],
			'image_dir'  => '/uploads/faqs/',
			'per_page'   => 30
		],
		'page'          => [
			'image_size' => ['width' => 730, 'height' => 490],
			'thumb_size' => ['width' => 64, 'height' => 64],
			'loop_size'  => ['width' => 400, 'height' => 300],
			'image_dir'  => '/uploads/pages/',
			'thumb_dir'  => '/uploads/pages/thumb/',
			'loop_dir'   => '/uploads/pages/loop/',
		],
		'video'         => [
			'per_page' => 12,
			'image_size' => ['width' => 400, 'height' => 300],
			'thumb_size' => ['width' => 300, 'height' => 200],
			'image_dir'  => '/uploads/videos/',
			'thumb_dir'  => '/uploads/videos/thumb/',
		],
		'menu'          => [],
		'setting'       => [],
		'user'          => [],
		'group'         => [],
		'product'       => [
			'image_size' => ['width' => 730, 'height' => 490],
			'thumb_size' => ['width' => 64, 'height' => 64],
			'loop_size'  => ['width' => 400, 'height' => 300],
			'shop_size'  => ['width' => 440, 'height' => 440],
			'image_dir'  => '/uploads/products/',
			'shop_dir'   => '/uploads/products/shop/',
			'thumb_dir'  => '/uploads/products/thumb/',
			'loop_dir'   => '/uploads/products/loop/'
		],
            'product_album'       => [
			'image_size' => ['width' => 730, 'height' => 490],
			'thumb_size' => ['width' => 100, 'height' => 100],
			'image_dir'  => '/uploads/products/album/',
			'thumb_dir'  => '/uploads/products/album/thumb/',
		],
		'order'         => [],
		'key'         => [],
		'section'         => [],
		'dealer'         => [],
		'location'         => [],
		'alert'         => []

	]
];
