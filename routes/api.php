<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth:api']], function () {
    Route::post('/details', 'UserController@details'); // User Details

    Route::post('/language/create', 'LanguageController@store'); // Create Language
    Route::put('/language/{id}', 'LanguageController@update'); // Update Language
    Route::delete('/language/{id}' , 'LanguageController@destroy'); // Remove Language

    Route::resource('/word', 'WordController');
});

Route::post('/register', 'UserController@register'); // User Registration
Route::post('/login', 'UserController@login'); // User Login
Route::get('/test', function(){
return response()->json(['test' => 'response']);
});
