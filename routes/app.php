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
    Route::post('/storeBird', "Frontend\App\BirdsController@store")->name('frontend.app.storeBird');

});