@extends('layouts.programs')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h3 class="font-weight-bold">Add Programme</h3>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Programme</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<form action="{{ route('programme.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="">Programme Name</label>
        <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror" placeholder=""
            aria-describedby="helpId">
        @error('name')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
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
        <select class="form-control @error('department_id') is-invalid @enderror " name="department_id" id="">
            <option value="">--select department--</option>
            @foreach ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach

        </select>
        @error('department_id')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror

    </div>
    <div class="form-group">
        <label for="">Intake Name</label>
        <select class="form-control @error('intake_id') is-invalid @enderror" name="intake_id" id="">
            <option value="">--select intake name--</option>
            @foreach ($intakes as $intake)
            <option value="{{ $intake->id }}">{{ $intake->name }}</option>
            @endforeach
        </select>
        @error('intake_id')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Academic Year</label>
        <select class="form-control @error('academic_year_id') is-invalid @enderror" name="academic_year_id" id="">
            <option value="">--select Academic Year--</option>
            @foreach ($academicYears as $academicYear)
            <option value="{{ $academicYear->id }}">{{ $academicYear->name }}</option>
            @endforeach
        </select>
        @error('academic_year_id')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Application Deadline</label>
            <select class="form-control @error('application_deadline_id') is-invalid @enderror" name="application_deadline_id" id="">
              <option value="">--select application deadline--</option>
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
            <option value="">--select reporting date--</option>
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
    <input type="text" name="duration" id="" class="form-control" placeholder="" aria-describedby="helpId">
  </div>
  <div class="form-group">
    <label for="">Tuition Fees Per Semester(Kshs)</label>
    <input type="text" name="tuition_fees" id="" class="form-control" placeholder="" aria-describedby="helpId">
  </div>
    <div class="mb-3">
        <label>Entry Requirements </label>
        <textarea name="details" class="textarea @error('details') is-invalid @enderror" placeholder="Programme Details"
            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
        @error('details')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>
        @enderror
    </div>
    <div class="mb-3">
      <label>List specialization(IF ANY) </label>
      <textarea name="specialization" class="textarea @error('details') is-invalid @enderror" placeholder="Programme Details"
          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
      @error('details')
      <div class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </div>
      @enderror
  </div>
    <div class="mr-0 text-right">
        <button name="submit" class="btn btn-primary btn-sm">Save</button>
    </div>
</form>
@endsection
