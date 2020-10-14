@extends('layouts.student.dashboard')

@section('content')
<style>
    body{
    background: #eaeaea;
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
<div class="container">
    <div id="content" class="content p-0">
        <div class="profile-header">
            <div class="profile-header-cover"></div>

            <div class="profile-header-content">
                <div class="profile-header-img">
                    @foreach($user->profile->images as $image)
                    <img src="{{$image->url}}" alt="" />
                    @endforeach
                </div>

                <div class="profile-header-info">
                    <h4 class="m-t-sm">{{$user->name}} {{$user->mname}} {{$user->surname}}</h4>
                    @foreach(auth()->user()->programmeuser as $programme)
                    <p class="m-b-sm">{{$programme->name}}</p>
                    @endforeach
                    <a href="{{route('application.create')}}" class="btn btn-xs btn-primary mb-3">Edit Profile</a>
                </div>
            </div>

            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile-post" class="nav-link" data-toggle="tab"></a></li>
                <li class="nav-item"><a href="#profile-about" class="nav-link active show" data-toggle="tab"></a></li>
                <li class="nav-item"><a href="#profile-photos" class="nav-link" data-toggle="tab"></a></li>
                <li class="nav-item"><a href="#profile-videos" class="nav-link" data-toggle="tab"></a></li>
                <li class="nav-item"><a href="#profile-friends" class="nav-link" data-toggle="tab"></a></li>
                {{-- <li class="nav-item"><a href="{{route('student.pdf')}}" class="btn btn-primary" >Download</a> --}}
                </li>
            </ul>
        </div>

        <div class="profile-container">
            <div class="row row-space-20">
                <div class="col-md-8">
                    <div class="tab-content p-0">
                        <div class="tab-pane active show" id="profile-about">
                            <table class="table table-profile">
                                <thead>
                                    <tr>
                                        <th colspan="2">WORK AND EDUCATION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="field">Work</td>
                                        <td class="value">
                                            <div class="m-b-5">
                                                <b>{{$user->profile->employer_name}}({{date('d-M-Y',strtotime($user->profile->work_year_from))}}-{{date('d-M-Y',strtotime($user->profile->work_year_to))}})</b> <a href="{{route('application.create')}}" class="m-l-10">Edit</a><br />
                                                <span class="text-muted">{{$user->profile->designation}}</span>
                                            </div>
                                            <div>
                                                <b>Duties</b> <a href="{{route('application.create')}}" class="m-l-10">Edit</a><br />
                                                <span class="text-muted">{{$user->profile->assignment}}</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Education</td>
                                        <td class="value">
                                          @if($user->profile->level=='Tertiary')
                                          <div class="m-b-5">
                                            <b>Tertiary ({{date('d-M-Y',strtotime($user->profile->tertiary_year_from))}}-{{date('d-M-Y',strtotime($user->profile->tertiary_year_to))}})</b> <a href="#" class="m-l-10">Edit</a><br />
                                            <span class="text-muted">{{$user->profile->institution_name}}</span>
                                        </div>
                                        <div>
                                            <b>High School ({{date('d-M-Y',strtotime($user->profile->secondary_year_from))}}-{{date('d-M-Y',strtotime($user->profile->secondary_year_to))}})</b> <a href="#" class="m-l-10">Edit</a><br />
                                            <span class="text-muted">{{$user->profile->secondary_school}}</span>
                                        </div>
                                        <div>
                                            <b>Primary  School ({{date('d-M-Y',strtotime($user->profile->primary_year_from))}}-{{date('d-M-Y',strtotime($user->profile->primary_year_from))}})</b> <a href="#" class="m-l-10">Edit</a><br />
                                            <span class="text-muted">{{$user->profile->primary_school}}</span>
                                        </div>
                                          @endif
                                          @if($user->profile->level=='Secondary')

                                        <div class="m-b-5">
                                            <b>High School ({{date('d-M-Y',strtotime($user->profile->secondary_year_from))}}-{{date('d-M-Y',strtotime($user->profile->secondary_year_to))}})</b> <a href="#" class="m-l-10">Edit</a><br />
                                            <span class="text-muted">{{$user->profile->secondary_school}}</span>
                                        </div>
                                        <div>
                                            <b>Primary  School ({{date('d-M-Y',strtotime($user->profile->primary_year_from))}}-{{date('d-M-Y',strtotime($user->profile->primary_year_from))}})</b> <a href="#" class="m-l-10">Edit</a><br />
                                            <span class="text-muted">{{$user->profile->primary_school}}</span>
                                        </div>
                                          @endif
                                          @if($user->profile->level=='Primary')
                                          <div>
                                            <b>Primary  School ({{date('d-M-Y',strtotime($user->profile->primary_year_from))}}-{{date('d-M-Y',strtotime($user->profile->primary_year_from))}})</b> <a href="#" class="m-l-10">Edit</a><br />
                                            <span class="text-muted">{{$user->profile->primary_school}}</span>
                                        </div>
                                          @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table class="table table-profile">
                                <thead>
                                    <tr>
                                        <th colspan="2">CONTACT INFORMATION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="field">Mobile Phones</td>
                                        <td class="value">
                                          {{$user->profile->country->name}} {{$user->profile->contact}}  {{$user->profile->alternative_contact}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Email</td>
                                        <td class="value">
                                            {{$user->email}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Postal Address</td>
                                        <td class="value">
                                           {{$user->profile->postal_address}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Postal Code</td>
                                        <td class="value">
                                            {{auth()->user()->profile->postal_code}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Town</td>
                                        <td class="value">
                                            {{$user->profile->town}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">County</td>
                                        <td class="value">
                                            {{$user->profile->county}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Sub Count</td>
                                        <td class="value">
                                             {{$user->profile->sub_County}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Location</td>
                                        <td class="value">
                                            {{$user->profile->location}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Sub-Location</td>
                                        <td class="value">
                                            {{$user->profile->sub_location}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Landmark</td>
                                        <td class="value">
                                            {{$user->profile->landmark}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-profile">
                                <thead>
                                    <tr>
                                        <th colspan="2">BASIC INFORMATION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="field">Birth of Date</td>
                                        <td class="value">
                                            {{$user->profile->birth}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Gender</td>
                                        <td class="value">
                                            {{$user->profile->gender}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Nationality</td>
                                        <td class="value">
                                            {{$user->profile->nationality}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Birth Certificate</td>
                                        <td class="value">
                                            {{$user->profile->birth_certificate}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Identification Number/Passport No</td>
                                        <td class="value">
                                            {{$user->profile->identification}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Marital Status</td>
                                        <td class="value">
                                            {{$user->profile->marital}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="field">Religion</td>
                                        <td class="value">
                                            {{$user->profile->religion}}
                                            <a href="{{route('application.create')}}" class="m-l-10">Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 hidden-xs hidden-sm">
                    <ul class="profile-info-list">
                        <li class="title">NEXT OF KIN INFORMATION</li>
                        <li>
                            <div class="field">Full Names:</div>
                            <div class="value">{{auth()->user()->profile->kin_names}}</div>
                        </li>
                        <li>
                            <div class="field">Relationship</div>
                            <div class="value">{{$user->profile->relationship}}</div>
                        </li>
                        <li>
                            <div class="field">Country:</div>
                            <div class="value">{{$user->profile->kin_country}}</div>
                        </li>
                        <li>
                            <div class="field">Mobile:</div>
                            <div class="value">{{$user->profile->kin_contact}}</div>
                        </li>
                        <li>
                            <div class="field">Alternative Mobile:</div>
                            <div class="value">{{$user->profile->kin_alternative_contact}}</div>
                        </li>
                        <li>
                            <div class="field">Address:</div>
                            <div class="value">
                                <address class="m-b-0">
                                    {{$user->profile->Kin_postal_address}}<br />
                                    {{$user->profile->Kin_postal_code}}<br />
                                    {{$user->profile->kin_town}}
                                </address>
                            </div>
                        </li>
                        <li>
                            <div class="field">Nationality:</div>
                            <div class="value">
                                {{$user->Profile->kin_nationality}}
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
