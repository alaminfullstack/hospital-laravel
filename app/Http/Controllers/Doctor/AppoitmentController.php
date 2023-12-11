<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Appoitment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppoitmentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appoitments = Appoitment::where('doctor_id', auth()->id())->latest()->paginate();
        return view('doctor.appoitments.index', compact('appoitments'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appoitment = Appoitment::findOrFail($id);
        return view('doctor.appoitments.show', compact('appoitment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $appoitment = Appoitment::findOrFail($id);

        $appoitment->status = 'booked';

        if($appoitment->save()){
            $des = $request->description;
            $purpose =  'appoitment approved. Code: '.$appoitment->code;
            
            create_notification($appoitment->doctor_id, 'Doctor', $appoitment->patient_id, 'Patient', $purpose, $des);
            return redirect()->route('doctor.appoitments.index')->with('success', 'Appoitment accepted Successfully');
        }

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
    
        $appoitment = Appoitment::findOrFail($id);
        $appoitment->doctor_id = $request->doctor_id;
        $appoitment->code = $request->code;
        $appoitment->date = $request->date;
        $appoitment->service_id = $request->service_id;
        $appoitment->times = $request->times;
        $appoitment->description = $request->description;
        $appoitment->doctor_id = auth()->id();
        $appoitment->status = 'pending';

        if($request->times){
            $time = explode(',', $request->times);
            $appoitment->start_time = $time[0];
            $appoitment->end_time = $time[1];
        }
        
        if($appoitment->save()){
            return redirect()->route('doctor.appoitments.index')->with('success', 'Appoitment updated Successfully');
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
       

       
    }


   
}
