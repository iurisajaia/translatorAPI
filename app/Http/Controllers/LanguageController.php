<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Language;
use App\User;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller{

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'icon' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = Auth::user();

        if(!$user){
            return response()->json(['error' => 'No User'] , 401);
        }

        $language = Language::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'user_id' => $user->id
        ]);

        $language->save();

        return response()->json(['language' => $language] , 200);


    }

    public function update(Request $request , $id){

        $validator = Validator::make($request->all(), [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $language = Language::find($id);

        if(!$language){
           return response()->json(['error' => 'No Language Found'] , 401);
        }

        $language->title = $request->title;
        $language->save();



        return response()->json(['language' => $language] , 200 );
    }

    public function destroy($id){

       $language = Language::find($id);

       if(!$language){
          return response()->json(['error' => 'No Language Found'] , 401);
       }

       $language->delete();

       return response()->json(['success' => 'Language Deleted'] , 200 );
    }

}
