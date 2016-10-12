<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;
use App\Modelo;
use App\Feature;
use App\User;

class Car extends Model
{
    //
    public function features(){
        return $this->belongsToMany('App\Feature');
    }

    public function modelo(){
        return $this->belongsTo("App\Modelo");
    }
}
