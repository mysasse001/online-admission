@extends('layouts.programs')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
             <h4 class="font-weight-bold">Intakes</h4>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Intakes</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  Add Intake Name
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="{{ route('intake.store') }}" method="POST">
           @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Intake Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="">Intake Name </label>
                  <input type="text" name="name" placeholder="SEPTEMBER- <?php echo(date('Y')) ?> INTAKE" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
        @foreach ($intakes as $key=>$intake)
        <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $intake->name }}</td>
            <td>
                @if($intake->user_id)
                {{ $intake->user->name }}
                 @else
                 <p>Not set</p>
                 @endif
            </td>
            <td>{{ date('d M, Y',strtotime($intake->created_at)) }}</td>
            <td>{{ date('d M, Y',strtotime($intake->updated_at)) }}</td>
            <td class="d-flex">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$intake->id}}">
                    <i class="fas fa-edit    "></i>
                  </button>
                  
                  <!-- Modal -->
                  <div class="modal fade" id="edit{{$intake->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <form class="modal-content" action="{{ route('intake.update',$intake) }}" method="POST">
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
                                    <label for="">Intake Name </label>
                                    <input type="text" name="name" value="{{$intake->name}}" placeholder="SEPTEMBER- <?php echo(date('Y')) ?> INTAKE" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del{{$intake->id}}">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="del{{$intake->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <form action="{{ route('intake.delete',$intake) }}" method="POST" class="modal-dialog" role="document">
                        @csrf
                        @method('DELETE')
                         <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Del</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete,<b>{{$intake->name}}</b>
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
@endsection
