<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShippingDistrict;
use App\Models\ShippingDivision;
use App\Models\ShippingState;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    //division//
    public function add_division(){
        $division=ShippingDivision::latest()->get();
        return view('admin.shipping_area.division.index',compact('division'));
    }
    public function store_division(Request $request){
         $validated=$request->validate([

           "division_name" => "required",
          

       ]);

        ShippingDivision::insert([
           'division_name'=>ucwords($request->division_name),
         
       ]);


        $notification = array(
            'message' => 'Division is Successfully Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit_division($id){
        $division=ShippingDivision::findOrFail($id);
        return view('admin.shipping_area.division.edit',compact('division'));
    }

    public function update_division(Request $request){
       
        $validated=$request->validate([

           "division_name" => "required",
          

       ]);

        ShippingDivision::findOrFail($request->division_id)->update([
           'division_name'=>ucwords($request->division_name),
         
       ]);


        $notification = array(
            'message' => 'Division is Successfully Updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('division')->with($notification);
    }

    public function delete_division($id){
        ShippingDivision::findOrFail($id)->delete();
        ShippingDistrict::where('shipping_division_id',$id)->delete();
        ShippingState::where('shipping_division_id',$id)->delete();
         $notification = array(
            'message' => 'Division is Successfully Deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    //District//

    public function add_district(){
        $district=ShippingDistrict::with('division')->latest()->get();
        $division=ShippingDivision::all();
        return view('admin.shipping_area.district.index',compact('district','division'));
    }


    public function store_district(Request $request){
         $validated=$request->validate([
           "shipping_division_id"=>"required",
           "district_name" => "required",
          

       ]);

        ShippingDistrict::insert([
           'district_name'=>ucwords($request->district_name),
           'shipping_division_id'=>$request->shipping_division_id,
         
       ]);


        $notification = array(
            'message' => 'District is Successfully Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit_district($id){
        $district=ShippingDistrict::findOrFail($id);
        $division=ShippingDivision::all();
        return view('admin.shipping_area.district.edit',compact('district','division'));
    }

    public function update_district(Request $request){
       
        $validated=$request->validate([
           "shipping_division_id"=>"required",
           "district_name" => "required",
          

       ]);

        ShippingDistrict::findOrFail($request->district_id)->update([
           'district_name'=>ucwords($request->district_name),
           'shipping_division_id'=>$request->shipping_division_id,
         
       ]);


        $notification = array(
            'message' => 'district is Successfully Updated!',
            'alert-type' => 'success'
        );
        return redirect()->route('district')->with($notification);
    }

    public function delete_district($id){
        ShippingDistrict::findOrFail($id)->delete();
        ShippingState::where('shipping_district_id',$id)->delete();
         $notification = array(
            'message' => 'District is Successfully Deleted!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function add_state(){
        $state=ShippingState::latest()->get();
        return view('admin.shipping_area.state.index',compact('state'));
    }


}
