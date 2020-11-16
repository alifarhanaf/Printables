<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestedDesignGroups extends Model
{
    public function suggested_images()
    {
        return $this->belongsToMany('App\Models\SuggestedImages');
    }
    public function campaigns()
    {
        return $this->belongsToMany('App\Models\Campaigns');
    }
}
