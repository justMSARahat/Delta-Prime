<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    public function country_name(){
        return $this->belongsTo(country::class,'country');
    }
    public function city_name(){
        return $this->belongsTo(city::class,'city');
    }
    public function state_name(){
        return $this->belongsTo(state::class,'state');
    }
}
