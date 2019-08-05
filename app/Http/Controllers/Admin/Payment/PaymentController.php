<?php

namespace App\Http\Controllers\Admin\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    //后台账户管理模板
    public function index(){
    	return view('Admin.Payment.Payment_Cover');
    }

    //后台支付方式模板
    public function method(){
    	return view('Admin.Payment.Payment_Method');
    }

    //后台支付配置模板
    public function configure(){
    	return view('Admin.Payment.Payment_Configure');
    }
}
