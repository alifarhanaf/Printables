<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    public function faqs()
    {
        return $this->belongsToMany('App\Faqs');
    }
}
