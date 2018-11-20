<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class job extends Model
{
    public function categories()
    {
    	return $this->belongsToMany('App\Model\user\category','category_jobs')->withTimestamps();
    }

    public function employers()
    {
    	return $this->belongsToMany('App\Employer','employer_jobs')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany('App\User','job_users')->withTimestamps();
    }

    public function userx()
    {
        return $this->belongsToMany('App\User','job_users')->orderBy('created_at','DESC')->paginate(5);
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
