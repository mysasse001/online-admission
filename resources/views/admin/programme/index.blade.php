@extends('layouts.programs')
@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h3 class="font-weight-bold">Programmes</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">All Programmes</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
    
<div class="">
    <a href="{{ route('programme.create') }}" class="btn btn-primary btn-sm">Add Programme</a>
    <form action="{{route('programme.index')}}" method="GET" class="form-group">
      <input type="text" name="search" id="" class="form-control" placeholder="search programme" aria-describedby="helpId">
    </form>
</div>
@if($programmes->count())

<div class="table-responsive">

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Programme Name</th>
                <th>School/Faculty/Department</th>
                <th>Intake</th>
                <th>Academic Year</th>
                <th>Application Deadline</th>
                <th>Reporting Date</th>
                <th>Duration(Years)</th>
                <th>Requirements</th>
                <th>Tution Fees Per Semester</th>
                <th>Status</th>
                <th>Actions</th>
    
            </tr>
        </thead>
        <tbody>
            @foreach ($programmes as $key=>$programme)
            <tr>
                <td scope="row">{{ $key+1 }}</td>
                <td>{{ $programme->name }}</td>
                <td>{{ $programme->intake->name }}</td>
                <td>{{ $programme->department->name }}</td>
                <td>{{ $programme->academicYear->name }}</td>
                <td>{{ $programme->applicationDeadline->name }}</td>
                <td>{{ $programme->reportingDate->name }}</td>
                <td>{{$programme->duration}}</td>
                 @if($programme->slug)
                 <td><a href="{{ route('programme.show',['programme'=>$programme->slug]) }}"> View Programme</a></td>
                 @endif
                 <td>{{'KES'.number_format($programme->tuition_fees)}}</td>
                <td class="">
                    @if($programme->status == 'open')
                    <span class="text-success">{{$programme->status}}</span>
                    @endif
                    @if($programme->status == 'closed')
                    <span class="text-danger">{{$programme->status}}</span>
                    @endif
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#change{{$programme->id}}">
                      <i class="fas fa-pen-alt    "></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="change{{$programme->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <form action="{{route('programme.status.update',$programme)}}" method="POST" class="modal-dialog" role="document">
                            @csrf
                            @method('PATCH')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Status</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    @if($programme->status == 'open')
                                    Are you sure you want to <b>close</b> the programme,applicants will not be able to see it and apply for it
                                      <input type="hidden" name="status" id="" value="closed" class="form-control" placeholder="" aria-describedby="helpId">
                                    @endif
                                    @if($programme->status == 'closed')
                                    <input type="hidden" name="status" id="" value="open" class="form-control" placeholder="" aria-describedby="helpId">
                                    Are you sure you want to <b>Open</b> the programme,applicants will not be see it and apply for it
                                    @endif
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </td>

                <td class="d-flex">
                    <a href="{{ route('programme.edit',$programme) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt "></i></a>
                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del{{$programme->id}}">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="del{{$programme->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <form action="{{ route('programme.delete',$programme) }}" method="POST" class="modal-dialog" role="document">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete,<b>{{$programme->name}}</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{$programmes->links()}}
</div>
@else
<p>No programmes added yet</p>
@endif
</div>
@endsection
