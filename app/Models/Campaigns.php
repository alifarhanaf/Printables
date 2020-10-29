<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    public function designs()
    {
        return $this->belongsToMany('App\Models\Designs');
    }
    public function addresses()
    {
        return $this->belongsToMany('App\Models\Addresses');
    }
    public function products()
    {
        return $this->belongsToMany('App\Models\Products');
    }
    public function faqs()
    {
        return $this->belongsToMany('App\Models\Faqs');
    }
    public function answers()
    {
        return $this->belongsToMany('App\Models\Answers');
    }
    public function print_locations()
    {
        return $this->belongsToMany('App\Models\PrintLocations');
    }
    public function print_types()
    {
        return $this->belongsToMany('App\Models\PrintTypes');
    }
    public function shipping_options()
    {
        return $this->belongsToMany('App\Models\ShippingOptions');
    }
    public function suggestions()
    {
        return $this->belongsToMany('App\Models\Suggestions');
    }
    

}
