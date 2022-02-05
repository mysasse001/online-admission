@extends('layouts.programs')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
             <h4 class="font-weight-bold">Education System</h4>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Education System</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  Add Education System
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="{{ route('educationSystem.store') }}" method="POST">
           @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Education System</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="">educationSystem </label>
                  <input type="text" name="name" placeholder="CERTIFICATE,CPA,KACE,KATC,KCPE,KCSE" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
            <th>Name</th>
            <th>Created by</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($educationSystems as $key=>$educationSystem)
        <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $educationSystem->name }}</td>
            <td>
                @if($educationSystem->user_id)
                {{ $educationSystem->user->name }}
                @else
                Not set
                @endif
            </td>
            <td>{{ date('d M, Y',strtotime($educationSystem->created_at)) }}</td>
            <td>{{ date('d M, Y',strtotime($educationSystem->updated_at)) }}</td>
            <td class="justify-content-md-between">
                <a href="{{ route('educationSystem.edit',$educationSystem) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt "></i></a>
               
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$educationSystem->id}}">
    <i class="fas fa-edit    "></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="edit{{$educationSystem->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form class="modal-content" action="{{ route('educationSystem.update',$educationSystem) }}" method="POST">
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
                    <label for="">educationSystem </label>
                    <input type="text" name="name" value="{{$educationSystem->name}}" placeholder="CERTIFICATE,CPA,KACE,KATC,KCPE,KCSE" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-sm">Update</button>
              </div>
          </form>
      </div>
  </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del{{$educationSystem->id}}">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="del{{$educationSystem->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <form action="{{route('educationSystem.delete',$educationSystem)}}" method="POST" class="modal-dialog" role="document">
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
                                Are you sure you want to delete,<b>{{$educationSystem->name}}</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
