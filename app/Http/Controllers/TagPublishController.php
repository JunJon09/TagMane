<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagRegistration;
class TagPublishController extends Controller
{
    public function index($id){
        $tag = TagRegistration::find($id);
        $url = "http://localhost/tag/" . $id . '/redirect';
        $many_text = $tag->many_text;
        //$many_text = '<script src="' . $many_text . '" defer></script>';
        return view('TagView')->with([
            'text'=>$many_text,
            'url'=>$url,
            'id' =>$id,
        ]);
    }
}
