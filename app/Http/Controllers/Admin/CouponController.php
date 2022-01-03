<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(){
        $coupon=Coupon::latest()->get();
        return view('admin.coupon.index',compact('coupon'));
    }
    public function add_coupon(Request $request){
        $validated=$request->validate([

           "coupon_name" => "required",
           "coupon_discount" => "required",

           "coupon_validity" => "required",

       ]);

        Coupon::insert([
           'coupon_name'=>ucwords($request->coupon_name),
           'coupon_discount'=>$request->coupon_discount,
           'coupon_validity'=>$request->coupon_validity,
           'status'=>1,
       ]);


        $notification = array(
            'message' => 'Coupon is Successfully Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit($id){
        $coupon=Coupon::findOrFail($id);
        return view('admin.coupon.edit',compact('coupon'));
    }

    public function update_coupon(Request $request){

      $validated=$request->validate([

       "coupon_name" => "required",
       "coupon_discount" => "required",

       "coupon_validity" => "required",

   ]);

      Coupon::findOrFail($request->coupon_id)->update([
        'coupon_name'=>ucwords($request->coupon_name),
        'coupon_discount'=>$request->coupon_discount,
        'coupon_validity'=>$request->coupon_validity,
    ]);

       $notification = array(
            'message' => 'Coupon is Successfully Updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('coupon')->with($notification);

  }
   public function delete($id){
    Coupon::findOrFail($id)->delete();
     $notification = array(
            'message' => 'Coupon is Successfully Deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

   }
}
