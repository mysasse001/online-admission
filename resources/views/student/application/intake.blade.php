@extends('layouts.student.dashboard')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item ">Programs</li>
            <li class="breadcrumb-item active"><a href="#">Academic Intake</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')



    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Intake Name</th>


        </tr>
    </thead>
    <tbody>
      @foreach ($intakes as $key=>$intake)
      <tr>
        <td scope="row">{{ $key+1 }}</td>
        <td>{{ $intake->name }}</td>
        <td><a href="{{ route('intake.show',$intake) }}">APPLY FOR THIS INTAKE</a></td>
    </tr>
      @endforeach
    </tbody>
</table>
@endsection
