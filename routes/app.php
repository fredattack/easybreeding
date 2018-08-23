<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 15-02-18
 * Time: 09:56
 */

Route::group(['prefix' => 'app',  'middleware' => 'auth'], function()
{
    /*Dashboard*/
    Route::get('/', "Frontend\App\HomeController@index")->name('frontend.app.dashboard');
    Route::get('/store', "Frontend\App\HomeController@store")->name('frontend.app.store');

    /*Settings*/
    Route::get('/settings', "Frontend\App\HomeController@settingsIndex")->name('frontend.app.settings');

    /*Birds*/
    Route::get('/birds', "Frontend\App\BirdsController@index")->name('frontend.app.birds');
    Route::get('/createBird', "Frontend\App\BirdsController@create")->name('frontend.app.birdCreate');
    Route::get('/editBird/{id}', 'Frontend\App\BirdsController@edit')->name('frontend.app.editBird');
    Route::post('/updateBird/{id}', "Frontend\App\BirdsController@update")->name('frontend.app.updateBird');
    Route::post('/storeBird', "Frontend\App\BirdsController@store")->name('frontend.app.storeBird');

    /*Species-CustomSpecies*/
    Route::get('/editCustomSpecie/{id}', 'CustomSpecieController@edit')->name('frontend.editCustomSpecie');
    Route::get('/updateSpecie/{id}', 'CustomSpecieController@update')->name('frontend.app.updateSpecie');
    Route::get('/updatecustomid', 'CustomSpecieController@updatecustomid')->name('frontend.app.updatecustomid');

    /*Couples*/
    Route::get('/couples', "Frontend\App\CoupleController@index")->name('frontend.app.couples');
    Route::post('/storeCouple', "Frontend\App\CoupleController@store")->name('frontend.app.storeCouple');
    Route::get('/separateCouple', "Frontend\App\CoupleController@separe")->name('frontend.app.separateCouple');

    /*Eggs*/
    Route::get('/eggs', "Frontend\App\EggController@index")->name('frontend.app.indexEggs');
    Route::get('/storeEgg', "Frontend\App\EggController@store")->name('frontend.app.storeEgg');

    /*Hatchings*/
    Route::get('/hatchings', "Frontend\App\HatchingController@index")->name('frontend.app.indexHatchings');

    /*Netslings*/
    Route::get('/nestlings', "Frontend\App\NestlingController@index")->name('frontend.app.nestlings');
    Route::post('/updateNestling/{id}', "Frontend\App\NestlingController@update")->name('frontend.app.updateNestling');

    /*zone et cage*/
    Route::get('/zoneAndCage', "Frontend\App\CageController@index")->name('frontend.app.zoneAndCage');
    Route::get('/storeZone', "Frontend\App\ZoneController@store")->name('frontend.app.storeZone');
    Route::get('/storeCage', "Frontend\App\CageController@store")->name('frontend.app.storeCage');
    Route::get('/editCage/{id}', "Frontend\App\CageController@edit")->name('frontend.app.editCage');

    /*Task - Calendar*/
    Route::get('/task', "Frontend\App\TasksController@store")->name('frontend.app.storeTask');
    Route::get('/getAuth', "Frontend\App\gCalendarController@oauth")->name('frontend.app.getAuth');
    Route::get('/gcalendar', "Frontend\App\gCalendarController@index")->name('frontend.app.gcalendar.index');

//    Route::resource('gcalendar', 'Frontend\App\gCalendarController');
    Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'Frontend\App\gCalendarController@oauth']);


    /*Test Route*/
    Route::get('/test', "Frontend\App\UserController@saveSettings")->name('test');
});

//{"category":{"laying":"#f05050","nestling":"#1976D2","controlFecundity":"#FFB22B"}}