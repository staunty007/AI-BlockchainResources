<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
	public function posts()
    {
    	return $this->belongsToMany('App\post', 'post_tags')->orderBy('created_at','DESC')->paginate(3);
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
