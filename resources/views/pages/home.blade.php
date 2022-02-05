<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$design->name}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Lingua project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="{{ asset('front/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/styles/responsive.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('front/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('front/dist/css/adminlte.min.css') }}">
</head>

<body>
    <div class="super_container">
        @include('partials.welcome.nav')
        <div class="home">
            <div class="home_background"
                style="background-image: url({{ asset('front/images/index_background.jpg') }})"></div>
            <div class="home_content">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h1 class="home_title">Welcome to {{$design->name}} Application Portal</h1>
                            <h5>Congratulations on taking the first step towards achieving your educational goals.
                            </h5>
                            @guest
                            <p>
                                In order to keep track of your application, we need to first set you up with an account.
                                Please use the <a href="{{ route('register') }}" class="btn btn-primary btn-sm"></a>
                                feature to set up your account.

                                You will be required to enter some basic information, including your email address and
                                to choose a password. We will then send you an email to the address you entered, so that
                                we can validate your account. When you have clicked on the validation link (sent to you
                                in the email), you will be able to log in to the application system using the "Login"
                                box below

                                For instructions on how to apply click here</p>
                            @endif
                            <div class="">
                                @guest
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                                @else
                                <a href="{{ route('home') }}" class="btn btn-primary btn-sm">Dashboard</a>

                                @endguest
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        @if($categories->count())
        <ul class="nav nav-pills m-3" id="pills-tab" role="tablist">
            @foreach($categories as $index=>$category)
            <li class="nav-item" role="presentation">
                <a class="nav-link {{$index == 0 ? 'active':''}}" id="pills-home-tab" data-toggle="pill"
                    href="#pills-home{{$category->id}}" role="tab" aria-controls="pills-home"
                    aria-selected="true">{{$category->name}}</a>
            </li>
            @endforeach
        </ul>
        <div class="tab-content m-1" id="pills-tabContent">
            @foreach($categories as $index=>$category)
            <div class="tab-pane fade show {{$index == 0 ? 'active':''}}" id="pills-home{{$category->id}}"
                role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-condensed table-striped table-bordered cDTable dataTable no-footer"
                            id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 15px;" aria-sort="ascending"
                                        aria-label="#: activate to sort column descending">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 262px;"
                                        aria-label="PROGRAMME NAME: activate to sort column ascending">
                                        PROGRAMME NAME</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 173px;"
                                        aria-label="SCHOOL/FACULTY/INSTITUTE: activate to sort column ascending">
                                        SCHOOL/FACULTY/INSTITUTE</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 113px;"
                                        aria-label="INTAKE NAME: activate to sort column ascending">
                                        INTAKE NAME</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 84px;"
                                        aria-label="ACADEMIC YEAR: activate to sort column ascending">
                                        ACADEMIC YEAR</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 112px;"
                                        aria-label="APPLICATION DEADLINE: activate to sort column ascending">
                                        APPLICATION DEADLINE</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 92px;"
                                        aria-label="REPORTING DATE: activate to sort column ascending">
                                        REPORTING DATE</th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 134px;"
                                        aria-label="PROGRAMME REQUIREMENTS: activate to sort column ascending">
                                        PROGRAMME REQUIREMENTS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category->programmes as $key=>$programme)
                                <tr role="row" class="odd">
                                    <td class="sorting_1" align="left">{{ $key+1 }}</td>
                                    <td align="left">{{ $programme->name }}</td>
                                    <td align="left">{{ $programme->department->name }}</td>
                                    <td align="left">{{ $programme->intake->name }}</td>
                                    <td align="left">{{ $programme->academicYear->name }}</td>
                                    <td>
                                        @if($programme->application_deadline_id)
                                        {{$programme->applicationDeadline->name  }}
                                        @else
                                        Not set
                                        @endif
                                    </td>
                                    <td align="left">
                                        @if($programme->reporting_date_id)
                                        {{$programme->reportingDate->name  }}
                                        @else
                                        Not set
                                        @endif
                                    </td>
                                    <td align="left">
                                        @if($programme->slug)
                                        <a href="{{ route('programme.show',['programme'=>$programme->slug]) }}">View
                                            Programme
                                            Details</a>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p>Courses will be added soon</p>
        @endif

        @include('partials.footer')
    </div>

    <script src="{{asset('front/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('front/styles/bootstrap4/popper.js')}}"></script>
    <script src="{{asset('front/styles/bootstrap4/bootstrap.min.js')}}"></script>
    <script src="{{ asset('front/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('front/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('front/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('front/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
</body>

</html>
