<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    use HasFactory;

    public function product_name(){
        return $this->belongsTo(product::class,'product_id');
    }
    public function color_name(){
        return $this->belongsTo(color::class,'color')->withDefault(['title'=>'No Color'],);
    }
}
