<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTrigger extends Model
{
    use HasFactory;

    public function TagRegistration(){
        return $this->belongsTo('App\TagRegistration');
    }
}
