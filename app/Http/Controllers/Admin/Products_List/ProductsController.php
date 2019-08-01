<?php

namespace App\Http\Controllers\Admin\Products_List;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index(){
    	return view('Admin.ProductsList.Products_List');
    }
}
