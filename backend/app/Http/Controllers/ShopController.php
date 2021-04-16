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

   public function myCart(Cart $cart)
   {
        $data = $cart->showCart();
        return view('mycart',$data)->with('message',$message);
 
   }

   public function addMycart(Request $request,Cart $cart)
   {
       $user_id = Auth::id(); 
       
       $stock_id=$request->stock_id;

       $cart_add_info=Cart::firstOrCreate(['stock_id' => $stock_id,'user_id' => $user_id]);
       

       if($cart_add_info->wasRecentlyCreated){
           $message = 'カートに追加しました';
       }
       else{
           $message = 'カートに登録済みです';
       }

       $my_carts = Cart::where('user_id',$user_id)->get();

       return view('mycart',compact('my_carts' , 'message'));

       //カートに追加の処理
       $stock_id=$request->stock_id;
       $message = $cart->addCart($stock_id);

       //追加後の情報を取得
       $my_carts = $cart->showCart();

       return view('mycart',compact('my_carts' , 'message'));


       
   }

   public function deleteCart(Request $request,Cart $cart)
       {
    
           //カートから削除の処理
           $stock_id=$request->stock_id;
           $message = $cart->deleteCart($stock_id);
    
           //追加後の情報を取得
           $my_carts = $cart->showCart();
    
           return view('mycart',$data)->with('message',$message);
    
       }
   
    //
}
