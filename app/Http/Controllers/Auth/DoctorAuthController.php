<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

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
    public function register()
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
    public function save_register(Request $request)
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

    public function dashboard(){
        $total_patient = User::count();
        $total_doctor = Doctor::count();
        $total_designation = Designation::count();
        $today_appoitments  = [];
        return view('doctor.dashboard', compact('total_patient', 'total_doctor', 'total_designation', 'today_appoitments'));
    }

    public function notifications(){
        return view('doctor.notifications');
    }

    public function notification_delete($id){
        $notification = CustomNotification::find($id);
        $notification->status = 1; 
        $notification->save();
        
        return view('doctor.notifications');
    }


    public function profile(){
        $data = auth()->guard('doctor')->user();
        return view('doctor.profile', compact('data'));
    }

    public function profile_update(Request $request)
    {
        $data = auth()->guard('doctor')->user();

        if($request->name != null){
            $data->name = $request->name;
        }

        if($request->mobile != null){
            $data->mobile = $request->mobile;
        }

        if($request->gender != null){
            $data->gender = $request->gender;
        }

        if($request->email != null){
            $data->email = $request->email;
        }

        if($request->blood_group != null){
            $data->blood_group = $request->blood_group;
        }

        if($request->address != null){
            $data->address = $request->address;
        }

        if($request->password != null){
            $data->password = Hash::make($request->password);
        }

        if ($request->has('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $extenstion;

            $path = public_path('uploads/' . $file_name);

            // Resize and save the image using Intervention Image
            Image::make($file->getRealPath())->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);

            $data->image = 'uploads/' . $file_name;
        }


        if($data->save()){
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        
        return back()->with('error', 'Something went to wrong!');
        
    }

    public function logout(){
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login');
    }
}
