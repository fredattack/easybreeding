<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 15-02-18
 * Time: 09:56
 */

Route::group(['prefix' => 'app',  'middleware' => 'auth'], function()
{
    Route::get('/', "Frontend\App\HomeController@index")->name('frontend.app.dashboard');
    Route::get('/birds', "Frontend\App\BirdsController@index")->name('frontend.app.birds');
    Route::get('/createBird', "Frontend\App\BirdsController@create")->name('frontend.app.birdCreate');
    Route::get('/editBird/{id}', 'Frontend\App\BirdsController@edit')->name('frontend.app.editBird');
    Route::post('/updateBird/{id}', "Frontend\App\BirdsController@update")->name('frontend.app.updateBird');
    Route::post('/storeBird', "Frontend\App\BirdsController@store")->name('frontend.app.storeBird');
    Route::get('/editCustomSpecie/{id}', 'CustomSpecieController@edit')->name('frontend.editCustomSpecie');
    Route::get('/updateSpecie/{id}', 'CustomSpecieController@update')->name('frontend.app.updateSpecie');
    Route::get('/updatecustomid', 'CustomSpecieController@updatecustomid')->name('frontend.app.updatecustomid');

    Route::get('/couples', "Frontend\App\CoupleController@index")->name('frontend.app.couples');
    Route::post('/storeCouple', "Frontend\App\CoupleController@store")->name('frontend.app.storeCouple');
    Route::get('/separateCouple', "Frontend\App\CoupleController@separe")->name('frontend.app.separateCouple');

    Route::get('/eggs', "Frontend\App\EggController@index")->name('frontend.app.indexEggs');
    Route::post('/storeEgg', "Frontend\App\EggController@store")->name('frontend.app.storeEgg');

    Route::get('/hatchings', "Frontend\App\HatchingController@index")->name('frontend.app.indexHatchings');

    Route::get('/nestlings', "Frontend\App\NestlingController@index")->name('frontend.app.nestlings');
    Route::post('/updateNestling/{id}', "Frontend\App\NestlingController@update")->name('frontend.app.updateNestling');

    Route::get('/zoneAndCage', "Frontend\App\CageController@index")->name('frontend.app.zoneAndCage');




    Route::get('/test/{test}', "Frontend\App\NestlingController@createNestling")->name('test');
});

