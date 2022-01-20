<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Auth;
use Cart;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;

class CartController extends Controller
{
  public function addTocart($id, Request $request){

    if(Session::has('coupon')){
        Session::forget('coupon');
    }

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

public function my_cart_data_read(){
    $cartContent=Cart::content();
    $cartCount=Cart::count();
    $cartTotal=Cart::total();
    return response()->json([
      'cartContent'=>$cartContent,
      'cartCount'=>$cartCount,
      'cartTotal'=>$cartTotal
  ]);
}
public function data_remove($rowId){

    Cart::remove($rowId);
         if(Session::has('coupon')){
        $coupon_name=Session::get('coupon')['coupon_name'];
        $coupon=Coupon::where('coupon_name',$coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
         if($coupon){

            $coupon_discount=$coupon->coupon_discount;
            $discount_amount=round(Cart::total() * $coupon_discount/100);
            $total_amount=round(Cart::total()-Cart::total() * $coupon_discount/100);

        Session::put('coupon',[
                  'coupon_name'=>$coupon_name,
                  'coupon_discount'=>$coupon_discount,
                  'discount_amount'=>$discount_amount,
                  'total_amount'=>$total_amount,

        ]);
    }
    }
    return response()->json('success');
}
public function my_cart(){
    if(Auth::check()){
        return view('user.my_cart');
    }else{
        return redirect()->route('login');
    }
    
}
public function cart_item_increment($rowId){
   
 
  

    $item=Cart::get($rowId);

    Cart::update($rowId, $item->qty+1);

            if(Session::has('coupon')){
        $coupon_name=Session::get('coupon')['coupon_name'];
        $coupon=Coupon::where('coupon_name',$coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
         if($coupon){

            $coupon_discount=$coupon->coupon_discount;
            $discount_amount=round(Cart::total() * $coupon_discount/100);
            $total_amount=round(Cart::total()-Cart::total() * $coupon_discount/100);

        Session::put('coupon',[
                  'coupon_name'=>$coupon_name,
                  'coupon_discount'=>$coupon_discount,
                  'discount_amount'=>$discount_amount,
                  'total_amount'=>$total_amount,

        ]);
    }
    }

    return response()->json('success');


}
public function cart_item_decrement($rowId){
          
    $item=Cart::get($rowId);

    if($item->qty==1){

    }else{
    Cart::update($rowId, $item->qty-1);
     if(Session::has('coupon')){
        $coupon_name=Session::get('coupon')['coupon_name'];
        $coupon=Coupon::where('coupon_name',$coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
         if($coupon){

            $coupon_discount=$coupon->coupon_discount;
            $discount_amount=round(Cart::total() * $coupon_discount/100);
            $total_amount=round(Cart::total()-Cart::total() * $coupon_discount/100);

        Session::put('coupon',[
                  'coupon_name'=>$coupon_name,
                  'coupon_discount'=>$coupon_discount,
                  'discount_amount'=>$discount_amount,
                  'total_amount'=>$total_amount,

        ]);
    }
    }


    return response()->json('success');
    }


}

 public function user_checkout(){
    if(Cart::total()>0){


    }else{
        $notification = array(
        'message' => 'Shopping First!',
        'alert-type' => 'warning'
    );
       return redirect()->to('/')->with($notification);
    }




     }
}
