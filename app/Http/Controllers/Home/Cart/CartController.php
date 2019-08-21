<?php

namespace App\Http\Controllers\Home\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    // 购物车
    public function cart()
    {
        return view('Home.cart.cart');
    }
}
