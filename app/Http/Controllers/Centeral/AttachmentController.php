<?php

namespace App\Http\Controllers\Centeral;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PatientAttachment;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachments = PatientAttachment::select('patient_id', 'centeral_id')->where('centeral_id', auth()->id())->groupBy('patient_id', 'centeral_id')->get();
        return view('centeral.attachments.index', compact('attachments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centeral.attachments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            if ($request->has('images')) {
                foreach ($request->images as $file) {

                    $extenstion = $file->getClientOriginalExtension();
                    $file_name = rand().time() . '.' . $extenstion;

                    $path = public_path('uploads/' . $file_name);

            
                    Image::make($file->getRealPath())->resize(600, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($path);

                    $attachement = new PatientAttachment();
                    $attachement->centeral_id = auth()->id();
                    $attachement->patient_id = $request->patient_id;
                    $attachement->attachment = 'uploads/' . $file_name;
                    $attachement->save();
                }
            }

            $des = 'Previous reports added';
            $purpose =  'Attachment added';

            create_notification(auth()->id(), 'Centeral', $request->patient_id, 'Patient', $purpose, $des);

            return redirect()->route('centeral.attachments.index')->with('success', 'Attachment Uploaded Successfully');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = User::findOrFail($id);
        return view('centeral.attachments.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        return view('centeral.appoitments.edit', compact('appoitment', 'schedules'));
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

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $attachement = PatientAttachment::findOrFail($id);

        if ($attachement->delete()) {
            return redirect()->route('patient.attachements.index')->with('success', 'Attachment deleted Successfully');
        }

        return back()->with('error', 'Something went to wrong!');
    }

}
