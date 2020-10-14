<!DOCTYPE html>
<html lang="en">
<head>
<title>sikritvcblindanddeaf Admission</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Lingua project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('front/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('front/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
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

	<!-- Header -->
	<!-- Home -->

	<div class="home">
		<div class="home_background" style="background-image: url({{ asset('front/images/index_background.jpg') }})"></div>
		<div class="home_content">
			<div class="container">
				<div class="row">
					<div class="col text-center">
                        <h1 class="home_title">Welcome to Sikri Online Application Portal</h1>
                        <h5>Congratulations on taking the first step towards achieving your educational goals.
                        </h5>
                        <p>
                            In order to keep track of your application, we need to first set you up with an account. Please use the <a href="{{ route('register') }}" class="btn btn-primary btn-sm"></a> feature to set up your account.

                            You will be required to enter some basic information, including your email address and to choose a password. We will then send you an email to the address you entered, so that we can validate your account. When you have clicked on the validation link (sent to you in the email), you will be able to log in to the application system using the "Login" box below

                            For instructions on how to apply click here</p>
                        <div class="">
                            @guest
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                            @else
                             @if(auth()->user()->admin==1)
                             <a href="{{ route('admin-dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                             @else
                             <a href="{{ route('student.dashboard') }}" class="btn btn-primary btn-sm">Dashboard</a>
                             @endif
                            @endguest
                        </div>

					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="card bg-white">
        <div class="card-header bg-white">
          <h3 class="card-title">Courses</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body bg-white">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>PROGRAMME NAME</th>
              <th>SCHOOL/FACULTY/INSTITUTE</th>
              <th>INTAKE NAME</th>
              <th>ACADEMIC YEAR</th>
              <th>APPLICATION DEADLINE</th>
              <th>REPORTING DATE</th>
              <th>PROGRAMME REQUIREMENTS</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($programmes as $key=>$programme)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $programme->name }}</td>
                <td>{{ $programme->department->name }}</td>
                <td>{{ $programme->intake->name }}</td>
                <td>{{ $programme->academicYear->name }}</td>
                <td>{{ date('d-M-Y',strtotime($programme->deadline)) }}</td>
                <td>{{ date('d-M-Y',strtotime($programme->reporting)) }}</td>
                <td><a href="{{ route('programme.show',$programme->name) }}">View Programme Requirements</a></td>
              </tr>

              @endforeach
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
	<!-- Footer -->

	<footer class="footer">
		<div class="footer_body bg-white">
			<div class="container">
				<div class="row">



				</div>
			</div>
		</div>
		<div class="copyright">
		    <div class="container">
		        <div class="row">
		            <div class="col">
		                <div
		                    class="copyright_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
		                    <div class="cr">
		                        Copyright &copy;<script>
		                            document.write(new Date().getFullYear());
		                        </script> All rights reserved | <a
		                            href="https://sikritvcblindanddeaf.ac.ke">sikritvcblindanddeaf.co.ke</a>
		                    </div>
		                    <div class="cr_right ml-md-auto">
		                        <div class="footer_phone"><span class="cr_title">phone:</span>+254772768777</div>
		                        <div class="footer_social">
		                            <span class="cr_social_title"><a href="{{ route('faq.front') }}">Faq</a></span>

		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</footer>
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
