<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model{

    protected $fillable = [
        'word' , 'translate', 'language_id' , 'status'
    ];

    public function language(){
        return $this->belongsTo('App\Language');
    }


}
