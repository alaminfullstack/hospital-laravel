<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PatientAuthController extends Controller
{
    /**
     * show login
     *
     * show login function
     *
     **/
    public function login()
    {
        return view('patient.login');
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
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('patient.dashboard');
        }
        
        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }


    /**
     * show login
     *
     * show login function
     *
     **/
    public function register()
    {
        return view('patient.register');
    }


    /**
     * login
     *
     * login function
     *
     * @param Request $request
     * @return Auth
     **/
    public function save_register(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($user->save()){
            Auth::login($user);
            return redirect()->route('patient.dashboard');
        }
        
        return redirect()->back()->with('error', 'something went to wrong!');
    }

    public function dashboard(){
        $total_patient = User::count();
        $total_doctor = Doctor::count();
        $total_designation = Designation::count();
        $today_appoitments  = [];
        return view('patient.dashboard', compact('total_patient', 'total_doctor', 'total_designation', 'today_appoitments'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('patient.login');
    }
}
