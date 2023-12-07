<?php

namespace App\Http\Controllers\Patient;

use App\Models\Prescription;
use Illuminate\Http\Request;
use Mpdf\Config\FontVariables;
use Mpdf\Config\ConfigVariables;
use App\Http\Controllers\Controller;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions = Prescription::where('patient_id', auth()->id())->latest()->paginate();
        return view('patient.prescriptions.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('patient.prescriptions.show', compact('prescription'));
    }

}