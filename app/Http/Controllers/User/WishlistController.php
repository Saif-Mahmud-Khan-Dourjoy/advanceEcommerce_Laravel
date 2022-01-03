<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


}
