<?php

namespace App\Http\Controllers\Home\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //商品详情
    public function index()
    {
        return view('Home.Goods.introduction');
    }

    //商品搜索
    public function Search()
    {
        return view('Home.Goods.search');
    }
}
