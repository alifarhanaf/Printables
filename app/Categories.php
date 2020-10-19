<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function images()
    {
        return $this->belongsToMany('App\Images');
    }
}
