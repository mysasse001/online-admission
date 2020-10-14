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
<style>
    body{
    background:#f5f5f6;
    margin-top:20px;
}
/*Faq*/

.faq-search-wrap {
    padding: 50px 0 60px;
}

.faq-search-wrap .form-group .form-control,
.faq-search-wrap .form-group .dd-handle {
    border-top-right-radius: .25rem;
    border-bottom-right-radius: .25rem;
}

.faq-search-wrap .form-group .input-group-append {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    z-index: 10;
    pointer-events: none;
}

.faq-search-wrap .form-group .input-group-append .input-group-text {
    background: transparent;
    border: none;
}

.faq-search-wrap .form-group .input-group-append .input-group-text .feather-icon > svg {
    height: 18px;
    width: 18px;
}
.bg-teal-light-3 {
    background-color: #7fcdc1 !important;
}

.hk-row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -10px;
    margin-left: -10px;
}

@media (min-width: 576px){
    .mt-sm-60 {
        margin-top: 60px !important;
    }
}
.mt-30 {
    margin-top: 30px !important;
}

.list-group-item.active {
    background-color: #00acf0;
    border-color: #00acf0;
}
.accordion .card .card-header.activestate {
    border-width: 1px;
}
.accordion .card .card-header {
    padding: 0;
    border-width: 0;
}
.card.card-lg .card-header, .card.card-lg .card-footer {
    padding: .9rem 1.5rem;
}
.accordion>.card .card-header {
    margin-bottom: -1px;
}
.card .card-header {
    background: transparent;
    border: none;
}
.accordion.accordion-type-2 .card .card-header > a.collapsed {
    color: #324148;
}
.accordion .card:first-of-type .card-header:first-child > a {
    border-top-left-radius: calc(.25rem - 1px);
    border-top-right-radius: calc(.25rem - 1px);
}
.accordion.accordion-type-2 .card .card-header > a {
    background: transparent;
    color: #00acf0;
    padding-left: 50px;
}
.accordion .card .card-header > a.collapsed {
    color: #324148;
    background: transparent;
}
.accordion .card .card-header > a {
    background: #00acf0;
    color: #fff;
    font-weight: 500;
    padding: .75rem 1.25rem;
    display: block;
    width: 100%;
    text-align: left;
    position: relative;
    -webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
a {
    text-decoration: none;
    color: #00acf0;
    -webkit-transition: color 0.2s ease;
    -moz-transition: color 0.2s ease;
    transition: color 0.2s ease;
}


.badge.badge-pill {
    border-radius: 50px;
}
.badge.badge-light {
    background: #eaecec;
    color: #324148;
}
.badge {
    font-weight: 500;
    border-radius: 4px;
    padding: 5px 7px;
    font-size: 72%;
    letter-spacing: 0.3px;
    vertical-align: middle;
    display: inline-block;
    text-align: center;
    text-transform: capitalize;
}
.ml-15 {
    margin-left: 15px !important;
}

.accordion.accordion-type-2 .card .card-header > a.collapsed:after {
    content: "\f158";
}

.accordion.accordion-type-2 .card .card-header > a::after {
    display: inline-block;
    font: normal normal normal 14px/1 'Ionicons';
    speak: none;
    text-transform: none;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: auto;
    position: absolute;
    content: "\f176";
    font-size: 21px;
    top: 15px;
    left: 20px;
}

.mr-15 {
    margin-right: 15px !important;
}




















</style>
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


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.2.0/css/ionicons.min.css" integrity="sha256-F3Xeb7IIFr1QsWD113kV2JXaEbjhsfpgrKkwZFGIA4E=" crossorigin="anonymous" />

<div class="container-fluid">
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 pa-0">
            <div class="faq-search-wrap bg-teal-light-3">
                <div class="container">

                </div>
            </div>
            <div class="container mt-sm-60 mt-30">
                <div class="hk-row">
                    <div class="col-xl-4">
                        <div class="card">
                            <h6 class="card-header">
                                            Category
                                        </h6>
                            <ul class="list-group list-group-flush">
                                @foreach ($categories as $category)
                                <li class="list-group-item d-flex align-items-center active">
                                    <i class="ion ion-md-sunny mr-15"></i>{{ $category->name }}
                                    {{-- <span class="badge badge-light badge-pill ml-15">{{ $category->programmes->count() }}</span> --}}
                                </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card card-lg">
                            <h3 class="card-header border-bottom-0">
                                            Frequently Asked Questions
                                        </h3>
                            <div class="accordion accordion-type-2 accordion-flush" id="accordion_2">
                                @foreach ($faqs as $faq)
                                <div class="card">
                                    <div class="card-header d-flex justify-content-between activestate">
                                        <a role="button" data-toggle="collapse" href="#collapse_1i" aria-expanded="true">{{ $faq->question }}</a>
                                    </div>
                                    <div id="collapse_1i" class="collapse show" data-parent="#accordion_2" role="tabpanel">
                                        <div class="card-body pa-15">{!! $faq->answer !!}</div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
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
