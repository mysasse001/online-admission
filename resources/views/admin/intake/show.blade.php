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
                        <h1 class="home_title"> Sikri Online Application Portal</h1>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="text-center">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>PROGRAMME NAME</th>
              <th>SCHOOL/FACULTY/INSTITUTE</th>
              <th>INTAKE NAME</th>
              <th>ACADEMIC YEAR</th>
              <th>APPLICATION DEADLINE</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach ($intake->programmes as $key=>$programme)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $programme->name }}</td>
                <td>{{ $programme->department->name }}</td>
                <td>{{ $programme->intake->name }}</td>
                <td>{{ $programme->academicYear->name }}</td>
                <td>{{ date('d-M-Y',strtotime($programme->deadline)) }}</td>
                <td>
                    <form action="{{ route('applyprogramme',$programme) }}" method="POST">
                        @csrf
                        <button class="btn btn-secondary btn-sm">Apply for programme </button>
                    </form>
                </td>
              </tr>

              @endforeach
            </tbody>

          </table>
    </div>
	<footer class="footer">
		<div class="footer_body bg-white">
			<div class="container">
				<div class="row">


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
