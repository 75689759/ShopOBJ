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
    // 登录
    Route::namespace('Home\Login')->prefix('Login')->group(function(){
        Route::get('/','LoginController@index')->name('Login');
    });
    // 注册
    Route::namespace('Home\Login')->prefix('Register')->group(function(){
        Route::get('/','RegisterController@index')->name('Register');
    });


    // 个人中心
    Route::namespace('Home\UserInfo')->prefix('UserInfo')->group(function(){
        // 个人资料
        Route::get('/','UserInfoController@index')->name('UserInfo');

        // 个人信息
        Route::get('/information','UserInfoController@information')->name('information');

        // 安全设置
        Route::get('/safety','UserInfoController@safety')->name('safety');

        // 收货地址
        Route::get('/address','UserInfoController@address')->name('address');

        // 订单管理
        Route::get('/order','UserInfoController@order')->name('order');

        // 退货售后
        Route::get('/change','UserInfoController@change')->name('change');

        // 优惠券
        Route::get('/coupon','UserInfoController@coupon')->name('coupon');

        // 红包
        Route::get('/bonus','UserInfoController@bonus')->name('bonus');

        // 交易明细
        Route::get('bill','UserInfoController@bill')->name('bill');

        // 收藏
        Route::get('/collection','UserInfoController@collection')->name('collection');

        // 足迹
        Route::get('/foot','UserInfoController@foot')->name('foot');

        // 评价
        Route::get('/comment','UserInfoController@comment')->name('comment');

        // 消息
        Route::get('/news','UserInfoController@news')->name('news');

        // 修改密码
        Route::get('/password','UserInfoController@password')->name('Password');

        // 支付密码
        Route::get('/setpay','UserInfoController@setpay')->name('Setpay');

        //手机验证
        Route::get('/bindphone','UserInfoController@bindphone')->name('Bindphone');

        //邮箱验证
        Route::get('/email','UserInfoController@email')->name('Email');

        //实名认证
        Route::get('/idcard','UserInfoController@idcard')->name('Idcard');

        //安全问题
        Route::get('/question','UserInfoController@question')->name('Question');
    });



});