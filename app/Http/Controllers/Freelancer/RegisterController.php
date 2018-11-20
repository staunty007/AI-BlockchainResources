<?php

namespace App\Http\Controllers\Freelancer;

use App\Freelancer;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\verifyFreelancerEmail;
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
    protected $redirectPath = 'freelancer/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:freelancer');
    }

    public function showRegistrationForm()
    {
        return view('freelance.register');
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
            'phone' => 'required|string|max:255',
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

        $freelancer = Freelancer::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
            'verifyToken' => Str::random(40),
        ]);

        $thisFreelancer = Freelancer::findOrFail($freelancer->id);
        $this->sendEmail($thisFreelancer);
        return $freelancer;
    }

    public function sendEmail($thisFreelancer)
    {
        Mail::to($thisFreelancer['email'])->send(new verifyFreelancerEmail($thisFreelancer));
    }

    public function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }

    public function sendFreelancerEmailDone($email, $verifyToken)
    {
        $freelancer = Freelancer::where(['email' => $email, 'verifyToken' => $verifyToken])->first();
        if ($freelancer) {
            Freelancer::where(['email' => $email, 'verifyToken' => $verifyToken])->update(['status' => '1', 'verifyToken' => NULL]);
            return redirect()->route('freelance.login');
        } else{
            return 'Freelancer not Found';
        }
    }

    public function register(Request $request)
    {
        //validate Employer
        $this->validator($request->all())->validate();

        //Create Employer
        $freelancer = $this->create($request->all());

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
        return Auth::guard('freelancer');
    }
}
