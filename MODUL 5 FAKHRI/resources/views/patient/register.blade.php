@extends('layouts.main')

@section('container')
    <h4 class="text-center">Register {{ $data_vaccine->name }} Patient</h4>
    <form action="/patient" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="vaccineId" class="form-label">Vaccine Id</label>
            <input class="form-control" type="text" name="vaccineID" value="{{ $data_vaccine->id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="patientName" class="form-label">Patient Name</label>
            <input type="text" class="form-control" name="patientName" id="patientName">
        </div>
        <div class="mb-3">
            <label for="patientNIK" class="form-label">NIK</label>
            <input type="text" class="form-control" name="patientNIK" id="patientNIK">
        </div>
        <div class="mb-3">
            <label for="patientAddr" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="patientAddr" id="patientAddr">
        </div>
        <div class="mb-3">
            <label for="patientKTP" class="form-label">KTP</label>
            <input class="form-control" type="file" name="patientKTP" id="patientKTP">
        </div>
        <div class="mb-3">
            <label for="patientPhoNum" class="form-label">No. Hp</label>
            <input type="text" class="form-control" name="patientPhoNum" id="patientPhoNum">
        </div>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" name="submit" value="Register">
        </div>
    </form>
@endsection