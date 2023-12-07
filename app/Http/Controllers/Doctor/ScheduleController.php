<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::where('doctor_id', auth()->id())->get();
        return view('doctor.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dayname = $request->dayname;
        $doctor_id = auth()->id();


        $schedule = Schedule::where(['doctor_id' => $doctor_id, 'dayname' => $dayname])->first();
   

        if($schedule == null){
            $schedule = new Schedule();
        }else{
    
        }

        $schedule->doctor_id = $doctor_id;
        $schedule->dayname = $dayname;
        $schedule->start_time = $request->start;
        $schedule->end_time = $request->end;

        try{
            $schedule->save();
            return back()->with('success', 'Schedule created Successfully');
        }catch(Exception $e){
           return $e->getMessage();
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
        $medicine = Schedule::findOrFail($id);
        return view('doctor.schedules.edit', compact('medicine'));
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
        
        return back()->with('error', 'Something went to wrong!');
    }
}
