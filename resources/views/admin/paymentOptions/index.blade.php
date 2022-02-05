@extends('layouts.app')
@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h3 class="font-weight-bold">Payment Options</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active">Payment Options</li>
              </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  Add Payment Option
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <form action="{{route('paymentOptions.store')}}" method="POST" class="modal-dialog" role="document">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Payment Option</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea class="form-control" name="description" placeholder="short explanation" id="" rows="3"></textarea>
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
                <th>Name</th>
                <th>Description</th>
                <th>Steps</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentOptions as $paymentOption)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$paymentOption->name}}</td>
                <td>{{$paymentOption->description}}</td>
                <td><a href="{{route('paymentOptions.show',$paymentOption)}}" class="btn btn-primary btn-sm">View {{$paymentOption->paymentOptionSteps->count()}} {{$paymentOption->paymentOptionSteps->count() == 1 ? 'step':'steps'}} </a></td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$paymentOption->id}}">
                      <i class="fas fa-edit    "></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="edit{{$paymentOption->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <form action="{{route('paymentOptions.update',$paymentOption->id)}}" method="POST" class="modal-dialog" role="document">
                            @csrf
                            @method('PATCH')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Payment Option</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="">Name</label>
                                      <input type="text" name="name" value="{{$paymentOption->name}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                    </div>
                                    <div class="form-group">
                                      <label for="">Description</label>
                                      <textarea class="form-control" name="description" placeholder="short explanation" id="" rows="3">{{$paymentOption->description}}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#del{{$paymentOption->id}}">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="del{{$paymentOption->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <form action="{{route('paymentOptions.delete',$paymentOption->id)}}" method="POST" class="modal-dialog" role="document">
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
                                    Are you sure you want to delete , <b>{{$paymentOption->name}}</b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
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