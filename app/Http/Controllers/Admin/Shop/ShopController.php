<?php

namespace App\Http\Controllers\Admin\Shop;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    //后台店铺列表模板
    public function index(){
        $data = DB::table('shop')->where('audit','1')->orwhere('audit','2')->get();
    	// var_dump($data);
    	// dd($data);/
    	return view('Admin.Shop.Shop_List',['data'=>$data]);
    }

    //后台店铺审核模板
    public function audit(){
        $datas = DB::table('shop')->where('audit','3')->get();
    	return view('Admin.Shop.Shop_Audit',['datas'=>$datas]);
    }
}
