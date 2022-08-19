<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagBox;
use App\Models\TagView;
use App\Models\TagRegistration;
use App\Models\TagClick;
use Illuminate\Support\Facades\Auth;
class TagViewTriggerController extends Controller
{
    public function TriggerCount($id) {
        //idが作成されていない時
        #存在するかどうか
        $TB = new TagBox();
        if (!($TB::where('id', '=', $id)->exists())){
            exit();
        }
        $TV = new TagView();
        if ($TV::where('boxes_id', '=', $id)->exists()){
            $tag = $TV::where('boxes_id', $id)->first();
            $view_count = $tag->view_count;
            $view_count += 1;
            $tag->view_count = $view_count;
            $tag->save();
        }else{
            $TV->boxes_id = $id;
            $TV->view_count = 1;
            $TV->save();
        }
    }

    public function ViewCount($id) {
        //idが作成されていない時
        $user = Auth::user();
        $TR = new TagRegistration();
        if(!($TR::where('user_id', '=', $user->id)->exists())){ //存在してない時
            return view('TopView');
        }else{
            $flag = 0;
            $TR_data = $TR::where('user_id', '=', $user->id)->get();
            for ($i=0; $i<count($TR_data); $i++){
                if ($TR_data[$i]->id == $id){
                    $flag = 1;
                }
            }
            if ($flag == 0){
                return view('TopView');
            }
        }
        $TR_data = $TR::where('user_id');
        $name = $user->name;
        if (!($TR::where('id', '=', $id)->exists())){
            return view('TopView');
        }
        $view_count = [];
        $click_count = [];
        $text = [];
        $TB = TagBox::where('registrations_id', '=', $id)->get();
        for ($i=0; $i<count($TB); $i++){
            $TV = new TagView;
            if ($TV::where('boxes_id', '=', $TB[$i]->id)->exists()){
                $view =  $TV::where('boxes_id', '=', $TB[$i]->id)->first();
                $view_count[] = $view->view_count;
            }else{
                $view_count[] = 0;
            }
            $TC = new TagClick;
            if ($TC::where('boxes_id', '=', $TB[$i]->id)->exists()){
                $click =  $TC::where('boxes_id', '=', $TB[$i]->id)->first();
                $click_count[] = $click->click_count;
            }else{
                $click_count[] = 0;
            }
            $text[] = $TB[$i]->headline_text;
        }
        return view('TagTriggerCountView', compact('id','view_count', 'click_count', 'text', 'name'));
    }
}
