<?php

use App\Models\CustomNotification;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Material;
use App\Models\Medicine;
use App\Models\Schedule;
use App\Models\Service;

if (!function_exists('get_doctors')) {
    function get_doctors()
    {
        return Doctor::select(['id','name'])->active()->get();
    }
}


if (!function_exists('get_patients')) {
    function get_patients()
    {
        return User::select(['id','name'])->active()->get();
    }
}


if (!function_exists('get_medicines')) {
    function get_medicines()
    {
        return Medicine::select(['id','title'])->get();
    }
}


if (!function_exists('get_materials')) {
    function get_materials()
    {
        return Material::select(['id','title'])->get();
    }
}


if (!function_exists('get_services')) {
    function get_services()
    {
        return Service::select(['id','title'])->get();
    }
}

if (!function_exists('get_schedule')) {
    function get_schedule($dayname, $doctor_id = null)
    {
        if($doctor_id == null){
            $doctor_id = auth()->id();
        }
        
        return Schedule::where(['doctor_id' => $doctor_id, 'dayname' => $dayname])->first();
    }
}

if (!function_exists('create_notification')) {
    function create_notification($from, $from_type, $to, $to_type, $purpose, $des = null)
    {
        $notification = new CustomNotification();
        $notification->from_id = $from;
        $notification->from_type = $from_type;
        $notification->to_id = $to;
        $notification->to_type = $to_type;
        $notification->purpose = $purpose;
        $notification->description = $des;

        if($notification->save()){
            return true;
        }

        return false;
    }
}

if (!function_exists('unread_notification')) {
    function unread_notification($to, $type)
    {
        return CustomNotification::active()->where(['to_id' => $to, 'to_type' => $type])->latest()->get();
    }
}

if (!function_exists('get_from_notifier')) {
    function get_from_notifier($id, $type)
    {
        if($type == 'Patient'){
            $type = 'User';
        }

        $modelClass = "App\\Models\\$type";
        return $modelClass::where('id', $id)->first();
    }
}


if (!function_exists('generateInvoice')) {
    function generateInvoice($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($characters) - 1;
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $max)];
        }
    
        return $randomString;
    }
}