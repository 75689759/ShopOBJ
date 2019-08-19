<?php

namespace App\Http\Controllers\Home\Chat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('Home.Chat.chat');
    }
}
