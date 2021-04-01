<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	{{ HTML::style('assets/css/app.min.css') }}
	{{ HTML::style('assets/css/style.css') }}
	{{ HTML::style('assets/css/pages/extra_pages.css') }}
</head>
<body class="login-page">
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form method="post" action="{{ route('checklogin') }}" class="login100-form validate-form">
					{{csrf_field()}}
					<span class="login100-form-title p-b-34 p-t-27">
						Admin Log in
					</span>
					<div class="wrap-input100 validate-input" data-validate="Enter email">
						<input type="text" name="email" placeholder="Email" class="input100" autocomplete="off">
						<i class="material-icons focus-input1001">person</i>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input type="password" name="password" placeholder="Password" class="input100" autocomplete="new-password">
						<i class="material-icons focus-input1001">lock</i>
					</div>
					<div class="contact100-form-checkbox">
						<div class="form-check">
							<div class="row">
								<div class="col-lg-6">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" value=""> Remember me
										<span class="form-check-sign">
											<span class="check"></span>
										</span>
									</label>
								</div>
								<div class="col-lg-6">
									<div class="text-center">
										<a class="txt1" href="#">
											Forgot Password?
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	{{ HTML::script('assets/js/app.min.js') }}
	{{ HTML::script('assets/js/pages/examples/pages.js') }}

</body>
</html>