<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingOptions extends Model
{
    public function campaigns()
    {
        return $this->belongsToMany('App\Models\Campaigns');
    }
}
