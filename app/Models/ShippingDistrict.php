<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDistrict extends Model
{   
    protected $guarded=[];
    use HasFactory;

    public function division(){
        return $this->belongsTo('App\Models\ShippingDivision','shipping_division_id');
    }
}
