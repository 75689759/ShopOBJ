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
Route::prefix('Home')->namespace('Home')->group(function () {
    // 登录
    Route::namespace('Login')->prefix('Login')->group(function () {
        Route::get('/', 'LoginController@index')->name('Login');
        Route::post('/', 'LoginController@DoLogin')->name('DoLogin');
        Route::get('logout', 'LoginController@Logout')->name('Logout');
    });

    // 注册
    Route::namespace('Login')->prefix('Register')->group(function () {
        //注册页面渲染
        Route::get('/', 'RegisterController@index')->name('Register');
        //邮箱注册
        Route::post('/toregister', 'RegisterController@ToRegister')->name('ToRegister');
        //完成邮箱注册状态
        Route::get('/changeemail/{id}/{token}', 'RegisterController@ChangeEmail')->name('ChangeEmail');
        //手机号注册
        Route::post('/phonetoregister', 'RegisterController@PhoneToRegister')->name('PhoneToRegister');
        //发送验证码
        Route::get('/sendphone', 'RegisterController@sendPhone')->name('sendphone');
    });

    //商品
    Route::namespace('Goods')->prefix('Goods')->group(function () {
        //商品详情
        Route::get('/', 'GoodsController@index')->name('Introduction');
        //商品搜索
        Route::get('/search', 'GoodsController@Search')->name('Search');
    });


    //结算
    Route::namespace('Pay')->prefix('pay')->group(function () {
        //结算页面
        Route::get('/', 'PayController@index')->name('Pay');
        //付款成功页面
        Route::get('/success', 'PayController@Success')->name('Success');
    });

    //聊天
    Route::namespace('Chat')->prefix('chat')->group(function () {
        //结算页面
        Route::get('/', 'ChatController@index')->name('Chat');
    });
    //购物车
    Route::namespace('cart')->prefix('cart')->group(function () {
        //购物车页面
        Route::get('/', 'CartController@cart')->name('Chat');
    });

























































































    // 个人中心
    Route::namespace('UserInfo')->prefix('UserInfo')->group(function () {
        // 个人资料
        Route::get('/', 'UserInfoController@index')->name('UserInfo');

        // 个人信息
        Route::get('/information', 'UserInfoController@information')->name('information');

        // 安全设置
        Route::get('/safety', 'UserInfoController@safety')->name('safety');

        // 收货地址
        Route::get('/address', 'UserInfoController@address')->name('address');
        Route::post('/addaddress', 'UserInfoController@addaddress')->name('addaddress');

        // 订单管理
        Route::get('/order', 'UserInfoController@order')->name('order');

        // 退货售后
        Route::get('/change', 'UserInfoController@change')->name('change');

        // 优惠券
        Route::get('/coupon', 'UserInfoController@coupon')->name('coupon');

        // 红包
        Route::get('/bonus', 'UserInfoController@bonus')->name('bonus');

        // 交易明细
        Route::get('bill', 'UserInfoController@bill')->name('bill');

        // 收藏
        Route::get('/collection', 'UserInfoController@collection')->name('collection');

        // 足迹
        Route::get('/foot', 'UserInfoController@foot')->name('foot');

        // 评价
        Route::get('/comment', 'UserInfoController@comment')->name('comment');

        // 消息
        Route::get('/news', 'UserInfoController@news')->name('news');

        // 修改密码
        Route::get('/password', 'UserInfoController@password')->name('Password');

        // 支付密码
        Route::get('/setpay', 'UserInfoController@setpay')->name('Setpay');

        //手机验证
        Route::get('/bindphone', 'UserInfoController@bindphone')->name('Bindphone');

        //邮箱验证
        Route::get('/email', 'UserInfoController@email')->name('Email');

        //实名认证
        Route::get('/idcard', 'UserInfoController@idcard')->name('Idcard');

        //安全问题
        Route::get('/question', 'UserInfoController@question')->name('Question');
    });
});
Route::prefix('Admin')->namespace('Admin')->group(function () {
    //首页父模板
    Route::namespace('Index')->prefix('Index')->group(function () {
        Route::get('/', 'IndexController@index')->name('Index');
    });

    //首页
    Route::namespace('Home')->prefix('Home')->group(function () {
        Route::get('/', 'HomeController@index')->name('Home');
    });

    //登录
    Route::namespace('Login')->prefix('Login')->group(function () {
        Route::get('/', 'LoginController@index')->name('AdminLogin');
        Route::post('/', 'LoginController@Login')->name('MakeLogin');
    });

    /**************************************************产品管理**************************************************/

    //产品类表
    Route::namespace('Products_List')->prefix('Products_List')->group(function () {
        Route::get('/', 'ProductsController@index')->name('Products_List');

        Route::post('/addshop', 'ProductsController@addshop')->name('Products_ShopAdd');
    });

    //品牌管理
    Route::namespace('Products_List')->prefix('Products_Manage')->group(function () {
        Route::get('/', 'ProductsController@manage')->name('Products_Manage');

        Route::post('/', 'ProductsController@manageadd')->name('Products_Add');

        Route::get('/state', 'ProductsController@state')->name('Products_state');

        Route::get('/del', 'ProductsController@del')->name('Products_del');

    });

    //分类管理
    Route::namespace('Products_List')->prefix('Products_Category')->group(function () {
        Route::get('/', 'ProductsController@category')->name('Products_Category');

        Route::post('/add', 'ProductsController@add')->name('Products_add');
    });

    //添加分类
    Route::namespace('Products_List')->prefix('Products_Category_Add')->group(function () {
        Route::get('/', 'ProductsController@categoryAdd')->name('Products_Category_Add');
    });

    //添加商品
    Route::namespace('Products_List')->prefix('Products_Picture_Add')->group(function () {
        Route::get('/', 'ProductsController@pictureAdd')->name('Products_Picture_Add');
    });

    //添加品牌
    Route::namespace('Products_List')->prefix('Products_Add_Brand')->group(function () {
        Route::get('/', 'ProductsController@addBrand')->name('Products_Add_Brand');
    });

    /**************************************************图片管理**************************************************/

    //广告管理
    Route::namespace('PhotoList')->prefix('Advertising')->group(function () {
        Route::get('/', 'PhotoController@index')->name('Advertising');
    });

    // 
    Route::namespace('PhotoList')->prefix('Sort_Ads')->group(function () {
        Route::get('/', 'PhotoController@sort')->name('Sort_Ads');
    });

    /**************************************************交易管理**************************************************/

    //交易信息
    Route::namespace('OrderList')->prefix('Order_Transaction')->group(function () {
        Route::get('/', 'OrderController@index')->name('Order_Transaction');
    });

    //交易订单(图)
    Route::namespace('OrderList')->prefix('Order_Chart')->group(function () {
        Route::get('/', 'OrderController@chart')->name('Order_Chart');
    });

    //订单管理
    Route::namespace('OrderList')->prefix('Order_Form')->group(function () {
        Route::get('/', 'OrderController@form')->name('Order_Form');
    });

    //交易金额
    Route::namespace('OrderList')->prefix('Order_Amounts')->group(function () {
        Route::get('/', 'OrderController@amounts')->name('Order_Amounts');
    });

    //订单处理
    Route::namespace('OrderList')->prefix('Order_Handling')->group(function () {
        Route::get('/', 'OrderController@handling')->name('Order_Handling');
    });

    //退款管理
    Route::namespace('OrderList')->prefix('Order_Refund')->group(function () {
        Route::get('/', 'OrderController@refund')->name('Order_Refund');
    });

    /**************************************************支付管理**************************************************/
    //账户管理
    Route::namespace('Payment')->prefix('Payment_Cover')->group(function () {
        Route::get('/', 'PaymentController@index')->name('Payment_Cover');
    });

    //支付方式
    Route::namespace('Payment')->prefix('Payment_Method')->group(function () {
        Route::get('/', 'PaymentController@method')->name('Payment_Method');
    });

    //支付配置
    Route::namespace('Payment')->prefix('Payment_Configure')->group(function () {
        Route::get('/', 'PaymentController@configure')->name('Payment_Configure');
    });

    /**************************************************会员管理**************************************************/

    //会员列表
    Route::namespace('UserList')->prefix('User_List')->group(function () {
        Route::get('/', 'UserController@index')->name('User_List');
    });

    //等级管理
    Route::namespace('UserList')->prefix('User_Grading')->group(function () {
        Route::get('/', 'UserController@grading')->name('User_Grading');
    });

    //会员记录管理
    Route::namespace('UserList')->prefix('User_Integration')->group(function () {
        Route::get('/', 'UserController@integration')->name('User_Integration');
    });

    /**************************************************店铺管理**************************************************/

    //店铺列表
    Route::namespace('Shop')->prefix('Shop_List')->group(function () {
        Route::get('/', 'ShopController@index')->name('Shop_List');

        Route::get('/del/{id}', 'ShopController@del')->name('Shop_Del');
    });

    //店铺审核
    Route::namespace('Shop')->prefix('Shop_Audit')->group(function () {
        Route::get('/', 'ShopController@audit')->name('Shop_Audit');

        Route::get('/byes', 'ShopController@byes')->name('Shop_byes');

        Route::get('/bno', 'ShopController@bno')->name('Shop_bno');

        Route::get('/detailed', 'ShopController@detailed')->name('Shop_Detailed');
    });

    /**************************************************消息管理**************************************************/

    //留言列表
    Route::namespace('Message')->prefix('Message_Guestbook')->group(function () {
        Route::get('/', 'MessageController@index')->name('Message_Guestbook');
    });

    //意见反馈
    Route::namespace('Message')->prefix('Message_Feedback')->group(function () {
        Route::get('/', 'MessageController@feedback')->name('Message_Feedback');
    });

    /**************************************************文章管理**************************************************/

    //文章列表
    Route::namespace('Article')->prefix('Article_List')->group(function () {
        Route::get('/', 'ArticleController@index')->name('Article_List');
    });

    //分类管理
    Route::namespace('Article')->prefix('Article_Sort')->group(function () {
        Route::get('/', 'ArticleController@articleSort')->name('Article_Sort');
    });

    /**************************************************系统管理**************************************************/

    //系统设置
    Route::namespace('System')->prefix('Systems_Index')->group(function () {
        Route::get('/', 'SystemController@index')->name('Systems_Index');
    });

    //系统栏目管理
    Route::namespace('System')->prefix('System_Section')->group(function () {
        Route::get('/', 'SystemController@section')->name('System_Section');
    });

    //系统日志
    Route::namespace('System')->prefix('System_Logs')->group(function () {
        Route::get('/', 'SystemController@logs')->name('System_Logs');
    });

    /**************************************************管理员管理**************************************************/

    //职位分配
    Route::namespace('AdminList')->prefix('Admin_Competence')->group(function () {
        Route::get('/', 'AdminController@index')->name('Admin_Competence');
    });

    //管理员列表
    Route::namespace('AdminList')->prefix('Admin_Administrator')->group(function () {
        Route::get('/', 'AdminController@administrator')->name('Admin_Administrator');
    });

    //个人信息
    Route::namespace('AdminList')->prefix('Admin_Info')->group(function () {
        Route::get('/', 'AdminController@info')->name('Admin_Info');
    });

    //编辑权限管理
    Route::namespace('AdminList')->prefix('Admin_Compet')->group(function () {
        Route::get('/{id}', 'AdminController@compet')->name('Admin_Compet');
        Route::post('/', 'AdminController@Update_Compet')->name('Update_Compet');
    });

    //编辑权限管理
    Route::namespace('AdminList')->prefix('RouteList')->group(function () {
        Route::get('/', 'AdminController@RouteList')->name('RouteList');
        Route::post('/AddNodeType', 'AdminController@AddNodeType')->name('AddNodeType');
        Route::post('/node', 'AdminController@node')->name('Node');
    });

    //添加职位
    Route::namespace('AdminList')->prefix('AddPower')->group(function () {
        Route::get('/', 'AdminController@AddPower')->name('AddPower');
        Route::post('/', 'AdminController@AddPowers')->name('AddPowers');
    });
});
