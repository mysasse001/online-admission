<!doctype html>
<html>
    <head>
         {{-- <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashboard/dist/css/adminlte.min.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
     --}}
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style>
            body{
            background: white;
            margin-top:20px;
        }
        .profile-info-list {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }
        .friend-list,
        .img-grid-list {
            margin: -1px;
            list-style-type: none;
        }
        .profile-info-list > li.title {
            font-size: 0.625rem;
            font-weight: 700;
            color: #8a8a8f;
            padding: 0 0 0.3125rem;
        }
        .profile-info-list > li + li.title {
            padding-top: 1.5625rem;
        }
        .profile-info-list > li {
            padding: 0.625rem 0;
        }
        .profile-info-list > li .field {
            font-weight: 700;
        }
        .profile-info-list > li .value {
            color: #666;
        }
        .profile-info-list > li.img-list a {
            display: inline-block;
        }
        .profile-info-list > li.img-list a img {
            max-width: 2.25rem;
            -webkit-border-radius: 2.5rem;
            -moz-border-radius: 2.5rem;
            border-radius: 2.5rem;
        }
        .coming-soon-cover img,
        .email-detail-attachment .email-attachment .document-file img,
        .email-sender-img img,
        .friend-list .friend-img img,
        .profile-header-img img {
            max-width: 100%;
        }
        .table.table-profile th {
            border: none;
            color: #000;
            padding-bottom: 0.3125rem;
            padding-top: 0;
        }
        .table.table-profile td {
            border-color: #c8c7cc;
        }
        .table.table-profile tbody + thead > tr > th {
            padding-top: 1.5625rem;
        }
        .table.table-profile .field {
            color: #666;
            font-weight: 600;
            width: 25%;
            text-align: right;
        }
        .table.table-profile .value {
            font-weight: 500;
        }
        .profile-header {
            position: relative;
            overflow: hidden;
        }
        .profile-header .profile-header-cover {
            background: url(https://bootdey.com/img/Content/bg1.jpg) center no-repeat;
            background-size: 100% auto;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }
        .profile-header .profile-header-cover:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.25) 0, rgba(0, 0, 0, 0.85) 100%);
        }
        .profile-header .profile-header-content,
        .profile-header .profile-header-tab,
        .profile-header-img,
        body .fc-icon {
            position: relative;
        }
        .profile-header .profile-header-tab {
            background: #fff;
            list-style-type: none;
            margin: -1.25rem 0 0;
            padding: 0 0 0 8.75rem;
            border-bottom: 1px solid #c8c7cc;
            white-space: nowrap;
        }
        .profile-header .profile-header-tab > li {
            display: inline-block;
            margin: 0;
        }
        .profile-header .profile-header-tab > li > a {
            display: block;
            color: #000;
            line-height: 1.25rem;
            padding: 0.625rem 1.25rem;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.75rem;
            border: none;
        }
        .profile-header .profile-header-tab > li.active > a,
        .profile-header .profile-header-tab > li > a.active {
            color: #007aff;
        }
        .profile-header .profile-header-content:after,
        .profile-header .profile-header-content:before {
            content: "";
            display: table;
            clear: both;
        }
        .profile-header .profile-header-content {
            color: #fff;
            padding: 1.25rem;
        }
        body .fc th a,
        body .fc-ltr .fc-basic-view .fc-day-top .fc-day-number,
        body .fc-widget-header a {
            color: #000;
        }
        .profile-header-img {
            float: left;
            width: 7.5rem;
            height: 7.5rem;
            overflow: hidden;
            z-index: 10;
            margin: 0 1.25rem -1.25rem 0;
            padding: 0.1875rem;
            -webkit-border-radius: 0.25rem;
            -moz-border-radius: 0.25rem;
            border-radius: 0.25rem;
            background: #fff;
        }
        .profile-header-info h4 {
            font-weight: 500;
            margin-bottom: 0.3125rem;
        }
        .profile-container {
            padding: 1.5625rem;
        }
        @media (max-width: 967px) {
            .profile-header-img {
                width: 5.625rem;
                height: 5.625rem;
                margin: 0;
            }
            .profile-header-info {
                margin-left: 6.5625rem;
                padding-bottom: 0.9375rem;
            }
            .profile-header .profile-header-tab {
                padding-left: 0;
            }
        }
        @media (max-width: 767px) {
            .profile-header .profile-header-cover {
                background-position: top;
            }
            .profile-header-img {
                width: 3.75rem;
                height: 3.75rem;
                margin: 0;
            }
            .profile-header-info {
                margin-left: 4.6875rem;
                padding-bottom: 0.9375rem;
            }
            .profile-header-info h4 {
                margin: 0 0 0.3125rem;
            }
            .profile-header .profile-header-tab {
                white-space: nowrap;
                overflow: scroll;
                padding: 0;
            }
            .profile-container {
                padding: 0.9375rem 0.9375rem 3.6875rem;
            }
            .friend-list > li {
                float: none;
                width: auto;
            }
        }
        .profile-info-list {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }
        .friend-list,
        .img-grid-list {
            margin: -1px;
            list-style-type: none;
        }
        .profile-info-list > li.title {
            font-size: 0.625rem;
            font-weight: 700;
            color: #8a8a8f;
            padding: 0 0 0.3125rem;
        }
        .profile-info-list > li + li.title {
            padding-top: 1.5625rem;
        }
        .profile-info-list > li {
            padding: 0.625rem 0;
        }
        .profile-info-list > li .field {
            font-weight: 700;
        }
        .profile-info-list > li .value {
            color: #666;
        }
        .profile-info-list > li.img-list a {
            display: inline-block;
        }
        .profile-info-list > li.img-list a img {
            max-width: 2.25rem;
            -webkit-border-radius: 2.5rem;
            -moz-border-radius: 2.5rem;
            border-radius: 2.5rem;
        }
        .coming-soon-cover img,
        .email-detail-attachment .email-attachment .document-file img,
        .email-sender-img img,
        .friend-list .friend-img img,
        .profile-header-img img {
            max-width: 100%;
        }
        .table.table-profile th {
            border: none;
            color: #000;
            padding-bottom: 0.3125rem;
            padding-top: 0;
        }
        .table.table-profile td {
            border-color: #c8c7cc;
        }
        .table.table-profile tbody + thead > tr > th {
            padding-top: 1.5625rem;
        }
        .table.table-profile .field {
            color: #666;
            font-weight: 600;
            width: 25%;
            text-align: right;
        }
        .table.table-profile .value {
            font-weight: 500;
        }

        .friend-list {
            padding: 0;
        }
        .friend-list > li {
            float: left;
            width: 50%;
        }
        .friend-list > li > a {
            display: block;
            text-decoration: none;
            color: #000;
            padding: 0.625rem;
            margin: 1px;
            background: #fff;
        }
        .friend-list > li > a:after,
        .friend-list > li > a:before {
            content: "";
            display: table;
            clear: both;
        }
        .friend-list .friend-img {
            float: left;
            width: 3rem;
            height: 3rem;
            overflow: hidden;
            background: #efeff4;
        }
        .friend-list .friend-info {
            margin-left: 3.625rem;
        }
        .friend-list .friend-info h4 {
            margin: 0.3125rem 0;
            font-size: 0.875rem;
            font-weight: 600;
        }
        .friend-list .friend-info p {
            color: #666;
            margin: 0;
        }
            </style>
    </head>
    <body>

