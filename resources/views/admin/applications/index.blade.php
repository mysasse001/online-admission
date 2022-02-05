@extends('layouts.admin.applications')
@section('header')
<div class="conten-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h3 class="font-weight-bold">Applications Dashboard</h3>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Applications Dashboard</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    applications dashboard
@endsection