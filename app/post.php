<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    
    public function tags()
    {
    	return $this->belongsToMany('App\tag', 'post_tags')->withTimestamps();
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
