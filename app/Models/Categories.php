<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function images()
    {
        return $this->belongsToMany('App\Models\Images');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Products');
    }
}
