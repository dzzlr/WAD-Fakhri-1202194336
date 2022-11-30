@extends('layouts.main')

@section('container')
    <h4 class="text-center">Edit Vaccine</h4>
    <form action="/vaccine/{{ $data_vaccine->id }}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        @csrf
        <div class="mb-3">
            <label for="vaccineName" class="form-label">Vaccine Name</label>
            <input type="text" class="form-control" name="vaccineName" id="vaccineName" value="{{ $data_vaccine->name }}">
        </div>
        <div class="mb-3">
            <label for="vaccinePrice" class="form-label">Price</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp</span>
                <input type="text" class="form-control" name="vaccinePrice" id="vaccinePrice" value="{{ $data_vaccine->price }}" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="mb-3">
            <label for="vaccineDesc" class="form-label">Description</label>
            <textarea class="form-control" name="vaccineDesc" id="vaccineDesc" rows="3">{{ $data_vaccine->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="vaccineImg" class="form-label">Image</label>
            <input class="form-control" type="file" name="vaccineImg" id="vaccineImg">
        </div>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" name="submit" value="Update">
        </div>
    </form> 
@endsection