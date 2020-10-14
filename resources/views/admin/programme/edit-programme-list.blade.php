@extends('layouts.admin.dashboard')
@section('content')
<form action="{{ route() }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="">---Select Status --</label>
      <select class="form-control" name="" id="">
        <option value="approved">approved</option>
        <option value="pending">pending</option>
      </select>
    </div>
    <button name="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
