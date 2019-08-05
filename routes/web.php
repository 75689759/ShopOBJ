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
	//首页父模板
	Route::namespace('Admin\Index')->prefix('Index')->group(function(){
		Route::get('/','IndexController@index')->name('Index');
	});

    //首页
    Route::namespace('Admin\Home')->prefix('Home')->group(function(){
        Route::get('/','HomeController@index')->name('Home');
    });

    /**************************************************产品管理**************************************************/

    //产品类表
    Route::namespace('Admin\Products_List')->prefix('Products_List')->group(function(){
        Route::get('/','ProductsController@index')->name('Products_List');
    });

    //品牌管理
    Route::namespace('Admin\Products_List')->prefix('Products_Manage')->group(function(){
        Route::get('/','ProductsController@manage')->name('Products_Manage');
    });

    //分类管理
    Route::namespace('Admin\Products_List')->prefix('Products_Category')->group(function(){
        Route::get('/','ProductsController@category')->name('Products_Category');
    });

    //添加分类
    Route::namespace('Admin\Products_List')->prefix('Products_Category_Add')->group(function(){
        Route::get('/','ProductsController@categoryAdd')->name('Products_Category_Add');
    });

    //添加商品
    Route::namespace('Admin\Products_List')->prefix('Products_Picture_Add')->group(function(){
        Route::get('/','ProductsController@pictureAdd')->name('Products_Picture_Add');
    });

    //添加品牌
    Route::namespace('Admin\Products_List')->prefix('Products_Add_Brand')->group(function(){
        Route::get('/','ProductsController@addBrand')->name('Products_Add_Brand');
    });

    /**************************************************图片管理**************************************************/

    //广告管理
    Route::namespace('Admin\PhotoList')->prefix('Advertising')->group(function(){
        Route::get('/','PhotoController@index')->name('Advertising');
    });

    // 
    Route::namespace('Admin\PhotoList')->prefix('Sort_Ads')->group(function(){
        Route::get('/','PhotoController@sort')->name('Sort_Ads');
    });

    /**************************************************交易管理**************************************************/

    //交易信息
    Route::namespace('Admin\OrderList')->prefix('Order_Transaction')->group(function(){
        Route::get('/','OrderController@index')->name('Order_Transaction');
    });

    //交易订单(图)
    Route::namespace('Admin\OrderList')->prefix('Order_Chart')->group(function(){
        Route::get('/','OrderController@chart')->name('Order_Chart');
    });

    //订单管理
    Route::namespace('Admin\OrderList')->prefix('Order_Form')->group(function(){
        Route::get('/','OrderController@form')->name('Order_Form');
    });

    //交易金额
    Route::namespace('Admin\OrderList')->prefix('Order_Amounts')->group(function(){
        Route::get('/','OrderController@amounts')->name('Order_Amounts');
    });

    //订单处理
    Route::namespace('Admin\OrderList')->prefix('Order_Handling')->group(function(){
        Route::get('/','OrderController@handling')->name('Order_Handling');
    });

    //退款管理
    Route::namespace('Admin\OrderList')->prefix('Order_Refund')->group(function(){
        Route::get('/','OrderController@refund')->name('Order_Refund');
    });

    /**************************************************支付管理**************************************************/
    //账户管理
    Route::namespace('Admin\Payment')->prefix('Payment_Cover')->group(function(){
        Route::get('/','PaymentController@index')->name('Payment_Cover');
    });

    //支付方式
    Route::namespace('Admin\Payment')->prefix('Payment_Method')->group(function(){
        Route::get('/','PaymentController@method')->name('Payment_Method');
    });

    //支付配置
    Route::namespace('Admin\Payment')->prefix('Payment_Configure')->group(function(){
        Route::get('/','PaymentController@configure')->name('Payment_Configure');
    });

    /**************************************************会员管理**************************************************/

    //会员列表
    Route::namespace('Admin\UserList')->prefix('User_List')->group(function(){
        Route::get('/','UserController@index')->name('User_List');
    });

    //等级管理
    Route::namespace('Admin\UserList')->prefix('User_Grading')->group(function(){
        Route::get('/','UserController@grading')->name('User_Grading');
    });

    //会员记录管理
    Route::namespace('Admin\UserList')->prefix('User_Integration')->group(function(){
        Route::get('/','UserController@integration')->name('User_Integration');
    });

    /**************************************************店铺管理**************************************************/

    //店铺列表
    Route::namespace('Admin\Shop')->prefix('Shop_List')->group(function(){
        Route::get('/','ShopController@index')->name('Shop_List');
    });

    //店铺审核
    Route::namespace('Admin\Shop')->prefix('Shop_Audit')->group(function(){
        Route::get('/','ShopController@audit')->name('Shop_Audit');
    });

    /**************************************************消息管理**************************************************/

    //留言列表
    Route::namespace('Admin\Message')->prefix('Message_Guestbook')->group(function(){
        Route::get('/','MessageController@index')->name('Message_Guestbook');
    });

    //意见反馈
    Route::namespace('Admin\Message')->prefix('Message_Feedback')->group(function(){
        Route::get('/','MessageController@feedback')->name('Message_Feedback');
    });

    /**************************************************文章管理**************************************************/

    //文章列表
    Route::namespace('Admin\Article')->prefix('Article_List')->group(function(){
        Route::get('/','ArticleController@index')->name('Article_List');
    });

    //分类管理
    Route::namespace('Admin\Article')->prefix('Article_Sort')->group(function(){
        Route::get('/','ArticleController@articleSort')->name('Article_Sort');
    });

    /**************************************************系统管理**************************************************/

    //系统设置
    Route::namespace('Admin\System')->prefix('Systems_Index')->group(function(){
        Route::get('/','SystemController@index')->name('Systems_Index');
    });

    //系统栏目管理
    Route::namespace('Admin\System')->prefix('System_Section')->group(function(){
        Route::get('/','SystemController@section')->name('System_Section');
    });

    //系统日志
    Route::namespace('Admin\System')->prefix('System_Logs')->group(function(){
        Route::get('/','SystemController@logs')->name('System_Logs');
    });

    /**************************************************管理员管理**************************************************/

    //权限管理
    Route::namespace('Admin\AdminList')->prefix('Admin_Competence')->group(function(){
        Route::get('/','AdminController@index')->name('Admin_Competence');
    });

    //管理员列表
    Route::namespace('Admin\AdminList')->prefix('Admin_Administrator')->group(function(){
        Route::get('/','AdminController@administrator')->name('Admin_Administrator');
    });

    //个人信息
    Route::namespace('Admin\AdminList')->prefix('Admin_Info')->group(function(){
        Route::get('/','AdminController@info')->name('Admin_Info');
    });
});