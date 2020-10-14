@extends('layouts.admin.dashboard')
@section('header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
    <li class="breadcrumb-item active">edit {{ $programme->name }}</li>
  </ol>
@endsection
@section('content')
<h4>Edit {{ $programme->name }}</h4>
<form action="{{ route('programme.update',$programme) }}" method="POST">
@csrf
@method('PATCH')
<div class="form-group">
    <label for="">Programme Name</label>
    <input type="text" name="name" id="" value="{{ $programme->name }}" class="form-control" placeholder="" aria-describedby="helpId">
  </div>
  <div class="form-group">
      <label for="">Category</label>
      <select class="form-control" name="category_id" id="">
        <option value="">--select category--</option>
         @foreach ($categories as $category)
             <option value="{{ $category->id }}">{{ $category->name }}</option>
         @endforeach
      </select>
    </div>
  <div class="form-group">
    <label for="">School/Faculty/Institute</label>
    <select class="form-control" name="department_id" id="">
      <option value="">--select department--</option>
       @foreach ($departments as $department)
           <option value="{{ $department->id }}">{{ $department->name }}</option>
       @endforeach
    </select>
  </div>
  <div class="form-group">
      <label for="">Intake Name</label>
      <select class="form-control" name="intake_id" id="">
        <option value="">--select intake name--</option>
         @foreach ($intakes as $intake)
             <option value="{{ $intake->id }}">{{ $intake->name }}</option>
         @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">Academic Year</label>
      <select class="form-control" name="academic_year_id" id="">
        <option value="">--select Academic Year--</option>
         @foreach ($academicYears as $academicYear)
             <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
         @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">Application Deadline</label>
      <input type="date" name="deadline" value="{{ $programme->deadline }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
      <label for="">Reporting Date</label>
      <input type="date" name="reporting" id="" value="{{ $programme->reporting }}" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="mb-3">
        <label>Programme Requirements</label>
      <textarea name="details" class="textarea" placeholder="Programme Details"
                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $programme->details }}</textarea>
    </div>

<div class="text-left">
<button name="submit" class="btn btn-primary btn-small">Update Programme</button>
</div>
</form>
@endsection
