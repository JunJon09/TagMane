<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagRegistration;
class TagPublishController extends Controller
{
    public function index($id){
        $tag = TagRegistration::find($id);
        return view('TagView')->with([
            'text'=>$tag->self_introduction_text,
            'url'=>$tag->url_text,
        ]);
    }
}
