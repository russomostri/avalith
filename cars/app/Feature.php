<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;

class Feature extends Model
{
    //
	public function car(){
		return $this->belongsToMany('App\Car');
	}
}
