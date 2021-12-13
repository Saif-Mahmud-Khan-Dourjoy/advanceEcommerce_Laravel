<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $slider=Slider::latest()->get();
        return view('admin.slider.index',compact('slider'));
    }

    public function add_slider(Request $request){
        $validated=$request->validate([
          'slider_image'=>'required',
        ]);

        $slider_image=$request->file('slider_image');
        $ext=$slider_image->getClientOriginalExtension();
        $name_gen=hexdec(uniqid()).'.'.$ext;
        $path = 'upload/slider/'.$name_gen;
        Image::make($slider_image)->resize(870, 370)->save($path );

        Slider::insert([
          'slider_title_en'=>$request->slider_title_en,
          'slider_title_bn'=>$request->slider_title_bn,
          'slider_desc_en'=>$request->slider_desc_en,
          'slider_desc_bn'=>$request->slider_desc_bn,
          'slider_image'=>$path,
          'status'=>1,
          'created_at'=>Carbon::now(),


        ]);

         $notification = array(
            'message' => 'Slider is Successfully Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function delete($id){
        $slider=Slider::findOrFail($id);
        unlink($slider->slider_image);
        Slider::findOrFail($id)->delete();

        $notification = array(
    'message' => 'Slider is Successfully Deleted!',
    'alert-type' => 'error'
);
   return redirect()->back()->with($notification);


    }
    public function edit($id){
    $slider=Slider::findOrFail($id);
        return view('admin.slider.edit',['slider'=>$slider]);
    }

        public function update_slider(Request $request){

     if($request->hasFile('slider_image')){
        unlink($request->old_image);
        $image=$request->file('slider_image');
        $ext=$image->getClientOriginalExtension();
        $name_gen=hexdec(uniqid()).'.'.$ext;
        $path = 'upload/slider/'.$name_gen;
        Image::make($image)->resize(870, 370)->save($path );
    }else{
        $path=$request->old_image;
    }



    Slider::findOrFail($request->id)->update([

      'slider_title_en'=>$request->slider_title_en,
      'slider_title_bn'=>$request->slider_title_bn,
      'slider_desc_en'=>$request->slider_desc_en,
      'slider_desc_bn'=>$request->slider_desc_bn,
      'slider_image'=>$path,
      'updated_at'=>Carbon::now(),


  ]);

    $notification = array(
        'message' => 'Slider is Successfully Updated!',
        'alert-type' => 'success'
    );
    return redirect()->route('slider')->with($notification);


}
 public function change_active_slider_status($id)
 {
   Slider::findOrFail($id)->update([
       'status'=>0,
       'updated_at'=>Carbon::now(),
   ]);
   $notification = array(
    'message' => ' Slider is Inactive Now!',
    'alert-type' => 'error'
);
 return redirect()->back()->with($notification); 
 } 

  public function change_inactive_slider_status($id)
 {
   Slider::findOrFail($id)->update([
       'status'=>1,
       'updated_at'=>Carbon::now(),
   ]);
   $notification = array(
    'message' => ' Slider is Active Now!',
    'alert-type' => 'success'
);
 return redirect()->back()->with($notification); 
 } 
}
