<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\CustomNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

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

    public function profile(){
        $data = auth()->user();
        return view('patient.profile', compact('data'));
    }

    public function profile_update(Request $request)
    {
        $data = auth()->user();

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

    public function attachments(){
        $patient = User::find(auth()->id());
        return view('patient.attachments', compact('patient'));
    }

    public function notifications(){
        return view('patient.notifications');
    }

    public function notification_delete($id){
        $notification = CustomNotification::find($id);
        $notification->status = 1; 
        $notification->save();
        
        return view('patient.notifications');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('patient.login');
    }
}
