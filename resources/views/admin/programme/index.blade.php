@extends('layouts.admin.dashboard')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active"> Programme</li>
  </ol>
@endsection
@section('content')
<a href="{{ route('programme.create') }}" class="btn btn-primary btn-sm">Add Programme</a>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Programme Name</th>
            <th>programme</th>
            <th>School</th>
            <th>Intake</th>
            <th>Academic Year</th>
            <th>Application deadline</th>
            <th>Reporting date</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($programmes as $key=>$programme)
        <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $programme->name }}</td>
            <td>{{ $programme->intake->name }}</td>
            <td>{{ $programme->academicYear->name }}</td>
            <td>{{ date('d-M-Y',strtotime($programme->deadline)) }}</td>
            <td>{{ date('d-M-Y',strtotime($programme->reporting)) }}</td>
            <td>{{ $programme->deadline }}</td>
            <td>{{ $programme->reporting }}</td>
            <td class="justify-content-md-between">
                {{-- <a href="{{ route('programme.edit',$programme) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt "></i></a> --}}
                <form action="{{ route('programme.delete',$programme) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary btn-sm" name="submit" ><i class="fa fa-trash" aria-hidden="true"></i> </button>
                </form>
            </td>
            <td><a href="{{ route('programme.show',$programme->name) }}" > View requirements</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
