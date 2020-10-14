@extends('layouts.student.dashboard')
@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Compose</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.message.index') }}">Inbox</a></li>
              <li class="breadcrumb-item active">{{ $message->subject }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <a href="{{ route('admin.message.index') }}" class="btn btn-primary btn-block mb-3">Back to Inbox</a>


            <!-- /.card -->
          </div>
          <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Inquiry</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>{{ $message->subject }}</h5>
                <h6>From: {{ $message->user->name }}
                  <span class="mailbox-read-time float-right">{{ $message->created_at->diffForHumans() }}</span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                  <form action="{{ route('admin.message.delete',$message) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                    <i class="far fa-trash-alt"></i></button>
                </form>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                  <i class="fas fa-print"></i></button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">

               <P>{!! $message->message !!}</P>
               <p>
                   @foreach ($message->images as $image)
                       <img src="{{ $image->thumb_url }}" class="w-100">
                   @endforeach
               </p>
               @if($message->reply->count())
               
               @foreach ($message->reply as $reply)
                   <p>{{$reply->message}}</p>
               @endforeach
               
               @endif
               <form action="{{ route('reply.message', $message) }}" method="POST">
                @csrf
                <div class="form-group">
                 <textarea name="message" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Reply</button>
             </form>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer -->
             <div class="card-footer">

             </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
