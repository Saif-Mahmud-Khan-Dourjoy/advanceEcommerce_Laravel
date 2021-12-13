<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function form_product(){
        $category=Category::latest()->get();
        $brand=Brand::latest()->get();
        return view('admin.product.create',['category'=>$category,'brand'=>$brand]);
    }
    public function store_product(Request $request){
     if($request->hot_deals=='on'){
         $hot_deals=1;
     }else{
        $hot_deals=0;
    }
    if($request->featured=='on'){
     $featured=1;
 }else{
    $featured=0;
}
if($request->special_offer=='on'){
 $special_offer=1;
}else{
    $special_offer=0;
}
if($request->special_deals=='on'){
 $special_deals=1;
}else{
    $special_deals=0;
}



$image=$request->file('product_thumbnail');
$ext=$image->getClientOriginalExtension();
$name_gen=hexdec(uniqid()).'.'.$ext;
$path = 'upload/products/thumbnail/'.$name_gen;
Image::make($image)->resize(917, 1000)->save($path );


$product_id=Product::insertGetId([
    'brand_id'=>$request->brand_id,
    'category_id'=>$request->category_id,
    'sub_category_id'=>$request->sub_category_id,
    'sub_sub_category_id'=>$request->sub_sub_category_id,
    'product_name_en'=>$request->product_name_en,
    'product_name_bn'=>$request->product_name_bn,
    'product_slug_en'=>strtolower(str_replace(' ','-',$request->product_name_en)),
    'product_slug_bn'=>strtolower(str_replace(' ','-',$request->product_name_bn)),
    'product_code'=>$request->product_code,
    'product_qty'=>$request->product_qty,
    'product_tags_en'=>$request->product_tags_en,
    'product_tags_bn'=>$request->product_tags_bn,
    'product_size_en'=>$request->product_size_en,
    'product_size_bn'=>$request->product_size_bn,
    'product_color_en'=>$request->product_color_en,
    'product_color_bn'=>$request->product_color_bn,
    'selling_price'=>$request->selling_price,
    'discount_price'=>$request->discount_price,
    'short_descp_en'=>$request->short_descp_en,
    'short_descp_bn'=>$request->short_descp_bn,
    'long_descp_en'=>$request->long_descp_en,
    'long_descp_bn'=>$request->long_descp_bn,
    'hot_deals'=>$hot_deals,
    'featured'=>$featured,
    'special_offer'=>$special_offer,
    'special_deals'=>$special_deals,
    'product_thumbnail'=>$path,
    'status'=>1,
    'created_at'=>Carbon::now(),


]);

$multi_image=$request->file('photo_name');
foreach($multi_image as $img){
    $ext=$img->getClientOriginalExtension();
    $name_gen_multi=hexdec(uniqid()).'.'.$ext;
    $path_multi = 'upload/products/thumbnail/multi_img/'.$name_gen_multi;
    Image::make($img)->resize(917, 1000)->save($path_multi);

    MultiImg::insert([
     'product_id'=>$product_id,
     'photo_name'=>$path_multi,
     'created_at'=>Carbon::now(),
 ]);

}

$notification = array(
    'message' => 'Product is Successfully Added!',
    'alert-type' => 'success'
);
return redirect()->back()->with($notification);

}

public function manage_product(){
    $product=Product::latest()->get();
    return view('admin.product.index',['product'=>$product]);
}
public function edit_product($id){
 $category=Category::latest()->get();
 $brand=Brand::latest()->get();
 $product=Product::findOrFail($id);
        // echo '<pre>';
        // print_r($product);
        // echo '<pre>';
 return view('admin.product.edit',compact('product','category','brand'));
}
public function update_product(Request $request){
    $validated=$request->validate([
        'sub_category_id'=>'required',
        'sub_sub_category_id'=>'required',

    ]);
    $id=$request->product_id;
    $product_thumbnail=$request->product_thumbnail;
    if($request->hot_deals=='on'){
     $hot_deals=1;
 }else{
    $hot_deals=0;
}
if($request->featured=='on'){
 $featured=1;
}else{
    $featured=0;
}
if($request->special_offer=='on'){
 $special_offer=1;
}else{
    $special_offer=0;
}
if($request->special_deals=='on'){
 $special_deals=1;
}else{
    $special_deals=0;
}



        // $image=$request->file('product_thumbnail');
        // $ext=$image->getClientOriginalExtension();
        // $name_gen=hexdec(uniqid()).'.'.$ext;
        // $path = 'upload/products/thumbnail/'.$name_gen;
        // Image::make($image)->resize(917, 1000)->save($path );


Product::findOrFail($id)->update([
    'brand_id'=>$request->brand_id,
    'category_id'=>$request->category_id,
    'sub_category_id'=>$request->sub_category_id,
    'sub_sub_category_id'=>$request->sub_sub_category_id,
    'product_name_en'=>$request->product_name_en,
    'product_name_bn'=>$request->product_name_bn,
    'product_slug_en'=>strtolower(str_replace(' ','-',$request->product_name_en)),
    'product_slug_bn'=>strtolower(str_replace(' ','-',$request->product_name_bn)),
    'product_code'=>$request->product_code,
    'product_qty'=>$request->product_qty,
    'product_tags_en'=>$request->product_tags_en,
    'product_tags_bn'=>$request->product_tags_bn,
    'product_size_en'=>$request->product_size_en,
    'product_size_bn'=>$request->product_size_bn,
    'product_color_en'=>$request->product_color_en,
    'product_color_bn'=>$request->product_color_bn,
    'selling_price'=>$request->selling_price,
    'discount_price'=>$request->discount_price,
    'short_descp_en'=>$request->short_descp_en,
    'short_descp_bn'=>$request->short_descp_bn,
    'long_descp_en'=>$request->long_descp_en,
    'long_descp_bn'=>$request->long_descp_bn,
    'hot_deals'=>$hot_deals,
    'featured'=>$featured,
    'special_offer'=>$special_offer,
    'special_deals'=>$special_deals,
    'product_thumbnail'=>$product_thumbnail,
    'status'=>1,
    'created_at'=>Carbon::now(),


]);

        // $multi_image=$request->file('photo_name');
        // foreach($multi_image as $img){
        // $ext=$img->getClientOriginalExtension();
        // $name_gen_multi=hexdec(uniqid()).'.'.$ext;
        // $path_multi = 'upload/products/thumbnail/multi_img/'.$name_gen_multi;
        // Image::make($img)->resize(917, 1000)->save($path_multi);

        // MultiImg::insert([
        //  'product_id'=>$product_id,
        //  'photo_name'=>$path_multi,
        //  'created_at'=>Carbon::now(),
        // ]);

        // }

$notification = array(
    'message' => 'Product is Successfully Updated!',
    'alert-type' => 'success'
);
return redirect()->route('manage.product')->with($notification);


}

public function change_multi_img(Request $request){
    $multi_img=$request->file('photo_name');

    foreach ($multi_img as $id => $img) {
     $delImg=MultiImg::findOrFail($id);
     unlink($delImg->photo_name);
     $ext=$img->getClientOriginalExtension();
     $name_gen_multi=hexdec(uniqid()).'.'.$ext;
     $path_multi = 'upload/products/thumbnail/multi_img/'.$name_gen_multi;
     Image::make($img)->resize(917, 1000)->save($path_multi);

     MultiImg::where('id',$id)->update([
      'photo_name'=>$path_multi,
      'updated_at'=>Carbon::now(),

  ]);
 }

 $notification = array(
    'message' => 'Multiple Image is Successfully Updated!',
    'alert-type' => 'success'
);
 return redirect()->back()->with($notification);

}
public function change_main_img(Request $request){
    $id=$request->pro_id;
    $img=$request->file('product_thumbnail');
    $delImg=Product::findOrFail($id);
    unlink($delImg->product_thumbnail);
    $ext=$img->getClientOriginalExtension();
    $name_gen=hexdec(uniqid()).'.'.$ext;
    $path = 'upload/products/thumbnail/'.$name_gen;
    Image::make($img)->resize(917, 1000)->save($path);

    Product::findOrFail($id)->update([
     
     'product_thumbnail'=>$path,
     'updated_at'=>Carbon::now(),



    ]);

     $notification = array(
    'message' => 'Thumbnail Image is Successfully Updated!',
    'alert-type' => 'success'
);
 return redirect()->back()->with($notification);

}
  public function delete_multi_img($id){
    $delImg=MultiImg::findOrFail($id);
    unlink($delImg->photo_name);
    MultiImg::findOrFail($id)->delete();
     $notification = array(
    'message' => ' Image is Successfully Deleted!',
    'alert-type' => 'error'
);
 return redirect()->back()->with($notification);
  }

  public function change_active_product_status($id)
 {
   Product::findOrFail($id)->update([
       'status'=>0,
       'updated_at'=>Carbon::now(),
   ]);
   $notification = array(
    'message' => ' Product is Inactive Now!',
    'alert-type' => 'error'
);
 return redirect()->back()->with($notification); 
 } 

  public function change_inactive_product_status($id)
 {
   Product::findOrFail($id)->update([
       'status'=>1,
       'updated_at'=>Carbon::now(),
   ]);
   $notification = array(
    'message' => ' Product is Active Now!',
    'alert-type' => 'success'
);
 return redirect()->back()->with($notification); 
 } 

 public function delete_product($id){

   $product=Product::findOrFail($id);
   unlink($product->product_thumbnail);
   $multi_img=MultiImg::where('product_id',$id)->get();
   foreach($multi_img as $item){
    unlink($item->photo_name);
    MultiImg::where('id',$item->id)->delete();

   }
   Product::findOrFail($id)->delete();

    $notification = array(
    'message' => ' Product is Successfully Deleted!',
    'alert-type' => 'error'
);
 return redirect()->back()->with($notification); 

 }

}
