<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    public function groups()
    {
        return $this->belongsToMany('App\Models\Groups');
    }
    public function answers()
    {
        return $this->belongsToMany('App\Models\Answers');
    }
    public function print_types()
    {
        return $this->belongsToMany('App\Models\PrintTypes');
    }
    public function campaigns()
    {
        return $this->belongsToMany('App\Models\Campaigns');
    }
}
