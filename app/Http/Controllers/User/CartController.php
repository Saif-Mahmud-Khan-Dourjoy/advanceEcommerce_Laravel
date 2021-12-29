<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Illuminate\Http\Request;
use Cart;
use Auth;

class CartController extends Controller
{
  public function addTocart($id, Request $request){

    if(Auth::check()){

        $product=Product::findOrFail($id);


        $color=$request->color;
        $size=$request->size;
        $qty=$request->qty;
        $proName=$request->proName;

        if($product->discount_price == NULL){

         Cart::add([
            'id' => $id, 
            'name' => $proName, 
            'qty' => $qty, 
            'price' => $product->selling_price, 
            'weight' => 1, 
            'options' => [
                'size' =>$size,
                'color' =>$color,
                'image' =>$product->product_thumbnail,
            ]
        ]);


     }

     else{

        Cart::add([
            'id' => $id, 
            'name' => $proName, 
            'qty' => $qty, 
            'price' => $product->discount_price, 
            'weight' => 1, 
            'options' => [
                'size' =>$size,
                'color' =>$color,
                'image' =>$product->product_thumbnail,
            ]
        ]);
    }


    return response()->json('success');
}

else{
    return response()->json('error');
}



}

public function data_read(){
    $cartContent=Cart::content();
    $cartCount=Cart::count();
    $cartTotal=Cart::total();
    return response()->json([
      'cartContent'=>$cartContent,
      'cartCount'=>$cartCount,
      'cartTotal'=>$cartTotal
    ]);
}
}
