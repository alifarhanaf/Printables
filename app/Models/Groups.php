<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Models\Products');
    }
    public function images()
    {
        return $this->belongsToMany('App\Models\Images');
    }
    public function faqs()
    {
        return $this->belongsToMany('App\Models\Faqs');
    }
    public function print_types()
    {
        return $this->belongsToMany('App\Models\PrintTypes');
    }
}
