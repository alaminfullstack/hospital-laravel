<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * show login
     *
     * show login function
     *
     **/
    public function login()
    {
        return view('admin.login');
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
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.dashboard');
        }
        
        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }


    public function dashboard(){
        $total_patient = User::count();
        $total_doctor = Doctor::count();
        $total_designation = Designation::count();
        $today_appoitments  = [];
        return view('admin.dashboard', compact('total_patient', 'total_doctor', 'total_designation', 'today_appoitments'));
    }

    public function profile(){
        $data = auth()->guard('admin')->user();
        return view('admin.profile', compact('data'));
    }

    public function profile_update(Request $request)
    {
        $data = auth()->guard('admin')->user();

        if($request->name != null){
            $data->name = $request->name;
        }

        if($request->mobile != null){
            $data->mobile = $request->mobile;
        }

        if($request->email != null){
            $data->email = $request->email;
        }

        if($request->password != null){
            $data->password = Hash::make($request->password);
        }

        if($data->save()){
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        
        return back()->with('error', 'Something went to wrong!');
        
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
