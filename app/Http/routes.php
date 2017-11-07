<?php

Route::any('form-submit', function() {
    var_dump(Input::file('file'));
});

// if(Config::get('app.debug'))
// {
//     array_push($middleware, ['middleware' => 'clearcache']);
// }
// Route::group($middleware, function() {

/*
  |--------------------------------------------------------------------------
  | MODEL BINDING INTO ROUTE
  |--------------------------------------------------------------------------
 */

//Route::model('article', 'App\Models\Article');
// Route::pattern('slug', '[a-z0-9- _]+');

/*
  |--------------------------------------------------------------------------
  | Frontend Routes
  |--------------------------------------------------------------------------
 */

$languages = LaravelLocalization::getSupportedLocales();
foreach ($languages as $language => $values) {
    $supportedLocales[] = $language;
}

$locale = Request::segment(1);
if (in_array($locale, $supportedLocales)) {
    LaravelLocalization::setLocale($locale);
    App::setLocale($locale);
}

Route::get('/', function () {
    return Redirect::to(LaravelLocalization::getCurrentLocale(), 302);
});

Route::group(['prefix' => LaravelLocalization::getCurrentLocale(), 'before' => ['localization', 'before']], function () {
    Session::put('my.locale', LaravelLocalization::getCurrentLocale());


    // filemanager
    Route::get('filemanager/show', function () {
        return View::make('backend/plugins/filemanager');
    })->before('sentinel.auth');


    // frontend dashboard  
    Route::get('/', ['as' => 'dashboard', 'uses' => 'HomeController@index']);
    //Route::get('store', ['as' => 'store', 'uses' => 'ProductController@index']);
    Route::get('store', function () {
        return View::make('frontend/page/store');
    });


    Route::get('/store', ['as' => 'store', 'uses' => 'StoreController@index']);
    Route::get('/store/selectSchool', ['as' => 'store.selectSchool', 'uses' => 'StoreController@selectSchool']);
    Route::post('/store/selectSchoolPost', ['as' => 'store.selectSchoolPost', 'uses' => 'StoreController@selectSchoolPost']);
    Route::get('/store/selectProduct', ['as' => 'store.selectProduct', 'uses' => 'StoreController@selectProduct']);
    Route::post('/store/confirm', ['as' => 'store.confirm', 'uses' => 'StoreController@confirm']);
    Route::get('/store/confirm', ['as' => 'store.confirm', 'uses' => 'StoreController@confirm']);
    Route::get('/store/cart', ['as' => 'store.cart', 'uses' => 'StoreController@cart']);
    Route::post('/store/cart', ['as' => 'store.cart', 'uses' => 'StoreController@cart']);
    Route::post('/store/pay', ['as' => 'store.pay', 'uses' => 'StoreController@pay']);

    Route::get('/information/create/ajax-school', function() {
        $state = Input::get('state');
        $subcategories = \App\Models\School::where('state', $state)->get();
        return $subcategories;
    });

    Route::get('/information/create/ajax-standard', function() {
        $school_id = Input::get('school_id');
        $subcategories = \App\Models\Standard::whereHas('school', function ($q) use($school_id) {
                    $q->where('school_id', $school_id);
                })->get();
        return $subcategories;
    });

    // article
    Route::get('/resources/blog', ['as' => 'dashboard.article', 'uses' => 'ArticleController@index']);
    Route::get('/resources/blog/{slug}', ['as' => 'dashboard.article.show', 'uses' => 'ArticleController@show']);
    Route::get('/resources/blog/{id}', [
        'as' => 'dashboard.article.show',
        'uses' => 'ArticleController@bart'
    ]);


    // news
    Route::get('/resources/news', ['as' => 'dashboard.news', 'uses' => 'NewsController@index']);
    Route::get('/resources/news/{slug}', ['as' => 'dashboard.news.show', 'uses' => 'NewsController@show']);
    // video
    Route::get('/resources/video', ['as' => 'dashboard.video', 'uses' => 'VideoController@index']);
    Route::get('/resources/video/{slug}', ['as' => 'dashboard.video.show', 'uses' => 'VideoController@show']);

    // projects
    //Route::get('/resources/project', ['as' => 'dashboard.project', 'uses' => 'ProjectController@index']);
    //Route::get('/resources/project/{slug}', ['as' => 'dashboard.project.show', 'uses' => 'ProjectController@show']);
    // faq
    Route::get('/resources/faqs', ['as' => 'faqs', 'uses' => 'FaqController@show']);

    // tags
    Route::get('/tag/{slug}', ['as' => 'dashboard.tag', 'uses' => 'TagController@index']);

    // company
    Route::get('/company/{slug}', ['as' => 'dashboard.company', 'uses' => 'CompanyController@index']);

    // school
    Route::get('/school/{slug}', ['as' => 'dashboard.school', 'uses' => 'SchoolController@index']);

    // standard
    Route::get('/standard/{slug}', ['as' => 'dashboard.standard', 'uses' => 'StandardController@index']);

    // book
    Route::get('/book/{slug}', ['as' => 'dashboard.book', 'uses' => 'BookController@index']);
    // order
    Route::get('/order/{slug}', ['as' => 'dashboard.order', 'uses' => 'OrderController@index']);
    // product
    Route::get('/product/{slug}', ['as' => 'dashboard.product', 'uses' => 'ProductController@index']);
    // email
    Route::get('/email/{slug}', ['as' => 'dashboard.email', 'uses' => 'EmailController@index']);

    // page
    Route::get('/page', ['as' => 'dashboard.page', 'uses' => 'PageController@index']);
    Route::get('/page/{slug}', ['as' => 'dashboard.page.show', 'uses' => 'PageController@show']);

    // photo gallery
    Route::get('/photo-gallery/{slug}', [
        'as' => 'dashboard.photo_gallery.show',
        'uses' => 'PhotoGalleryController@show',
    ]);

    // contact
    Route::get('/contact', ['as' => 'dashboard.contact', 'uses' => 'FormPostController@getContact']);

    // rss
    Route::get('/rss', ['as' => 'rss', 'uses' => 'RssController@index']);

    // search
    Route::get('/search', ['as' => 'admin.search', 'uses' => 'SearchController@index']);

    // language
    // Route::get('/set-locale/{language}', array('as' => 'language.set', 'uses' => 'LanguageController@setLocale'));
    // maillist
    Route::get('/save-maillist', ['as' => 'frontend.maillist', 'uses' => 'MaillistController@getMaillist']);
    Route::post('/save-maillist', ['as' => 'frontend.maillist.post', 'uses' => 'MaillistController@postMaillist']);
});

