<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->group(function () {

    Route::get('getAllClinics', [ClinicController::class, 'index']);
    Route::get('getClinicAllDoctors/{id}/', [ClinicController::class, 'getClinicAllDoctors']);
    Route::get('getDoctorClinics/{id}/', [DoctorController::class, 'getDoctorClinics']);
    Route::get('getClinicPatient/{id}/', [PatientController::class, 'getClinicPatient']);
    
    Route::post('assignPatientToDoctors', [PatientController::class, 'assignPatientToDoctors']);
    Route::post('logout', [UserController::class, 'logout']);
    
});

Route::post('login', [UserController::class, 'login']);