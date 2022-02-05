@extends('layouts.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
             <h4 class="font-weight-bold">Payment Details</h4>
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
<div class="row">
   <div class="col-md-12 mt-8">
    <ul class="list-group">
        <li style="text-transform: uppercase" class="list-group-item">{{$programme->name}}</li>
        <li class="list-group-item">Amount due <strong>{{'KES'.number_format($programme->category->amount,2)}}</strong></li>
        {{-- <li class="list-group-item">Kindly use the following reference number
            <strong>11284222022</strong> when paying
            via mobile payment or in the Bank. This reference will be used to track you application
        </li> --}}
    </ul>
   </div>
</div>
<br><br>
<h3 class="text-center d-flex justify-content-center">Available Payment options</h3>
<br><br>
<div class="row">
    @foreach($paymentOptions as $paymentOption)
    <div class="col-md-4">
        <div class="panel panel-primary text-center pricing">
            <div class="panel-heading ">
                <h4>{{$paymentOption->name}}</h4>
            </div>

            <div class="panel-body">
                <div class="animated infinite pulse">{{$paymentOption->description}}
                </div>
            </div>
                            <ol class="numbered list-group">
                    @foreach($paymentOption->paymentOptionSteps as $index=>$paymentOptionStep)
                    <li class="list-group-item {{$index == 0 ? 'active':''}}">{{$paymentOptionStep->id}}.{{$paymentOptionStep->step}}</li>
                    @endforeach
                </ol>
    </div>
    @endforeach
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