/*
  |--------------------------------------------------------------------------
  | Backend Routes
  |----------------store----------------------------------------------------------
 */

Route::group(['prefix' => LaravelLocalization::getCurrentLocale()], function () {
    Route::group([
        'prefix' => 'admin',
        'middleware' => ['before', 'sentinel.auth', 'sentinel.permission'],
            ], function () {
        Route::get('orders', ['as' => 'admin.orders.index', 'uses' => 'OrderController@index']);
        Route::get('orders/index', ['as' => 'admin.orders.index', 'uses' => 'OrderController@index']);
        Route::post('orders/store', ['as' => 'admin.orders.store', 'uses' => 'OrderController@store']);
        Route::get('orders/show', ['as' => 'admin.orders.show', 'uses' => 'OrderController@show']);
        Route::get('orders/invoice', ['as' => 'admin.orders.invoice', 'uses' => 'OrderController@invoice']);
        Route::get('orders/{orders}/charge', ['as' => 'admin.orders.charge', 'uses' => 'OrderController@charge']);
        Route::get('orders/{orders}/fraud', ['as' => 'admin.orders.fraud', 'uses' => 'OrderController@fraud']);
        Route::get('orders/{orders}/genuine', ['as' => 'admin.orders.genuine', 'uses' => 'OrderController@genuine']);
        Route::get('orders/{orders}/chargePaypal', ['as' => 'admin.orders.chargePaypal', 'uses' => 'OrderController@chargePaypal']);
        Route::get('orders/create', ['as' => 'admin.orders.create', 'uses' => 'OrderController@create']);
        Route::put('orders/{orders}', ['as' => 'admin.orders.update', 'uses' => 'OrderController@update']);
        Route::patch('orders/update/{orders}', ['as' => 'admin.orders.update', 'uses' => 'OrderController@update']);
        Route::delete('orders/{orders}', ['as' => 'admin.orders.destroy', 'uses' => 'OrderController@destroy']);
        Route::get('orders/{orders}/show', ['as' => 'admin.orders.show', 'uses' => 'OrderController@show']);

        Route::get('orders/{orders}/edit', ['as' => 'admin.orders.edit', 'uses' => 'OrderController@edit']);
    });
    Route::group([
        'prefix' => '/admin',
        'namespace' => 'Admin',
        'middleware' => ['before', 'sentinel.auth', 'sentinel.permission'],
            ], function () {
        Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'DashboardController@index']);


        Route::get('user', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
        Route::get('user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
        Route::post('user/store', ['as' => 'admin.user.store', 'uses' => 'UserController@store']);
        Route::get('user/show', ['as' => 'admin.user.show', 'uses' => 'UserController@show']);

        Route::get('user/create', ['as' => 'admin.user.create', 'uses' => 'UserController@create']);

        Route::put('user/{user}', ['as' => 'admin.user.update', 'uses' => 'UserController@update']);
        Route::patch('user/update/{user}', ['as' => 'admin.user.update', 'uses' => 'UserController@update']);
        Route::delete('user/{user}', ['as' => 'admin.user.destroy', 'uses' => 'UserController@destroy']);
        Route::get('user/{user}/show', ['as' => 'admin.user.show', 'uses' => 'UserController@show']);
        Route::get('user/{user}/edit', ['as' => 'admin.user.edit', 'uses' => 'UserController@edit']);

        Route::get('company', ['as' => 'admin.company', 'uses' => 'CompanyController@index']);
        Route::get('company/create', ['as' => 'admin.company.create', 'uses' => 'CompanyController@create']);
        Route::delete('company/destroy/{id}', ['as' => 'admin.company.destroy', 'uses' => 'CompanyController@destroy']);
        Route::get('company/show/{id}', ['as' => 'admin.company.show', 'uses' => 'CompanyController@show']);
        Route::get('company/edit/{id}', ['as' => 'admin.company.edit', 'uses' => 'CompanyController@edit']);
        Route::patch('company/update/{company}', ['as' => 'admin.company.update', 'uses' => 'CompanyController@update']);

        Route::get('/company/{id}/delete', 'CompanyController@delete');
        Route::get('/company/{id}/show', 'CompanyController@show');
        Route::post('/company/create', 'CompanyController@store');
        Route::post('/company/{id}/edit', 'CompanyController@edit');

        Route::get('school', ['as' => 'admin.school', 'uses' => 'SchoolController@index']);
        Route::get('school/create', ['as' => 'admin.school.create', 'uses' => 'SchoolController@create']);
        Route::delete('school/destroy/{id}', ['as' => 'admin.school.destroy', 'uses' => 'SchoolController@destroy']);
        Route::get('school/show/{id}', ['as' => 'admin.school.show', 'uses' => 'SchoolController@show']);
        Route::get('school/edit/{id}', ['as' => 'admin.school.edit', 'uses' => 'SchoolController@edit']);
        Route::patch('school/update/{school}', ['as' => 'admin.school.update', 'uses' => 'SchoolController@update']);

        Route::get('order/invoice/{orders}', ['as' => 'admin.order.invoice', 'uses' => 'OrderController@invoice']);


        Route::get('/school/{id}/delete', 'SchoolController@delete');
        Route::get('/school/{id}/show', 'SchoolController@show');
        Route::post('/school/create', 'SchoolController@store');
        Route::post('/school/{id}/edit', 'SchoolController@edit');

        Route::get('standard', ['as' => 'admin.standard', 'uses' => 'StandardController@index']);
        Route::get('standard/create', ['as' => 'admin.standard.create', 'uses' => 'StandardController@create']);
        Route::delete('standard/destroy/{id}', ['as' => 'admin.standard.destroy', 'uses' => 'StandardController@destroy']);
        Route::get('standard/show/{id}', ['as' => 'admin.standard.show', 'uses' => 'StandardController@show']);
        Route::get('standard/edit/{id}', ['as' => 'admin.standard.edit', 'uses' => 'StandardController@edit']);
        Route::patch('standard/update/{standard}', ['as' => 'admin.standard.update', 'uses' => 'StandardController@update']);

        Route::get('/standard/{id}/delete', 'StandardController@delete');
        Route::get('/standard/{id}/show', 'StandardController@show');
        Route::post('/standard/create', 'StandardController@store');
        Route::post('/standard/{id}/edit', 'StandardController@edit');
        
        Route::get('unavailable/standards', ['as' => 'admin.unavailable.standards', 'uses' => 'UnavailableController@standards']);
        Route::get('unavailable/schools', ['as' => 'admin.unavailable.schools', 'uses' => 'UnavailableController@schools']);
         Route::delete('unavailable/schooldestroy/{id}', ['as' => 'admin.unavailable.schooldestroy', 'uses' => 'UnavailableController@schooldestroy']);
          Route::delete('unavailable/standarddestroy/{id}', ['as' => 'admin.unavailable.standarddestroy', 'uses' => 'UnavailableController@standarddestroy']);

        Route::get('book', ['as' => 'admin.book', 'uses' => 'BookController@index']);
        Route::get('book/create', ['as' => 'admin.book.create', 'uses' => 'BookController@create']);
        Route::delete('book/destroy/{id}', ['as' => 'admin.book.destroy', 'uses' => 'BookController@destroy']);
        Route::get('book/show/{id}', ['as' => 'admin.book.show', 'uses' => 'BookController@show']);
        Route::get('book/edit/{id}', ['as' => 'admin.book.edit', 'uses' => 'BookController@edit']);
        Route::get('book/upload', ['as' => 'admin.book.upload', 'uses' => 'BookController@upload']);
        Route::patch('book/update/{book}', ['as' => 'admin.book.update', 'uses' => 'BookController@update']);
        Route::get('book/copy/{id}', ['as' => 'admin.book.copy', 'uses' => 'BookController@copy']);

        Route::get('/book/{id}/delete', 'BookController@delete');
        Route::get('/book/{id}/show', 'BookController@show');
        Route::post('/book/create', 'BookController@store');
        Route::post('/book/{id}/edit', 'BookController@edit');
        Route::post('/book/import', ['as' => 'admin.book.import', 'uses' => 'BookController@import']);

        Route::get('order', ['as' => 'admin.order', 'uses' => 'OrderController@index']);
        Route::get('order/create', ['as' => 'admin.order.create', 'uses' => 'OrderController@create']);
        Route::delete('order/destroy/{id}', ['as' => 'admin.order.destroy', 'uses' => 'OrderController@destroy']);
        Route::get('order/show/{id}', ['as' => 'admin.order.show', 'uses' => 'OrderController@show']);
        Route::get('order/edit/{id}', ['as' => 'admin.order.edit', 'uses' => 'OrderController@edit']);
        Route::patch('order/update/{order}', ['as' => 'admin.order.update', 'uses' => 'OrderController@update']);

        Route::get('/order/{id}/delete', 'OrderController@delete');
        Route::get('/order/{id}/show', 'OrderController@show');
        Route::post('/order/create', 'OrderController@store');
        Route::post('/order/{id}/edit', 'OrderController@edit');

        Route::get('product', ['as' => 'admin.product', 'uses' => 'ProductController@index']);
        Route::get('product/create', ['as' => 'admin.product.create', 'uses' => 'ProductController@create']);
        Route::delete('product/destroy/{id}', ['as' => 'admin.product.destroy', 'uses' => 'ProductController@destroy']);
        Route::get('product/show/{id}', ['as' => 'admin.product.show', 'uses' => 'ProductController@show']);
        Route::get('product/edit/{id}', ['as' => 'admin.product.edit', 'uses' => 'ProductController@edit']);
        Route::patch('product/update/{product}', ['as' => 'admin.product.update', 'uses' => 'ProductController@update']);
        Route::get('product/copy/{id}', ['as' => 'admin.product.copy', 'uses' => 'ProductController@copy']);

        Route::get('product/book/{id}', ['as' => 'admin.product.book', 'uses' => 'ProductController@book']);
        Route::patch('product/book_update/{product}', ['as' => 'admin.product.book.update', 'uses' => 'ProductController@book_update']);

        Route::get('/product/{id}/delete', 'ProductController@delete');
        Route::get('/product/{id}/show', 'ProductController@show');
        Route::post('/product/create', 'ProductController@store');
        Route::post('/product/{id}/edit', 'ProductController@edit');

        Route::get('email', ['as' => 'admin.email', 'uses' => 'EmailController@index']);
        Route::get('email/create', ['as' => 'admin.email.create', 'uses' => 'EmailController@create']);
        Route::delete('email/destroy/{id}', ['as' => 'admin.email.destroy', 'uses' => 'EmailController@destroy']);
        Route::get('email/show/{id}', ['as' => 'admin.email.show', 'uses' => 'EmailController@show']);
        Route::get('email/edit/{id}', ['as' => 'admin.email.edit', 'uses' => 'EmailController@edit']);
        Route::patch('email/update/{email}', ['as' => 'admin.email.update', 'uses' => 'EmailController@update']);

        Route::get('/email/{id}/delete', 'EmailController@delete');
        Route::get('/email/{id}/show', 'EmailController@show');
        Route::post('/email/create', 'EmailController@store');
        Route::post('/email/{id}/edit', 'EmailController@edit');
        
        Route::get('unavailables', ['as' => 'admin.unavailables', 'uses' => 'UnavailablesController@index']);
        Route::get('unavailables/create', ['as' => 'admin.unavailables.create', 'uses' => 'UnavailablesController@create']);
        Route::delete('unavailables/destroy/{id}', ['as' => 'admin.unavailables.destroy', 'uses' => 'UnavailablesController@destroy']);
        Route::get('unavailables/show/{id}', ['as' => 'admin.unavailables.show', 'uses' => 'UnavailablesController@show']);
        Route::get('unavailables/edit/{id}', ['as' => 'admin.unavailables.edit', 'uses' => 'UnavailablesController@edit']);
        Route::patch('unavailables/update/{unavailables}', ['as' => 'admin.unavailables.update', 'uses' => 'UnavailablesController@update']);

        Route::get('/unavailables/{id}/delete', 'UnavailablesController@delete');
        Route::get('/unavailables/{id}/show', 'UnavailablesController@show');
        Route::post('/unavailables/create', 'UnavailablesController@store');
        Route::post('/unavailables/{id}/edit', 'UnavailablesController@edit');

        Route::get('/information/create/ajax-standard', function() {
            $school_id = Input::get('school_id');
            $subcategories = \App\Models\Standard::whereHas('school', function ($q) use($school_id) {
                        $q->where('school_id', $school_id);
                    })->get();
            return $subcategories;
        });
    });
});

