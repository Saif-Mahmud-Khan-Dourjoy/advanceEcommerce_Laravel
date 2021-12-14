<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function multi_img(){
        return $this->hasMany('App\Models\MultiImg');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function sub_category(){
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function sub_sub_category(){
        return $this->belongsTo('App\Models\SubSubCategory');
    }
}
