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

Route::prefix('Home')->group(function(){
    //登录
    Route::namespace('Home\Login')->prefix('Login')->group(function(){
        Route::get('/','LoginController@index')->name('Login');
    });
    //注册
    Route::namespace('Home\Login')->prefix('Register')->group(function(){
        Route::get('/','RegisterController@index')->name('Register');
    });
});

Route::prefix('Admin')->group(function(){
	//首页
	Route::namespace('Admin\Index')->prefix('Index')->group(function(){
		Route::get('/','IndexController@index')->name('Index');
	});

    //产品类表
    Route::namespace('Admin\Products_List')->prefix('Products_List')->group(function(){
        Route::get('/','ProductsController@index')->name('Products_List');
    });
});