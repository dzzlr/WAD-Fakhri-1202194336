<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\VaccineController;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/vaccine', [VaccineController::class, "index"]);
Route::get('/vaccine/add', [VaccineController::class, "add"]);
Route::get('/vaccine/edit/{id}', [VaccineController::class, "edit"]);
Route::patch('/vaccine/{id}', [VaccineController::class, "update"]);
Route::delete('/vaccine/{id}', [VaccineController::class, "delete"]);
Route::post('/vaccine', [VaccineController::class, "store"]);
Route::get('/patient', [PatientController::class, "index"]);
Route::get('/patient/choose', [PatientController::class, "choose"]);
Route::get('/patient/choose/{id}', [PatientController::class, "register"]);
Route::get('/patient/edit/{id}', [PatientController::class, "edit"]);
Route::patch('/patient/{id}', [PatientController::class, "update"]);
Route::delete('/patient/{id}', [PatientController::class, "delete"]);
Route::post('/patient', [PatientController::class, "store"]);
