@extends('layouts.app')
@section('content')

@if(session()->has('success_message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{session()->get('success_message')}}
</div>
@endif
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  <i class="fa fa-plus" aria-hidden="true"></i> Admin
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <form action="{{route('admin.add')}}" method="POST" class="modal-dialog" role="document">
        @csrf
        @method('PATCH')
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <select class="form-control" name="user_id" id="">
                    <option value="">--Select user--</option>
                    @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}} {{$user->surname}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </div>
    </form>
</div>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Surname</th>
                <th>First/Middle Name</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $user)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->telephone}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->id != 1)
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#del{{$user->id}}">
                        <i class="fa fa-minus" aria-hidden="true"></i> From Admin
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="del{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                          <form action="{{route('admin.remove',$user)}}" method="POST" class="modal-dialog" role="document">
                              @csrf
                              @method('PATCH')
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title">Remove From Admin</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                  </div>
                                  <div class="modal-body">
                                    Are you sure you want to remove <b>{{$user->surname}} {{$user->name}} from being an admin</b>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                    @else
                    <p>This is a super admin cannot be altered</p>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection