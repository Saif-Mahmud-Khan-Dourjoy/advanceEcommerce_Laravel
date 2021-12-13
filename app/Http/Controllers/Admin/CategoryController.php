<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $category=Category::latest()->get();
        return view('admin.category.index',['category'=>$category]);

    }

    public function add_category(Request $request){

        $validated=$request->validate([
            "category_name_en" => "required",
            "category_name_bn" => "required",

            "category_icon" => "required",
        ]);

        $category_name_en=$request->category_name_en;
        $category_name_bn=$request->category_name_bn;
        $category= new Category();
        $category->category_name_en=$category_name_en;
        $category->category_name_bn=$category_name_bn;
        $category->category_slug_en=strtolower(str_replace(' ','_',$category_name_en));
        $category->category_slug_bn=strtolower(str_replace(' ','_',$category_name_bn));
        $category->category_icon=$request->category_icon;
        $category->created_at=Carbon::now();
        $category->save();

        $notification = array(
            'message' => 'Category is Successfully Added!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function edit($id){
        $category_update_data=Category::findOrFail($id);
        return view('admin.category.edit',['category_update_data'=>$category_update_data]);
    }

    public function update_category(Request $request){



       $validated=$request->validate([
        "category_name_en" => "required",
        "category_name_bn" => "required",
    ]);

       $category_name_en=$request->category_name_en;
       $category_name_bn=$request->category_name_bn;
       $category_icon=$request->category_icon;


       Category::findOrFail($request->id)->update([

          'category_name_en'=>$category_name_en,
          'category_name_bn'=>$category_name_bn,
          'category_slug_en'=>strtolower(str_replace(' ','_',$request->category_name_en)),
          'category_slug_bn'=>strtolower(str_replace(' ','_',$request->category_name_bn)),

          'category_icon'=>$category_icon,
          'updated_at'=>Carbon::now(),


      ]);

       $notification = array(
        'message' => 'Category is Successfully Updated!',
        'alert-type' => 'success'
    );
       return redirect()->route('category')->with($notification);


   }
   public function delete($id){

    Category::findOrFail($id)->delete();
    $notification = array(
        'message' => 'Category is Successfully Deleted!',
        'alert-type' => 'error'
    );
    return redirect()->route('category')->with($notification);
}

   //===========Sub Category=============

public function sub_index(){

    $sub_category=SubCategory::latest()->get();
    $category=Category::orderBy('category_name_en','ASC')->get();
    return view('admin.sub_category.index',['sub_category'=>$sub_category,'category'=>$category]);

}

public function add_sub_category(Request $request){

    $validated=$request->validate([
        "sub_category_name_en" => "required",
        "sub_category_name_bn" => "required",

        "category_id" => "required",
    ]);

    $sub_category_name_en=$request->sub_category_name_en;
    $sub_category_name_bn=$request->sub_category_name_bn;
    $category_id=$request->category_id;
    $sub_category= new SubCategory();
    $sub_category->sub_category_name_en=$sub_category_name_en;
    $sub_category->sub_category_name_bn=$sub_category_name_bn;
    $sub_category->sub_category_slug_en=strtolower(str_replace(' ','_',$sub_category_name_en));
    $sub_category->sub_category_slug_bn=strtolower(str_replace(' ','_',$sub_category_name_bn));
    $sub_category->category_id=$category_id;
    $sub_category->created_at=Carbon::now();
    $sub_category->save();

    $notification = array(
        'message' => 'Sub Category is Successfully Added!',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);

}

public function edit_sub_category($id){

  $sub_category=SubCategory::findOrFail($id);
  $category=Category::orderBy('category_name_en','ASC')->get();

  return view('admin.sub_category.edit',['category'=>$category,'sub_category'=>$sub_category]);

}

public function update_sub_category(Request $request){

   $validated=$request->validate([
    "sub_category_name_en" => "required",
    "sub_category_name_bn" => "required",

    "category_id" => "required",
]);

   SubCategory::findOrFail($request->sub_cat_id)->update([

     'category_id'=> $request->category_id,
     'sub_category_name_en'=> $request->sub_category_name_en,
     'sub_category_name_bn'=> $request->sub_category_name_bn,
     'sub_category_slug_en'=>strtolower(str_replace(' ','_',$request->sub_category_name_en)),
     'sub_category_slug_bn'=>strtolower(str_replace(' ','_',$request->sub_category_name_bn)),
     'updated_at'=>Carbon::now(),


 ]);

   $notification = array(
    'message' => 'Sub Category is Successfully Updated!',
    'alert-type' => 'success'
);
   return redirect()->route('sub.category')->with($notification);

}


public function delete_sub_category($id){

    SubCategory::findOrFail($id)->delete();
    $notification = array(
        'message' => 'Sub Category is Successfully Deleted!',
        'alert-type' => 'error'
    );
    return redirect()->route('sub.category')->with($notification);
}

     //===========Sub Sub Category=============

public function sub_sub_index(){

    $sub_sub_category=SubSubCategory::latest()->get();
    $category=Category::orderBy('category_name_en','ASC')->get();
    return view('admin.sub_sub_category.index',['sub_sub_category'=>$sub_sub_category,'category'=>$category]);

}
  



public function add_sub_sub_category(Request $request){
 $validated=$request->validate([
    "sub_sub_category_name_en" => "required",
    "sub_sub_category_name_bn" => "required",

    "category_id" => "required",
    "sub_category_id" => "required",
]);

 $sub_sub_category_name_en=$request->sub_sub_category_name_en;
 $sub_sub_category_name_bn=$request->sub_sub_category_name_bn;
 $category_id=$request->category_id;
 $sub_category_id=$request->sub_category_id;
 $sub_sub_category= new SubSubCategory();
 $sub_sub_category->sub_sub_category_name_en=$sub_sub_category_name_en;
 $sub_sub_category->sub_sub_category_name_bn=$sub_sub_category_name_bn;
 $sub_sub_category->sub_sub_category_slug_en=strtolower(str_replace(' ','_',$sub_sub_category_name_en));
 $sub_sub_category->sub_sub_category_slug_bn=strtolower(str_replace(' ','_',$sub_sub_category_name_bn));
 $sub_sub_category->category_id=$category_id;
 $sub_sub_category->sub_category_id=$sub_category_id;
 $sub_sub_category->created_at=Carbon::now();
 $sub_sub_category->save();

 $notification = array(
    'message' => 'Sub Sub Category is Successfully Added!',
    'alert-type' => 'success'
);
 return redirect()->back()->with($notification);

}

public function edit_sub_sub_category($id){

  $sub_sub_category=SubSubCategory::findOrFail($id);



  return view('admin.sub_sub_category.edit',['sub_sub_category'=>$sub_sub_category]);

}

public function update_sub_sub_category(Request $request){
 $validated=$request->validate([
    "sub_sub_category_name_en" => "required",
    "sub_sub_category_name_bn" => "required",

]);

 SubSubCategory::findOrFail($request->sub_sub_cat_id)->update([


     'sub_sub_category_name_en'=> $request->sub_sub_category_name_en,
     'sub_sub_category_name_bn'=> $request->sub_sub_category_name_bn,
     'sub_sub_category_slug_en'=>strtolower(str_replace(' ','_',$request->sub_sub_category_name_en)),
     'sub_sub_category_slug_bn'=>strtolower(str_replace(' ','_',$request->sub_sub_category_name_bn)),
     'updated_at'=>Carbon::now(),


 ]);

 $notification = array(
    'message' => 'Sub Sub Category is Successfully Updated!',
    'alert-type' => 'success'
);
 return redirect()->route('sub.sub.category')->with($notification);
}

public function delete_sub_sub_category($id){

  SubSubCategory::findOrFail($id)->delete();
  $notification = array(
    'message' => 'Sub Sub Category is Successfully Deleted!',
    'alert-type' => 'error'
);
  return redirect()->route('sub.sub.category')->with($notification);

}


 //=======sub category with ajax==========

public function get_sub_cat($id){
    $sub_category=SubCategory::where('category_id',$id)->orderBy('sub_category_name_en','ASC')->get();
    return json_encode($sub_category);
}

 //=======sub sub category with ajax==========

public function get_sub_sub_cat($id){
    $sub_sub_category=SubSubCategory::where('sub_category_id',$id)->orderBy('sub_sub_category_name_en','ASC')->get();
    return json_encode($sub_sub_category);
}



} 
