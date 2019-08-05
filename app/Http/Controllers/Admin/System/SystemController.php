<?php

namespace App\Http\Controllers\Admin\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    //后台系统设置模板
    public function index(){
    	return view('Admin.System.Systems_Index');
    }

    //后台系统栏目管理模板
    public function section(){
    	return view('Admin.System.System_Section');
    }

    //后台系统日志模板
    public function logs(){
    	return view('Admin.System.System_Logs');
    }
}
