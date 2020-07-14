<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $guarded = [];

    public function results()
    {
    	return $this->hasMany('App\Result');
    }
}
