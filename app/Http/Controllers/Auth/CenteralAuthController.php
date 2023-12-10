<?php

namespace App\Http\Controllers\Auth;

use App\Models\Centeral;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CenteralAuthController extends Controller
{
    /**
     * show login
     *
     * show login function
     *
     **/
    public function login()
    {
        return view('centeral.login');
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
        if(Auth::guard('centeral')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('centeral.dashboard');
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
        return view('centeral.register');
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

        $centeral = new Centeral();
        $centeral->name = $request->name;
        $centeral->mobile = $request->mobile;
        $centeral->email = $request->email;
        $centeral->password = Hash::make($request->password);

        if($centeral->save()){
            Auth::guard('centeral')->login($centeral);
            return redirect()->route('centeral.dashboard');
        }
        
        return redirect()->back()->with('error', 'something went to wrong!');
    }

    public function dashboard(){
        $today_appoitments  = [];
        return view('centeral.dashboard', compact('today_appoitments'));
    }




    public function profile(){
        $data = auth()->guard('centeral')->user();
        return view('centeral.profile', compact('data'));
    }

    public function profile_update(Request $request)
    {
        $data = auth()->guard('centeral')->user();

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


        if($data->save()){
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        
        return back()->with('error', 'Something went to wrong!');
        
    }

    public function logout(){
        Auth::guard('centeral')->logout();
        return redirect()->route('centeral.login');
    }
}
