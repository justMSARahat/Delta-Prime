<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class post extends Model
{
    use HasFactory;

    public function brand(){
        return $this->belongsTo(brand::class,'brand')->withDefault();;
    }

    public function category(){
        return $this->belongsTo(category::class,'category')->withDefault();;
    }

    public function author_name(){
        return $this->belongsTo(User::class,'author')->withDefault();;
    }


    public function comment(){
        return $this->hasMany(comment::class);
    }

}
