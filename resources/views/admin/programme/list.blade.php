@extends('layouts.programmes')
@section('content')
<div class="container-fluid">
    <div class="row">
        <h4 class="font-weight-bold">{{ $programme->name }}</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Phone no.</th>
                    <th>Application Date</th>
                    <th>Approval</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
             @foreach ($programme->programmeuser as $key=>$user)
             <tr>
                <td scope="row">{{ $key+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->mname }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->profile->contact }}</td>
                <td>{{ $user->pivot->created_at }}</td>
                <td>
                    <form action="{{ route('updateapplication',$programme) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="form-group">
                          <select class="form-control" name="status" id="">
                            <option value="approved">approved</option>
                            <option value="pending">pending</option>
                            <option value="declined">declined</option>
                          </select>
                        </div>
                        <button name="submit" class="btn btn-primary" >Save</button>
                    </form>
                </td>
                <td><a href="{{route('download.user',$user)}}" class="btn btn-primary">Export to pdf</a></td>

            </tr>
             @endforeach



            </tbody>
        </table>
    </div>
</div>
@endsection
