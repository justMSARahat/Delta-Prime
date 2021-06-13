<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function category_name(){
        return $this->belongsTo(category::class,'category');
    }

    public function wishlist(){
    	return $this->hasMany(wishlist::class);
    }

    public function review(){
    	return $this->hasMany(review::class);
    }

}
