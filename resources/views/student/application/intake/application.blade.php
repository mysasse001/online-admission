@extends('layouts.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
             <h4 class="font-weight-bold">Apply For Course</h4>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{$programme->name}}</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="card mt-8">
    <div class="card-header bg-green">
       <h4>Application Fee Payment</h4>
       <p class="list-group-item-text">
        Below is the summary of the amount you will pay upon proceeding.Payment methods will be presented
        upon completion of the form
    </p>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item ">
                <div class="float-right text-weight-bold">
                   <b> {{$programme->name}}</b>
                </div>
                <div class="float-left">
                    Program Name:
                </div>
            </li>
            <li class="list-group-item">
                <div class="float-left">
                    Intake Period
                </div>
                <div class="float-right" style="color:blue">
                    {{ $programme->intake->name }}---{{ $programme->academicYear->name }}
                </div>
            </li>
            <li class="list-group-item ">
                <div class="float-left">
                    Program Type
                </div>
                <div class="float-right text-weight-bold">
                    <b> {{$programme->category->name}}</b>
                </div>
            </li>
            <li class="list-group-item ">
                <div class="float-left">
                    Period(in years)
                </div>
                <div class="float-right">
                  <b>   {{$programme->duration}} </b>
                </div>
            </li>
            <li class="list-group-item ">Application Fee Amount
                <div class="float-right">
                  <b>  {{'KES.'.number_format($programme->category->amount,2)}}</b>
                </div>
            </li>
            <li class="list-group-item ">Tuition Per Semester
                <div class="float-right">
                  <b>  {{'KES.'.number_format($programme->tuition_fees,2)}}</b>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="card">

    <div class="card-body">
        <form action="{{route('applicaton.store',$programme)}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Applicant Name</label>
              <input type="text" disabled name="user_id" id="" value="{{auth()->user()->surname}} {{auth()->user()->name}}" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="form-group">
              <input type="hidden" name="user_id" value="{{auth()->user()->id}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>

              
            <div class="form-group">
                <label for="">Select Mode of Study</label>
                <select class="form-control @error('mode_of_study_id') is-invalid @enderror" name="mode_of_study_id" id="">
                  <option value="">--select Mode of Study--</option>
                  @foreach($modeOfStudies as $modeOfStudy)
                  <option value="{{$modeOfStudy->id}}">{{$modeOfStudy->name}}</option>
                  @endforeach
                  @error('mode_of_study_id')
                  <span class="text-red">{{$message}}</span>
                   @enderror
                </select>
              </div>
            
            <div class="form-group">
              <label for="">Select Campus</label>
              <select class="form-control @error('location_id') is-invalid @enderror" name="location_id" id="">
                <option value="">--select location to study--</option>
                @foreach($locations as $location)
                <option value="{{$location->id}}">{{$location->location}}</option>
                @endforeach
                @error('location_id')
                <span class="text-red">{{$message}}</span>
                 @enderror
              </select>
            </div>
            <div class="form-group">
              <input type="hidden" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-primary btn-sm">Finalize</button>
            </div>
        </form>
      
    </div>

</div>
<script>
    const momentButton = document.getElementById('file-button')
    const momentForm = document.getElementById('msform')
    const spinner = document.getElementById('spinner')
    const ms2 = document.getElementById('ms-2')


    if (momentButton) {
        momentButton.addEventListener('click', event => {
            spinner.classList.remove('d-none')
            ms2.classList.add('d-none')

            setTimeout(() => {
                momentForm.submit()
            }, 3)
        })
    }
</script>
@endsection