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
        $hot_deals=Product::where('hot_deals',1)->where('status',1)->get();
        return view('frontend.product_detail',compact('product','hot_deals'));
    }
}
