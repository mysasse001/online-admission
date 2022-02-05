



@extends('layouts.app')


@push('styles')
<link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="{{ asset('default/assets/css/theme.min.css') }}" rel="stylesheet">
<style>
    input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
<style>
    #progressbar .active {
        color: #3b5998
    }

    #progressbar #location-information:before {
        font-family: FontAwesome;
        content: "STEP 1"
    }

    #progressbar #critical-details:before {
        font-family: FontAwesome;
        content: "\f05a"
    }

    #progressbar #units:before {
        font-family: FontAwesome;
        content: "\f00b"
    }

    #progressbar #features:before {
        font-family: FontAwesome;
        content: "\f53f"
    }

    #progressbar #media-information:before {
        font-family: FontAwesome;
        content: "\f87c"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 48px;
        height: 48px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #3b5998
    }

    .progress {
        height: 1rem;
    }

    .progress-bar {
        background-color: #3b5998
    }
</style>
@endpush

@section('content')
<div class="">
    <h4 class="text-center">Update Your Information</h4>
    @if ($errors->any())

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <ul>

            @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="d-none d-lg-block">
        @include('partials.applicant.profile.nav')
    </div>
    <div class="mt-3">
   
        <form action="{{route('step2.store')}}" class="p-3  w-100 position-relative m-0 " id="msform" method="POST" enctype="multipart/form-data">
          @csrf
            <h5 class="text-center">Personal Information</h5>
             <div class="row">
                 <div class="col-md-6">
                     <div class="form-group">
                       <label for="">Applicant Name</label>
                       <input type="text" disabled value="{{auth()->user()->surname}} {{auth()->user()->name}}" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                     </div>
                 </div>
                 <div class="form-group col-md-6">
                   <label for="">Gender :{{auth()->user()->personalInformation->gender}} <span class="text-red">*</span></label>
                   <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="">
                    @if(auth()->user()->personalInformation->gender)
                    <option value="{{auth()->user()->personalInformation->gender}}">{{auth()->user()->personalInformation->gender}}</option>
                    @else
                    <option value="">--select gender--</option>
                    @endif
                     <option value="male">Male</option>
                     <option value="female">Female</option>
                     <option value="other">Other</option>
                   </select>
                   @error('gender')
                   <span class="text-red">{{$message}}</span>
                   @enderror
                 </div>
             </div>
             <div class="row">
             
                    <div class="form-group col-md-4">
                        <?php $days = range(1, 31); ?>
                        <select name="day" class="form-control @error('day') is-invalid @enderror">
                          @if(auth()->user()->personalInformation->day)
                            <option value="{{auth()->user()->personalInformation->day}}">Birth Day :<b>{{auth()->user()->personalInformation->day}}</b> <span class="text-red">*</span></option>
                            @else
                            <option value="">Birth Day  <span class="text-red">*</span></option>
                            @endif
                            <?php foreach($days as $day) : ?>
                            <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                            <?php endforeach; ?>
                        </select>
                        @error('day')
                        <span class="text-red">{{$message}}</span>
                        @enderror
                    </div>
                <div class="form-group col-md-4">
                    <select name="month" class="form-control @error('month') is-invalid @enderror" name="" id="">
                      @if(auth()->user()->personalInformation->month)
                      <option value="{{auth()->user()->personalInformation->month}}">Birth Month :<b>{{auth()->user()->personalInformation->month}}</b> <span class="text-red">*</span></option>
                      @else
                      <option value="">Birth Month  <span class="text-red">*</span></option>
                      @endif
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="Novermber">Novermber</option>
                      <option value="December">December</option>
                    </select>
                    @error('month')
                    <span class="text-red">{{$message}}</span>
                    @enderror
                  </div>
                    <div class="form-group col-md-4">
                        <?php $years = range(strftime("%Y", time()),1950); ?>
                        <select name="year" class="form-control @error('year') is-invalid @enderror">
                          @if(auth()->user()->personalInformation->month)
                          <option value="{{auth()->user()->personalInformation->year}}">Birth Year :<b>{{auth()->user()->personalInformation->year}}</b> <span class="text-red">*</span></option>
                          @else
                          <option value="">Birth Year  <span class="text-red">*</span></option>
                          @endif
                            <?php foreach($years as $year) : ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                            <?php endforeach; ?>
                        </select>
                        @error('year')
                        <span class="text-red">{{$message}}</span>
                        @enderror
                </div>
            </div>
             <div class="row">
                     <div class="col-md-4">
                     <div class="form-group">
                       <label for="">Nationality  <span class="text-red">*</span></label>
                       <input type="text" name="nationality" value="{{auth()->user()->personalInformation->nationality}}" id="" class="form-control @error('nationality') is-invalid @enderror" placeholder="" aria-describedby="helpId">
                       @error('nationality')
                       <span class="text-red">{{$message}}</span>
                       @enderror
                      </div>
                     </div>
                     <div class="col-md-4">
                     <div class="form-group">
                       <label for="">Identification Document</label>
                       <select class="form-control @error('identification_document_id') is-invalid @enderror" name="identification_document_id" id="">
                         @if(auth()->user()->personalInformation->identification_document_id)
                         <option value="{{auth()->user()->personalInformation->identification_document_id}}">{{auth()->user()->personalInformation->identificationDocument->name}}</option>
                         @else
                         <option value="">--select document--</option>
                         @enderror
                        @foreach($identificationDocuments as $id)
                        <option value="{{$id->id}}">{{$id->name}}</option>
                        @endforeach
                       </select>
                       @error('identification_document_id')
                       <span class="text-red">{{$message}}</span>
                       @enderror
                     </div>
                     </div>
                     <div class="col-md-4">
                 <div class="form-group">
                   <label for="">Identification Document No. <span class="text-red">*</span></label>
                   <input type="text" name="identification_document_no" value="{{auth()->user()->personalInformation->identification_document_no}}" id="" class="form-control @error('identification_document_no') is-invalid @enderror" placeholder="" aria-describedby="helpId">
                   @error('identification_document_no')
                   <span class="text-red">{{$message}}</span>
                   @enderror
                 </div>
                     </div>
             </div>
            <div class="row">
                <div class="form-group col-md-6">
                  <label for="">Marital Status:{{auth()->user()->personalInformation->marital}}  <span class="text-red">*</span></label>
                  <select class="form-control @error('marital') is-invalid @enderror" name="marital" id="">
                    @if(auth()->user()->personalInformation->marital)
                    <option value="{{auth()->user()->personalInformation->marital}}">Marital Status:<b>{{auth()->user()->personalInformation->marital}}</b></option>
                    @else
                    <option value="">select status</option>
                    @endif
                    <option value="single">Single</option>
                    <option value="married">Married</option>
                    <option value="divorced">Divorced</option>
                    <option value="separated">Separated</option>
                    <option value="others">Others</option>
                  </select>
                  @error('marital')
                  <span class="text-red">{{$message}}</span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">Religion :{{auth()->user()->personalInformation->religion}} <span class="text-red">*</span></label>
                    <select class="form-control @error('religion') is-invalid @enderror" name="religion" id="">
                      @if(auth()->user()->personalInformation->religion)
                      <option value="{{auth()->user()->personalInformation->religion}}">Religion -<b>{{auth()->user()->personalInformation->religion}}</b></option>
                      @else
                      <option value="">--Select religion--</option>
                      @endif
                      <option value="christian">christian</option>
                      <option value="muslim">Muslim</option>
                      <option value="buddhist">Buddhist</option>
                      <option value="atheist">Atheist</option>
                      <option value="others">Others</option>
                    </select>
                    @error('religion')
                    <span class="text-red">{{$message}}</span>
                    @enderror
                  </div>
            </div>
             <div class="row">
                <div class="col-md-12">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                    <h3>profile picture</h3>

                    @if(auth()->user()->personalInformation->avatar)
                    Profile already uploaded
                    <img src="{{auth()->user()->personalInformation->avatar}}" style="width:50px;height:50px">
                    @endif
                    <div class="field" align="left">
                        <input type="file" id="files" name="avatar"/>
                      </div>
                 </div>
             </div>
              <div class="row">
                <div class="col-md-4">
                <div class="form-group">
                  <label for="">Disability Condition</label>
                  <select class="form-control @error('disability_condition_id') is-invalid @enderror" name="disability_condition_id" id="">
                    @if(auth()->user()->personalInformation->disability_condition_id)
                    <option value="{{auth()->user()->personalInformation->disability_condition_id}}">{{auth()->user()->personalInformation->disabilityCondition->name}}</option>
                    @else
                    <option value="">--select condtion--</option>
                    @endif
                    @foreach($disabilityConditions as $dc)
                    <option value="{{$dc->id}}">{{$dc->name}}</option>
                    @endforeach
                  </select>
                  @error('disability_condition_id')
                  <span class="text-red">{{$message}}</span>
                  @enderror
                </div>
                </div>
                <div class="col-md-4">
                <div class="form-group ">
                  <label for="">Medical Information(If Applicable)</label>
                  <textarea class="form-control" rows="3">{{auth()->user()->personalInformation->medical}}</textarea>
                  @error('medical')
                  <span class="text-red">{{$message}}</span>
                  @enderror
                </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group ">
                    <label for="">Co-curriculum Activities</label>
                    <textarea class="form-control @error('activities') is-invalid @enderror" rows="3">{{auth()->user()->personalInformation->activities}}</textarea>
                    @error('activities')
                    <span class="text-red">{{$message}}</span>
                    @enderror
                  </div>
                  </div>
              </div>
              <div class="float-right">
                <button type="button" id="file-button"
                class="btn btn-outline-primary btn-block btn-sm px-4 px-sm-5 float-right">
                <div class="d-inline-flex">
                    <span id="spinner" class="d-none">
                        Saving...
                    
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Loading...</span>
                          </div>
                    </span>
                    <span id="ms-2">Save Personal Information</span>
                </div>
             </div>
             <div class="d-flex align-items-center justify-content-between py-3 mt-5">
                <a href="step1" class="btn btn-secondary btn-sm">Previous</a>
                <a href="step3" class="btn btn-primary btn-sm">Next</a>
            </div>
        
        </fieldset>
        </div>

