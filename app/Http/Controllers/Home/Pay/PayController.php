<?php

namespace App\Http\Controllers\Home\Pay;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    //结算页面
    public function index()
    {
        return view('Home.Pay.pay');
    }

    //付款成功页面
    public function Success()
    {
        return view('Home.Pay.success');
    }
}
