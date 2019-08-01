<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页页面渲染
    public function index(){
    	return view('Admin.Index.index');
    }

}
