<?php

Route::group(['prefix' => LaravelLocalization::getCurrentLocale(), 'before' => ['localization', 'before']], function () {
    Route::group([
        'prefix' => 'admin',
        'middleware' => ['before', 'sentinel.auth', 'sentinel.permission'],
            ], function () {
        Route::get('dealers', ['as' => 'admin.dealers.index', 'uses' => 'DealerController@index']);
        Route::post('dealers', ['as' => 'admin.dealers.store', 'uses' => 'DealerController@store']);
        Route::get('dealers/create', ['as' => 'admin.dealers.create', 'uses' => 'DealerController@create']);
        Route::get('dealers/import', ['uses' => 'DealerController@import']);
        Route::get('dealers/addlatlon', ['uses' => 'DealerController@addlatlon']);
        Route::put('dealers/{dealers}', ['as' => 'admin.dealers.update', 'uses' => 'DealerController@update']);
        Route::patch('dealers/{dealers}', ['as' => 'admin.dealers.update', 'uses' => 'DealerController@update']);
        Route::delete('dealers/{dealers}', ['as' => 'admin.dealers.destroy', 'uses' => 'DealerController@destroy']);
        Route::get('dealers/{dealers}', ['as' => 'admin.dealers.show', 'uses' => 'DealerController@show']);
        Route::get('dealers/{dealers}/edit', ['as' => 'admin.dealers.edit', 'uses' => 'DealerController@edit']);
       
            Route::get('locations', ['as' => 'admin.locations.index', 'uses' => 'LocationController@index']);
            Route::post('locations', ['as' => 'admin.locations.store', 'uses' => 'LocationController@store']);
            Route::get('locations/create', ['as' => 'admin.locations.create', 'uses' => 'LocationController@create']);
            Route::put('locations/{locations}', ['as' => 'admin.locations.update', 'uses' => 'LocationController@update']);
            Route::patch('locations/{locations}', ['as' => 'admin.locations.update', 'uses' => 'LocationController@update']);
            Route::delete('locations/{locations}', ['as' => 'admin.locations.destroy', 'uses' => 'LocationController@destroy']);
            Route::get('locations/{locations}', ['as' => 'admin.locations.show', 'uses' => 'LocationController@show']);
            Route::get('locations/{locations}/edit', ['as' => 'admin.locations.edit', 'uses' => 'LocationController@edit']);
            Route::post('userlocations/{user}', ['as' => 'admin.userlocations.store', 'uses' => 'UserLocationController@store']);
 Route::group([
            'middleware' => ['dealer.restrict'],
                ], function () {
            Route::get('alerts', ['as' => 'admin.alerts.index', 'uses' => 'AlertController@index']);
            Route::post('alerts', ['as' => 'admin.alerts.store', 'uses' => 'AlertController@store']);
            Route::get('alerts/create', ['as' => 'admin.alerts.create', 'uses' => 'AlertController@create']);
            Route::put('alerts/{alerts}', ['as' => 'admin.alerts.update', 'uses' => 'AlertController@update']);
            Route::patch('alerts/{alerts}', ['as' => 'admin.alerts.update', 'uses' => 'AlertController@update']);
            Route::delete('alerts/{alerts}', ['as' => 'admin.alerts.destroy', 'uses' => 'AlertController@destroy']);
            Route::get('alerts/{alerts}', ['as' => 'admin.alerts.show', 'uses' => 'AlertController@show']);
            Route::get('alerts/{alerts}/edit', ['as' => 'admin.alerts.edit', 'uses' => 'AlertController@edit']);

            Route::get('keys', ['as' => 'admin.keys.index', 'uses' => 'KeyController@index']);
            Route::post('keys', ['as' => 'admin.keys.store', 'uses' => 'KeyController@store']);
            Route::get('keys/create', ['as' => 'admin.keys.create', 'uses' => 'KeyController@create']);
            Route::put('keys/{keys}', ['as' => 'admin.keys.update', 'uses' => 'KeyController@update']);
            Route::patch('keys/{keys}', ['as' => 'admin.keys.update', 'uses' => 'KeyController@update']);
            Route::delete('keys/{keys}', ['as' => 'admin.keys.destroy', 'uses' => 'KeyController@destroy']);
            Route::get('keys/{keys}', ['as' => 'admin.keys.show', 'uses' => 'KeyController@show']);
            Route::get('keys/{keys}/edit', ['as' => 'admin.keys.edit', 'uses' => 'KeyController@edit']);

            // Route::get('faqs', ['as'=> 'admin.faqs.index', 'uses' => 'FaqController@index']);
            // Route::post('faqs', ['as'=> 'admin.faqs.store', 'uses' => 'FaqController@store']);
            // Route::get('faqs/create', ['as'=> 'admin.faqs.create', 'uses' => 'FaqController@create']);
            // Route::put('faqs/{faqs}', ['as'=> 'admin.faqs.update', 'uses' => 'FaqController@update']);
            // Route::patch('faqs/{faqs}', ['as'=> 'admin.faqs.update', 'uses' => 'FaqController@update']);
            // Route::delete('faqs/{faqs}', ['as'=> 'admin.faqs.destroy', 'uses' => 'FaqController@destroy']);
            // Route::get('faqs/{faqs}', ['as'=> 'admin.faqs.show', 'uses' => 'FaqController@show']);
            // Route::get('faqs/{faqs}/edit', ['as'=> 'admin.faqs.edit', 'uses' => 'FaqController@edit']);

            Route::get('videoCategories', ['as' => 'admin.videoCategories.index', 'uses' => 'VideoCategoryController@index']);
            Route::post('videoCategories', ['as' => 'admin.videoCategories.store', 'uses' => 'VideoCategoryController@store']);
            Route::get('videoCategories/create', ['as' => 'admin.videoCategories.create', 'uses' => 'VideoCategoryController@create']);
            Route::put('videoCategories/{videoCategories}', ['as' => 'admin.videoCategories.update', 'uses' => 'VideoCategoryController@update']);
            Route::patch('videoCategories/{videoCategories}', ['as' => 'admin.videoCategories.update', 'uses' => 'VideoCategoryController@update']);
            Route::delete('videoCategories/{videoCategories}', ['as' => 'admin.videoCategories.destroy', 'uses' => 'VideoCategoryController@destroy']);
            Route::get('videoCategories/{videoCategories}', ['as' => 'admin.videoCategories.show', 'uses' => 'VideoCategoryController@show']);
            Route::get('videoCategories/{videoCategories}/edit', ['as' => 'admin.videoCategories.edit', 'uses' => 'VideoCategoryController@edit']);

            // Route::get('events', ['as'=> 'admin.events.index', 'uses' => 'EventController@index']);
            // Route::post('events', ['as'=> 'admin.events.store', 'uses' => 'EventController@store']);
            // Route::get('events/create', ['as'=> 'admin.events.create', 'uses' => 'EventController@create']);
            // Route::put('events/{events}', ['as'=> 'admin.events.update', 'uses' => 'EventController@update']);
            // Route::patch('events/{events}', ['as'=> 'admin.events.update', 'uses' => 'EventController@update']);
            // Route::delete('events/{events}', ['as'=> 'admin.events.destroy', 'uses' => 'EventController@destroy']);
            // Route::get('events/{events}', ['as'=> 'admin.events.show', 'uses' => 'EventController@show']);
            // Route::get('events/{events}/edit', ['as'=> 'admin.events.edit', 'uses' => 'EventController@edit']);
        });
    });
});


Route::get('googlefeed', ['as' => 'googlefeed', 'uses' => 'ProductController@googlefeed']);
