<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Language;
use App\Word;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller{

    public function index(){

    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'word' => 'required',
            'language_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $language = Language::find($request->language_id);

         if(!$language){
           return response()->json(['error' => 'No Language Found'] , 401);
         }

       $word = Word::create([
            'word' => $request->word,
            'language_id' => $request->language_id,
            'translate' => $request->translate ? $request->translate : '',
       ]);

       $word->save();

       return response()->json(['word' => $word], 200);
    }


    public function show($id){
        //
    }


    public function update(Request $request, $id){
        $word = Word::find($id);

        if(!$word){
           return response()->json(['error' => 'No Word Found'] , 401);
        }


        $word->word = $request->word;
        $word->translate = $request->translate;
        $word->status = $request->status;
        $word->save();

        return response()->json(['word' => $word], 200);
    }


    public function destroy($id){
       $word = Word::find($id);

       if(!$word){
          return response()->json(['error' => 'No Word Found'] , 401);
       }

       $word->delete();
    }
}
