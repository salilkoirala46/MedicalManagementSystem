<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;

class ClinicController extends Controller
{
    public function index(){

        try{
            $clinics=Clinic::all();
            return $clinics;
        }
        catch (\Exception $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
       
    }

    public function getClinicAllDoctors($id){

        try{
            $doctors= Clinic::find($id)->doctors;
            return $doctors;
        }
        catch (\Exception $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }
}
