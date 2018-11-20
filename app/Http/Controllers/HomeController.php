<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\user\category;
use App\Model\user\job;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::where('status', 1)->get()->take(4);
        $categories = category::all();
        return view('user.home' , compact('jobs','categories'));
    }
}
