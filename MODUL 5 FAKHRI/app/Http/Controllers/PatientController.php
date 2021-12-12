<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Vaccine;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {
        $data_patient = Patient::all();
        return view('patient.index', [
            "title" => "Patient",
            "data_patient" => $data_patient
        ]);
    }

    public function choose() {
        $data_vaccine = Vaccine::all();
        return view('patient.choose', [
            "title" => "Patient",
            "data_vaccine" => $data_vaccine
        ]);
    }

    public function create($id) {
        $data_patient = Vaccine::find($id);
        return view('patient.register', [
            "title" => "Patient",
            "data_vaccine" => $data_patient
        ]);
    }

    public function save(Request $request) {
        if ($files = $request->file('patientKTP')) {
            $destinationPath = 'img/ktp/';  
            $imageSource = rand(1000, 50000) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imageSource);
        }

        $data_patient = new Patient;
        $data_patient->vaccine_id = $request->vaccineID;
        $data_patient->name = $request->patientName;
        $data_patient->alamat = $request->patientAddr;
        $data_patient->nik = $request->patientNIK;
        $data_patient->image_ktp = $imageSource;
        $data_patient->no_hp = $request->patientPhoNum;
        $data_patient->save();

        return redirect("patient");
    }

    public function update(Request $request, $id) {
        if ($files = $request->file('patientKTP')) {
            $destinationPath = 'img/ktp/';  
            $imageSource = rand(1000, 50000) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imageSource);
        }

        $data_patient = Patient::find($id);
        $data_patient->vaccine_id = $request->vaccineID;
        $data_patient->name = $request->patientName;
        $data_patient->alamat = $request->patientAddr;
        $data_patient->nik = $request->patientNIK;
        $data_patient->image_ktp = $imageSource;
        $data_patient->no_hp = $request->patientPhoNum;
        $data_patient->save();

        return redirect("patient");
    }

    public function edit($id) {
        $data_patient = Patient::find($id);
        return view('patient.edit', [
            "title" => "Patient",
            "data_patient" => $data_patient
        ]);
    }
    
    public function delete($id) {
        $data_patient = Patient::find($id);
        $data_patient->delete();

        return redirect("patient");
    }
}
