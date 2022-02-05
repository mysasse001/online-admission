@extends('layouts.app')
@section('content')
@if(session()->has('success_message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{session()->get('success_message')}}
</div>
@endif
<div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <h3 class="card-title">
           Edit Application Instructions
          </h3>
          <!-- tools box -->
          
          <!-- /. tools -->
        </div>
        <!-- /.card-header -->
       <div class="card-body pad">
        <form action="{{route('instructions.update',$instruction)}}" method="POST">
            @CSRF
            @METHOD('PATCH')
            <div class="mb-3">
              <textarea name="instruction" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid rgb(221, 221, 221); padding: 10px; display: none;">{{$instruction->instruction}}</textarea>
            </div>
            <div class="float-right">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </form>
      </div>
      </div>
    </div>
    <!-- /.col-->
  </div>
@endsection