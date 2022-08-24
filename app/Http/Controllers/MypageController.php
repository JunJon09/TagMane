<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagBox;
use App\Models\TagRegistration;
use App\Models\TagView;
use App\Models\TagClick;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index(){
        $user = Auth::user();
        $name = $user->name;
        $TR = new TagRegistration();
        $id = [];
        $text = [];
        $click_count = [];
        $view_count = [];
        if ($TR::where('user_id', '=', $user->id)->exists()){
            $TR_data = $TR::where('user_id', '=', $user->id)->get();
            $TB = new TagBox();
            for ($i=0; $i<count($TR_data); $i++){
                $TB_data = $TB::where('registrations_id', '=', $TR_data[$i]->id)->get();
                for ($j=0; $j<count($TB_data); $j++){
                    $id[] = $TR_data[$i]->id;
                    $text[] =  $TB_data[$j]->headline_text;
                    $TV = new TagView();
                    if ($TV::where('boxes_id', '=', $TB_data[$j]->id)->exists()){
                        $TV_data = $TV::where('boxes_id', '=', $TB_data[$j]->id)->first();
                        $view_count[] = $TV_data->view_count;
                    }else{
                        $view_count[] = 0;
                    }
                    $TC = new TagClick();
                    if($TC::where('boxes_id', '=', $TB_data[$j]->id)->exists()){
                        $TC_data = $TC::where('boxes_id', '=', $TB_data[$j]->id)->first();
                        $click_count[] = $TC_data->click_count;
                    }else{
                        $click_count[] = 0;
                    }
                }
            }
        }
        return view('bootstrap.dist.index', compact('name', 'id', 'text', 'click_count', 'view_count'));
    }
}
