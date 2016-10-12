<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $SoftDelete = true;
    protected $fillable = ['name','description','text','category_id'];

    //
    public function features(){
        return $this->hasMany('App\Feature');
    }

    public function category(){
        return $this->belongsTo('App\');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    public function user(){
        return $this->belongsTo('App\User', 'author_user_id');
    }
}
