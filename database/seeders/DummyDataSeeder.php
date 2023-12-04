<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'mobile' => '017***********',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin***'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'patient',
            'mobile' => '017***********',
            'email' => 'patient@gmail.com',
            'password' => Hash::make('patient***'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('designations')->insert([
            'title' => 'Surgeon',
        ]);

        DB::table('doctors')->insert([
            'name' => 'doctor',
            'designation_id' => 1,
            'mobile' => '017***********',
            'email' => 'doctor@gmail.com',
            'password' => Hash::make('doctor***'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
