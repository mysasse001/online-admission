@extends('layouts.app')
@section('header')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h3 class="font-weight-bold">{{$paymentOption->name}} Steps</h3>
        </div>
        <div class="col-md-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('paymentOptions')}}">Payment Options</a></li>
                <li class="breadcrumb-item active">{{$paymentOption->name}} Steps</li>
              </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  Add Steps
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <form action="{{route('paymentOption.step.store',$paymentOption)}}" method="POST" class="modal-dialog" role="document">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Step</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="">Step</label>
                  <input type="text" name="step" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
                <th>Step</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paymentOption->paymentOptionSteps as $paymentOptionStep)
            <tr>
                <td scope="row">{{$loop->iteration}}</td>
                <td>{{$paymentOptionStep->step}}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit{{$paymentOptionStep->id}}">
                      <i class="fas fa-edit    "></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="edit{{$paymentOptionStep->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <form action="{{route('paymentOption.step.update',$paymentOptionStep->id)}}" method="POST" class="modal-dialog" role="document">
                            @csrf
                            @method('PATCH')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Step</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                      <label for="">Step</label>
                                      <input type="text" name="step" value="{{$paymentOptionStep->step}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
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
                    <button type="button" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#del{{$paymentOptionStep->id}}">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="del{{$paymentOptionStep->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <form action="{{route('paymentOption.step.delete',$paymentOptionStep->id)}}" method="POST" class="modal-dialog" role="document">
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
                                    Are you sure you want to delete , <b>{{$paymentOptionStep->name}}</b>
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