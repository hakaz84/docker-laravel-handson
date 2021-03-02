<?php

namespace App\Http\Controllers;

use App\Models\Stock; //追加

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class ShopController extends Controller
{
    public function index() 
   {
        $stocks = Stock::Paginate(6); //Eloquantで検索
        return view('shop',compact('stocks')); 
   }

   public function myCart()
   {
       $my_carts = Cart::all();
       return view('mycarts',compact('my_carts'));
       
   }
    //
}
