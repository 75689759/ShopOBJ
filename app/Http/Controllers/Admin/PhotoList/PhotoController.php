<?php

namespace App\Http\Controllers\Admin\PhotoList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    //后台广告管理模板
    public function index(){
    	return view('Admin.PhotoList.Advertising');
    }

    //后台分类管理
    public function sort(){
    	return view('Admin.PhotoList.Sort_Ads');
    }
}