</div>
<script>
    const momentButton = document.getElementById('file-button')
    const momentForm = document.getElementById('msform')
    const spinner = document.getElementById('spinner')
    const ms2 = document.getElementById('ms-2')


    if (momentButton) {
        momentButton.addEventListener('click', event => {
            spinner.classList.remove('d-none')
            ms2.classList.add('d-none')

            setTimeout(() => {
                momentForm.submit()
            }, 3)
        })
    }
</script>
<script>
    function visibility3() {
        var x = document.getElementById('login_password');
        if (x.type === 'password') {
            x.type = "text";
            $('#eyeShow').show();
            $('#eyeSlash').hide();
        } else {
            x.type = "password";
            $('#eyeShow').hide();
            $('#eyeSlash').show();
        }
    }
</script>
<script>
    function myFunction() {
        var x = document.getElementById("*passwordbox-id*");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script src="{{ asset('default/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('default/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('default/assets/js/bootstrap.min.js') }}"></script>
@endsection



<!-- Preview Images Scripts -->
@push('scripts')
<script>
    let filesElement = document.getElementById('files')

    let filesPrevewZone = document.getElementById('files-preview')


    filesElement.addEventListener('change', event => {

        files = event.target.files;

        if (files.length > 0) {

            for (let i = 0; i < files.length; i++) {

                const file = files[i];

                let fileReader = new FileReader();

                fileReader.onload = e => {

                    let radioWrapperDiv = document.createElement('div');
                    radioWrapperDiv.setAttribute('class', 'col-md-4 mt-3');

                    let inputElement = document.createElement('input');
                    inputElement.setAttribute('type', 'radio');
                    // inputElement.setAttribute('class', 'd-none');
                    inputElement.setAttribute('name', 'cover_image');
                    inputElement.setAttribute('value', i);
                    inputElement.setAttribute('id', `property-file-input-${i}`)

                    let labelElement = document.createElement('label');
                    labelElement.setAttribute('for', `property-file-input-${i}`)

                    labelElement.onclick = labelClickEvent => {
                        labelClickEvent.target.nextElementSibling.click()
                        target.parentElement().addClass('shadow-sm border')
                    }

                    let imageElement = document.createElement('img');
                    imageElement.setAttribute('src', e.target.result);
                    imageElement.setAttribute('class', 'w-100');

                    labelElement.appendChild(imageElement)
                    radioWrapperDiv.appendChild(labelElement)
                    radioWrapperDiv.appendChild(inputElement)

                    filesPrevewZone.appendChild(radioWrapperDiv)
                }

                fileReader.readAsDataURL(file);
            }
        }
    })
</script>
@endpush



@push('scripts')
<script>
    $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>
@endpush

<!-- FontAweome JS Dependancy for Unicodes used -->
@push('scripts')
<script src="https://kit.fontawesome.com/dbe4660ebe.js" crossorigin="anonymous"></script>
@endpush
