<?php

namespace App\Http\Controllers;

use App\Employer;
use App\Freelancer;
use App\Http\Controllers\Employer\JobController;
use App\Model\admin\Admin;
use App\Model\user\job;
use App\User;
use App\post;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employers = Employer::all()->count();
        $freelancers = Freelancer::all()->count();
        $applicants = User::all()->count();
        return view('admin.home', compact('employers','freelancers','applicants'));
    }

    public function profileShow()
    {
        return view('admin.profile.show');
    }

    public function profileEdit($id)
    {
        $admin = Admin::find($id);
        return view('admin.profile.edit', compact('admin'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:6',
            'phone' => 'required',
        ]);

        $request['password'] = bcrypt($request->password);

        $admin = Admin::where('id',$id)->update($request->except('_token','_method'));
        return redirect()->route('admin.profile.show');
    }

    public function employers()
    {
        $employers = Employer::all();
        return view('admin.employers', compact('employers'));
    }

    public function resetEmployerPass(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|string|max:6|confirmed',
        ]);

        //$employ_id = $request['employer_id'];

        $request['password'] = bcrypt($request->password);

        $employer = Employer::findOrFail($request->employer_id);

        $employer->update($request->except('_token','_method'));

        //Employer::where('id',$employ_id)->update($request->except('_token','_method'));

        return back()->with('success','Password Reset Successful!');
    }

    public function companyInfo($id)
    {
        
        $employer_id = Employer::find($id);
        $employer_idn = $employer_id['id'];
        $employers = Employer::where('id',$employer_idn)->first();
        $jobs = job::where('jobber_id',$employer_idn)->get();
        //$apply_no = DB::table('job_users')->where('user_id', '=', 1)->count();
        //return $apply_no;
        return view('admin.employerinfo', compact('employers','jobs'));
    }

    public function freelancers()
    {
        $freelancers = Freelancer::all();
        return view('admin.freelancers', compact('freelancers'));
    }

    public function resetFreelancerPass(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|string|max:6|confirmed',
        ]);

        $request['password'] = bcrypt($request->password);

        $freelancer = Freelancer::findOrFail($request->freelancer_id);

        $freelancer->update($request->except('_token','_method'));

        return back()->with('success','Password Reset Successful!');
    }

    public function freelancePosts($id)
    {
        $freelancers = Freelancer::all();
        $posts = post::where('poster_id',$id)->get();
        return view('admin.f_posts', compact('freelancers','posts'));
    }

    public function unpublishPost($id)
    {
        post::where('id',$id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function publishPost($id)
    {
         post::where('id',$id)->update(['status' => 1]);
         return redirect()->back();
    }    

    public function freelanceDisable($id)
    {
        Freelancer::where('id',$id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function freelanceEnable($id)
    {
         Freelancer::where('id',$id)->update(['status' => 1]);
         return redirect()->back();
    }

    public function employerDisable($id)
    {
        Employer::where('id',$id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function employerEnable($id)
    {
         Employer::where('id',$id)->update(['status' => 1]);
         return redirect()->back();
    }

    public function applicantDisable($id)
    {
        User::where('id',$id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function applicantEnable($id)
    {
         User::where('id',$id)->update(['status' => 1]);
         return redirect()->back();
    }

    public function applicants()
    {
        $applicants = User::all();
        return view('admin.applicants', compact('applicants'));
    }

    public function resetApplicantPass(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|string|max:6|confirmed',
        ]);

        $request['password'] = bcrypt($request->password);

        $applicant = User::findOrFail($request->applicant_id);

        $applicant->update($request->except('_token','_method'));

        return back()->with('success','Password Reset Successful!');
    }

    public function viewApplicants(job $job)
    {
        $users = User::all();
        $jobs = job::all();
        $appliers = $job->userx();
        
        return view('admin.e_applicants', compact('appliers','jobs','users'));

    }

}
