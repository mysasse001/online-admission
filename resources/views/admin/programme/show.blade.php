<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$programme->name}}</title>
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
        <div class="text-center">
            
            <h1 class="home_title font-weight-bold text-center" style="text-transform: uppercase;color: #58D3F7;">{{$programme->name}}</h1>
            <h2><span style="mso-bidi-font-size:12.0pt">Admission Requirements</span></h2>
            <p>{!! $programme->details !!}</p>
            @if($programme->specialization)
            <h6>Entry Requirements</h6>
            <p>{!! $programme->specialization !!}</p>
            
            @endif
        </div>
        <div class="home">
            <div class="home_content mt-0">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                         
                            <div class="">
                                @guest
                                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Already have an account,Login</a>
                                @else
                                @if(auth()->user()->role->name == 'applicant')
                                 @if(auth()->user()->programmeuser->contains($programme->id))
                                 <button class="btn btn-outline-secondary" type="button">You have already applied</button>
                                 @else
                                 <a href="{{ route('completeApplication',['programme'=>$programme->slug]) }}" class="btn btn-primary btn-sm">APPLY FOR PROGRAMME</a>
                                 @endif
                                @endif
                                @if(auth()->user()->role->name == 'adminstrator')
                                <a href="{{route('programme.edit',$programme)}}" class="btn btn-primary"><i class="fas fa-edit    "></i> Programme</a>
                                @endif
                                @endguest
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

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
