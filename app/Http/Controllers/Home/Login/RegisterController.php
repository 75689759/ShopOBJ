<?php

namespace App\Http\Controllers\Home\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        //
        return view('Home.Login.Register');
    }
}
