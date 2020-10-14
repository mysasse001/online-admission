@extends('layouts.admin.dashboard')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">Categories</li>
  </ol>
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
        @foreach ($categories as $key=>$category)
        <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->user->name }}</td>
            <td>{{ date('d M, Y',strtotime($category->created_at)) }}</td>
            <td>{{ date('d M, Y',strtotime($category->updated_at)) }}</td>
            <td class="justify-content-md-between">
                <a href="{{ route('category.edit',$category) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt "></i></a>
                <form action="{{ route('category.delete',$category) }}" method="POST">
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
