<?php

namespace App\Repository;

use App\Models\Medicine;

class MedicineRepository
{
    public static function get()
    {

    }

    public static function create($request)
    {
        return self::dataSave($request);
    }

    public static function update($request, $id)
    {
        return self::dataSave($request, $id);
    }

    public static function delete($id)
    {
        $medicine = Medicine::findOrFail($id);

        if($medicine->delete()){
            return true;
        }

        return false;

    }


    private static function dataSave($request, $id = null)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $medicine = new Medicine();

        if ($id != null) {
            $medicine = Medicine::findOrFail($id);
        }

        $medicine->title = $request->title;

        if ($medicine->save()) {
            return true;
        }


        return false;
    }
}
