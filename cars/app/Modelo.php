<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;
use App\Brand;

class Modelo extends Model
{
    //
    
    public function car(){
    	return $this->hasMany('App\Car');
    }

    public function brand() {
        return $this->belongsTo("App\Brand");
    }

}
