<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Products');
    }
    public function groups()
    {
        return $this->belongsToMany('App\Groups');
    }
}
