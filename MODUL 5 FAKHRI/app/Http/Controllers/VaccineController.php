<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index() {
        $data_vaccine = Vaccine::all();
        return view('vaccine.index', [
            "title" => "Vaccine",
            "data_vaccine" => $data_vaccine
        ]);
    }

    public function create() {
        $data_vaccine = new Vaccine;
        return view('vaccine.add', [
            "title" => "Vaccine",
            "data_vaccine" => $data_vaccine
        ]);
    }

    public function save(Request $request) {
        if ($files = $request->file('vaccineImg')) {
            $destinationPath = 'img/vaccines/';  
            $imageSource = rand(1000, 50000) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imageSource);
        }

        $data_vaccine = new Vaccine;
        $data_vaccine->name = $request->vaccineName;
        $data_vaccine->price = $request->vaccinePrice;
        $data_vaccine->description = $request->vaccineDesc;
        $data_vaccine->image = $imageSource;
        $data_vaccine->save();

        return redirect("vaccine");
    }

    public function update(Request $request, $id) {
        if ($files = $request->file('vaccineImg')) {
            $destinationPath = 'img/vaccines/';  
            $imageSource = rand(1000, 50000) . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $imageSource);
        }

        $data_vaccine = Vaccine::find($id);
        $data_vaccine->name = $request->vaccineName;
        $data_vaccine->price = $request->vaccinePrice;
        $data_vaccine->description = $request->vaccineDesc;
        $data_vaccine->image = $imageSource;
        $data_vaccine->save();

        return redirect("vaccine");
    }

    public function edit($id) {
        $data_vaccine = Vaccine::find($id);
        return view('vaccine.edit', [
            "title" => "Vaccine",
            "data_vaccine" => $data_vaccine
        ]);
    }

    public function delete($id) {
        $data_vaccine = Vaccine::find($id);
        $data_vaccine->delete();

        return redirect("vaccine");
    }

}
