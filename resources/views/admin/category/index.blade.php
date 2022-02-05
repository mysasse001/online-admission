@extends('layouts.programs')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-6">
             <h4 class="font-weight-bold">Categories</h4>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                  </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="">Category Name</label>
                  <input type="text" name="name" id="" class="form-control" placeholder="certificate" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">Amount</label>
                    <input type="text" name="amount" id="" class="form-control" placeholder="cost of application" aria-describedby="helpId">
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
            <th>Amount(Cost of application)</th>
            <th>Created by</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key=>$category)
        <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $category->name }}</td>
            <td>{{'KES.'.number_format($category->amount,2)}}</td>
            <td>@if($category->user_id)
                {{ $category->user->name }}
                @else
                Not set
                @endif
            </td>
            <td>{{ date('d M, Y',strtotime($category->created_at)) }}</td>
            <td>{{ date('d M, Y',strtotime($category->updated_at)) }}</td>
            <td class="justify-content-md-between">
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$category->id}}">
    <i class="fas fa-edit    "></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <form class="modal-content" action="{{ route('category.update',$category) }}" method="POST">
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
                    <label for="">Category Name</label>
                    <input type="text" name="name" value="{{$category->name}}" id="" class="form-control" placeholder="category" aria-describedby="helpId">
                  </div>
                  <div class="form-group">
                    <label for="">Amount</label>
                    <input type="text" name="amount" value="{{$category->amount}}" id="" class="form-control" placeholder="price" aria-describedby="helpId">
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
              </div>
          </form>
      </div>
  </div>
           
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del{{$category->id}}">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="del{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <form action="{{ route('category.delete',$category) }}" method="POST" class="modal-dialog" role="document">
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
                                Are you sure you want to delete,<b>{{$category->name}}</b>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger btn-sm" >Confirm</button>
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
