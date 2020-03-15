<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model{

    protected $fillable = [ 'title' , 'icon' , 'user_id' ];

    public function words(){
        return $this->hasMany('App\Word');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
