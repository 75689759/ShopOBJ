<?php

namespace App\Http\Controllers\Admin\AdminList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //后台权限管理模板
    public function index(){
    	return view('Admin.AdminList.Admin_Competence');
    }

    //后台管理员列表模板
    public function administrator(){
    	return view('Admin.AdminList.Admin_Administrator');
    }

    //后台个人信息模板
    public function info(){
    	return view('Admin.AdminList.Admin_Info');
    }

    //广告管理
    public function index(){

    }
}
