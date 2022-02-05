@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{route('design.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="">
            <div class="form-group">
                <label>Welcome</label>
                <input class="form-control @error('welcome') is-invalid @enderror" name="welcome" id="welcome" placeholder="welcome information">
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
                <input type="text" name="name" id="name" class="form-control" placeholder="name of organisation">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Address </label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Address of organization">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>abobut </label>
                <input type="text" name="about" id="about" class="form-control" placeholder="a small description about the organization">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Add Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="johndoe@gmail.com">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Add Telephone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" placeholder="+254XXXXXXXX">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Facebook</label>
                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="facebook url">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Whatsapp</label>
                <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="whatsapp number">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Twitter</label>
                <input type="text" name="twitter" id="twitter" class="form-control" placeholder="Twitter url">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Youtube</label>
                <input type="text" name="youtube" id="youtube" class="form-control" placeholder="youtube channel">
            </div>
        </div>

        <div class="">
            <div class="form-group">
                <label>Website Logo</label>
                <input type="file" name="logo" id="logo" class="form-control-file">
            </div>
        </div>

    </div>

    <div>
        <button name="submit" class="btn btn-primary" >Save</button>
    </div>
</form>
</div>
@endsection
