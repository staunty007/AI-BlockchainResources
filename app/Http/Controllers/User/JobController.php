<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Model\user\category;
use App\Model\user\job;
use App\User;
use App\Employer;
use App\post;
use Auth;

class JobController extends Controller
{
	public function index()
	{
		$jobs = Job::where('status', 1)->get()->take(4);
		$posts = post::where('status',1)->paginate(3);
		$categories = category::all();
		return view('user.welcome', compact('jobs','posts','categories'));
	}

	public function jobs(Request $request)
	{
		$categories = category::all();
		$companies = Employer::take('5')->get();
		if ($job_title = $request->job_title) {
			$jobs = Job::where('job_title','LIKE','%'.$job_title.'%')->get();
			return view('user.jobs', compact('jobs','categories','companies'));
		}
		if ($job_location = $request->job_location) {
			$jobs = Job::where('job_location','LIKE','%'.$job_location.'%')->get();
			return view('user.jobs', compact('jobs','categories','companies'));
		}
		if ($job_title = $request->job_title AND $job_location = $request->job_location) {
			$jobs = Job::where('job_title','LIKE','%'.$job_title.'%')->where('job_location','LIKE','%'.$job_location.'%')->get();
			return view('user.jobs', compact('jobs','categories','companies'));
		}
			$jobs = Job::all();
			return view('user.jobs', compact('jobs','categories','companies'));	
	}

	public function apply(Request $request, $id)
	{
		//return $user_id = Auth::User()->id;

		if (Auth::check()) {	

			$job = new Job;
			$user_id = Auth::User()->id;
			$job = Job::find($id);
			//$job->save();
			$job->users()->attach($user_id);
			//$job->users()->attach($user_id);
			return redirect()->route('jobs');

		} else{

			return redirect()->route('login');
		}
	}

    public function job(job $job)
    {
    	return view('user.job',compact('job'));
    }

    public function resume()
    {
    	if (Auth::check()) {
    		return view('user.resume');
    	}
    	return redirect()->route('login');
    }

    public function uploadResume(Request $request)
    {
    	if(Auth::check())
    	{
    		$user_id = Auth::User()->id;

	    	$this->validate($request, [
	            'desired_job' => 'required',
	        ]);


	    	if ($request->hasFile('resume')) {
	    		$user = new User;
	    		$user->desired_job = $request->desired_job;

	    		$file = $request->file('resume');

	    		// generate a new filename. getClientOriginalExtension() for the file extension
	    		$filename = 'ceevee-' . Auth::User()->name . '.' . $file->getClientOriginalExtension();

	    		$path = $file->storeAs('public/resume', $filename);

	    		User::where('id',$user_id)->update(['desired_job' => $user->desired_job,'resume' => $path]);
	    		return redirect()->route('job.resume')->with('success','Resume Uploaded successfully!');
	    	}
    	}


    	// return $request->all();

    }

    public function pdf($filename)
    {
        $path = storage_path('app/public/resume/' . $filename);

            if (!File::exists($path)) {
                abort(404);
            }

            $file = File::get($path);
            $type = File::mimeType($path);

            $response = Response::make($file, 200);
            $response->header("Content-Type", $type);

            return $response;
    }

    public function about()
    {
    	return view('user.about');
    }

    public function contact()
    {
    	return view('user.contact');
    }
}
