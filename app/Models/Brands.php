<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Models\Products');
    }
}
