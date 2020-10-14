@extends('layouts.admin.dashboard')
@section('content')
<div class="">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inbox</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Inbox</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="{{ route('admin.message.create') }}" class="btn btn-primary btn-block mb-3">Compose</a>
          <a href="{{ route('admin.message.sent') }}" class="btn btn-primary btn-block mb-3">Sent</a>


          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">

              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach (auth()->user()->messageuser as $message)
                    <tr>


                        <td class="mailbox-name"><a href="{{ route('admin.message.show',$message) }}">{{ $message->user->name }}</a></td>

                        <td class="mailbox-subject"><b><a href="{{ route('admin.message.show',$message) }}">{{ $message->subject }}</a></b> - {{ Str::limit($message->message,50) }}
                        </td>
                        <td class="mailbox-attachment"></td>
                        <td class="mailbox-date">{{ $message->created_at->diffForHumans() }} </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->

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