<div class="container">
    <div class="row">
        <div class="col-md-3 text-center">
           @foreach($user->profile->images  as $image)
             <img src="{{$image->url}}">
           @endforeach
        </div>
        <div class="col-md-6">
            <h2 class="text-center">MINISTRY OF EDUCATION</h2>
            <h6 class="text-center">STATE DEPARTMENT OF VOCATIONAL & TECHNICAL TRAINING
            </h6>
            <h6 class="text-center">SIKRI TECHNICAL TRAINING INSTITUTE</h6>
            <p class="text-center">FOR THE BLIND AND DEAF</p>
            <p class="text-center">P.O. Box 194 –40222, OYUGIS
                <br>Website: www.sikritvcblindanddeaf.ac.ke
                <br>Email: sikriblinddeaf@yahoo.com/sikriblinddeaf@gmail.com/info@sikritvcblindanddeaf.ac.ke
                <br>Office Cell Phone:  0772 768 777</p>
        </div>
        <div class="col-md-3 text-center">
               {{-- <img src="https://sikritvcblindanddeaf.ac.ke/wp/wp-content/uploads/2019/10/cropped-sikri-6.jpg" style="width:100px"> --}}
        </div


</div>
</div>
<div style="border-style:solid"></div>
<hr>
<p>SIKRITVCBLINDANDDEAF/00{{$user->id}}</p>
<h2 class="font-weight-bold text-center"><u>APPLICATION FORM</u></h2>
<p class="font-weight-bold">PRIMARY INFORMATION</p>
<p>Full Names:{{$user->name}} {{$user->mname}} {{$user->surname}}</p>
<p>Country:{{$user->profile->country->name}} Telephone</b>:<u>{{$user->profile->contact}}  </p>
<p>Email Address{{$user->email}} </p>
<p class="font-weight-bold">BASIC INFORMATION</p>
<p> Birth Day:{{$user->profile->birth}}</p>
<p> Birth Certificate No:{{$user->profile->birth_certificate}}</p>
<p> Identification Number/Passport No:{{$user->profile->identification}}</p>
<p> Nationality:{{$user->profile->nationality}}</p>
<p> Marital Status:{{$user->profile->marital}}</p>
<p> Religion:{{$user->profile->religion}}</p>


<p class="font-weight-bold">EDUCATION BACKGROUND</p>

@if($user->profile->level=='Tertiary')

