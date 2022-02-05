@extends('layouts.app')

@section('title', 'Create Fre Account')

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

    <!-- progressbar -->
    <div class="d-none d-lg-block">
        @include('partials.applicant.profile.nav')
    </div>


    <div class="mt-3">

        <fieldset class="p-3  w-100 position-relative m-0">

            <h5 class="font-weight-bold text-center">Education Background</h5>
            The copy/copies of your academic documents should be certified by the issuing institution. If you do not
            have certified copies, you will be required to produce them on registration.
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId">
                <i class="fa fa-plus" aria-hidden="true"></i> Educational Details
            </button>

            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                aria-hidden="true">
                <form id="msform" action="{{route('step3.store')}}" method="POST" class="modal-dialog" role="document"  enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Education Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row h-100">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Examined By</label>
                                        <select class="form-control @error('examined_by_id') is-invalid @enderror"
                                            name="examined_by_id" id="">
                                            <option value="">select</option>
                                            @foreach($examinedBys as $examinedBy)
                                            <option value="{{$examinedBy->id}}">{{$examinedBy->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('examined_by_id')
                                        <span style="color:red">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">System</label>
                                        <select class="form-control @error('education_system_id') is-invalid @enderror"
                                            name="education_system_id" id="">
                                            <option value="">select</option>
                                            @foreach($educationSystems as $educationSystem)
                                            <option value="{{$educationSystem->id}}">{{$educationSystem->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('education_system_id')
                                        <span style="color:red">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>From</label>
                                    <?php $years = range(strftime("%Y", time()),1950); ?>
                                    <select name="from" class="form-control @error('from') is-invalid @enderror">
                                        <option value="">--Select From--<span class="text-red">*</span></option>
                                        <?php foreach($years as $year) : ?>
                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    @error('from')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label>To</label>
                                    <?php $years = range(strftime("%Y", time()),1950); ?>
                                    <select name="to" class="form-control @error('to') is-invalid @enderror">
                                        <option value="">--Select To--<span class="text-red">*</span></option>
                                        <?php foreach($years as $year) : ?>
                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    @error('to')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Institution Name</label>
                                <input type="text" name="institution" id=""
                                    class="form-control @error('institution') is-invalid @enderror" placeholder=""
                                    aria-describedby="helpId">
                                @error('institution')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Course Studied</label>
                                <input type="text" name="course" id=""
                                    class="form-control @error('course') is-invalid @enderror" placeholder=""
                                    aria-describedby="helpId">
                                <small id="helpId" class="text-muted">Type Course studied eg.KSCE,Bsc.Computer
                                    science, Diploma Tourism, Certificate in Management etc Leave out any Apostrophe
                                    (') </small>
                                @error('course')
                                <span style="color:red">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Index No /Reg. no </label>
                                    <input type="text" name="index_no" id=""
                                        class="form-control @error('index_no') is-invalid @enderror" placeholder=""
                                        aria-describedby="helpId">
                                    @error('index_no')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Grade/Score</label>
                                    <input type="text" name="grade_score" id=""
                                        class="form-control @error('grade_score') is-invalid @enderror" placeholder=""
                                        aria-describedby="helpId">
                                    @error('grade_score')
                                    <span style="color:red">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                <div class="field" align="left">
                                    <h3>Upload Certificate(scan it and upload it here)</h3>
                                    <input type="file" id="files" name="certificate" multiple />
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                    <label for="">Name on Certificate</label>
                                    <input type="text" name="name_on_certificate" id="" class="form-control"
                                        placeholder="" aria-describedby="helpId">
                                </div> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="button" id="file-button"
                                class="btn btn-outline-primary btn-block btn-sm px-4 px-sm-5 float-right">
                                <div class="d-inline-flex">
                                    <span id="spinner" class="d-none">
                                        Saving...
                                    
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                          </div>
                                    </span>
                                    <span id="ms-2">Save Education Details</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </form>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Examiner</th>
                    <th>System</th>
                    <th>Institution</th>
                    <th>Course</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Reg/Index No.</th>
                    <th>Grade/Score</th>
                    <th>Certificate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(auth()->user()->educationBackgrounds as $educationBackground)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td> <form action="{{route('educationBackground.delete',$educationBackground)}}" method="POST">
                        @CSRF
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </form></td>
                    <td>{{$educationBackground->examinedBy->name}}</td>
                    <td>{{$educationBackground->educationSystem->name}}</td>
                    <td>{{$educationBackground->institution}}</td>
                    <td>{{$educationBackground->course}}</td>
                    <td>{{$educationBackground->from}}</td>
                    <td>{{$educationBackground->to}}</td>
                    <td>{{$educationBackground->index_no}}</td>
                    <td>{{$educationBackground->grade_score}}</td>
                    <td><a download><img src="{{$educationBackground->certificate}}" style="width:50px;height:50px"></a></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#edit{{$educationBackground->id}}">
                            <i class="fas fa-edit    "></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="edit{{$educationBackground->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="modelTitleId" aria-hidden="true">
                            <form action="{{route('step3.educationBackground.update',$educationBackground)}}" method="POST" enctype="multipart/form-data"
                                class="modal-dialog" role="document">
                                @csrf
                                @method('PATCH')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row h-100">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Examined By</label>
                                                    <select
                                                        class="form-control @error('examined_by_id') is-invalid @enderror"
                                                        name="examined_by_id" id="">
                                                        @if($educationBackground->examined_by_id)
                                                        <option value="{{$educationBackground->examined_by_id}}">
                                                            {{$educationBackground->examinedBy->name}}</option>
                                                        @else
                                                        <option value="">select</option>
                                                        @endif
                                                        @foreach($examinedBys as $examinedBy)
                                                        <option value="{{$examinedBy->id}}">{{$examinedBy->name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('examined_by_id')
                                                    <span style="color:red">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">System</label>
                                                    <select
                                                        class="form-control @error('education_system_id') is-invalid @enderror"
                                                        name="education_system_id" id="">
                                                        @if($educationBackground->education_system_id)
                                                        <option value="{{$educationBackground->education_system_id}}">
                                                            {{$educationBackground->educationSystem->name}}</option>
                                                        @else
                                                        <option value="">select</option>
                                                        @endif
                                                        @foreach($educationSystems as $educationSystem)
                                                        <option value="{{$educationSystem->id}}">
                                                            {{$educationSystem->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('education_system_id')
                                                    <span style="color:red">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>From</label>
                                                <?php $years = range(strftime("%Y", time()),1950); ?>
                                                <select name="from"
                                                    class="form-control @error('from') is-invalid @enderror">
                                                    @if($educationBackground->from)
                                                    <option value="{{$educationBackground->from}}">
                                                        {{$educationBackground->from}}<span class="text-red">*</span>
                                                    </option>
                                                    @else
                                                    <option value="">--Select From--<span class="text-red">*</span>
                                                    </option>
                                                    @endif
                                                    <?php foreach($years as $year) : ?>
                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                @error('from')
                                                <span style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>To</label>
                                                <?php $years = range(strftime("%Y", time()),1950); ?>
                                                <select name="to"
                                                    class="form-control @error('to') is-invalid @enderror">
                                                    @if($educationBackground->to)
                                                    <option value="{{$educationBackground->to}}">
                                                        {{$educationBackground->to}}<span class="text-red">*</span>
                                                    </option>
                                                    @else
                                                    <option value="">--Select To--<span class="text-red">*</span>
                                                    </option>
                                                    @endif
                                                    <?php foreach($years as $year) : ?>
                                                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                @error('to')
                                                <span style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Institution Name</label>
                                            <input type="text" name="institution" id=""
                                                value="{{$educationBackground->institution}}"
                                                class="form-control @error('institution') is-invalid @enderror"
                                                placeholder="" aria-describedby="helpId">
                                            @error('institution')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Course Studied</label>
                                            <input type="text" name="course" id=""
                                                value="{{$educationBackground->course}}"
                                                class="form-control @error('course') is-invalid @enderror"
                                                placeholder="" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Type Course studied
                                                eg.KSCE,Bsc.Computer
                                                science, Diploma Tourism, Certificate in Management etc Leave out any
                                                Apostrophe
                                                (') </small>
                                            @error('course')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="">Index No /Reg. no </label>
                                                <input type="text" name="index_no" id=""
                                                    class="form-control @error('index_no') is-invalid @enderror"
                                                    value="{{$educationBackground->index_no}}" placeholder=""
                                                    aria-describedby="helpId">
                                                @error('index_no')
                                                <span style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Grade/Score</label>
                                                <input type="text" name="grade_score" id=""
                                                    value="{{$educationBackground->grade_score}}"
                                                    class="form-control @error('grade_score') is-invalid @enderror"
                                                    placeholder="" aria-describedby="helpId">
                                                @error('grade_score')
                                                <span style="color:red">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <script
                                                src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
                                            </script>
                                            <div class="field" align="left">
                                                <h3>Upload Certificate</h3>
                                                @if($educationBackground->certificate)
                                                Certificate already uploaded
                                                @endif
                                                <input type="file" id="files" name="certificate" />
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                      <label for="">Name on Certificate</label>
                                      <input type="text" name="name_on_certificate" id="" class="form-control"
                                          placeholder="" aria-describedby="helpId">
                                  </div> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm">Update Education
                                            Details</button>
                                    </div>
                                </div>
                        </div>
                       
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  
    <div class="d-flex align-items-center justify-content-between py-3">
        <a href="{{route('step2')}}" class="btn btn-secondary ">Previous</a>
        <a href="{{route('step4')}}" class="btn btn-primary  ms-2">Next</a>
    </div>
    </fieldset>

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

<!-- Mutistep form code -->
@push('scripts')
<script>
    $(document).ready(function () {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function () {
            current_fs = $(this).parent().parent();
            next_fs = $(this).parent().parent().next();

            //Validation
            if (!validateFieldSet(current_fs)) return;

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function () {

            current_fs = $(this).parent().parent();
            previous_fs = $(this).parent().parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep) {
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width", percent + "%")
        }

        $(".submit").click(function () {
            return false;
        })

        /** 
         * Check if the current fieldset has been filled correctly
         * 
         * @return Boolean (true if filled correctly else false)
         */
        function validateFieldSet(currentFieldset) {

            var inputs = currentFieldset.find('input.required')
            var textareas = currentFieldset.find('textarea.required')
            var selects = currentFieldset.find('select.required')

            var fieldsetValid = true;

            inputs.each(function () {
                let fieldValue = $(this).val();
                if (fieldValue === '' || fieldValue === undefined || fieldValue === null) {
                    $(this).addClass('is-invalid')

                    fieldsetValid = false;
                }
            })

            textareas.each(function () {
                let fieldValue = $(this).val();

                if ($(this).prop('id') == 'description') {
                    console.log(document.getElementById("description").value)
                }

                if (fieldValue === '' || fieldValue === undefined || fieldValue === null) {
                    $(this).addClass('is-invalid')
                    fieldsetValid = false;
                }
            })

            selects.each(function () {

                if ($(this).prop('multiple')) {

                    console.log($(this).val())

                    if (!$(this).val().length) {

                        $(this).addClass('is-invalid')

                        if ($(this).prop('id') == 'types') {

                            $('#types-error-display').removeClass('d-none');

                        }

                        fieldsetValid = false;
                    }

                } else {
                    let fieldValue = $(this).val();
                    if (fieldValue === '' || fieldValue === undefined || fieldValue === null) {
                        $(this).addClass('is-invalid')
                        fieldsetValid = false;
                    }

                }
            })

            return fieldsetValid;
        }

        $("input").focus(function () {
            $(this).removeClass('is-invalid');
        });

        $("select").focus(function () {
            $(this).removeClass('is-invalid');
        })

        $("textarea").focus(function () {
            $(this).removeClass('is-invalid');
        })

    });
</script>
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function (e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function (e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result +
                            "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">Remove image</span>" +
                            "</span>").insertAfter("#files");
                        $(".remove").click(function () {
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
