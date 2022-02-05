@extends('layouts.admin.dashboard')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">All Users</li>
  </ol>
@endsection
@section('content')


<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created by</th>
            <th>Created At</th>
            <th>Download</th>
            {{-- <th>Action</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $key=>$user)
        <tr>
            <td scope="row">{{ $key+1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ date('d M, Y',strtotime($user->created_at)) }}</td>
            <td>{{ date('d M, Y',strtotime($user->updated_at)) }}</td>
            <td><a href="{{route('download.user',$user)}}" class="btn btn-primary">Export to pdf</a></td>
            {{-- <td class="justify-content-between">
                <a href="" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt    "></i>pdf</a>
                <form action="" method="">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary btn-sm" name="submit" ><i class="fa fa-trash" aria-hidden="true"></i> </button>
                </form>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
