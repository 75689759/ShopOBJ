<?php

namespace App\Http\Controllers\Admin\OrderList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //后台交易信息模板
    public function index(){
    	return view('Admin.Order.Order_Transaction');
    }

    //后台交易订单(图)
    public function chart(){
    	return view('Admin.Order.Order_Chart');
    }

    //后台订单管理
    public function form(){
    	return view('Admin.Order.Order_Form');
    }

    //后台交易金额
    public function amounts(){
    	return view('Admin.Order.Order_Amounts');
    }

    //订单处理
    public function handling(){
    	return view('Admin.Order.Order_Handling');
    }

    //退款管理
    public function refund(){
    	return view('Admin.Order.Order_Refund');
    }
}
