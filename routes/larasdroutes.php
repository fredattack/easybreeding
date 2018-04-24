<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('bird', 'BirdController');
Route::resource('couple', 'CoupleController');
Route::resource('hatching', 'HatchingController');
Route::resource('egg', 'EggController');
Route::resource('zone', 'ZoneController');
Route::resource('cage', 'CageController');
Route::resource('user', 'UserController');
Route::resource('specie', 'SpecieController');
Route::resource('order', 'OrderController');
Route::resource('famille', 'FamilleController');
