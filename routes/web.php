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

Route::group(['prefix' => 'Home'], function () {

    Route::group(['prefix' => 'Login'], function () {
        Route::get('/','Home\Login\LoginController@index')->name('Login');
        // Route::get('/','Home/RegisterController@index')->name('Register');
    });































































































































    Route::



























































});