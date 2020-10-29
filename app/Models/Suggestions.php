<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestions extends Model
{
    public function campaigns()
    {
        return $this->belongsToMany('App\Models\Campaigns');
    }
}
