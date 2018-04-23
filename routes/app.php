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
});