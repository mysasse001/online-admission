@extends('layouts.app')
@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h3 class="font-weight-bold">Locations</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Locations</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<p>Location of your campuses</p>
@include('partials.components.success')
@include('partials.components.errors')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
    <i class="fa fa-plus" aria-hidden="true"></i> Location
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <form action="{{route('locations.store')}}" method="POST" class="modal-dialog" role="document">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Location</label>
                    <input type="text" name="location" id="" class="form-control"
                        placeholder="eg.kisumu satellite/campus" aria-describedby="helpId">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
        </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$location->location}}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$location->id}}">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="edit{{$location->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <form action="{{route('locations.update',$location)}}" method="POST" class="modal-dialog" role="document">
                            @csrf
                            @method('PATCH')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Location</label>
                                        <input type="text" name="location" id="" class="form-control" value="{{$location->location}}"
                                            placeholder="eg.kisumu satellite/campus" aria-describedby="helpId">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del{{$location->id}}">
        <i class="fa fa-trash" aria-hidden="true"></i>
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="del{{$location->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <form action="{{route('locations.delete',$location)}}" method="POST" class="modal-dialog" role="document">
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
                      Are you sure you want to delete,<b>{{$location->location}}</b>
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
</div>
@endsection