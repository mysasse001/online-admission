@extends('layouts.app')
@section('content')
<div class="container">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="text-center font-weight-bold">Edit Design Page</h4>
    </div>

<form action="{{route('design.update',['home'=>$home])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div>
        <div class="">
            <div class="form-group">
                <label>Welcome</label>
            <input class="form-control @error('welcome') is-invalid @enderror" name="welcome" id="welcome" placeholder="welcome information" value="{{old('welcome') ?? $home->welcome }}">
                @error('welcome')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Website Name </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="name of organisation" value="{{old('name')  ?? $home->name }}">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Edit Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="johndoe@gmail.com" value="{{old('email')  ?? $home->email  }}" >
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Edit About</label>
            <input type="text" name="about" id="about" class="form-control" placeholder="about the organization"  value="{{old('about')  ?? $home->about }}" >
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Edit Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="address the organization"  value="{{old('address')  ?? $home->address }}" >
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Edit Telephone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" placeholder="+254XXXXXXXX"  value="{{old('telephone')  ?? $home->telephone }}" >
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control" placeholder="facebook url" value="{{old('facebok') ?? $home->facebook }}"  >
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Whatsapp</label>
            <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="whatsapp number"  value="{{old('whatsapp') ?? $home->whatsapp }}"  >
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Twitter</label>
            <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Twitter url" value="{{old('twitter') ?? $home->twitter }}"   >
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Youtube</label>
                <input type="text" name="youtube" id="youtube" class="form-control" placeholder="youtube channel" value={{old('youtube') ?? $home->youtube }}  >
            </div>
        </div>

        <div class="">
            <div class="form-group">
                <label>Website Logo</label>
                <input type="file" name="logo" id="logo" class="form-control-file">
            </div>
        </div>


    </div>

    <div class="float-right">
        <button name="submit" class="btn btn-primary" >Update</button>
    </div>
</form>
</div>
@endsection
