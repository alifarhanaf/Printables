<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function images()
    {
        return $this->belongsToMany('App\Images');
    }
    public function brands()
    {
        return $this->belongsToMany('App\Brands');
    }
    public function groups()
    {
        return $this->belongsToMany('App\Groups');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Categories');
    }
    public function colors()
    {
        return $this->belongsToMany('App\Colors');
    }
    public function print_locations()
    {
        return $this->belongsToMany('App\PrintLocations');
    }
}
