<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizations extends Model
{
    public function designs()
    {
        return $this->belongsToMany('App\Models\Designs');
    }
}
