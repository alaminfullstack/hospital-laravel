<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\PatientRepository;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = User::latest()->paginate();
        return view('admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (PatientRepository::create($request)) {
            return redirect()->route('admin.patients.index')->with('success', 'Patient Uploaded Successfully');
        }

        return back()->with('error', 'Something went to wrong!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = User::findOrFail($id);
        return view('admin.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (PatientRepository::update($request, $id)) {
            return redirect()->route('admin.patients.index')->with('success', 'Patient Updated Successfully');
        }

        return back()->with('error', 'Something went to wrong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (PatientRepository::delete($id)) {
            return redirect()->route('admin.patients.index')
                ->with('success', 'Patient deleted successfully');
        }

        return back()->with('error', 'Something went to wrong!');
    }
}
