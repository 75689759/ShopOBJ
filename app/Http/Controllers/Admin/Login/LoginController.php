<?php

namespace App\Http\Controllers\Admin\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //后台登录模板渲染
    public function index(){
    	return view('Admin.Login.Login');
    }
}
