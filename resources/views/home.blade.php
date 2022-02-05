@extends('layouts.app')
@section('header')
@endsection
@section('content')
@if(auth()->user()->role->name == 'adminstrator')
@include('partials.admin.home')
@endif
@if(auth()->user()->role->name == 'applicant')
@include('partials.applicant.home')
@endif
@endsection
