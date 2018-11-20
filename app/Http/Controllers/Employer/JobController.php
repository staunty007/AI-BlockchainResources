<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\user\category;
use App\Employer;
use App\User;
use App\Model\user\job;
use Auth;

class JobController extends Controller
{
    public $user_id; 
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::User()->id;
        $jobs = Job::where('jobber_id',$user_id)->get();
        return view('employer.job.show',compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = category::all();
        return view('employer.job.job', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'job_title' => 'required',
            'job_description' => 'required',
            'job_location' => 'required',
            'job_salary' =>'required|numeric',
            'education_level' => 'required',
            'schedule' => 'required',
        ]);

        $job = new Job;
        $user_id = Auth::User()->id;

        $job->job_title = $request->job_title;
        $job->slug = str_slug($job->job_title, '-');
        $job->job_location = $request->job_location;
        $job->negotiable = $request->negotiable;
        $job->job_salary = $request->job_salary;
        $job->education_level = $request->education_level;
        $job->status = $request->status;
        $job->schedule = $request->schedule;
        $job->job_description = $request->job_description;
        $job->jobber_id = $user_id;
        $job->save();
        $job->categories()->sync($request->cats);
        $job->employers()->sync($user_id);

        return redirect()->route('job.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = Job::with('categories')->where('id',$id)->first();

        $cats = category::all();

        return view('employer.job.edit', compact('cats','job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_title' => 'required',
            'job_description' => 'required',
            'job_location' => 'required',
            'job_salary' =>'required|numeric',
            'education_level' => 'required',
            'schedule' => 'required',
        ]);

        $job = Job::find($id);
        $user_id = Auth::User()->id;
        
        $job->job_title = $request->job_title;
        $job->slug = str_slug($job->job_title, '-');
        $job->job_location = $request->job_location;
        $job->negotiable = $request->negotiable;
        $job->job_salary = $request->job_salary;
        $job->education_level = $request->education_level;
        $job->status = $request->status;
        $job->schedule = $request->schedule;
        $job->job_description = $request->job_description;
        $job->jobber_id = $user_id;
        $job->save();
        $job->categories()->sync($request->cats);
        $job->employers()->sync($user_id);

        return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Job::where('id',$id)->delete();
        return redirect()->back();
    }

    public function viewApplicants(job $job)
    {
        $users = User::all();
        $jobs = job::all();
        $appliers = $job->userx();
        
        return view('employer.applicants', compact('appliers','jobs','users'));

    }

}
