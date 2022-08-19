<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagRegistration;  //TagRegistrationモデルを呼び出す
use App\Models\TagBox;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class TagRegistrationController extends Controller
{
    public function index(Request $request) {
        $TR = new TagRegistration();
        $TB = new TagBox();
        $user = Auth::user();
        $TR->user_id = $user->id;
        $TR->style_number = $request->style_select;
        $TR->save();
        for ($i=0; $i<count($request->url_text); $i++){
            $TR_count = $TR->count();
            $TB->registrations_id = $TR_count;
            $TB->url_text = $request->url_text[$i];
            $TB->headline_text = $request->headline_text[$i];
            $TB->subtitle_text = $request->sub_text[$i];
            if(!empty($request->img_file[$i])){
                $path = $request->img_file[$i]->store('img', 'public');
                $TB->img_file = $path;
            }
            $TB->save();
            $TB = new TagBox();
        }
    
        
        return view('TagPublish')->with('id', $TR_count);
    }
}
