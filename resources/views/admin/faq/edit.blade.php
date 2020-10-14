@extends('layouts.admin.dashboard')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">edit {{ $faq->title }}</li>
  </ol>
@endsection
@section('content')
<div class="container">

<h4>Edit {{ $faq->title }}</h4>
<form action="{{ route('faq.update',$faq) }}" method="POST">
@csrf
@method('PATCH')
<div class="form-group">
    <label for="">Question</label>
    <input type="text" name="question" value="{{ $faq->question }}" id="" class="form-control" placeholder="question" aria-describedby="helpId">
  </div>
</div>

<div class="">
  <label>Answer </label>
<textarea name="answer" class="textarea" placeholder="Answer"
          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #f01919; padding: 10px;">{{ $faq->answer }}</textarea>
</div>
<div class="text-left">
<button name="submit" class="btn btn-primary btn-small">Update FaQ</button>
</div>
</form>
</div>
@endsection
