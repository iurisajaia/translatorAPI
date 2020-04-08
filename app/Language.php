<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'title', 'icon'
    ];

    public function categories(){
        return $this->hasMany('App\Category');
    }

    public function words(){
        return $this->hasMany('App\Word');
    }

    public function languages(){
        return $this->belongsToMany('App\Language', 'language_user');
    }
}
