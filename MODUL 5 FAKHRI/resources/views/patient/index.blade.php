@extends('layouts.main')

@section('container')
    @if (count($data_patient) == 0)
        <div class="text-center">
            <p class="text-black-50">There is no data...</p>
            <a class="btn btn-primary" href="/patient/choose">Register Patient</a>
        </div>
    @else
        <h4 class="text-center">List Patient</h4>
        <a class="btn btn-primary mb-3" href="/patient/choose">Register Patient</a>
        <table class="table table-striped table-hover">
            <thead class="fw-bold">
                <td>#</td>
                <td>Vaccine</td>
                <td>Name</td>
                <td>NIK</td>
                <td>Alamat</td>
                <td>No. Hp</td>
                <td>Action</td>
            </thead>
            <tbody>
            @php
            $i = 1;
            @endphp
            @foreach ($data_patient as $key=>$row)
                @php
                    $name = DB::table('vaccines')->where('id', $row->vaccine_id)->value('name');
                @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $name }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->nik }}</td>
                    <td>{{ $row->alamat }}</td>
                    <td>{{ $row->no_hp }}</td>
                    <td class="d-flex">
                        <a class="btn btn-warning btn-sm" href="/patient/edit/{{ $row->id }}">Edit</a>
                        <form action="/patient/{{ $row->id }}" method="post">
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