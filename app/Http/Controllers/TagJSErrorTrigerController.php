<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagTrigger;

class TagJSErrorTrigerController extends Controller
{
    public function errorJudge($id){
        $DB_TT = new TagTrigger();
        if ($DB_TT::where('user_id', '=', $id)->exists()){
            $tag = $DB_TT::where('user_id', $id)->first();
            $tag->js_error = 1;
            $tag->save();
        }
    }
    public function trueJudge($id){
        $DB_TT = new TagTrigger();
        if ($DB_TT::where('user_id', '=', $id)->exists()){
            $tag = $DB_TT::where('user_id', $id)->first();
            $tag->js_error = 0;
            $tag->save();
        }
    }
}
