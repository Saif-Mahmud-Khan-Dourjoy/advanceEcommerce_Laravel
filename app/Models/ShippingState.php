<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingState extends Model
{   
    protected $guarded=[];

    use HasFactory;

   public function division(){
        return $this->belongsTo('App\Models\ShippingDivision','shipping_division_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\ShippingDistrict','shipping_district_id');
    }
}
