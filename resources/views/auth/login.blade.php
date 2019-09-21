<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/bootstrap.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/style.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/dark.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/font-icons.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/animate.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/magnific-popup.css')}}" type="text/css" />

	<link  rel="stylesheet" href="{{ asset('public/css/responsive.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Herbalife | Login </title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('{{url('public/images/backgrounds/bg_green.jpg')}}') center center no-repeat; background-size: cover;"></div>

				<div class="section nobg full-screen nopadding nomargin">
					<div class="container-fluid vertical-middle divcenter clearfix">

						<div class="center">
							<a href="{{url('inicio')}}"><img src="{{url('admin/assets/media/logos/herbalife-logo.png')}}" alt="Herbalife Logo"></a>
						</div>

						<div class="card divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
							<div class="card-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" method="POST" action="{{ route('login') }}">
									@csrf
									<h3>@lang('base.login_to_your_account')</h3>

									<div class="col_full">
										<label for="login-form-username">@lang('base.user_email')</label>
										<input type="email" id="email" name="email" class="form-control not-dark" value="{{ old('email') }}" autofocus required />
										
									</div>

									<div class="col_full">
										<label for="login-form-password">@lang('base.user_password')</label>
										<input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control not-dark" required />
										
									</div>
										@error('email')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror

		                                @error('password')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">@lang('base.signin')</button>
										<!--@if (Route::has('password.request'))
											<a href="{{ route('password.request') }}" class="fright">@lang('base.forgot_password')</a>
										@endif-->
									</div>

									
									<div class="col_full" style="margin-top: 10px">
										@foreach ($errors->all() as $error)

										 
										  <div class="alert alert-danger">
											  <i class="icon-warning-sign"></i><strong>Error </strong><br>{{ $error }}
											</div>

										@endforeach

										@if(session()->has('status'))

											@if(session('status') == 'registered')
												<div class="alert alert-success">
												  <i class="icon-ok-sign"></i><strong>Registrado! </strong><br>{!!session('message')!!}
												</div>											
											@endif

										@endif
									</div>
								</form>

								<div class="line line-sm"></div>

							</div>
						</div>

						<div class="center dark"><small>Copyrights &copy; All Rights Reserved by HerbalifeDevelopment.</small></div>

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="{{ URL::asset('public/js/jquery.js') }}"></script>
	<script src="{{ URL::asset('public/js/plugins.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ URL::asset('public/js/functions.js') }}"></script>

</body>
</html>