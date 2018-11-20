<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
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

    public function show()
    {
        $users = User::all();
        return view('user.profile.show', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('user.profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'school' => 'required|string|max:255',
            'grad_year' => 'required|numeric',
            'degree' => 'required|string|max:255',
            'current_job' => 'required|string|max:255',
            'desired_job' => 'required|string|max:255',
            'working_exp' => 'required|numeric',
        ]);

        $user = User::where('id',$id)->update($request->except('_token','_method'));
        return redirect()->route('user.profile.show');
    }
}
