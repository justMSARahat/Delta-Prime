<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;

    public function city(){
        return $this->hasMany(city::class);
    }

    public function country_name(){
        return $this->belongsTo(country::class,'country');
    }
}
