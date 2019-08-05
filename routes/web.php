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

//前台首页
Route::get('/', 'Home\IndexController@index')->name('index');

//前台
Route::prefix('Home')->group(function(){
    //登录
    Route::namespace('Home\Login')->prefix('Login')->group(function(){
        Route::get('/','LoginController@index')->name('Login');
    });
    //注册
    Route::namespace('Home\Login')->prefix('Register')->group(function(){
        Route::get('/','RegisterController@index')->name('Register');
    });
    //商品
    Route::namespace('Home\Goods')->prefix('Goods')->group(function(){
        //商品详情
        Route::get('/','GoodsController@index')->name('Introduction');
    });

});