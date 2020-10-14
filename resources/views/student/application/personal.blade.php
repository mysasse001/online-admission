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
            <li class="breadcrumb-item active">Update your information</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection
@section('content')
<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">PRIMARY INFORMATION</a>
      <a class="nav-item nav-link" id="nav-details-tab" data-toggle="tab" href="#nav-details" role="tab" aria-controls="nav-details" aria-selected="false">BASIC INFORMATION</a>
      <a class="nav-item nav-link" id="nav-education-tab" data-toggle="tab" href="#nav-education" role="tab" aria-controls="nav-education" aria-selected="false">EDUCATION BACKGROUND</a>
      <a class="nav-item nav-link" id="nav-experience-tab" data-toggle="tab" href="#nav-experience" role="tab" aria-controls="nav-experience" aria-selected="false">WORK EXPERIENCE</a>
       <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">CONTACT INFORMATION</a>
     {{-- <a class="nav-item nav-link" id="nav-programme-tab" data-toggle="tab" href="#nav-programme" role="tab" aria-controls="nav-programme" aria-selected="false">PROGRAMME APPLICATION</a> --}}
      <a class="nav-item nav-link" id="nav-programme-tab" data-toggle="tab" href="#nav-programme" role="tab" aria-controls="nav-programme" aria-selected="false">View Full Details</a>



    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <h4 class="font-weight-bold">Account Information</h4>
        <form action="{{ route('education.primary') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Surname</label>
                <input type="text" name="surname"  value="{{ auth()->user()->surname }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Middle Name</label>
                        <input type="text" name="mname" id="" value="{{ auth()->user()->mname }}" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" name="name" id="" value="{{ auth()->user()->name }}" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Country</label>
                    <select class="form-control" name="country_id" id="">
                       @foreach($countries as $country)
                      <option value="{{ $country->id }}">{{ $country->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Mobile No</label>
                        <input type="text" name="contact"
                        value="{{ $user->profile->contact }}"
                         id="" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Email Address</label>
                <input type="text" name="email" value="{{ auth()->user()->email }}"  id="" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
              <div class="text-right">
                  <button name="submit" class="btn btn-primary btn-sm">Update Profile</button>
              </div>
        </form>

    </div>
    <div class="tab-pane fade" id="nav-details" role="tabpanel" aria-labelledby="nav-details-tab">
        <h4 class="font-weight-bold">Personal Information</h4>
        <form action="{{ route('personal.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Applicant SurName</label>
                    <input type="text" name="surname" id="" value="{{   auth()->user()->surname }}" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Help text</small>
                  </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Gender</label>
                  <select class="form-control" name="gender" id="">
                    <option value="{{ $user->profile->gender }}">--select gender--</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for="">Birth Day</label>
                  <input type="date" name="birth" value="{{ old('birth') ?? $user->profile->birth }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Nationality</label>
                    <input type="text" name="nationality" value="{{ old('nationality') ?? $user->profile->nationality }}" id="" class="form-control" placeholder="eg.kenyan" aria-describedby="helpId">
                  </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="">Birth Certificate No *</label>
                    <input type="text" value="{{ old('birth_certificate') ?? $user->profile->birth_certificate }}" name="birth_certificate" id="" class="form-control" placeholder="" aria-describedby="helpId">
                  </div>
            </div>
        </div>
        <div class="form-group">
          <label for="">Passport No/Birth Certificate No *</label>
          <input type="text" value="{{ old('identification') ?? $user->profile->identification }}" name="identification" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Marital Status</label>
                  <select class="form-control" name="marital" id="">
                    <option value="{{ $user->profile->marital }}">--select status--</option>
                    <option value="single">single</option>
                    <option value="married">married</option>
                    <option value="divorced">divorced</option>
                    <option value="separated">separated</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Religion</label>
                  <select class="form-control" name="religion" id="">
                    <option value="{{ $user->profile->religion }}">--select religion--</option>
                    <option value="christian">christian</option>
                    <option value="muslim">muslim</option>
                    <option value="buddhist">buddhist</option>
                    <option value="atheist">atheist</option>
                    <option value="others">others</option>
                  </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Profile Photo</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="images[]" multiple class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>

            </div>
          </div>
          <div class="">
              <button name="submit" class="btn btn-primary btn-sm">Save Personal Information</button>
          </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gender</th>
                    <th>Birth Day</th>
                    <th>Nationality</th>
                    <th>Birth Certificate</th>
                    <th>ID</th>
                    <th>Marital Status</th>
                    <th>Religion</th>
                    <th>Profile</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>{{ $user->profile->gender }}</td>
                    <td>{{ $user->profile->birth }}</td>
                    <td>{{ $user->profile->nationality }}</td>
                    <td>{{$user->profile->birth_certificate}}</td>
                    <td>{{ $user->profile->identification }}</td>
                    <td>{{ $user->profile->marital }}</td>
                    <td>{{ $user->profile->religion }}</td>
                    <td>
                        @foreach ($user->profile->images as $image)
                            <img src="{{ $image->thumb_url }}" style="width:45px;height:45px">
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-education" role="tabpanel" aria-labelledby="nav-education-tab">
        <h4 class="font-weight-bold" >Education Background</h4>
        <h2 class=""><font color="purple"></font></h2>
        <h4>The copy/copies of your academic documents should be certified by the issuing institution. If you do not have certified copies, you will be required to produce them on registration.</h4>
            <form action="{{route('education.store')}}" method="POST">
              @csrf
              @method('PATCH')
                  <div class="form-group">
                    <select class="form-control" name="level">
                      <option value="">--select level of education to proceed--</option>
                      <option value="Tertiary">Tertiary</option>
                      <option value="Secondary">Secondary</option>
                      <option value="Primary">Primary</option>
                      </select
                  </div>
              <div class="float-right">
                <button class="btn btn-primary" name="submit">Level</button>
              </div>
            </form>
       <br></br>


                @if($user->profile->level=='Tertiary')
                <p>
                  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#tertiaryId" aria-expanded="false"
                          aria-controls="tertiaryId">
                      Tertiary Education Lvel
                  </button>
              </p>
              <div class="collapse" id="tertiaryId">
                <form action="{{route('tertiary.details.store')}}" method="post"enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
               <div class="form-group">
                   <label for="">Examined By</label>
                   <select class="form-control" name="examined_by_id" id="">
                     <option value="">--Select Option--</option>
                    @foreach ($examinedBys as $examinedBy)
                    <option value="{{ $examinedBy->id }}">{{ $examinedBy->name }}</option>
                    @endforeach

                   </select>
                 </div>
                 <div class="form-group">
                    <label for="">Education System</label>
                    <select class="form-control" name="education_system_id" id="">
                      <option value="">--Select System--</option>
                       @foreach($educationSystems as $educationSystem)
                      <option value="{{ $educationSystem->id }}">{{ $educationSystem->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Institution Name</label>
                    <input type="text" name="institution_name" value="{{ old('institution_name') ?? $user->profile->institution_name }}" id="" class="form-control" placeholder="type institution attended" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Institution Name
                        Type Institution Attended.Remove any approstrophe eg. St.Mary's High school should be St.Mary High School </small>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Year From</label>
                            <input type="date" name="tertiary_year_from" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Year To</label>
                            <input type="date" name="tertiary_year_to" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          </div>
                      </div>
                  </div>

               <div class="form-group">
                 <label for="">Course Studied</label>
                 <input type="text" name="course_studied" value="{{ old('course_studied') ?? $user->profile->course_studied }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                 <small id="helpId" class="text-muted">Course Studied
                    Type Course studied eg.KSCE,Bsc.Computer science, Diploma Tourism, Certificate in Management etc Leave out any Apostrophe (') </small>
               </div>

               <div class="form-group">
                 <label for="">Index No /Exam Reg. no </label>
                 <input type="text" name="index_exam_reg" id="" value="{{ old('index_exam_reg') ?? $user->profile->index_exam_reg }}" class="form-control" placeholder="" aria-describedby="helpId">
               </div>
               <div class="form-group">
                 <label for="">Grade/score</label>
                 <input type="text" name="grade_score" value="{{ old('grade_score') ?? $user->profile->grade_score }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                 <small id="helpId" class="text-muted">Help text</small>
               </div>
               <div class="form-group">
                <label for="">Name on certificate</label>
                <input type="text" name="name_on_certificate" value="{{ old('name_on_certificate') ?? $user->profile->name_on_certificate }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-muted">Help text</small>
              </div>

              <div class="">
                  <button name="submit" class="btn btn-primary btn-sm">Save Education Details</button>
              </div>
            </form>
              </div>

              {{-- secondary --}}
              <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#secondaryId" aria-expanded="false"
                        aria-controls="secondaryId">
                    Secondary school
                </button>
            </p>
            <div class="collapse" id="secondaryId">
              <form action="{{ route('secondary.details.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
             <div class="row">
                 <div class="col-md-4">
                     <div class="form-group">
                       <label for="">Secondary School</label>
                       <input type="text" name="secondary_school" value="{{ old('secondary_school') ?? $user->profile->secondary_school }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                       <small id="helpId" class="text-muted">Secondary school</small>
                     </div>
                  </div>
                 <div class="col-md-4">
                   <div class="form-group">
                       <label for="">Index Number</label>
                       <input type="text" name="index_number_secondary" value="{{ old('index_number_secondary') ?? $user->profile->index_number_secondary }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                       <small id="helpId" class="text-muted">Secondary school</small>
                     </div>
                 </div>
                 <div class="col-md-4">
                   <div class="form-group">
                       <label for="">Grade/Score</label>
                       <input type="text" name="grade_score_secondary" value="{{ old('grade_score_secondary') ?? $user->profile->grade_score_secondary }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                       <small id="helpId" class="text-muted">Secondary marks</small>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                       <label for="">Year From</label>
                       <input type="date" name="secondary_year_from" value="{{ old('secondary_year_from' ?? $user->profile->secondary_year_from) }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                     </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                       <label for="">Year To</label>
                       <input type="date" name="secondary_year_to" value="{{ old('secondary_year_to' ?? $user->profile->secondary_year_to) }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                     </div>
                 </div>
             </div>
             <div class="form-group">
              <label for="exampleInputFile">Upload Documents/images</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" multiple name="images[]" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
                </div>

              </div>
            </div>
            <div class="">
                <button name="submit" class="btn btn-primary btn-sm">Save Education Details</button>
            </div>
          </form>
            </div>
              {{-- secondary --}}
              {{-- primary --}}
              <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#contentId" aria-expanded="false"
                        aria-controls="contentId">
                    Primary school information
                </button>
            </p>
            <div class="collapse" id="contentId">
              <h4>Add primary school information</h4>
              <form action="{{ route('primary.details.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
               <div class="col-md-4">
                 <div class="form-group">
                   <label for="">Primary School</label>
                   <input type="text" name="primary_school" value="{{ old('primary_school') ?? $user->profile->primary_school }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                   <small id="helpId" class="text-muted">Primary school</small>
                 </div>
              </div>
               <div class="col-md-4">
               <div class="form-group">
                   <label for="">Index Number</label>
                   <input type="text" name="index_number" value="{{ old('index_number') ?? $user->profile->index_number }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                   <small id="helpId" class="text-muted">Primary school</small>
                 </div>
             </div>
             <div class="col-md-4">
               <div class="form-group">
                   <label for="">Grade/Score</label>
                   <input type="text" name="grade_score_primary" value="{{ old('grade_score_primary') ?? $user->profile->grade_score_primary }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                   <small id="helpId" class="text-muted">Primary marks</small>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                   <label for="">Year From</label>
                   <input type="date" name="primary_year_from" id="" class="form-control" placeholder="" aria-describedby="helpId">
                 </div>
             </div>
             <div class="col-md-6">
               <div class="form-group">
                   <label for="">Year To</label>
                   <input type="date" name="primary_year_to" id="" class="form-control" placeholder="" aria-describedby="helpId">
                 </div>
             </div>
         </div>
         <div class="form-group">
          <label for="exampleInputFile">Upload Documents/images</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" multiple name="images[]" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
            </div>

          </div>
        </div>
        <div class="">
            <button name="submit" class="btn btn-primary btn-sm">Save Education Details</button>
        </div>
            </div>
              {{-- primary --}}
          @endif
          @if($user->profile->level=='Secondary')
                 {{-- secondary --}}
                 <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#secondaryId" aria-expanded="false"
                            aria-controls="secondaryId">
                        Secondary school
                    </button>
                </p>
                <div class="collapse" id="secondaryId">
                  <form action="{{ route('secondary.details.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                 <div class="row">
                     <div class="col-md-4">
                         <div class="form-group">
                           <label for="">Secondary School</label>
                           <input type="text" name="secondary_school" value="{{ old('secondary_school') ?? $user->profile->secondary_school }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                           <small id="helpId" class="text-muted">Secondary school</small>
                         </div>
                      </div>
                     <div class="col-md-4">
                       <div class="form-group">
                           <label for="">Index Number</label>
                           <input type="text" name="index_number_secondary" value="{{ old('index_number_secondary') ?? $user->profile->index_number_secondary }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                           <small id="helpId" class="text-muted">Secondary school</small>
                         </div>
                     </div>
                     <div class="col-md-4">
                       <div class="form-group">
                           <label for="">Grade/Score</label>
                           <input type="text" name="grade_score_secondary" value="{{ old('grade_score_secondary') ?? $user->profile->grade_score_secondary }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                           <small id="helpId" class="text-muted">Secondary marks</small>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                           <label for="">Year From</label>
                           <input type="date" name="secondary_year_from" value="{{ old('secondary_year_from' ?? $user->profile->secondary_year_from) }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         </div>
                     </div>
                     <div class="col-md-6">
                       <div class="form-group">
                           <label for="">Year To</label>
                           <input type="date" name="secondary_year_to" value="{{ old('secondary_year_to' ?? $user->profile->secondary_year_to) }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                         </div>
                     </div>
                 </div>
                 <div class="form-group">
                  <label for="exampleInputFile">Upload Documents/images</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" multiple name="images[]" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
                    </div>

                  </div>
                </div>
                <div class="">
                    <button name="submit" class="btn btn-primary btn-sm">Save Education Details</button>
                </div>
              </form>
                </div>
                  {{-- secondary --}}
                  {{-- primary --}}
                  <p>
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#contentId" aria-expanded="false"
                            aria-controls="contentId">
                        Primary school information
                    </button>
                </p>
                <div class="collapse" id="contentId">
                  <h4>Add primary school information</h4>
                  <form action="{{ route('primary.details.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                   <div class="col-md-4">
                     <div class="form-group">
                       <label for="">Primary School</label>
                       <input type="text" name="primary_school" value="{{ old('primary_school') ?? $user->profile->primary_school }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                       <small id="helpId" class="text-muted">Primary school</small>
                     </div>
                  </div>
                   <div class="col-md-4">
                   <div class="form-group">
                       <label for="">Index Number</label>
                       <input type="text" name="index_number" value="{{ old('index_number') ?? $user->profile->index_number }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                       <small id="helpId" class="text-muted">Primary school</small>
                     </div>
                 </div>
                 <div class="col-md-4">
                   <div class="form-group">
                       <label for="">Grade/Score</label>
                       <input type="text" name="grade_score_primary" value="{{ old('grade_score_primary') ?? $user->profile->grade_score_primary }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                       <small id="helpId" class="text-muted">Primary marks</small>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                       <label for="">Year From</label>
                       <input type="date" name="primary_year_from" id="" class="form-control" placeholder="" aria-describedby="helpId">
                     </div>
                 </div>
                 <div class="col-md-6">
                   <div class="form-group">
                       <label for="">Year To</label>
                       <input type="date" name="primary_year_to" id="" class="form-control" placeholder="" aria-describedby="helpId">
                     </div>
                 </div>
             </div>
             <div class="form-group">
              <label for="exampleInputFile">Upload Documents/images</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" multiple name="images[]" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
                </div>

              </div>
            </div>
            <div class="">
                <button name="submit" class="btn btn-primary btn-sm">Save Education Details</button>
            </div>
                </div>
                  {{-- primary --}}

          @endif
          @if($user->profile->level=='Primary')
          <p>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#contentId" aria-expanded="false"
                    aria-controls="contentId">
                Primary school information
            </button>
        </p>
        <div class="collapse" id="contentId">
          <h4>Add primary school information</h4>
          <form action="{{ route('primary.details.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
           <div class="col-md-4">
             <div class="form-group">
               <label for="">Primary School</label>
               <input type="text" name="primary_school" value="{{ old('primary_school') ?? $user->profile->primary_school }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
               <small id="helpId" class="text-muted">Primary school</small>
             </div>
          </div>
           <div class="col-md-4">
           <div class="form-group">
               <label for="">Index Number</label>
               <input type="text" name="index_number" value="{{ old('index_number') ?? $user->profile->index_number }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
               <small id="helpId" class="text-muted">Primary school</small>
             </div>
         </div>
         <div class="col-md-4">
           <div class="form-group">
               <label for="">Grade/Score</label>
               <input type="text" name="grade_score_primary" value="{{ old('grade_score_primary') ?? $user->profile->grade_score_primary }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
               <small id="helpId" class="text-muted">Primary marks</small>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-md-6">
             <div class="form-group">
               <label for="">Year From</label>
               <input type="date" name="primary_year_from" id="" class="form-control" placeholder="" aria-describedby="helpId">
             </div>
         </div>
         <div class="col-md-6">
           <div class="form-group">
               <label for="">Year To</label>
               <input type="date" name="primary_year_to" id="" class="form-control" placeholder="" aria-describedby="helpId">
             </div>
         </div>
     </div>
     <div class="form-group">
      <label for="exampleInputFile">Upload Documents/images</label>
      <div class="input-group">
        <div class="custom-file">
          <input type="file" multiple name="images[]" class="custom-file-input" id="exampleInputFile">
          <label class="custom-file-label"  for="exampleInputFile">Choose file</label>
        </div>

      </div>
    </div>
    <div class="">
        <button name="submit" class="btn btn-primary btn-sm">Save Education Details</button>
    </div>
        </div>
          @endif



          @if($user->profile->level=='Tertiary')
          <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Examined By</th>
                    <th>Education System</th>
                    <th>Institution Name</th>
                    <th>Year From</th>
                    <th>Year To</th>
                    <th>Course Studied</th>
                    <th>Index no/Regno</th>
                    <th>Grade</th>
                    <th>Name on certificate</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td scope="row"></td>
                    <td>{{ $user->profile->examinedBy->name }}</td>
                    <td>{{ $user->profile->educationSystem->name }}</td>
                    <td>{{ $user->profile->institution_name }}</td>
                    <td>{{ $user->profile->tertiary_year_from }}</td>
                    <td>{{ $user->profile->tertiary_year_from }}</td>
                    <td>{{ $user->profile->course_studied }}</td>
                    <td>{{ $user->profile->index_exam_reg }}</td>
                    <td>{{ $user->profile->grade_score }}</td>
                    <td>{{ $user->profile->name_on_certificate }}</td>
                </tr>

            </tbody>
        </table>
        Secondary Information
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Secondary</th>
                    <th>Index Number</th>
                    <th>Grade</th>
                    <th>Year From</th>
                    <th>Year To</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>{{ $user->profile->secondary_school }}</td>
                    <td>{{ $user->profile->index_number_secondary }}</td>
                    <td>{{ $user->profile->grade_score_secondary}}</td>
                    <td>{{ $user->profile->secondary_year_from }}</td>
                    <td>{{ $user->profile->secondary_year_to }}</td>
                </tr>

            </tbody>
        </table>
        Primary Information
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Primary</th>
                    <th>Index Number</th>
                    <th>Grade</th>
                    <th>Year From</th>
                    <th>Year To</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>{{ $user->profile->primary_school }}</td>
                    <td>{{ $user->profile->index_number }}</td>
                    <td>{{ $user->profile->grade_score_primary}}</td>
                    <td>{{ $user->profile->primary_year_from }}</td>
                    <td>{{ $user->profile->primary_year_to }}</td>
                </tr>

            </tbody>
        </table>
          @endif
          @if($user->profile->level=='Secondary')
          Secondary Information
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Secondary</th>
                    <th>Index Number</th>
                    <th>Grade</th>
                    <th>Year From</th>
                    <th>Year To</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>{{ $user->profile->secondary_school }}</td>
                    <td>{{ $user->profile->index_number_secondary }}</td>
                    <td>{{ $user->profile->grade_score_secondary}}</td>
                    <td>{{ $user->profile->secondary_year_from }}</td>
                    <td>{{ $user->profile->secondary_year_to }}</td>
                </tr>

            </tbody>
        </table>
        Primary Information
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Primary</th>
                    <th>Index Number</th>
                    <th>Grade</th>
                    <th>Year From</th>
                    <th>Year To</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>{{ $user->profile->primary_school }}</td>
                    <td>{{ $user->profile->index_number }}</td>
                    <td>{{ $user->profile->grade_score_primary}}</td>
                    <td>{{ $user->profile->primary_year_from }}</td>
                    <td>{{ $user->profile->primary_year_to }}</td>
                </tr>

            </tbody>
        </table>
          @endif
          @if($user->profile->level=='Primary')
          Primary Information
          <table class="table">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Primary</th>
                      <th>Index Number</th>
                      <th>Grade</th>
                      <th>Year From</th>
                      <th>Year To</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td scope="row">1</td>
                      <td>{{ $user->profile->primary_school }}</td>
                      <td>{{ $user->profile->index_number }}</td>
                      <td>{{ $user->profile->grade_score_primary}}</td>
                      <td>{{ $user->profile->primary_year_from }}</td>
                      <td>{{ $user->profile->primary_year_to }}</td>
                  </tr>

              </tbody>
          </table>
          @endif
    </div>
  </div>
    <div class="tab-pane fade" id="nav-experience" role="tabpanel" aria-labelledby="nav-experience-tab">
        <h4 class="font-weight-bold">Work Experience</h4>
        <p class="" style="background-color:green">Please add the details of the Work Experience Here</p>
        <form action="{{ route('work.store') }}" method="POST">
            @csrf
            @method('PATCH')
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label for=""> SurName</label>
                  <input type="text" name="surname" id="" value="{{ auth()->user()->surname }}"  class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="">Middle Name</label>
                  <input type="text" name="mname" id="" value="{{ auth()->user()->mname }}" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="">First Name</label>
                  <input type="text" name="name" value="{{ auth()->user()->name }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
            </div>

        </div>

            <div class="form-group">
                <label for="">Employer Names</label>
                <input type="text" name="employer_name" value="{{ old('employer_name') ?? $user->profile->employer_name }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
              </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Designation</label>
                      <input type="text" name="designation" value="{{old('designation') ?? $user->profile->designation }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Duties</label>
                      <textarea class="form-control" name="assignment" id="" rows="3">{{ old('assignment') ?? $user->profile->assignment }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Year From</label>
                      <input type="date" name="work_year_from" id=""  class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="">Year To</label>
                      <input type="date" name="work_year_to" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                </div>
            </div>
            <div class="">
                <button name="submit" class="btn btn-primary btn-sm">Save Work Experience</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Employer name</th>
                    <th>Designation</th>
                    <th>Nature of assignment</th>
                    <th>Year from</th>
                    <th>Year to</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td>{{ $user->profile->employer_name }}</td>
                    <td>{{ $user->profile->designation }}</td>
                    <td>{{ $user->profile->assignment }}</td>
                    <td>{{ $user->profile->work_year_from }}</td>
                    <td>{{ $user->profile->work_year_to }}</td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        <h4 class="font-weight-bold">Contact Information</h4>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">PERSONAL CONTACTS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">NEXT OF KIN</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">REFERENCE CONTACTS</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-emergency-contact" role="tab" aria-controls="pills-emergency-contact" aria-selected="false">EMERGENCY CONTACTS</a>

        </li> --}}
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <h4 class="font-weight-bold">Only one person contact required</h4>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    @method('PATCH')

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for=""> SurName</label>
                          <input type="text" name="surname" id="" value="{{ auth()->user()->surname }}"  class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="">Middle Name</label>
                          <input type="text" name="mname" id="" value="{{ auth()->user()->mname }}" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="">First Name</label>
                          <input type="text" name="name" value="{{ auth()->user()->name }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                    </div>

                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Country</label>
                      <select class="form-control" name="country_id" id="">
                         @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="text" name="contact" value="{{ auth()->user()->profile->contact }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="">Alternative Contact</label>
                  <input type="text" name="alterntive_contact" id=""  value="{{ old('alterntive_contact') ?? $user->profile->alterntive_contact }}" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                  <label for="">Email Address</label>
                  <input type="text" name="email" id="" value="{{ auth()->user()->email }}" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Postal Address</label>
                            <input type="text" name="postal_address"  value="{{ old('postal_address') ?? $user->profile->postal_address }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Postal Code</label>
                            <input type="text" name="postal_code" value="{{ old('postal_code') ?? $user->profile->postal_code }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Town</label>
                            <input type="text" name="town" value="{{ old('town') ?? $user->profile->town }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                          </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">County</label>
                      <input type="text" name="county" value="{{ old('county') ?? $user->profile->county }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Sub County</label>
                      <input type="text" name="sub_county" value="{{ old('sub_county') ?? $user->profile->sub_county }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Location</label>
                      <input type="text" name="location" value="{{ old('location') ?? $user->profile->location }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="">Sub Location</label>
                      <input type="text" name="sub_location" value="{{ old('sub_location') ?? $user->profile->sub_location }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Landmark</label>
                  <input type="text" name="landmark" id="" value="{{ old('landmark') ?? $user->profile->landmark }}" class="form-control" placeholder="" aria-describedby="helpId">
                </div>

                <div class="form-group">
                  <label for="">Nationality</label>
                  <input type="text" name="nationality" id="" value="{{ old('nationality') ?? $user->profile->nationality }}" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="">
                    <button name="submit" class="btn btn-primary btn-sm">Save Primary Contacts</button>
                </div>
                 </form>

                 <table class="table">
                     <thead>
                         <tr>
                             <th>#</th>
                             <th>Postal Address</th>
                             <th>Postal Code </th>
                             <th>Town</th>
                         </tr>
                     </thead>
                     <tbody>

                         <tr>
                             <td scope="row">1</td>
                             <td>{{ auth()->user()->profile->postal_address }}</td>
                             <td>{{ $user->profile->postal_code }}</td>
                             <td>{{ $user->profile->town }}</td>
                         </tr>
                     </tbody>
                 </table>

            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <form action="{{ route('kin.store') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Full Names *</label>
                              <input type="text" name="kin_names" value="{{ old('kin_names') ?? $user->profile->kin_names }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Relationship</label>
                              <select class="form-control" name="relationship" id="">
                                <option value="">--select relationship--</option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Spouse">Spouse</option>
                                <option value="Brother">Brother</option>
                                <option value="Sister">Sister</option>
                                <option value="Son">Son</option>
                                <option value="Daughter">Daughter</option>
                                <option value="Guardian">Guardian</option>
                                <option value="Other">Other</option>
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Country</label>
                              <input type="text" name="kin_country" value="{{ old('kin_country') ?? $user->profile->kin_country }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Mobile No *</label>
                              <input type="text" name="kin_contact" value="{{ old('kin_contact') ?? $user->profile->kin_contact }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="">Alternative Number</label>
                      <input type="text" name="kin_alternative_number" id=""  value="{{ old('kin_alternative_number') ?? $user->profile->kin_alternative_number }}" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Email Address</label>
                      <input type="text" name="kin_email" id=""  value="{{ old('kin_email') ?? $user->profile->kin_email }}" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Postal Code</label>
                              <input type="text" name="kin_postal_code" value="{{ old('kin_postal_code') ?? $user->profile->kin_postal_code }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Postal Address</label>
                              <input type="text" name="kin_postal_address" value="{{ old('kin_postal_address') ?? $user->profile->kin_postal_address }}"  id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Town</label>
                              <input type="text" name="kin_town" value="{{ old('kin_town') ?? $user->profile->kin_town }}" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nationality</label>
                        <input type="text" name="kin_nationality" id="" value="{{ old('kin_nationality') ?? $user->profile->kin_nationality }}" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                    <div class="">
                        <button name="submit" class="btn btn-primary btn-sm">Save Next of Kin Contacts</button>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full names</th>
                            <th>Relationship</th>
                            <th>Country</th>
                            <th>Mobile No</th>
                            <th>Email Address</th>
                            <th>Postal Code</th>
                            <th>Postal Address</th>
                            <th>Town</th>
                            <th>Nationality</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">1</td>
                            <td>{{ $user->profile->kin_names }}</td>
                            <td>{{ $user->profile->relationship }}</td>
                            <td>{{ $user->profile->kin_country }}</td>
                            <td>{{ $user->profile->kin_contact }}</td>
                            <td>{{ $user->profile->kin_email }}</td>
                            <td>{{ $user->profile->kin_postal_code }}</td>
                            <td>{{ $user->profile->kin_postal_address }}</td>
                            <td>{{ $user->profile->kin_town }}</td>
                            <td>{{ $user->profile->kin_nationality }}</td>
                        </tr>
                        <tr>
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <h4 class="font-weight-bold">Two Academic Referee Contacts required</h4>
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="">
                            <div class="form-group">
                              <label for="">Full Names *</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Country</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Mobile No *</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="">Email Address</label>
                      <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Postal Code</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Postal Address</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Town</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nationality</label>
                        <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                    <div class="">
                        <button name="submit" class="btn btn-primary btn-sm">Save Next of Kin Contacts</button>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-emergency-contact" role="tabpanel" aria-labelledby="pills-emergency-contact-tab">
                <h4 class="font-weight-bold">Emergency contacts</h4>
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="">
                            <div class="form-group">
                              <label for="">Full Names *</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Country</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Mobile No *</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="">Email Address</label>
                      <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Postal Code</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Postal Address</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Town</label>
                              <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nationality</label>
                        <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      </div>
                    <div class="">
                        <button name="submit" class="btn btn-primary btn-sm">Save Next of Kin Contacts</button>
                    </div>
                </form>
            </div> --}}

        </div>
    </div>
    <div class="tab-pane fade" id="nav-programme" role="tabpanel" aria-labelledby="nav-programme-tab">
        @if(auth()->user()->profile)
        Make sure your profile is complete . It is important to ensure the information you have provided is accurate as processing of your application will solely rely and on this data.

        If satisfied with your profile, proceed to <a href="{{ route('apply-admission') }}" >programme</a> selection.
        <a href="{{ route('student.pdf') }}" class="btn btn-primary">View Full Details</a>
        @endif
    </div>

</div>
@endsection
@section('script')

@endsection
