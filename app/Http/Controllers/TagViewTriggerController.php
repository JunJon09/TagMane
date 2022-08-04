<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagRegistration;
use App\Models\TagTrigger;

class TagViewTriggerController extends Controller
{
    public function TriggerCount($id) {
        //idが作成されていない時
        $DB_TR = new TagRegistration();
        if (!($DB_TR::where('id', '=', $id)->exists())){
            exit();
        }
        $DB_TT = new TagTrigger();
        #存在するかどうか
        if ($DB_TT::where('user_id', '=', $id)->exists()){
            $tag = $DB_TT::where('user_id', $id)->first();
            $view_count = $tag->view_count;
            $view_count += 1;
            $tag->view_count = $view_count;
            $tag->save();
        }else{
            $DB_TT->user_id = $id;
            $DB_TT->view_count = 1;
            $DB_TT->click_count = 0;
            $DB_TT->save();
        }
    }

    public function ViewCount($id) {
        //idが作成されていない時
        $DB_TR = new TagRegistration();
        if (!($DB_TR::where('id', '=', $id)->exists())){
            return view('welcome');
        }

        $DB_TT = new TagTrigger();
        $view_count = 0;
        $click_count = 0;

        if ($DB_TT::where('user_id', '=', $id)->exists()){
            $tag = $DB_TT::where('user_id', $id)->first();
            $view_count = $tag->view_count;
            $click_count = $tag->click_count;
        }

        return view('TagTriggerCountView')->with([
            'id'=>$id,
            'view_count'=>$view_count,
            'click_count'=>$click_count,
        ]);
    }
}
