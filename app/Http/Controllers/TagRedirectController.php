<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagBox;
use App\Models\TagClick;

class TagRedirectController extends Controller
{
    public function index($id){

        $TB = new TagBox();
        if (!($TB::where('id', '=', $id)->exists())){
            exit();
        }
        $tag = $TB::where('id', $id)->first();
        $url = $tag->url_text;

        $TC = new TagClick();
        if ($TC::where('boxes_id', '=', $id)->exists()){
            $tag = $TC::where('boxes_id', '=' , $id)->first();
            $click_count = $tag->click_count;
            $click_count += 1;
            $tag->click_count = $click_count;
            $tag->save();
        }else{
            $TC->boxes_id = $id;
            $TC->click_count = 1;
            $TC->save();
        }
        return redirect($url);
    }
}
