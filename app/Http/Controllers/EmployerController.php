<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employer;
use App\Model\user\job;
use App\User;
use App\Http\Controllers\Controller;

class EmployerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employer');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$appliers = $job->users()->count();
        $jobCounts = job::all()->count();
        return view('employer.home', compact('jobCounts','appliers'));
    }

    public function show()
    {
        $employers = Employer::all();
        return view('employer.user.show');
    }

    public function edit($id)
    {
        $employer = Employer::find($id);
        return view('employer.user.edit', compact('employer'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'company_name' => 'required|string|max:255',
            'company_industry' => 'required|string|max:255',
            'company_description' => 'required',
            'company_location' => 'required|string|max:255',
        ]);

        $employer = Employer::where('id',$id)->update($request->except('_token','_method'));
        return redirect()->route('employer.user.show');
    }
}
