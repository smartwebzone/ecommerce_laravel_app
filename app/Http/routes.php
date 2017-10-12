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
  |--------------------------------------------------------------------------
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
        Route::get('orders/{orders}/charge', ['as' => 'admin.orders.charge', 'uses' => 'OrderController@charge']);
        Route::get('orders/{orders}/fraud', ['as' => 'admin.orders.fraud', 'uses' => 'OrderController@fraud']);
        Route::get('orders/{orders}/genuine', ['as' => 'admin.orders.genuine', 'uses' => 'OrderController@genuine']);
        Route::get('orders/{orders}/chargePaypal', ['as' => 'admin.orders.chargePaypal', 'uses' => 'OrderController@chargePaypal']);
        Route::get('orders/create', ['as' => 'admin.orders.create', 'uses' => 'OrderController@create']);
        Route::put('orders/{orders}', ['as' => 'admin.orders.update', 'uses' => 'OrderController@update']);
        Route::patch('orders/update/{orders}', ['as' => 'admin.orders.update', 'uses' => 'OrderController@update']);
        Route::delete('orders/{orders}', ['as' => 'admin.orders.destroy', 'uses' => 'OrderController@destroy']);
        Route::get('orders/{orders}/show', ['as' => 'admin.orders.show', 'uses' => 'OrderController@show']);
        Route::get('orders/{orders}/download', ['as' => 'admin.orders.download', 'uses' => 'OrderController@download']);
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
        
        Route::get('book', ['as' => 'admin.book', 'uses' => 'BookController@index']);
        Route::get('book/create', ['as' => 'admin.book.create', 'uses' => 'BookController@create']);
        Route::delete('book/destroy/{id}', ['as' => 'admin.book.destroy', 'uses' => 'BookController@destroy']);
        Route::get('book/show/{id}', ['as' => 'admin.book.show', 'uses' => 'BookController@show']);
        Route::get('book/edit/{id}', ['as' => 'admin.book.edit', 'uses' => 'BookController@edit']);
        Route::patch('book/update/{book}', ['as' => 'admin.book.update', 'uses' => 'BookController@update']);
        
        Route::get('/book/{id}/delete', 'BookController@delete');
        Route::get('/book/{id}/show', 'BookController@show');
        Route::post('/book/create', 'BookController@store');
        Route::post('/book/{id}/edit', 'BookController@edit');
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
Route::post('signin', 'AuthController@postSignin');
Route::post('signup', ['as' => 'signup', 'uses' => 'AuthController@postSignup']);



