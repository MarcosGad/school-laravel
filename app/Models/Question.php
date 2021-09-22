<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;

class Question extends Model
{
    use Userstamps;
    
    public function quizze()
    {
        return $this->belongsTo('App\Models\Quizze');
    }
}
