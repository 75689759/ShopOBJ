<?php

namespace App\Http\Controllers\Admin\Article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //后台文章列表模板
    public function index(){
    	return view('Admin.Article.Article_List');
    }

    //后台分类管理模板
    public function articleSort(){
    	return view('Admin.Article.Article_Sort');
    }
}
