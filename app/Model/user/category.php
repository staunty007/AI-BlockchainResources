<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function jobs()
    {
    	return $this->belongsToMany('App\Model\user\job','category_jobs');
    }
}
