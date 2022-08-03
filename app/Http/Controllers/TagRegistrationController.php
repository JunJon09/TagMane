<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagRegistration;  //TagRegistrationモデルを呼び出す
class TagRegistrationController extends Controller
{
    public function index(Request $request) {
        $tag = new TagRegistration();
        $tag->self_introduction_text = $request->self_introduction_text;
        $tag->url_text = $request->url_text;
        $tag->save();
        $id = $tag->id;
        return view('TagPublish')->with('id', $id);
    }
}
