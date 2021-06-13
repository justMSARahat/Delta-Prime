<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class review extends Model
{
    use HasFactory;

    public function product_name(){
        return $this->belongsTo(product::class,'product_id');
    }

    public function customer_name(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
