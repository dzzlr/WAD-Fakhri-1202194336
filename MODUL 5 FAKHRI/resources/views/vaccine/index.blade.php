@extends('layouts.main')

@section('container')
    @if (count($data_vaccine) == 0)
        <div class="text-center">
            <p class="text-black-50">There is no data...</p>
            <a class="btn btn-primary" href="/vaccine/add">Add Vaccine</a>
        </div>
    @else
        <h4 class="text-center">List Vaccine</h4>
        <a class="btn btn-primary mb-3" href="/vaccine/add">Add Vaccine</a>
        <table class="table table-striped table-hover">
            <thead class="fw-bold">
                <td>#</td>
                <td>Name</td>
                <td>Price</td>
                <td>Action</td>
            </thead>
            <tbody>
            @php
            $i = 1;
            @endphp
            @foreach ($data_vaccine as $key=>$row)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->price }}</td>
                    <td class="d-flex">
                        <a class="btn btn-warning btn-sm" href="/vaccine/edit/{{ $row->id }}">Edit</a>
                        <form action="/vaccine/{{ $row->id }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-sm mx-1" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @php
                $i += 1;
                @endphp
            @endforeach
            </tbody>
        </table>
    @endif
@endsection