@extends('layouts.student.dashboard')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{ auth()->user()->name }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')
<div class="container-fluid">
    <!-- Info boxes -->
     <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><i class="fa fa-comment" aria-hidden="true"></i></h3>

                                <p>0</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('student.message.index') }}" class="small-box-footer">Messages <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><i class="fa fa-folder" aria-hidden="true"></i> </h3>

                                <p>{{ auth()->user()->programmeuser->count() }} Submitted  {{ auth()->user()->programmeuser->count() == 1 ? 'Application':'Applications' }} </p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-3">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h5>For inquiries</h5>

                                <p>Email to info@sikritvcblindanddeaf.ac.ke</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="mailto:info@sikritvcblindanddeaf.ac.ke" class="small-box-footer">Email us <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <h3>Programmes</h3>

                            <p>{{ $programmes->count() }} {{ $programmes->count() ==1 ? 'programme':'programmes' }}</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="{{ route('home') }}" class="small-box-footer"> View All Programmes <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                </div>
    <!-- /.row -->

    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Application Date</th>
                    <th>Course Applied for</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
              @foreach (auth()->user()->programmeuser as $key=>$programme)
              <tr>
                <td scope="row">{{ $key+1 }}</td>
                <td>{{ date('d-M-Y',strtotime($programme->pivot->created_at)) }}</td>
                <td>{{ $programme->name }}</td>
                <td>{{ $programme->pivot->status }}</td>

                <td>
                </td>
            </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div><!--/. container-fluid -->
@endsection
