<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    public function groups()
    {
        return $this->belongsToMany('App\Groups');
    }
    public function answers()
    {
        return $this->belongsToMany('App\Answers');
    }
    public function print_types()
    {
        return $this->belongsToMany('App\PrintTypes');
    }
}
