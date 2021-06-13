<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function parent_cat()
    {
        return $this->belongsTo(self::class, 'parent','id')->withDefault();
    }


    public function post(){
        return $this->hasMany(post::class);
    }

    public function product(){
        return $this->hasMany(product::class);
    }

}
