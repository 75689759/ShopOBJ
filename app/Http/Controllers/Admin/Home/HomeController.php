<?php

namespace App\Http\Controllers\Admin\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //后台首页模板
    public function index(){
    	return view('Admin.Home.home');
    }
}
