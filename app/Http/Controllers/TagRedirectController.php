<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagRegistration;
use App\Models\TagTrigger;
class TagRedirectController extends Controller
{
    public function index($id){

        $DB_TR = new TagRegistration();
        if (!($DB_TR::where('id', '=', $id)->exists())){
            exit();
        }
        $tag = $DB_TR::where('id', $id)->first();
        $url = $tag->url_text;

        $DB_TT = new TagTrigger();
        if ($DB_TT::where('user_id', '=', $id)->exists()){
            $tag = $DB_TT::where('user_id', $id)->first();
            $click_count = $tag->click_count;
            $click_count += 1;
            $tag->click_count = $click_count;
            $tag->save();
        }else{
            $DB_TT->user_id = $id;
            $DB_TT->view_count = 0;
            $DB_TT->click_count = 1;
            $DB_TT->save();
        }
        return redirect($url);
    }
}
