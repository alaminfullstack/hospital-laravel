<?php

namespace App\Repository;

use App\Models\MedicinePrescription;
use App\Models\Prescription;
use Illuminate\Support\Facades\DB;

class PrescriptionRepository
{
    public static function get()
    {
    }

    public static function create($request)
    {
        $request->validate([
            'date' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
        ]);

        return self::dataSave($request);
    }

    public static function update($request, $id)
    {
        $request->validate([
            'date' => 'required',
            'doctor_id' => 'required',
            'patient_id' => 'required',
        ]);

        return self::dataSave($request, $id);
    }

    public static function delete($id)
    {
        $prescription = Prescription::findOrFail($id);

        if ($prescription->delete()) {
            return true;
        }

        return false;
    }


    private static function dataSave($request, $id = null)
    {
        
        DB::beginTransaction();

        $prescription = new Prescription();

        if ($id != null) {
            $prescription = Prescription::findOrFail($id);
        }

        $prescription->date = $request->date;
        $prescription->doctor_id = $request->doctor_id;
        $prescription->patient_id = $request->patient_id;
        $prescription->invoice = $request->invoice;
        $prescription->symptoms = $request->symptoms;
        $prescription->diagnosis = $request->diagnosis;
        $prescription->note = $request->note;
        $prescription->reference = $request->reference;

        if ($prescription->save()) {
            if ($request->has('medicine_id')) {
                if (count($request->medicine_id) > 0) {
                    self::savePrescriptionMedicine($request, $prescription->id);
                }
            }

            $des = '';
            $purpose =  'prescription sended. Code: '.$prescription->invoice;
            
            create_notification($prescription->doctor_id, 'Doctor', $prescription->patient_id, 'Patient', $purpose, $des);

            DB::commit();

            return true;
        }

        DB::rollBack();
        return false;
    }

    private static function savePrescriptionMedicine($request, $id)
    {
        // delete old data p_m = medicine_prescription
        $total_medicine = count($request->medicine_id);

        for ($i = 0; $i < $total_medicine; $i++) {
            $p_m = MedicinePrescription::where(['prescription_id' => $id, 'medicine_id' => $request->medicine_id[$i]])->first();
            if ($p_m == null) {
                $p_m = new MedicinePrescription();
            }

            $p_m->prescription_id = $id;
            $p_m->medicine_id = $request->medicine_id[$i];
            $p_m->note = $request->desc[$i];

            $p_m->save();
        }

        return true;
    }
}
