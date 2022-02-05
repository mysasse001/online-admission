@extends('layouts.programs')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
             <h4 class="font-weight-bold">Reporting Date</h4>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Reporting Date</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  Add Reporting Date
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="{{ route('reportingDate.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Reporting Date</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="">Reporting Date</label>
                  <input type="text" name="name" id="" class="form-control" placeholder="eg.31-January-2022" aria-describedby="helpId">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Reporting Date</th>
            <th>Created by</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reportingDates as $key=>$reportingDate)
        <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $reportingDate->name }}</td>
            <td>
                @if($reportingDate->user_id)
                {{ $reportingDate->user->name }}
                @else
                <p>Not set</p>
                @endif
            </td>
            <td>{{ date('d M, Y',strtotime($reportingDate->created_at)) }}</td>
            <td>{{ date('d M, Y',strtotime($reportingDate->updated_at)) }}</td>
            <td class="justify-content-md-between">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$reportingDate->id}}">
    <i class="fas fa-edit    "></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="edit{{$reportingDate->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form class="modal-content" action="{{ route('reportingDate.update',$reportingDate) }}" method="POST">
              @csrf
              @method('PATCH')
              <div class="modal-header">
                  <h5 class="modal-title">Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="">Reporting Date</label>
                    <input type="text" name="name" value="{{$reportingDate->name}}" id="" class="form-control" placeholder="31-January-2022" aria-describedby="helpId">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </form>
      </div>
  </div>
  

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del{{$reportingDate->id}}">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="del{{$reportingDate->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <form action="{{route('reportingDate.delete',$reportingDate)}}" method="POST" class="modal-dialog" role="document">
                        <div class="modal-content">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                                <h5 class="modal-title">Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete,<b>{{$reportingDate->name}}</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
                            </div>
                        </div>
                    </f>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
