<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Clinic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $clinics = [
            ['clinic_name' => 'Clinic A'],
            ['clinic_name' => 'Clinic B'],
            ['clinic_name' => 'Clinic C'],
        ];

        foreach ($clinics as $clinic) {
            DB::table('clinic')->insert($clinic);
        }
    }
}
