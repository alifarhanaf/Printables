<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    public function faqs()
    {
        return $this->belongsToMany('App\Models\Faqs');
    }
}
