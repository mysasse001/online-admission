@extends('layouts.admin.dashboard')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">FaQs</li>
  </ol>
@endsection
@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
  Add FaQ
</button>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" action="{{ route('faq.store') }}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Add FaQ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="">Question</label>
                  <input type="text" name="question" id="" class="form-control" placeholder="certificate" aria-describedby="helpId">
                </div>
            </div>
            <div class="mb-3">
                <label>Answer </label>
              <textarea name="answer" class="textarea" placeholder="Answer"
                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
            <th>Question</th>
            <th>Created by</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($faqs as $key=>$faq)
        <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $faq->question }}</td>
            <td>{{ $faq->user->name }}</td>
            <td>{{ date('d M, Y',strtotime($faq->created_at)) }}</td>
            <td>{{ date('d M, Y',strtotime($faq->updated_at)) }}</td>
            <td class="justify-content-md-between">
                <a href="{{ route('faq.edit',$faq) }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt "></i></a>
                <form action="{{ route('faq.delete',$faq) }}" method="POST">
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
