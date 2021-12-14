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
        $special_offer=Product::where('special_offer',1)->where('status',1)->get();
        $special_deals=Product::where('special_deals',1)->where('status',1)->get();
        return view('frontend.index',compact('featured','hot_deals','special_offer','special_deals'));
    }
    public function single_product($id,$slug){
        $product=Product::findOrFail($id);
        $hot_deals=Product::where('hot_deals',1)->where('status',1)->get();
        return view('frontend.product_detail',compact('product','hot_deals'));
    }
}
