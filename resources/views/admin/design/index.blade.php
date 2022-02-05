@extends('layouts.app')
@section('content')
<div class="container">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-center font-weight-bold">Design Page</h4>
        <a href="{{route('design.edit',1)}}" class="btn btn-primary">Edit Design</a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="">
            </div>

            <div class="mb-3">
                <h4 class="">Welcome Message</h4>
                <span class="text-primary font-weight-bold">{{$home->welcome}}</span>
            </div>

            <div class="mb-3">
                <h4 class="">Organisation/Website Name</h4>
                <span class="text-primary font-weight-bold">{{$home->name}}</span>
            </div>

            <div class="mb-3">
                <h4 class="">Telephone</h4>
                <span class="text-primary font-weight-bold">{{$home->telephone}}</span>
            </div>

            <div class="mb-3">
                <h4 class="">About</h4>
                <span class="text-primary font-weight-bold">{{$home->about}}</span>
            </div>

            <div class="mb-3">
                <h4 class="">Address</h4>
                <span class="text-primary font-weight-bold">{{$home->address}}</span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <h4 class="">Email</h4>
                <span class="text-primary font-weight-bold">{{$home->email}}</span>
            </div>

            <div class="mb-3">
                <h4 class="">Facebook</h4>
                <span class="text-primary font-weight-bold">{{$home->facebook}}</span>
            </div>

            <div class="mb-3">
                <h4 class="">Twitter</h4>
                <span class="text-primary font-weight-bold">{{$home->twitter}}</span>
            </div>

            <div class="mb-3">
                <h4 class="">Youtube</h4>
                <span class="text-primary font-weight-bold">{{$home->youtube}}</span>
            </div>

            <div class="mb-3 d-flex align-items-center">
                <h4 class="">Logo: </h4>
                <p><img src="{{$home->logo}}" width="84px"></p>
            </div>
        </div>
    </div>

</div>
@endsection
