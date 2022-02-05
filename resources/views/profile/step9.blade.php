@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Transacript</title>
    <style>
        table.table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        table.table>thead {
            font-weight: bold;
        }

        table.table>thead>tr {
            border: 1px solid black;
        }

        table.table>thead>tr>th {
            border: 1px solid rgb(110, 52, 52);
            padding: .5rem;
        }

        table.table>tbody {
            border: 1px solid black;
        }

        table.table>tbody>tr {
            border: 1px solid black;
        }

        table.table>tbody>tr>td {
            border: 1px solid black;
            padding: .3rem;
        }

        table.table>tbody>tr>th {
            border: 1px solid black;
            padding: .3rem;
        }


        .text-center {
            text-align: center !important;
        }

        .fw-bold {
            font-weight: bold;
        }

        .d-table .d-table-row .d-table-cell {
            vertical-align: top;
        }

        .d-table {
            display: table;
        }

        .d-table-row {
            display: table-row;
        }

        .d-table-cell {
            display: table-cell;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .text-start {
            text-align: left !important;
        }

        .w-25 {
            width: 25%;
        }

        .w-75 {
            width: 75%;
        }

        .w-50 {
            width: 50%;
        }

        .w-100 {
            width: 100%;
        }

        .fw-normal {
            font-weight: normal !important;
        }

        .fw-bold {
            font-weight: bold !important;
        }

        .w-1\/3 {
            width:
        }

        .mx-auto {
            margin: 0 auto;
        }

        .px-2 {
            padding: 2rem;
        }

        .h3 {
            font-size: 1.5rem;
        }

        .page-break {
            page-break-after: always;
        }

        .text-secondary {
            color: gray;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div>
            <div>
                <div class="float-left mt-4">
                    <div class="fw-bold">
                        <img src="{{$design->logo}}" style="width: 70px;height:70px">
                    </div>
                </div>
                <div class="float-right">
                    Reference no
                </div>
                <div class="text-center">
                    <div class="fw-bold">
                        <img src="{{$design->logo}}" style="width: 70px;height:70px">
                        <h1 class="fw-bold">{{$design->name}}</h1>
                        <div class="fw-bold">{{$design->address}}</div>
                        <div class="fw-bold">Tel: {{$design->telephone}}</div>
                        <div class="fw-bold">{{$design->email}}</div>
                        STUDENT APPLICATION FORM
                        YEAR ADMISSION EG 2016 ADMISSION
                        <hr style="height: 2px; background-color: black; margin-bottom: 0px;">
                        <hr style="height: .5px; background-color: black; margin-top: 1px;">
                    </div>
                </div>
            
          
                <table class="w-100">
                    <tbody>
                        <tr>
                            <th class="text-start">SURNAME:</th>
                            <td class="text-left">{{auth()->user()->surname}} </td>
                            <th class="text-start">OTHER NAMES:</th>
                            <td class="text-left">{{auth()->user()->name}}</td>
                            <th class="text-start">Title:</th>
                            <td class="text-left" >{{auth()->user()->title->name}}</td>
                        </tr>
                        <tr>
                          
                            <th class="text-start">Gender:</th>
                            <td class="text-left">{{auth()->user()->personalInformation->gender}}</td>
                            <th class="text-start">MOBILE:</th>
                            <td class="text-left">{{auth()->user()->telephone}}</td>
                            <th class="text-start">EMAIL:</th>
                            <td class="text-left">{{auth()->user()->email}}</td>
                        </tr>
                    </tbody>
                </table>
                  
                <table class="w-100">
                    <tbody>
                        <tr>
                          
                            <th class="text-start">Nationality:</th>
                            <td class="text-left">{{auth()->user()->personalInformation->nationality}}</td>
                            <th class="text-start">Identification Document:</th>
                            <td class="text-left">{{auth()->user()->personalInformation->identificationDocument->name}}</td>
                            <th class="text-start">ID NO:</th>
                            <td class="text-left">{{auth()->user()->personalInformation->identification_document_no}}</td>
                        </tr>
                        <tr>
                            <th class="text-start">Date of birth:</th>
                            <td class="text-left" >{{auth()->user()->personalInformation->day}} {{auth()->user()->personalInformation->month}}, {{auth()->user()->personalInformation->year}}</td>
                            <th class="text-start">Marital Status:</th>
                            <td class="text-left">{{auth()->user()->personalInformation->marital}} </td>
                            <th class="text-start">Religion:</th>
                            <td class="text-left">{{auth()->user()->personalInformation->religion}}</td>
                            
                        </tr>
                        <tr>
                            <th class="text-start">Disability Condition:</th>
                            <td class="text-left" >{{auth()->user()->personalInformation->disabilityCondition->name}}</td>
                            <th class="text-start">Maedical Information:</th>
                            <td class="text-left">{{auth()->user()->personalInformation->medical}} </td>
                            <th class="text-start">Co-curriculum Activities:</th>
                            <td class="text-left">{{auth()->user()->personalInformation->activites}}</td>
                            
                        </tr>
                        <tr>
                            <th class="text-start">Postal Address:</th>
                            <td class="text-left" >{{auth()->user()->contactInformation->postal_address}}</td>
                            <th class="text-start">Postal Code:</th>
                            <td class="text-left">{{auth()->user()->contactInformation->postal_code}} </td>
                            <th class="text-start">Town:</th>
                            <td class="text-left">{{auth()->user()->contactInformation->town}}</td>
                            
                        </tr>
                        <tr>
                            <th class="text-start">County/Province/City:</th>
                            <td class="text-left" >{{auth()->user()->contactInformation->province}}</td>
                            <th class="text-start">SubCounty/District:</th>
                            <td class="text-left">{{auth()->user()->contactInformation->district}} </td>
                            <th class="text-start">Constituency:</th>
                            <td class="text-left">{{auth()->user()->contactInformation->constituency}}</td>
                            
                        </tr>
                    </tbody>
                </table>
                <h3 class="font-weight-bold">Academic Details</h3>

                <table class="table" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>EXAMINER</th>
                            <th>SYSTEM</th>
                            <th>INSTITUTION</th>
                            <th>COURSE</th>
                            <th>FROM</th>
                            <th>TO</th>
                            <th>REGNO</th>
                            <th>GRADE</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach(auth()->user()->educationBackgrounds as $educationBackground)
                      <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$educationBackground->examinedBy->name}}</td>
                        <td>{{$educationBackground->educationSystem->name}}</td>
                        <td>{{$educationBackground->institution}}</td>
                        <td>{{$educationBackground->course}}</td>
                        <td>{{$educationBackground->from}}</td>
                        <td>{{$educationBackground->to}}</td>
                        <td>{{$educationBackground->index_no}}</td>
                        <td>{{$educationBackground->grade_score}}</td>
                    </tr>
                      @endforeach
                    </tbody>
                </table>
                <h3 class="font-weight-bold">Working Experience</h3>
                <table class="table" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Organization</th>
                            <th>Designation</th>
                            <th>Nature of assignment</th>
                            <th>From</th>
                            <th>To</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach(auth()->user()->workExperiences as $workExperience)
                      <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$workExperience->organization}}</td>
                        <td>{{$workExperience->designation}}</td>
                        <td>{{$workExperience->assignment}}</td>
                        <td>{{$workExperience->from}}</td>
                        <td>{{$workExperience->to}}</td>
                    </tr>
                      @endforeach
                    </tbody>
                </table>
                <h3 class="font-weight-bold">Next of Kin</h3>
                <table class="w-100">
                    <tbody>
                        <tr>
                          
                            <th class="text-start">Title:</th>
                            <td class="text-left">{{auth()->user()->nextOfKin->title->name}}</td>
                            <th class="text-start">Full Name:</th>
                            <td class="text-left">{{auth()->user()->nextOfKin->name}}</td>
                            <th class="text-start">Relationship:</th>
                            <td class="text-left">{{auth()->user()->nextOfKin->relationship->name}}</td>
                        </tr>
                        <tr>
                            <th class="text-start">Telephone:</th>
                            <td class="text-left" >{{auth()->user()->nextOfKin->telephone}} </td>
                            <th class="text-start">Email Address:</th>
                            <td class="text-left">{{auth()->user()->nextOfKin->email}} </td>
                            
                        </tr>
                        <tr>
                            <th class="text-start">Postal Address:</th>
                            <td class="text-left" >{{auth()->user()->nextOfKin->postal_address}}</td>
                            <th class="text-start">Postal Code:</th>
                            <td class="text-left">{{auth()->user()->nextOfKin->postal_code}} </td>
                            <th class="text-start">Town:</th>
                            <td class="text-left">{{auth()->user()->nextOfKin->town}}</td>
                            
                        </tr>
                        <tr>
                            <th class="text-start">Nationality:</th>
                            <td class="text-left" >{{auth()->user()->nextOfKin->nationality}}</td>
                            <th class="text-start">Gender:</th>
                            <td class="text-left">{{auth()->user()->nextOfKin->gender}} </td>
                            <th class="text-start">Town:</th>
                            <td class="text-left">{{auth()->user()->nextOfKin->town}}</td>
                            
                        </tr>
                        <tr>
                            <th class="text-start">Identification Document:</th>
                            <td class="text-left" >{{auth()->user()->nextOfKin->identificationDocument->name}}</td>
                            <th class="text-start">Identification Document No.:</th>
                            <td class="text-left">{{auth()->user()->nextOfKin->identification_document_no}} </td>
                         
                        </tr>
                    </tbody>
                </table>
                <h3 class="font-weight-bold">Referee Contacts</h3>
                <table class="table" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Name</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Postal Address</th>
                            <th>Postal Code</th>
                            <th>Town</th>
                            <th>Nationality</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach(auth()->user()->refereeContacts as $refereeContact)
                      <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$refereeContact->title->name}}</td>
                        <td>{{$refereeContact->name}}</td>
                        <td>{{$refereeContact->telephone}}</td>
                        <td>{{$refereeContact->email}}</td>
                        <td>{{$refereeContact->postal_address}}</td>
                        <td>{{$refereeContact->postal_code}}</td>
                        <td>{{$refereeContact->town}}</td>
                        <td>{{$refereeContact->nationality}}</td>
                        <td>{{$refereeContact->gender}}</td>
                    </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        
            <div>
                <h2 style="margin: 0.25rem 0 0.5rem 0; font-size: 1.25rem;">Breakdown</h2>
        
                {{-- <table class="table table-sm table-bordered table-hover border border-dark" style="font-size: 12px">
                    <thead class="text-uppercase text-start">
                        <tr>
                            <th><span>SUBJECT</span></th>
                            <th>MARKS</th>
                            <th><span>DEV.</span></th>
                            <th><span>GR.</span></th>
                            <th><span>RANK</span>
                            <th><span>COMMENT</span></th>
                            <th><span>TEACHER</span></th>
                        </tr>
                    </thead>
                    <tbody>
        
                        @foreach ($subjectColums as $col)
                        @if (!is_null($studentScores->$col))
                        <tr>
                            @php
                            $subjectScore = json_decode($studentScores->$col);
                            @endphp
                            <td class="text-uppercase">{{ $subjectsMap[$col] ?? $col }}</td>
                            <td>{{ $subjectScore->score }}%</td>
                            <td>0</td>
                            <td>{{ $subjectScore->grade }}</td>
                            <td>10 / 69</td>
        
                            @if ($col == 'kis')
                            <td>{{ $swahiliComments[$subjectScore->grade] ?? 'Hakuna maoni' }}</td>
                            @else
                            <td>{{ $englishComments[$subjectScore->grade] ?? 'No Comments' }}</td>
                            @endif
                            <td>{{ $teachers[$col] ?? '-' }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
        
            <div>
        
                <h2 style="margin: 0.25rem 0 0.5rem 0; font-size: 1.25rem;">Remarks</h2>
        
                <table style="width: 100%;">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td class="text-start">
                                <span style="padding-left: 0">
                                    <span>Class Teacher's Remarks</span>
                                    <span> - Ms. Rhenis Awino</span>
                                </span>
                            </td>
                            <td class="text-end">
                                <span ng-if="!user_roles.isStudent">Signature</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">
                                <span ng-if="show_classteachers_comments">
                                    <span>Excellent work, keep it up so as to improve further.</span>
                                </span>
                            </td>
                            <td class="text-end td-fit-nowrap">
                                <div>Signature</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <table style="width: 100%;">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td class="text-start">
                                <span>
                                    <span>Principal's Remarks</span>
                                    <span> - Mr. Peter Obwogo</span>
                                </span>
                            </td>
                            <td class="text-end">
                                <span>Signature</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-start">
                                <span>Very
                                    good performance, pay closer attention to
                                    English in order to get a better grade.</span>
                            </td>
                            <td class="text-end">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
@endsection