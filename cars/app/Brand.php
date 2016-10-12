<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modelo;

class Brand extends Model
{
    //
    public function modelos(){
    	return $this->hasMany('App\Modelo');
    }
    
}
