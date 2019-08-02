<?php

namespace App\Http\Controllers\Admin\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //后台店铺列表模板
    public function index(){
    	return view('Admin.Shop.Shop_List');
    }

    //后台店铺审核模板
    public function audit(){
    	return view('Admin.Shop.Shop_Audit');
    }
}
