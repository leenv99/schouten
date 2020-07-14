<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $fillable = ['query_id', 'position', 'title', 'link', 'snippet'];

    public function input()
    {
    	return $this->belongsTo('App\Query');
    }
}
