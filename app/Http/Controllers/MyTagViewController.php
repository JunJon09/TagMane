<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TagRegistration;
use App\Models\TagBox;
class MyTagViewController extends Controller
{
    public function index(){
        $user = Auth::user();
        $name = $user->name;
        $data = [];
        
        $TR = new TagRegistration;
        if ($TR::where('user_id', '=', $user->id)->exists()){
            $TR_data = $TR::where('user_id', '=', $user->id)->get();
            for($i=0; $i<count($TR_data); $i++){
                $data[] = $TR_data[$i]->id;
            }
        }
        return view('MyTagView', compact('name', 'data'));
    }
}
