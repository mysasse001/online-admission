@extends('layouts.admin.dashboard')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">edit {{ $department->name }}</li>
  </ol>
@endsection
@section('content')
<h4>Edit {{ $department->name }}</h4>
<form action="{{ route('department.update',$department) }}" method="POST">
@csrf
@method('PATCH')
<div class="form-group">
  <label for=""></label>
  <input type="text" name="name" value="{{ $department->name }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
</div>
<div class="text-left">
<button name="submit" class="btn btn-primary btn-small">Update department</button>
</div>
</form>
@endsection
