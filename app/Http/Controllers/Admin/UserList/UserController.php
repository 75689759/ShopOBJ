<?php

namespace App\Http\Controllers\Admin\UserList;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\users;


class UserController extends Controller
{
    //后台会员管理模板
    public function index()
    {
        $res = users::with('users_info')->get()->toArray();
        dump($res);
        return view('Admin.UserList.User_List')->with(['res' => $res]);
    }

    //后台等级管理模板
    public function grading()
    {
        return view('Admin.UserList.User_Grading');
    }

    //后台会员记录管理模板
    public function integration()
    {
        return view('Admin.UserList.User_Integration');
    }
}
