<head>
	<title>Halaman Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('template/Login_v4/images/icons/favicon.ico') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('template/Login_v4/css/main.css') }}">
<!--===============================================================================================-->
</head>

<body>	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('template/Login_v4/images/3.jpg') }}');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="/login/cek" method="POST">
          			{{ csrf_field() }}
					<span class="login100-form-title p-b-49">
						Login
					</span>

					@if ($message = Session::get('daftar'))
				      <div class="alert alert-success alert-block">
					      <strong>{{ $message }}</strong>
				      </div>
				    @endif

					<div class="wrap-input100 validate-input m-b-23" data-validate="Email harus di isi">
						<span class="label-input100">Email</span>
						<input class="input100 has-val" type="email" name="email" placeholder="Type your email">
						<span class="focus-input100" data-symbol=""></span>
					</div>
         	 		@if ($message = Session::get('femail'))
					  <strong style="margin-bottom:5px;font-family:inherit;color:#DC143C">{{ $message }}</strong>
				  	@endif

					<div class="wrap-input100 validate-input" data-validate="Password harus di isi" style="margin-top:23px;margin-bottom:10px;">
						<span class="label-input100">Password</span>
						<input class="input100 has-val" type="password" name="pasword" placeholder="Type your password">
						<span class="focus-input100" data-symbol=""></span>
					</div>
          			@if ($message = Session::get('fpassword'))
					  <strong style="font-family:inherit;color:#DC143C;">{{ $message }}</strong>
				  	@endif

					<div class="text-right p-t-8 p-b-31">
						<a href="#">
							Forgot password?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('template/Login_v4/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/Login_v4/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/Login_v4/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('template/Login_v4/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/Login_v4/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/Login_v4/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('template/Login_v4/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/Login_v4/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('template/Login_v4/js/main.js') }}"></script>


</body>