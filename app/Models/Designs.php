<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Designs extends Model
{
    public function images()
    {
        return $this->belongsToMany('App\Models\Images');
    }
    public function campaigns()
    {
        return $this->belongsToMany('App\Models\Campaigns');
    }
}