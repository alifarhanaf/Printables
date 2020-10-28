<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Models\Products');
    }
    public function groups()
    {
        return $this->belongsToMany('App\Models\Groups');
    }
}
