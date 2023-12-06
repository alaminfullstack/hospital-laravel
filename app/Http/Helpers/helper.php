<?php

use App\Models\User;
use App\Models\Doctor;
use App\Models\Material;
use App\Models\Medicine;

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