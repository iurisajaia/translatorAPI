<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
        'title', 'translate' , 'user_id' , 'language_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function language(){
        return $this->belongsTo('App\Language');
    }

    public function categories(){
        return $this->belongsToMany('App\Category' , 'category_word');
    }
}
