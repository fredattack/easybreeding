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
    Route::get('/getBirdsList', "Frontend\App\BirdsController@getBirdsList")->name('frontend.app.getBirdsList');
    Route::get('/getSpecie', "CustomSpecieController@getSpecie")->name('frontend.app.getSpecie');
    Route::post('/setSpecie', "CustomSpecieController@update")->name('frontend.app.setSpecie');
    Route::post('/setBird', "Frontend\App\BirdsController@update")->name('frontend.app.setBird');

    Route::get('/generateMales', "Frontend\App\CoupleController@generateMales");
    Route::get('/generateFemales', "Frontend\App\CoupleController@generateFemales");
    Route::get('/setFertility', "Frontend\App\EggController@setFertility")->name('frontend.app.setFertility');
    Route::get('/updateHatching', "Frontend\App\EggController@updateHatching")->name('frontend.app.updateHatching');

    Route::get('/getNestling', "Frontend\App\NestlingController@getNestling")->name('frontend.app.getNestling');
    Route::post('/setNestling', "Frontend\App\NestlingController@update")->name('frontend.app.setNestling');
    Route::get('/moveOutOfNest', "Frontend\App\NestlingController@moveOutOfNest")->name('frontend.app.moveOutOfNest');
    Route::get('/setDead', "Frontend\App\NestlingController@setDead")->name('frontend.app.setDead');


    Route::get('/setBirdCage', "Frontend\App\BirdsController@setBirdCage")->name('frontend.app.setBirdCage');

    /*
     * Dashboard
     * */
    Route::get('/getStats', "Frontend\App\BirdsController@getStats")->name('frontend.app.getStats');
    Route::get('/createCategory', "Frontend\App\CategoryController@createCategory")->name('frontend.app.createCategory');




});