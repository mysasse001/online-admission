@extends('layouts.app')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="font-weight-bold" ><small>Apply for admission to</small> {{$design->name}} </h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="#">Categories</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')
<p>{{$design->name}} has diversified academic programmes and specializations for 
  @foreach($programmeCategories as $category)
  {{$category->name}},
  @endforeach
  .

    Through self-sponsored programmes, invaluable opportunity has been opened to Kenyans and non-citizens to further their education.</p>

<div class="row">
    @foreach($programmeCategories as $category)
        <div class="col-md-4">
<div class="card card-success">
    <div class="card-header">
      <h3 class="card-title">{{ $category->name }}</h3>

      
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        Apply for ({{$category->programmes->count()}}) {{ $category->name }} Programmes
        <a href="{{ route('intake-application',['category'=>$category->name]) }}" class="btn btn-primary">CLICK HERE TO APPLY</a>
    </div>
    <!-- /.card-body -->
  </div>

</div>
@endforeach
</div>

   
@endsection
