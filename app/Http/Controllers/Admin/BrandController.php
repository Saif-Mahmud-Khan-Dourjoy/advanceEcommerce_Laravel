<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class BrandController extends Controller
{
    public function index(){

        $brand=Brand::latest()->get();
        return view('admin.brand.index',['brand'=>$brand]);

    }

    public function add_brand(Request $request){

        $validated=$request->validate([
            "brand_name_en" => "required",
            "brand_name_bn" => "required",

            "image" => "required",
        ]);

        $brand_name_en=$request->brand_name_en;
        $brand_name_bn=$request->brand_name_bn;
        $image=$request->file('image');
        $ext=$image->getClientOriginalExtension();
        $name_gen=hexdec(uniqid()).'.'.$ext;
        $path = 'upload/brands/'.$name_gen;
        Image::make($image)->resize(150, 150)->save($path );

        $brand= new Brand();
        $brand->brand_name_en=$brand_name_en;
        $brand->brand_name_bn=$brand_name_bn;
        $brand->brand_slug_en=strtolower(str_replace(' ','_',$brand_name_en));
        $brand->brand_slug_bn=strtolower(str_replace(' ','_',$brand_name_bn));
        $brand->image=$path;
        $brand->save();

        $notification = array(
            'message' => 'Brand is Successfully Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function edit($id){
        $brand_update_data=Brand::findOrFail($id);
        return view('admin.brand.edit',['brand_update_data'=>$brand_update_data]);
    }

    public function update_brand(Request $request){



     $validated=$request->validate([
        "brand_name_en" => "required",
        "brand_name_bn" => "required",
    ]);

     $brand_name_en=$request->brand_name_en;
     $brand_name_bn=$request->brand_name_bn;
     if($request->hasFile('image')){
        unlink($request->old_image);
        $image=$request->file('image');
        $ext=$image->getClientOriginalExtension();
        $name_gen=hexdec(uniqid()).'.'.$ext;
        $path = 'upload/brands/'.$name_gen;
        Image::make($image)->resize(150, 150)->save($path );
    }else{
        $path=$request->old_image;
    }

    Brand::findOrFail($request->id)->update([

      'brand_name_en'=>$brand_name_en,
      'brand_name_bn'=>$brand_name_bn,
      'brand_slug_en'=>strtolower(str_replace(' ','_',$brand_name_en)),
      'brand_slug_bn'=>strtolower(str_replace(' ','_',$brand_name_bn)),

      'image'=>$path,
      'updated_at'=>Carbon::now(),


  ]);

    $notification = array(
        'message' => 'Brand is Successfully Updated!',
        'alert-type' => 'success'
    );
    return redirect()->route('brand')->with($notification);


}

public function delete($id){

   $brand=Brand::findOrFail($id);
   unlink($brand->image);
   Brand::findOrFail($id)->delete();

   $notification = array(
    'message' => 'Brand is Successfully Deleted!',
    'alert-type' => 'error'
);
   return redirect()->route('brand')->with($notification);



}
}
