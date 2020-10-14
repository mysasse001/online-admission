@extends('layouts.admin.dashboard')
@section('content')
<div class="container-fluid">
    <!-- Info boxes -->
     <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><i class="fa fa-comment" aria-hidden="true"></i></h3>

                                <p>0</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">Messages <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><i class="fa fa-folder" aria-hidden="true"></i> </h3>

                                <p> Submitted Applications</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">

                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="mailto:info@sikritvcblindanddeaf.ac.ke" class="small-box-footer">Email us <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
    <!-- /.row -->
    <div class="row">
      @foreach ($intakes as $intake)
          <h4><a href="{{ route('intake.index') }}">{{ $intake->name }}</a></h4>

          @foreach ($intake->programmes as $key=>$programme)
           @if($programme->programmeuser->count())
           <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Programme</th>
                    <th>Applicants</th>
                    <th>Aplicant List</th>
                </tr>
            </thead>
            <tbody>
             <tr>
                 <td scope="row">{{ $key+1 }}</td>
                 <td>{{ $programme->name }}</td>
                 <td>{{ $programme->programmeuser->count() }}</td>
                 <td><a href="{{ route('programme.application.list',$programme) }}">View List</a></td>

             </tr>

            </tbody>
        </table>
           @endif
          @endforeach
      @endforeach
    </div>
  </div><!--/. container-fluid -->
@endsection
