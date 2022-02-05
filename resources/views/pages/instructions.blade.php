@extends('layouts.app')
@section('content')
<h3 class="font-weight-bold text-center">Please Read the following Application Guidelines</h3>
<b>Welcome to the {{$design->name}} Online Application System</b>
<br>
<p>{!! $instruction->instruction !!}</p>
@endsection