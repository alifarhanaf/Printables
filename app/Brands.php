<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Products');
    }
}
