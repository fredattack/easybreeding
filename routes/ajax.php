<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 15-02-18
 * Time: 09:56
 */

Route::group(['prefix' => 'ajax',  'middleware' => 'auth'], function()
{
//    Route::get('/', "Frontend\App\HomeController@index")->name('frontend.app.dashboard');
    Route::get('/generateFamillies', "Frontend\App\BirdsController@generateFamillies");
    Route::get('/generateSpecies', "Frontend\App\BirdsController@generateSpecies");
    Route::get('/generateUsualName', "Frontend\App\BirdsController@generateUsualName");
   // Route::get('/autocomplete-search',"Frontend\App\BirdsController@index");

    Route::get('/autocomplete',"Frontend\App\BirdsController@ajaxData");
//    Route::get('/createBird', "Frontend\App\BirdsController@create")->name('frontend.app.birdCreate');
    Route::get('/getBird', "Frontend\App\BirdsController@getBird")->name('frontend.app.getBird');
    Route::get('/getSpecie', "CustomSpecieController@getSpecie")->name('frontend.app.getSpecie');
    Route::post('/setSpecie', "CustomSpecieController@update")->name('frontend.app.setSpecie');
    Route::post('/setBird', "Frontend\App\BirdsController@update")->name('frontend.app.setBird');


});