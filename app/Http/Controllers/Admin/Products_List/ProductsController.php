<?php

namespace App\Http\Controllers\Admin\Products_List;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
	//后台产品类表模板
    public function index(){
    	return view('Admin.ProductsList.Products_List');
    }

    //后台品牌管理模板
    public function manage(){
    	return view('Admin.ProductsList.Products_Manage');
    }

    //后台分类管理模板
    public function category(){
    	return view('Admin.ProductsList.Products_Category');
    }

    //后台添加分类模板
    public function categoryAdd(){
    	return view('Admin.ProductsList.Products_Category_Add');
    }

    //后台添加商品模板
    public function pictureAdd(){
        return view('Admin.ProductsList.Products_Picture_Add');
    }

    //后台添加品牌模板
    public function addBrand(){
        return view('Admin.ProductsList.Products_Add_Brand');
    }
}