<p class="text-center">Tertiary Level</p>
<p>Institution Name:{{$user->profile->institution_name}}</p>
{{-- <p>Education System:{{$user->profile->educationSystem->name}}</p> --}}
<p>Course Studied:{{$user->profile->course_studied}}</p>
<p>Index No/Reg No:{{$user->profile->index_exam_reg}}</p>
<p>Grade:{{$user->profile->grade_score}}</p>
<p>Name on certificate:{{$user->profile->name_on_certificate}}</p>
<p>{{date('d-M-Y',strtotime($user->profile->tertiary_year_from))}} -{{date('d-M-Y',strtotime($user->profile->tertiary_year_to))}}</p>

<p class="text-center">Secondary Level</p>
<p>Institution Name:{{$user->profile->secondary_school}}</p>
<p>Index No/Reg No:{{$user->profile->index_number_secondary}}</p>
<p>Grade:{{$user->profile->grade_score_secondary}}</p>
<p>{{date('d-M-Y',strtotime($user->profile->secondary_year_from))}} - {{date('d-M-Y',strtotime($user->profile->secondary_year_to))}}</p>

<p class="text-center">Primary Level</p>
<p>Institution Name:{{$user->profile->primary_school}}</p>
<p>Index No/Reg No:{{$user->profile->index_number_primary}}</p>
<p>Grade:{{$user->profile->grade_score_primary}}</p>
<p>{{date('d-M-Y',strtotime($user->profile->primary_year_from))}} - {{date('d-M-Y',strtotime($user->profile->primary_year_to))}}</p>

@endif
@if($user->profile->level=='Secondary')
<p class="text-center">Secondary Level</p>
<p>Institution Name:{{$user->profile->secondary_school}}</p>
<p>Index No/Reg No:{{$user->profile->index_number_secondary}}</p>
<p>Grade:{{$user->profile->grade_score_secondary}}</p>
<p>{{date('d-M-Y',strtotime($user->profile->secondary_year_from))}} - {{date('d-M-Y',strtotime($user->profile->secondary_year_to))}}</p>

<p class="text-center">Primary Level</p>
<p>Institution Name:{{$user->profile->primary_school}}</p>
<p>Index No/Reg No:{{$user->profile->index_number_primary}}</p>
<p>Grade:{{$user->profile->grade_score_primary}}</p>
<p>{{date('d-M-Y',strtotime($user->profile->primary_year_from))}} - {{date('d-M-Y',strtotime($user->profile->primary_year_to))}}</p>

@endif
@if($user->profile->level=='Primary')
<p class="text-center">Primary Level</p>
<p>Institution Name:{{$user->profile->primary_school}}</p>
<p>Index No/Reg No:{{$user->profile->index_number_primary}}</p>
<p>Grade:{{$user->profile->grade_score_primary}}</p>
<p>{{date('d-M-Y',strtotime($user->profile->primary_year_from))}} - {{date('d-M-Y',strtotime($user->profile->primary_year_to))}}</p>

@endif
<p class="font-weight-bold">WORK EXPERIENCE</p>
<p>Employer Names:{{$user->profile->employer_name}}</p>
<p>Designation:{{$user->profile->designation}}</p>
<p>Duties:{{$user->profile->assignment}}</p>
<p>{{date('d-M-Y',strtotime($user->profile->work_year_from))}} - {{date('d-M-Y',strtotime($user->profile->work_year_to))}}</p>

<p class="font-weight-bold">CONTACT INFORMATION</p>
<p>Alternative Number:{{ $user->profile->alternative_number }}</p>
<p>Postal Code:{{ $user->profile->postal_code }}</p>
<p>Postal Address:{{ $user->profile->postal_address }}  </p>
<p>Town:{{ $user->profile->town }}</p>
<p>County:{{ $user->profile->county }}</p>
<p>Subcounty:{{ $user->profile->sub_county }}</p>
<p>Location:{{ $user->profile->location }}</p>
<p>Landmark:{{ $user->profile->landmark }}</p>
<p class="font-weight-bold">NEXT OF KIN</p>
<p>Full Names:{{ $user->profile->kin_names }}</p>
<p>Relationship{{ $user->profile->relationship }}</p>
<p>Country:{{ $user->profile->kin_country }}</p>
<p>Mobile Number:{{ $user->profile->kin_contact }}</p>
<p>Alternative Mobile Number:{{ $user->profile->kin_alternative_contact }}</p>
<p>Email Address:{{ $user->profile->kin_email }}</p>
<p>Postal Code:{{ $user->profile->kin_postal_code }}</p>
<p>Postal Address:{{ $user->profile->kin_postal_address }}</p>
<p>Town:{{ $user->profile->kin_town }}</p>
<p>Nationality:{{ $user->profile->kin_nationality }}</p>
    </body>
    {{-- <!-- jQuery -->
<script src="{{ asset('dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->s
<script src="{{ asset('dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashboard/dist/js/adminlte.js') }}"></script> --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
