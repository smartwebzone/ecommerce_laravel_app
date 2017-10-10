<?php


// $router->model('products', 'App\Models\Product');
// $router->model('sections', 'App\Models\Section');
// $router->model('tags', 'App\Models\Tag');
// $router->model('users', 'App\Models\User');

    Route::group(['prefix' => LaravelLocalization::getCurrentLocale()], function () {

        //AUTOMATED QCT
        Route::group(['prefix' => '/automation/qct'], function () {
            Route::get('/', ['as' => 'qct', 'uses' => 'LiveSiteController@qct']);
            Route::get('/features', ['as' => 'qct.features', 'uses' => 'LiveSiteController@qctfeatures']);
            Route::get('/compare', ['as' => 'qct.compare', 'uses' => 'LiveSiteController@qctcompare']);
            Route::get('/specs', ['as' => 'qct.specs', 'uses' => 'LiveSiteController@qctspecs']);
            Route::get('/tutorials', ['as' => 'qct.tutorials', 'uses' => 'LiveSiteController@qcttutorials']);
            Route::get('/support', ['as' => 'qct.support', 'uses' => 'LiveSiteController@qctsupport']);
            Route::get('/purchase', ['as' => 'qct.purchase', 'uses' => 'LiveSiteController@qctpurchase']);
        });

        //ADDONS ACCESSORIES
        Route::group(['prefix' => 'accessories'], function () {
            Route::get('/', ['as' => 'accessories', 'uses' => 'LiveSiteController@addons']);
            Route::get('luminess', ['as' => 'luminess', 'uses' => 'LiveSiteController@luminess']);
            Route::get('quilting-machines', ['as' => 'quilting-machines', 'uses' => 'LiveSiteController@qm']);
            Route::get('plastic-pattern-perfect', ['as' => 'plastic-pattern-perfect', 'uses' => 'LiveSiteController@ppp']);
            Route::get('quilt-clips', ['as' => 'quilt-clips', 'uses' => 'LiveSiteController@qclips']);

        });

        //MACHINE FRAMES
        Route::group(['prefix' => '/machine-frames'], function () {
            Route::get('/', ['as' => 'machine-frames', 'uses' => 'LiveSiteController@machine']);
            Route::get('/continuum-frame', ['as' => 'machine-frames.continuum-frame', 'uses' => 'LiveSiteController@continuum']);
            Route::get('/gq-frame', ['as' => 'machine-frames.gq-frame', 'uses' => 'LiveSiteController@gqframe']);
            Route::get('/compare-machine-frames', ['as' => 'machine-frames.compare-machine-frames', 'uses' => 'LiveSiteController@compareMachineFrames']);
            Route::get('/accessories', ['as' => 'machine-frames.accessories', 'uses' => 'LiveSiteController@accessories']);
            Route::get('/gracie-kq', ['as' => 'machine-frames.gracie-kq', 'uses' => 'LiveSiteController@graciekq']);
            Route::get('/sr-2-frame', ['as' => 'machine-frames.sr-2-frame', 'uses' => 'LiveSiteController@sr2frame']);
        });

        //HAND FRAMES AND HOOPS
        Route::group(['prefix' => '/hand-quilting'], function () {
            Route::get('/', ['as' => 'hand-quilting', 'uses' => 'LiveSiteController@handquilting']);
            Route::get('/z44-frame', ['as' => 'z44-frame', 'uses' => 'LiveSiteController@z44frame']);
            Route::get('/start-right-ez3', ['as' => 'start-right-ez3', 'uses' => 'LiveSiteController@startrightez3']);
            Route::get('/grace-hoop-2', ['as' => 'grace-hoop-2', 'uses' => 'LiveSiteController@gracehoop2']);
            Route::get('/grace-lap-hoops', ['as' => 'grace-lap-hoops', 'uses' => 'LiveSiteController@gracelaphoops']);
            Route::get('/graciebee', ['as' => 'graciebee', 'uses' => 'LiveSiteController@graciebee']);
            Route::get('/accessories', ['as' => 'hand-quilting.accessories', 'uses' => 'LiveSiteController@handaccessories']);
            Route::get('/compare-frames', ['as' => 'hand-quilting.compare-frames', 'uses' => 'LiveSiteController@comparehandframes']);
        });

        // TRUECUT
        Route::group(['prefix' => '/truecut'], function () {
            Route::get('/', ['as' => 'truecut', 'uses' => 'LiveSiteController@truecut']);
            Route::get('/comfort-cutter', ['as' => 'comfort-cutter', 'uses' => 'LiveSiteController@comfort']);
            Route::get('/cutting-mats', ['as' => 'cutting-mats', 'uses' => 'LiveSiteController@cuttingMats']);
            Route::get('/cutting-table', ['as' => 'cutting-table', 'uses' => 'LiveSiteController@cuttingTable']);
            Route::get('/linear-sharpener', ['as' => 'linear-sharpener', 'uses' => 'LiveSiteController@linearSharpener']);
            Route::get('/rotary-cutting-accessories', ['as' => 'accessories', 'uses' => 'LiveSiteController@rotaryCuttingAccessories']);
            Route::get('/rulers', ['as' => 'rulers', 'uses' => 'LiveSiteController@rulers']);
            Route::get('/truesharp', ['as' => 'truesharp', 'uses' => 'LiveSiteController@truesharp']);
            Route::get('/truecut360', ['as' => 'truecut360', 'uses' => 'LiveSiteController@truecut360']);
        });
         // SEWING MACHINES / QNIQUE
        Route::group(['prefix' => '/sewing-machines'], function () {
	    Route::get('/', ['as' => 'quilting.machines', 'uses' => 'LiveSiteController@qm']);
            Route::get('/qnique21', ['as' => 'qnique.21', 'uses' => 'LiveSiteController@qnique21']);
            Route::get('/qnique14', ['as' => 'qnique.14', 'uses' => 'LiveSiteController@qnique']);
            Route::get('/qnique14-sitdown', ['as' => 'qnique14-sitdown', 'uses' => 'LiveSiteController@q14sitdown']);
            Route::get('/qnique21-sitdown', ['as' => 'qnique21-sitdown', 'uses' => 'LiveSiteController@q21sitdown']);
            Route::get('/features', ['as' => 'qnique.features', 'uses' => 'LiveSiteController@qfeatures']);
            Route::get('/specs', ['as' => 'qnique.specs', 'uses' => 'LiveSiteController@qspecs']);
            Route::get('/accessories', ['as' => 'qnique.accessories', 'uses' => 'LiveSiteController@qaccessories']);
           // Route::get('/comparison', ['as' => 'qnique.comparison', 'uses' => 'LiveSiteController@comparison']);
        });

	    Route::group(['prefix' => '/resources'], function () {
            Route::get('/', ['as' => 'resources', 'uses' => 'LiveSiteController@resources']);
            Route::get('newsletter', ['as' => 'newsletter-signup', 'uses' => 'LiveSiteController@newsletter']);
		        Route::get('/community', ['as' => 'community', 'uses' => 'LiveSiteController@community']);
		    Route::group(['prefix' => '/support'], function () {
			    Route::get('/', ['as' => 'support', 'uses' => 'LiveSiteController@support']);
			    Route::get('/videos', ['as' => 'support-videos', 'uses' => 'LiveSiteController@support_videos']);
                Route::get('/instructions', ['as' => 'instructions', 'uses' => 'LiveSiteController@instructions']);
		    });
		    Route::group(['prefix' => '/videos'], function () {
			    Route::get('/', ['as' => 'videos', 'uses' => 'LiveSiteController@videos']);
		    });
	    });



    });
