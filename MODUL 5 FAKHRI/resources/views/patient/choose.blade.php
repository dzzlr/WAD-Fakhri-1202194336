@extends('layouts.main')

@section('container')
    <h4 class="text-center mb-3">List Vaccine</h4>
    <div class="d-flex justify-content-center">
    @foreach ($data_vaccine as $key=>$row)
        <div class="card mx-2" style="width:400px">
            <img src="{{ asset('img/vaccines/'.$row->image) }}" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">{{ $row->name }}</h5>
                <p class="card-text text-muted">{{ $row->price }}</p>
                <p class="card-text">{{ $row->description }}</p>
            </div>
            <div class="card-footer d-grid gap-2">
                <a class="btn btn-primary" href="/patient/choose/{{ $row->id }}">Vaccine Now</a>
            </div>
        </div>
    @endforeach
    </div>
@endsection