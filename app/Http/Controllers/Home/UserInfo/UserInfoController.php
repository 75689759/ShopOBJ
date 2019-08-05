<?php

namespace App\Http\Controllers\Home\UserInfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserInfoController extends Controller
{
    // 个人中心页面
    public function index(){
        return view('Home.UserInfo.UserInfo');
    }

    // 个人信息
    public function information(){
        return view('Home.UserInfo.information');
    }

    // 安全设置
    public function safety(){
        return view('Home.UserInfo.safety');
    }

    // 收货地址
    public function address(){
        return view('Home.UserInfo.address');
    }

    // 订单管理
    public function order(){
        return view('Home.UserInfo.order');
    }

    // 退货售后
    public function change(){
        return view('Home.UserInfo.change');
    }

    // 优惠券
    public function coupon(){
        return view('Home.UserInfo.coupon');
    }

    // 红包
    public function bonus(){
        return view('Home.UserInfo.bonus');
    }

    // 交易明细
    public function bill(){
        return view('Home.UserInfo.bill');
    }

    // 收藏
    public function collection(){
        return view('Home.UserInfo.collection');
    }

    // 足迹
    public function foot(){
        return view('Home.UserInfo.foot');
    }

    // 评价
    public function comment(){
        return view('Home.UserInfo.comment');
    }

    // 消息
    public function news(){
        return view('Home.UserInfo.news');
    }

    // 修改密码
    public function password(){
        return view('Home.UserInfo.password');
    }

    // 支付密码
    public function setpay(){
        return view('Home.UserInfo.setpay');
    }

    //手机验证
    public function bindphone(){
        return view('Home.UserInfo.bindphone');
    }

    //邮箱验证
    public function email(){
        return view('Home.UserInfo.email');
    }

    //实名认证
    public function idcard(){
        return view('Home.UserInfo.idcard');
    }

    //安全问题
    public function question(){
        return view('Home.UserInfo.question');
    }
}
