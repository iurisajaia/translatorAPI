<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title', 'user_id' , 'language_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function language(){
        return $this->belongsTo('App\Language');
    }

    public function words(){
        return $this->belongsToMany('App\Word' , 'category_word');
    }

}
