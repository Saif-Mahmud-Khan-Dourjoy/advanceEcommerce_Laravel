<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
  public function addTocart($id, Request $request){

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
}
