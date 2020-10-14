@extends('layouts.student.dashboard')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item ">Programs</li>
            <li class="breadcrumb-item active"><a href="#">Academic Intake</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')
<h2>Student Admission</h2>
<p>Sikri Tvc Blind and Deaf has diversified academic programmes and specializations for post graduate courses in sciences, applied sciences, technology, humanities, social sciences and the arts.

    Through self-sponsored programmes, invaluable opportunity has been opened to Kenyans and non-citizens to further their education.</p>

<div class="row">
    @foreach($categories as $category)
        <div class="col-md-4">
<div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">{{ $category->name }}</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        Apply for {{ $category->name }} Programmes
        <a href="{{ route('intake-application') }}" class="btn btn-primary">CLICK HERE TO APPLY</a>
    </div>
    <!-- /.card-body -->
  </div>

</div>
@endforeach
</div>

    <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Intake Name</th>


        </tr>
    </thead>
    <tbody>
      @foreach ($intakes as $key=>$intake)
      <tr>
        <td scope="row">{{ $key+1 }}</td>
        <td>{{ $intake->name }}</td>
        <td></td>
    </tr>
      @endforeach
    </tbody>
</table>
@endsection
