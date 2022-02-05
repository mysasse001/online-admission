@extends('layouts.programs')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">edit {{ $intake->name }}</li>
  </ol>
@endsection
@section('content')
<h4>Edit {{ $intake->name }}</h4>
<form  method="POST">
@csrf
@method('PATCH')
<div class="form-group">
  <label for=""></label>
  <input type="text" name="name" value="{{ $intake->name }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
</div>
<div class="text-left">
<button name="submit" class="btn btn-primary btn-small">Update intake</button>
</div>
</form>
@endsection
