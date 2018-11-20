<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Freelancer;
use App\Http\Controllers\Controller;

class FreelancerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:freelancer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('freelance.home');
    }

    public function show()
    {
        $freelancers = Freelancer::all();
        return view('freelance.user.show');
    }

    public function edit($id)
    {
        $freelancer = Freelancer::find($id);
        return view('freelance.user.edit', compact('freelancer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required',
        ]);

        $freelancer = Freelancer::where('id',$id)->update($request->except('_token','_method'));
        return redirect()->route('freelance.user.show');
    }
}
