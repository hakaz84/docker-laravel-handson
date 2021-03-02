@extends('layouts.app')

@section('content')
<div class="container-fluid">
 <div class="">
     <div class="mx-auto" style="max-width:1200px">
         <h1 class="text-center font-weight-bold" style="color:#555555;
             font-size:1.2em; padding:24px 0px;">カートの中身</h1>
         <div class="card-body">
             
                            
               @foreach($my_carts as $my_cart)
                    {{$my_cart->stock_id}}<br>
                    {{$my_cart->user_id}}<br>
               @endforeach

              
             
         </div>
     </div>
 </div>
</div>
@endsection