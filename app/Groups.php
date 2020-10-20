<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Products');
    }
    public function images()
    {
        return $this->belongsToMany('App\Images');
    }
    public function faqs()
    {
        return $this->belongsToMany('App\Faqs');
    }
}
