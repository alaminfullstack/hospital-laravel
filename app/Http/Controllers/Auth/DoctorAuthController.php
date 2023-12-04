<?php

namespace App\Http\Controllers\Auth;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorAuthController extends Controller
{
    /**
     * show login
     *
     * show login function
     *
     **/
    public function login()
    {
        return view('doctor.login');
    }


    /**
     * login
     *
     * login function
     *
     * @param Request $request
     * @return Auth
     **/
    public function save_login(Request $request)
    {
        if(Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('doctor.dashboard');
        }
        
        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }

    /**
     * show login
     *
     * show login function
     *
     **/
    public function show_register(Request $request)
    {
        return view('doctor.register');
    }


    /**
     * login
     *
     * login function
     *
     * @param Request $request
     * @return Auth
     **/
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->name;
        $doctor->mobile = $request->mobile;
        $doctor->email = $request->email;
        $doctor->password = Hash::make($request->password);

        if($doctor->save()){
            Auth::guard('doctor')->login($doctor);
            return redirect()->route('doctor.dashboard');
        }
        
        return redirect()->back()->with('error', 'something went to wrong!');
    }
}
