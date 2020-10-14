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

    <div class="text-center">
        <h4 class=" font-weight-bold">{{$programme->name}}</h4>
        <p>{!! $programme->details !!}</p>
    </div>
	<footer class="footer">
		<div class="footer_body">
			<div class="container">
				<div class="row">

					<!-- Newsletter -->
					<div class="col-lg-3 footer_col">
						<div class="newsletter_container d-flex flex-column align-items-start justify-content-end">
							<div class="footer_logo mb-auto"><a href="#">Sikri Tvc Blind and Deaf</a></div>
							<div class="footer_title">Subscribe</div>
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" placeholder="Email" required="required">
								<button class="newsletter_button"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
							</form>
						</div>
					</div>

					<!-- About -->
					<div class="col-lg-2 offset-lg-3 footer_col">
						<div>
							<div class="footer_title">About Us</div>
							<ul class="footer_list">
								<li><a href="#">Courses</a></li>
								<li><a href="#">Team</a></li>
								<li><a href="#">Brand Guidelines</a></li>
								<li><a href="#">Jobs</a></li>
								<li><a href="#">Advertise with us</a></li>
								<li><a href="#">Press</a></li>
								<li><a href="#">Contact us</a></li>
							</ul>
						</div>
					</div>

					<!-- Help & Support -->
					<div class="col-lg-2 footer_col">
						<div class="footer_title">Help & Support</div>
						<ul class="footer_list">
							<li><a href="#">Discussions</a></li>
							<li><a href="#">Troubleshooting</a></li>
							<li><a href="#">Duolingo FAQs</a></li>
							<li><a href="#">Schools FAQs</a></li>
							<li><a href="#">Duolingo English Test FAQs</a></li>
							<li><a href="#">Status</a></li>
						</ul>
					</div>

					<!-- Privacy -->
					<div class="col-lg-2 footer_col clearfix">
						<div>
							<div class="footer_title">Privacy & Terms</div>
							<ul class="footer_list">
								<li><a href="#">Community Guidelines</a></li>
								<li><a href="#">Terms</a></li>
								<li><a href="#">Brand Guidelines</a></li>
								<li><a href="#">Privacy</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="copyright_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
							<div class="cr"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
							<div class="cr_right ml-md-auto">
								<div class="footer_phone"><span class="cr_title">phone:</span>+44 300 303 0266</div>
								<div class="footer_social">
									<span class="cr_social_title">follow us</span>
									<ul>
										<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									</ul>
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
