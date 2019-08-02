<?php

namespace App\Http\Controllers\Admin\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    //后台留言列表模板
    public function index(){
    	return view('Admin.MessageList.Message_Guestbook');
    }

    //后台意见反馈模板
    public function feedback(){
    	return view('Admin.MessageList.Message_Feedback');
    }
}
