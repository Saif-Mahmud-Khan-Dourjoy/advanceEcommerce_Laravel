<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $featured=Product::where('featured',1)->where('status',1)->get();
        $hot_deals=Product::where('hot_deals',1)->where('status',1)->get();
        $special_offer=Product::where('special_offer',1)->where('status',1)->where('discount_price','!=',NULL)->get();
        $special_deals=Product::where('special_deals',1)->where('status',1)->where('discount_price','!=',NULL)->get();
        $product=Product::where('status',1)->get();
        $final_tag_en=[];
        $final_tag_bn=[];
        foreach($product as $pro){
            $tags_en=$pro->product_tags_en;
            $tags_bn=$pro->product_tags_bn;
            $tags_en_arr=explode(",",$tags_en);
            $tags_bn_arr=explode(",",$tags_bn);
            array_push($final_tag_en,...$tags_en_arr);
            array_push($final_tag_bn,...$tags_bn_arr);
            
            
        }
      
        $final_tag_en_arr=array_unique($final_tag_en);
      
        $final_tag_bn_arr=array_unique($final_tag_bn);    
        
        return view('frontend.index',compact('featured','hot_deals','special_offer','special_deals','final_tag_en_arr','final_tag_bn_arr'));
    }
    public function single_product($id,$slug){
        $product=Product::findOrFail($id);
        $color_en=$product->product_color_en;
        $product_color_en=explode(',',$color_en);

        $color_bn=$product->product_color_bn;
        $product_color_bn=explode(',',$color_bn);

        $size_en=$product->product_size_en;
        $product_size_en=explode(',',$size_en);

        $size_bn=$product->product_size_bn;
        $product_size_bn=explode(',',$size_bn);

        $hot_deals=Product::where('hot_deals',1)->where('status',1)->get();

        $category=$product->category_id;

        $related_product=Product::where('category_id',$category)->where('id','!=',$id)->where('status',1)->get();

        return view('frontend.product_detail',compact('product','hot_deals','product_color_en','product_color_bn','product_size_en','product_size_bn','related_product'));
    }

    public function tag_product($tag){
       // $product=Product::where('status',1)->where('product_tags_en','like', '%' . $tag . '%')->orWhere('product_tags_bn','like', '%' . $tag . '%')->paginate(1);
       $products=Product::where('status',1)->where('product_tags_en','like', '%' . $tag . '%')->orWhere('product_tags_bn','like', '%' . $tag . '%')->paginate(1);

       $pro=Product::where('status',1)->get();
        $final_tag_en=[];
        $final_tag_bn=[];
        foreach($pro as $pro){
            $tags_en=$pro->product_tags_en;
            $tags_bn=$pro->product_tags_bn;
            $tags_en_arr=explode(",",$tags_en);
            $tags_bn_arr=explode(",",$tags_bn);
            array_push($final_tag_en,...$tags_en_arr);
            array_push($final_tag_bn,...$tags_bn_arr);
            
            
        }
      
        $final_tag_en_arr=array_unique($final_tag_en);
      
        $final_tag_bn_arr=array_unique($final_tag_bn);
      
       return view('frontend.tag_wise_product',compact('products','tag','final_tag_en_arr','final_tag_bn_arr'));
       }

       // public function category_product($id){

       //  $products=Product::where('status',1)->where('category_id',$id)->paginate(1);

       // $pro=Product::where('status',1)->get();
       //  $final_tag_en=[];
       //  $final_tag_bn=[];
       //  foreach($pro as $pro){
       //      $tags_en=$pro->product_tags_en;
       //      $tags_bn=$pro->product_tags_bn;
       //      $tags_en_arr=explode(",",$tags_en);
       //      $tags_bn_arr=explode(",",$tags_bn);
       //      array_push($final_tag_en,...$tags_en_arr);
       //      array_push($final_tag_bn,...$tags_bn_arr);
            
            
       //  }
      
       //  $final_tag_en_arr=array_unique($final_tag_en);
      
       //  $final_tag_bn_arr=array_unique($final_tag_bn);
      
       // return view('frontend.category_product',compact('products','final_tag_en_arr','final_tag_bn_arr'));

       // }

       public function sub_category_product($id){

        $products=Product::where('status',1)->where('sub_category_id',$id)->paginate(1);

       $pro=Product::where('status',1)->get();
        $final_tag_en=[];
        $final_tag_bn=[];
        foreach($pro as $pro){
            $tags_en=$pro->product_tags_en;
            $tags_bn=$pro->product_tags_bn;
            $tags_en_arr=explode(",",$tags_en);
            $tags_bn_arr=explode(",",$tags_bn);
            array_push($final_tag_en,...$tags_en_arr);
            array_push($final_tag_bn,...$tags_bn_arr);
            
            
        }
      
        $final_tag_en_arr=array_unique($final_tag_en);
      
        $final_tag_bn_arr=array_unique($final_tag_bn);
      
       return view('frontend.sub_category_product',compact('products','final_tag_en_arr','final_tag_bn_arr'));

       }

       public function sub_sub_category_product($id){

        $products=Product::where('status',1)->where('sub_sub_category_id',$id)->paginate(1);

       $pro=Product::where('status',1)->get();
        $final_tag_en=[];
        $final_tag_bn=[];
        foreach($pro as $pro){
            $tags_en=$pro->product_tags_en;
            $tags_bn=$pro->product_tags_bn;
            $tags_en_arr=explode(",",$tags_en);
            $tags_bn_arr=explode(",",$tags_bn);
            array_push($final_tag_en,...$tags_en_arr);
            array_push($final_tag_bn,...$tags_bn_arr);
            
            
        }
      
        $final_tag_en_arr=array_unique($final_tag_en);
      
        $final_tag_bn_arr=array_unique($final_tag_bn);
      
       return view('frontend.sub_sub_category_product',compact('products','final_tag_en_arr','final_tag_bn_arr'));

       }

        public function product_details_addTocart($id)
       {
          $product=Product::with('brand','category')->findOrFail($id);
          $color_en=explode(',',$product->product_color_en);
          $color_bn=explode(',',$product->product_color_bn);
          $size_en=explode(',',$product->product_size_en);
          $size_bn=explode(',',$product->product_size_bn);
           return response()->json([
            'product'=>$product,
            'color_en'=>$color_en,
            'color_bn'=>$color_bn,
            'size_en'=>$size_en,
            'size_bn'=>$size_bn,


           ]);
       }
}
