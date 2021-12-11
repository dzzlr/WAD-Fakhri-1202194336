@extends('layouts.main')

@section('container')
    <h4 class="text-center">Input Vaccine</h4>
    <form action="/vaccine" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="vaccineName" class="form-label">Vaccine Name</label>
            <input type="text" class="form-control" name="vaccineName" id="vaccineName">
        </div>
        <div class="mb-3">
            <label for="vaccinePrice" class="form-label">Price</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Rp</span>
                <input type="text" class="form-control" name="vaccinePrice" id="vaccinePrice" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="mb-3">
            <label for="vaccineDesc" class="form-label">Description</label>
            <textarea class="form-control" name="vaccineDesc" id="vaccineDesc" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="vaccineImg" class="form-label">Image</label>
            <input class="form-control" type="file" name="vaccineImg" id="vaccineImg">
        </div>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" name="submit" value="Submit">
        </div>
    </form> 
@endsection