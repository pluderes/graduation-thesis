<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('public/Backend/images/login/icons/favicon.ico')}}" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/fonts/login/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/fonts/login/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/vendor/animsition/css/animsition.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/vendor/daterangepicker/daterangepicker.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/css/login/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/Backend/css/login/main.css')}}">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="{{URL::TO('/login')}}" method="POST" class="login100-form">
					{{csrf_field()}}
					<span class="login100-form-title p-b-43">
						Đăng nhập
					</span>
					<?php
					$message = Session::get('message');
					if ($message) {
						echo '<span style="color:red; font-weight:bold">', $message, '</span>';
						Session::put('message', null);
					}
					?>
					<div class="wrap-input100 validate-input" data-validate="Valid username is required: trungduc">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Tên đăng nhập</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Mật khẩu</span>
					</div>
					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<a href="{{URL::TO('/login-checkout')}}" class="txt1">
								Đăng kí?
							</a>
						</div>
						<div>
							<a href="#" class="txt1">
								Quên mật khẩu?
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Đăng nhập
						</button>
					</div>
				</form>
				<div class="login100-more" style="background-image: url(public/Backend/images/login/images/bg-01.jpg);">
				</div>
			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="{{asset('public/Backend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/Backend/vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/Backend/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('public/Backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/Backend/vendor/select2/select2.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/Backend/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('public/Backend/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/Backend/vendor/countdowntime/countdowntime.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('public/Backend/js/login/main.js')}}"></script>

</body>

</html>