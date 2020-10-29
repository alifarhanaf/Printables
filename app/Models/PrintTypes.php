<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrintTypes extends Model
{
    public function groups()
    {
        return $this->belongsToMany('App\Models\Groups');
    }
    public function faqs()
    {
        return $this->belongsToMany('App\Models\Faqs');
    }
    public function campaigns()
    {
        return $this->belongsToMany('App\Models\Campaigns');
    }
}
