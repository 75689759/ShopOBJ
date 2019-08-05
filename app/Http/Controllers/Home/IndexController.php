<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //前台首页
    public function index()
    {
        return view('Home.index');
    }

}
