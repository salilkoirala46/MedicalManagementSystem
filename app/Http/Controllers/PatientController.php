<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\sendEmailDoctor;
use Illuminate\Support\Facades\Mail;

class PatientController extends Controller
{
    public function index(){

    }

    public function getClinicPatient($id){

        try {
            $patients=Patient::where('clinic_id', $id)
                                ->where(function ($query) {
                                    $query->whereNull('doctor_id')
                                        ->orWhere('doctor_id', Auth::user()->id);
                                })->get();
            return $patients;
        } catch (\Exception $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }

    }

    public function assignPatientToDoctors(Request $request){

        try{

            $patients = Patient::where('user_id',$request->user_id)
                        ->update(['doctor_id'=>$request->doctorid]);

            Mail::to('koirala.salu@gmail.com')->send(new sendEmailDoctor("Doctor appointment booked"));

        } catch (Exception $e) {
            // Handle the exception
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
    }
}
