<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagRegistration;
class TagPublishController extends Controller
{
    public function index($id){
        $tag = TagRegistration::find($id);
        $url = "http://localhost/tag/" . $id . '/redirect';
        return view('TagView')->with([
            'text'=>$tag->many_text,
            'url'=>$url,
            'id' =>$id,
        ]);
    }
}
