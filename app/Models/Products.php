<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function images()
    {
        return $this->belongsToMany('App\Models\Images');
    }
    public function brands()
    {
        return $this->belongsToMany('App\Models\Brands');
    }
    public function groups()
    {
        return $this->belongsToMany('App\Models\Groups');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Categories');
    }
    public function colors()
    {
        return $this->belongsToMany('App\Models\Colors');
    }
    public function variants()
    {
        return $this->belongsToMany('App\Models\Variants');
    }

    public function print_locations()
    {
        return $this->belongsToMany('App\Models\PrintLocations');
    }
    public function campaigns()
    {
        return $this->belongsToMany('App\Models\Campaigns');
    }
}
