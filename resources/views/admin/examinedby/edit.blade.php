@extends('layouts.admin.dashboard')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">edit {{ $examinedBy->name }}</li>
  </ol>
@endsection
@section('content')
<h4>Edit {{ $examinedBy->name }}</h4>
<form action="{{ route('examinedBy.update',$examinedBy) }}" method="POST">
@csrf
@method('PATCH')
<div class="form-group">
  <label for=""></label>
  <input type="text" name="name" value="{{ $examinedBy->name }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
</div>
<div class="text-left">
<button name="submit" class="btn btn-primary btn-small">Update examinedBy</button>
</div>
</form>
@endsection
