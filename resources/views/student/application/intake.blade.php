@extends('layouts.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="font-weight-bold">{{$category->name}} Programmes</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item "><a href="{{route('apply-admission')}}">Categories</a></li>
            <li class="breadcrumb-item active">{{$category->name}} Programmes</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')
<div class="table-responsive">
  <table class="table table-condensed table-striped table-bordered cDTable dataTable no-footer"
                            id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 15px;" aria-sort="ascending"
                                        aria-label="#: activate to sort column descending">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 113px;"
                                        aria-label="INTAKE NAME: activate to sort column ascending">
                                        INTAKE NAME</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 262px;"
                                        aria-label="PROGRAMME NAME: activate to sort column ascending">
                                        PROGRAMME NAME</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 173px;"
                                        aria-label="SCHOOL/FACULTY/INSTITUTE: activate to sort column ascending">
                                        SCHOOL/FACULTY/INSTITUTE</th>
                                    
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 84px;"
                                        aria-label="ACADEMIC YEAR: activate to sort column ascending">
                                        ACADEMIC YEAR</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 112px;"
                                        aria-label="APPLICATION DEADLINE: activate to sort column ascending">
                                        APPLICATION DEADLINE</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 92px;"
                                        aria-label="REPORTING DATE: activate to sort column ascending">
                                        Duration(Years)</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 134px;"
                                        aria-label="PROGRAMME REQUIREMENTS: activate to sort column ascending">
                                       </th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category->programmes as $key=>$programme)
                                <tr role="row" class="odd">
                                    <td class="sorting_1" align="left">{{ $key+1 }}</td>
                                    <td align="left"><b>{{ $programme->intake->name }}</b></td>
                                    <td align="left">{{ $programme->name }}</td>
                                    <td align="left">{{ $programme->department->name }}</td>
                                    <td align="left">{{ $programme->academicYear->name }}</td>
                                    <td>
                                        @if($programme->application_deadline_id)
                                        {{$programme->applicationDeadline->name  }}
                                        @else
                                        Not set
                                        @endif
                                    </td>
                                    <td align="left">
                                        @if($programme->duration)
                                        {{$programme->duration  }}
                                        @else
                                        Not set
                                        @endif
                                    </td>
                                    <td align="left">
                                        @if($programme->slug)
                                        @if(auth()->user()->role->name == 'applicant')
                                        @if($programme->programmeuser->contains(auth()->user()->id))
                                        Already applied  <a href="{{route('home')}}" class="btn btn-outline-secondary">Check Status</a>
                                        @else
                                        <a href="{{ route('completeApplication',['programme'=>$programme->slug]) }}" class="btn btn-primary btn-sm">APPLY FOR PROGRAMME</a>
                                        @endif
                                       @endif
                                       @if(auth()->user()->role->name == 'adminstrator')
                                       <a href="{{route('programme.edit',$programme)}}" class="btn btn-primary"><i class="fas fa-edit"></i> Programme</a>
                                       @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
</div>
@endsection
