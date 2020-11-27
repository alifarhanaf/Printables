<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{
    public function colors()
    {
        return $this->belongsToMany('App\Models\Colors');
    }
    public function images()
    {
        return $this->belongsToMany('App\Models\Images');
    }
}
