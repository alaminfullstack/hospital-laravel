<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class PatientRepository
{
    public static function get()
    {

    }

    public static function create($request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required'
        ]);

        return self::dataSave($request);
    }

    public static function update($request, $id)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required'
        ]);

        return self::dataSave($request, $id);
    }

    public static function delete($id)
    {
        $patient = User::findOrFail($id);

        $image_path = public_path('uploads/' . $patient->image);
        if ($patient->image != null) {
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        if($patient->delete()){
            return true;
        }

        return false;

    }


    private function dataSave($request, $id = null)
    {

        $patient = new User();

        if ($id != null) {
            $patient = User::findOrFail($id);
        }



        if ($request->has('image')) {
            if ($id != null) {
                $image_path = public_path('uploads/' . $patient->image);
                if ($patient->image != null) {
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }
                }
            }

            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $file_name = time() . '.' . $extenstion;

            $path = public_path('uploads/' . $file_name);

            // Resize and save the image using Intervention Image
            Image::make($file->getRealPath())->resize(600, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path);

            $patient->image = 'uploads/' . $file_name;
        }

        if ($request->password != null) {
            $patient->password = Hash::make($request->password);
        }

        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->mobile = $request->mobile;
        $patient->gender = $request->gender;
        $patient->blood_group = $request->blood_group;
        $patient->address = $request->address;

        if ($patient->save()) {
            return true;
        }


        return false;
    }
}
