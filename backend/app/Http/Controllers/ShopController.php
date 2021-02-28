<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() //追加
   {
       return view('shop');
   }
    //
}
