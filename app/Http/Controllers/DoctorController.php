<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){

    }

    public function getDoctorClinics($id){

        try {
            $doctor=Doctor::select('clinic_id')->where('user_id', $id)->first();
            $clinics= Clinic::where('id', $doctor->clinic_id)->get();
            return $clinics;
        } catch (Exception $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
