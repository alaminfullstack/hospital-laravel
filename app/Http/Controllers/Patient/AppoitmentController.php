<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\Appoitment;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppoitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appoitments = Appoitment::where('patient_id', auth()->id())->latest()->paginate();
        return view('patient.appoitments.index', compact('appoitments'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.appoitments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $appoitment = new Appoitment();
        $appoitment->doctor_id = $request->doctor_id;
        $appoitment->code = $request->code;
        $appoitment->date = $request->date;
        $appoitment->service_id = $request->service_id;
        $appoitment->times = $request->times;
        $appoitment->description = $request->description;
        $appoitment->patient_id = auth()->id();
        $appoitment->status = 'pending';

        if($request->times){
            $time = explode(',', $request->times);
            $appoitment->start_time = $time[0];
            $appoitment->end_time = $time[1];
        }
        
        if($appoitment->save()){
            $des = $appoitment->description;
            $purpose =  'appoitment Request. Code: '.$appoitment->code;
            
            create_notification($appoitment->patient_id, 'Patient', $appoitment->doctor_id, 'Doctor', $purpose, $des);

            return redirect()->route('patient.appoitments.index')->with('success', 'Appoitment Uploaded Successfully');
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
        $appoitment = Appoitment::findOrFail($id);
        $dayname = Carbon::parse($appoitment->date)->dayName;
        $schedules = Schedule::where(['doctor_id' => $appoitment->doctor_id, 'dayname' => $dayname])->get();

        return view('patient.appoitments.edit', compact('appoitment', 'schedules'));
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
        $appoitment->patient_id = auth()->id();
        $appoitment->status = 'pending';

        if($request->times){
            $time = explode(',', $request->times);
            $appoitment->start_time = $time[0];
            $appoitment->end_time = $time[1];
        }
        
        if($appoitment->save()){
            return redirect()->route('patient.appoitments.index')->with('success', 'Appoitment updated Successfully');
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
       

        $appoitment = Appoitment::findOrFail($id);

        if($appoitment->delete()){
            return redirect()->route('patient.appoitments.index')->with('success', 'Appoitment deleted Successfully');
        }

        return back()->with('error', 'Something went to wrong!');
    }


    public function get_schedule(Request $request){
        $date = $request->date;
        $doctor_id = $request->doctor_id;
        $dayname = Carbon::parse($date)->dayName;

        $schedules = Schedule::where(['doctor_id' => $doctor_id, 'dayname' => $dayname])->get();
        $appoitments = Appoitment::where('doctor_id', $doctor_id)->whereDate('date', $date)->get();

        return view('patient.appoitments.schedule', compact('schedules', 'appoitments'));
    }
}
