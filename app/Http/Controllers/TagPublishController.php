<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagBox;
use App\Models\TagRegistration;
use App\Models\TagView;
class TagPublishController extends Controller
{
    public function index($id){
        $TR = TagRegistration::where('id', '=', $id)->first();
        $flag = $TR->style_number;
        $TB = TagBox::where('registrations_id', '=', $id)->get();
        $text = "";
        $text = $text . "<ul>";
        for ($i=0; $i<count($TB); $i++){
            $TV = new TagView();
            if ($TV::where('boxes_id', '=', $TB[$i]->id)->exists()){
                $view =  $TV::where('boxes_id', '=', $TB[$i]->id)->first();
                $view_count = $view->view_count;
                $view_count += 1;
                $view->view_count = $view_count;
                $view->save();
            }else{
                $TV->boxes_id =  $TB[$i]->id;
                $TV->view_count = 1;
                $TV->save();
            }
            $text = $text . "<li class='related__item'>";
            $text = $text . "<img src='http://localhost/tag/" . $TB[$i]->id . "/trigger' style='display:none' >";
            $text = $text . "<div id='grid_img'>";
            $text = $text . "<a href='http://localhost/tag/" . $TB[$i]->id . "/redirect'>";
            if ($TB[$i]->img_file !== NULL){
                $text = $text . "<img src='http://localhost/storage/" . $TB[$i]->img_file . "' alt='' width='150px'height='150px'>"; 
            }else{
                $text = $text . "<img src='http://localhost/storage/img/42999970_480x480.jpeg' alt='' width='150px'height='150px'>";
            }
            $text = $text . "</a> </div>";
            $text = $text . "<div id='grid_h3'>";
            $text = $text . "<h3 style='display:inline'>";
            $text = $text . "<a href='http://localhost/tag/" . $TB[$i]->id . "/redirect'>" . $TB[$i]->headline_text . "</a>";
            $text = $text . "</h3> </div>";
            $text = $text . "<div id='grid_p'>";
            $text = $text . "<p style='display:inline'>" . $TB[$i]->subtitle_text . "</p>";
            $text = $text . "</div>";
            $text = $text . "</li>"; 
        }
        $text = $text . "</ul>";
        // $many_text = $tag->many_text;
        //$many_text = '<script src="' . $many_text . '" defer></script>';
        return view('TagView', compact('text', 'flag'));
    }
}
