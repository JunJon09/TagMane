<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagRegistration extends Model
{
    use HasFactory;
    public function TagTrigger(){
        return $this->hasOne('App\TagTrigger');
    }
}
