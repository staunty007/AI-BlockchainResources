<?php

namespace App\Http\Controllers\Employer;

use App\Employer;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\verifyEmployerEmail;
use Illuminate\Http\Request;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectPath = 'employer/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:employer');
    }

    public function showRegistrationForm()
    {
        return view('employer.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'company_name' => 'required|string|max:255',
            'company_location' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status','Registered! but verify your email to activate your account');

        $employer = Employer::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'company_name' => $data['company_name'],
            'company_location' => $data['company_location'],
            'password' => bcrypt($data['password']),
            'verifyToken' => Str::random(40),
        ]);

        $thisEmployer = Employer::findOrFail($employer->id);
        $this->sendEmail($thisEmployer);
        return $employer;
    }

    public function sendEmail($thisEmployer)
    {
        Mail::to($thisEmployer['email'])->send(new verifyEmployerEmail($thisEmployer));
    }

    public function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }

    public function sendEmployerEmailDone($email, $verifyToken)
    {
        $employer = Employer::where(['email' => $email, 'verifyToken' => $verifyToken])->first();
        if ($employer) {
            Employer::where(['email' => $email, 'verifyToken' => $verifyToken])->update(['status' => '1', 'verifyToken' => NULL]);
            return redirect()->route('employer.login');
        } else{
            return 'Employer not Found';
        }
    }

    public function register(Request $request)
    {
        //validate Employer
        $this->validator($request->all())->validate();

        //Create Employer
        $employer = $this->create($request->all());

        //Authenticate Employer
        //$this->guard()->login($employer);
        return redirect()->route('verifyEmailFirst');

        //redirect Employer
        return redirect($this->redirectPath);

    }

    // public function sendEmail($thisUser)
    // {
    //     Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    // }

    // public function verifyEmailFirst()
    // {
    //     return view('email.verifyEmailFirst');
    // }

    // public function sendEmailDone($email,$verifyToken)
    // {
    //     $user = User::where(['email' => $email, 'verifyToken' => $verifyToken])->first();
    //     if ($user) {
    //         User::where(['email' => $email, 'verifyToken' => $verifyToken])->update(['status' => '1', 'verifyToken' => NULL]);
    //         return redirect()->route('login');
    //     } else{
    //         return 'User not Found';
    //     }
    // }

    protected function guard()
    {
        return Auth::guard('employer');
    }
}
