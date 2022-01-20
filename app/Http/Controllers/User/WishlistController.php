<?php

namespace App\Http\Controllers\User;

// use = this.namespaceURI\round;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use Session;

class WishlistController extends Controller
{   
    public function index(){
       
        return view('user.wishlist');
    }
    public function addToWishlist($product_id){
         if(Auth::check()){
            $exists=Wishlist::where('product_id',$product_id)->where('user_id',Auth::user()->id)->first();
          if(!$exists){
            Wishlist::insert([
             'user_id'=>Auth::user()->id,
             'product_id'=>$product_id,
             'created_at'=>Carbon::now(),

            ]);
        return response()->json(['msg'=>'success']);
        }else{
            return response()->json(['msg'=>'already has']);
        }  
    }else{
        return response()->json(['msg'=>'error']);
    }
    }

    public function data_read(){
         $wishlist=Wishlist::with('product')->where('user_id',Auth::user()->id)->get();

         return response()->json(['wishlist'=>$wishlist]);
    }

    public function data_remove($id){
        Wishlist::where('user_id',Auth::user()->id)->where('id',$id)->delete();
        return response()->json(['success'=> 'Successfully Product Removed']);
    }

    /////////=======Coupon=======/////////

    public function apply_coupon(Request $request){

        $coupon_name=$request->coupon_name;
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

        return response()->json(['success'=>'Coupon Applied']);
             

    }else{

        return response()->json(['error'=>'Coupon Not Valid']);
    }


    }

    public function calculation_coupon(){
       
       if(Session::has('coupon')){

        return response()->json([
            'subtotal'=> Cart::total(),
            'coupon_name'=> session()->get('coupon')['coupon_name'],
            'coupon_discount'=> session()->get('coupon')['coupon_discount'],
            'discount_amount'=> session()->get('coupon')['discount_amount'],
            'total_amount'=> session()->get('coupon')['total_amount'],
            
        ]);
       }else{
        return response()->json(['total'=> Cart::total(),]);
       }
    }

    public function coupon_remove(){
        Session::forget('coupon');
        return response()->json(['success'=>'Coupon Removed Successfully']);
    }


}
