@extends('layouts.admin.dashboard')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">educationSystem</li>
  </ol>
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  Add educationSystem
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="{{ route('educationSystem.store') }}" method="POST">
           @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add educationSystem</h5>
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
            <td>{{ $educationSystem->user->name }}</td>
            <td>{{ date('d M, Y',strtotime($educationSystem->created_at)) }}</td>
            <td>{{ date('d M, Y',strtotime($educationSystem->updated_at)) }}</td>
            <td class="justify-content-md-between">
                <a href="{{ route('educationSystem.edit',$educationSystem) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt "></i></a>
                <form action="{{ route('educationSystem.delete',$educationSystem) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary btn-sm" name="submit" ><i class="fa fa-trash" aria-hidden="true"></i> </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
