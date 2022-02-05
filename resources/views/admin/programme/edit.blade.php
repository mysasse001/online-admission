@extends('layouts.programs')
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
        @if($programme->category_id)
        <option value="{{$programme->category_id}}">{{$programme->category->name}}</option>
        @else
        <option value="">--select category--</option>
        @endif
         @foreach ($categories as $category)
             <option value="{{ $category->id }}">{{ $category->name }}</option>
         @endforeach
      </select>
    </div>
  <div class="form-group">
    <label for="">School/Faculty/Institute</label>
    <select class="form-control" name="department_id" id="">
      @if($programme->department_id)
      <option value="{{$programme->department_id}}">{{$programme->department->name}}</option>
      @else
      <option value="">--select department--</option>
      @endif
       @foreach ($departments as $department)
           <option value="{{ $department->id }}">{{ $department->name }}</option>
       @endforeach
    </select>
  </div>
  <div class="form-group">
      <label for="">Intake Name</label>
      <select class="form-control" name="intake_id" id="">
        @if($programme->intake_id)
        <option value="{{$programme->intake_id}}">{{$programme->intake->name}}</option>
        @else
        <option value="">--select intake name--</option>
        @endif
         @foreach ($intakes as $intake)
             <option value="{{ $intake->id }}">{{ $intake->name }}</option>
         @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">Academic Year</label>
      <select class="form-control" name="academic_year_id" id="">
        @if($programme->academic_year_id)
        <option value="{{$programme->academic_year_id}}">{{$programme->academicYear->name}}</option>
        @else
        <option value="">--select Academic Year--</option>
        @endif
         @foreach ($academicYears as $academicYear)
             <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
         @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="">Application Deadline</label>
          <select class="form-control @error('application_deadline_id') is-invalid @enderror" name="application_deadline_id" id="">
            @if ($programme->application_deadline_id)
            <option value="{{$programme->application_deadline_id}}">{{$programme->applicationDeadline->name}}</option>
            @else
            <option value="">--select application deadline--</option>
            @endif
            @foreach($applicationDeadlines as $applicationDeadline)
            <option value="{{$applicationDeadline->id}}">{{$applicationDeadline->name}}</option>
            @endforeach
          </select>
      @error('application_deadline_id')
      <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </div>
      @enderror
  </div>
  <div class="form-group">
    <label for="">Reporting Date</label>
        <select class="form-control" name="reporting_date_id" id="">
          @if($programme->reporting_date_id)
          <option value="{{$programme->reporting_date_id}}">{{$programme->reportingDate->name}}</option>
          @else
          <option value="">--select reporting date--</option>
          @endif
          @foreach($reportingDates as $reportingDate)
          <option value="{{$reportingDate->id}}">{{$reportingDate->name}}</option>
          @endforeach
        </select>
    @error('reporting_date_id')
    <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>
<div class="form-group">
  <label for="">Duration(in years)</label>
  <input type="text" name="duration" value="{{$programme->duration}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
</div>
<div class="form-group">
  <label for="">Tuition Fees Per Semester(Kshs)</label>
  <input type="text" name="tuition_fees" id="" value="{{$programme->tuition_fees}}" class="form-control" placeholder="" aria-describedby="helpId">
</div>
  <div class="mb-3">
      <label>Admission Requirements </label>
      <textarea name="details" class="textarea @error('details') is-invalid @enderror" placeholder="Programme Details"
          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$programme->details}}</textarea>
      @error('details')
      <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </div>
      @enderror
  </div>
  <div class="mb-3">
    <label>List specialization(IF ANY) </label>
    <textarea name="specialization" class="textarea @error('details') is-invalid @enderror" placeholder="Programme Details"
        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$programme->specialization}}</textarea>
    @error('details')
    <div class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </div>
    @enderror
</div>

<div class="float-right">
<button name="submit" class="btn btn-primary btn-small">Update Programme</button>
</div>
</form>
@endsection
