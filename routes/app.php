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



});