Route::post('/contact', ['as' => 'dashboard.contact.post', 'uses' => 'FormPostController@postContact'], ['before' => 'csrf']);

// filemanager
Route::get('filemanager/show', function () {
    return View::make('backend/plugins/filemanager');
})->before('sentinel.auth');

// login
// Route::get('/admin/login',  ['as' => 'admin.login', function () {return View::make('backend/auth/login'); } ]);

Route::group(['namespace' => 'Admin'], function () {
    // admin auth
    Route::get('admin/logout', ['as' => 'admin.logout', 'uses' => 'AuthController@getLogout']);
    Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'AuthController@getLogin']);
    Route::post('admin/login', ['as' => 'admin.login.post', 'uses' => 'AuthController@postLogin']);
    Route::post('admin/login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
    // admin password reminder
    Route::get('admin/forgot-password', ['as' => 'admin.forgot.password', 'uses' => 'AuthController@getForgotPassword']);
    Route::post('admin/forgot-password', ['as' => 'admin.forgot.password.post', 'uses' => 'AuthController@postForgotPassword']);
    Route::get('admin/{id}/reset/{code}', ['as' => 'admin.reset.password', 'uses' => 'AuthController@getResetPassword'])->where('id', '[0-9]+');
    Route::post('admin/reset-password', ['as' => 'admin.reset.password.post', 'uses' => 'AuthController@postResetPassword']);
});

//Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
//    Route::group(['prefix' => 'v1'], function () {
//        require 'api_routes.php';
//    });
//});
// });

Route::get('signin', ['as' => 'signin', 'uses' => 'AuthController@getSignin']);
Route::get('validate', function () {
    return View::make('frontend/auth/validate');
});
Route::get('create-password', function () {
    if (!Sentinel::check()) {
        return Redirect::to('signin');
    }
    return View::make('frontend/auth/createPass');
});
Route::get('profile', ['as' => 'profile', 'uses' => 'AuthController@getProfile']);
Route::get('confirmEmail', ['as' => 'confirmEmail', 'uses' => 'AuthController@getConfirmEmail']);
Route::post('signin', 'AuthController@postSignin');
Route::get('signout', 'AuthController@getSignout');
Route::post('signup', ['as' => 'signup', 'uses' => 'AuthController@postSignup']);
Route::post('registerEmail', ['as' => 'registerEmail', 'uses' => 'AuthController@postRegisterEmail']);
Route::get('createPass', ['as' => 'createPass', 'uses' => 'AuthController@getConfirmEmail']);
Route::post('createPass', ['as' => 'createPass', 'uses' => 'AuthController@postcreatePass']);
Route::get('forgot-password', ['as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword']);
Route::post('forgot-password', ['as' => 'forgot-password', 'uses' => 'AuthController@postForgotPassword']);
Route::get('forgot-password-confirm/{id}/{code}', ['as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm']);
Route::post('forgot-password-confirm/{id}/{code}', ['as' => 'forgot-password-confirm-post', 'uses' => 'AuthController@postForgotPasswordConfirm']);
Route::get('unavailable_school', ['as' => 'unavailable_school', 'uses' => 'StoreController@unavailable_school']);
Route::post('unavailable_school', ['as' => 'unavailable_school', 'uses' => 'StoreController@unavailable_school']);
Route::get('unavailable_standard', ['as' => 'unavailable_standard', 'uses' => 'StoreController@unavailable_standard']);
Route::post('unavailable_standard', ['as' => 'unavailable_standard', 'uses' => 'StoreController@unavailable_standard']);
Route::get('my_profile', ['as' => 'my_profile', 'uses' => 'AuthController@my_profile']);
Route::get('my_orders', ['as' => 'my_orders', 'uses' => 'AuthController@my_orders']);
Route::get('order/invoice/{orders}', ['as' => 'invoice', 'uses' => 'AuthController@invoice']);