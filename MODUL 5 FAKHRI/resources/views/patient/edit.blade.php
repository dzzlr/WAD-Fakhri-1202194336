@extends('layouts.main')

@section('container')
    @php
        $name = DB::table('vaccines')->where('id', $data_patient->vaccine_id)->value('name');
    @endphp
    <h4 class="text-center">Edit {{ $name }} Patient</h4>
    <form action="/patient/{{ $data_patient->id }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="mb-3">
            <label for="vaccineId" class="form-label">Vaccine Id</label>
            <input class="form-control" type="text" name="vaccineID" value="{{ $data_patient->vaccine_id }}" readonly>
        </div>
        <div class="mb-3">
            <label for="patientName" class="form-label">Patient Name</label>
            <input type="text" class="form-control" name="patientName" id="patientName" value="{{ $data_patient->name }}">
        </div>
        <div class="mb-3">
            <label for="patientNIK" class="form-label">NIK</label>
            <input type="text" class="form-control" name="patientNIK" id="patientNIK" value="{{ $data_patient->nik }}">
        </div>
        <div class="mb-3">
            <label for="patientAddr" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="patientAddr" id="patientAddr" value="{{ $data_patient->alamat }}">
        </div>
        <div class="mb-3">
            <label for="patientKTP" class="form-label">KTP</label>
            <input class="form-control" type="file" name="patientKTP" id="patientKTP">
        </div>
        <div class="mb-3">
            <label for="patientPhoNum" class="form-label">No. Hp</label>
            <input type="text" class="form-control" name="patientPhoNum" id="patientPhoNum" value="{{ $data_patient->no_hp }}">
        </div>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
        </div>
    </form>
@endsection