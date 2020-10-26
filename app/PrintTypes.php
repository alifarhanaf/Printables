<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrintTypes extends Model
{
    public function groups()
    {
        return $this->belongsToMany('App\Groups');
    }
    public function faqs()
    {
        return $this->belongsToMany('App\Faqs');
    }
}
