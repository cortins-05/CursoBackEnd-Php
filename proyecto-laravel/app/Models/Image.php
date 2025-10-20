<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    //Relacion One to many
    public function comments(){
        return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
    }

    //Relacion One to many
    public function likes(){
        return $this->hasMany('App\Like');
    }

    //Relacion de muchos a uno
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
