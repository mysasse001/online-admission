@extends('layouts.programs')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
             <h4 class="font-weight-bold">Academmic Year</h4>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Academmic Year</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  Add Academic Year
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="{{ route('academic-year.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Academic Year</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="">Academic Year </label>
                  <input type="text" name="name" placeholder="<?php echo date("Y",strtotime("-1 year"));?>-<?php echo(date('Y'))?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
        @foreach ($academicYears as $key=>$academicYear)
        <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $academicYear->name }}</td>
            <td>
                @if($academicYear->user_id)
                {{ $academicYear->user->name }}
                @else
                Not set
                @endif
            </td>
            <td>{{ date('d M, Y',strtotime($academicYear->created_at)) }}</td>
            <td>{{ date('d M, Y',strtotime($academicYear->updated_at)) }}</td>
            <td class="d-flex">
          
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$academicYear->id}}">
    <i class="fas fa-edit    "></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="edit{{$academicYear->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form class="modal-content"action="{{ route('academicYear.update',$academicYear) }}"  method="POST">
              @csrf
              @method('PATCH')
              <div class="modal-header">
                  <h5 class="modal-title">Add Academic Year</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                    <label for="">Academic Year </label>
                    <input type="text" name="name" value="{{$academicYear->name}}" placeholder="<?php echo date("Y",strtotime("-1 year"));?>-<?php echo(date('Y'))?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del{{$academicYear->id}}">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="del{{$academicYear->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <form action="{{ route('academic-year.delete',$academicYear) }}" method="POST" class="modal-dialog" role="document">
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
                                Are you sure you want to delete,<b>{{$academicYear->name}}</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
