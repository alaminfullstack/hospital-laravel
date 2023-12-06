<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\PrescriptionRepository;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions = Prescription::latest()->paginate();
        return view('admin.prescriptions.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prescriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if (PrescriptionRepository::create($request)) {
            return redirect()->route('admin.prescriptions.index')->with('success', 'Prescription Uploaded Successfully');
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
        $prescription = Prescription::findOrFail($id);
        return view('admin.prescriptions.edit', compact('prescription'));
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
    
        if (PrescriptionRepository::update($request, $id)) {
            return redirect()->route('admin.prescriptions.index')->with('success', 'Updated Successfully');
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
        if (PrescriptionRepository::delete($id)) {
            return redirect()->route('admin.prescriptions.index')->with('success', 'Prescription Deleted Successfully');
        }

        return back()->with('error', 'Something went to wrong!');
    }
}
