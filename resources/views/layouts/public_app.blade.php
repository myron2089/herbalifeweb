<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />
	<meta name="_token" content="{!! csrf_token() !!}"/>
	<!-- Stylesheets
	============================================= -->
	<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/bootstrap.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/style.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/dark.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/font-icons.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/animate.css')}}" type="text/css" />
	<link  rel="stylesheet" href="{{ asset('public/css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('public/css/responsive.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css"  href="{{ asset('public/include/rs-plugin/css/settings.css') }}" media="screen" />
	<link rel="stylesheet" type="text/css"  href="{{ asset('public/include/rs-plugin/css/layers.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('public/include/rs-plugin/css/navigation.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('public/css/pet.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('public/css/bike.css') }}">
	<link rel="stylesheet" type="text/css"  href="{{ asset('public/css/custom.public.css') }}">
	<link href="{{ asset('admin/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/datatables.css') }}" rel="stylesheet" type="text/css" />
	<!-- Select-Boxes CSS -->
	<link rel="stylesheet" href="{{ asset('public/css/components/select-boxes.css') }}" type="text/css" />
	<link href="{{ asset('admin/assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title>MulticerPlus</title>

	<style>

		.revo-slider-emphasis-text {
			font-size: 58px;
			font-weight: 700;
			letter-spacing: 1px;
			font-family: 'Raleway', sans-serif;
			padding: 15px 20px;
			border-top: 2px solid #FFF;
			border-bottom: 2px solid #FFF;
		}

		.revo-slider-desc-text {
			font-size: 20px;
			font-family: 'Lato', sans-serif;
			width: 650px;
			text-align: center;
			line-height: 1.5;
		}

		.revo-slider-caps-text {
			font-size: 16px;
			font-weight: 400;
			letter-spacing: 3px;
			font-family: 'Raleway', sans-serif;
		}

		.tp-video-play-button { display: none !important; }

		.tp-caption { white-space: nowrap; }

	</style>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar" class="d-none d-md-block">

			<div class="container clearfix">

				<div class="col_half nobottommargin">

					<p class="nobottommargin"> <strong>info@multecerplus.com</strong></p>

				</div>

				<div class="col_half col_last fright nobottommargin">

					<!-- Top Links
					============================================= -->
					<div class="top-links">
						<ul>
							<!--<li><a href="#">USD</a>
								<ul>
									<li><a href="#">EUR</a></li>
									<li><a href="#">AUD</a></li>
									<li><a href="#">GBP</a></li>
								</ul>
							</li>
							<li><a href="#">EN</a>
								<ul>
									<li><a href="#"><img src="images/icons/flags/french.png" alt="French"> FR</a></li>
									<li><a href="#"><img src="images/icons/flags/italian.png" alt="Italian"> IT</a></li>
									<li><a href="#"><img src="images/icons/flags/german.png" alt="German"> DE</a></li>
								</ul>
							</li> -->
							@if(!Auth::check())<li><a href="{{url('login')}}">@lang('base.menu_login')</a>@endif
								<!--<div class="top-link-section">
									<form id="top-login">
										<div class="input-group" id="top-login-username">
											<div class="input-group-prepend">
												<div class="input-group-text"><i class="icon-user"></i></div>
											</div>
											<input type="email" class="form-control" placeholder="Email address" required="">
										</div>
										<div class="input-group" id="top-login-password">
											<div class="input-group-prepend">
												<div class="input-group-text"><i class="icon-key"></i></div>
											</div>
											<input type="password" class="form-control" placeholder="Password" required="">
										</div>
										<label class="checkbox">
										  <input type="checkbox" value="remember-me"> Remember me
										</label>
										<button class="btn btn-danger btn-block" type="submit">Sign in</button>
									</form>
								</div>-->
							</li>
						</ul>
					</div><!-- .top-links end -->

				</div>

			</div>

		</div><!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="{{url('/inicio')}}" class="standard-logo" data-dark-logo="{{url('admin/assets/media/logos/herbalife-logo.png')}}"><img src="{{url('admin/assets/media/logos/herbalife-logo.png')}}" alt="Canvas Logo"></a>
						<a href="{{url('/inicio')}}" class="retina-logo" data-dark-logo="{{url('admin/assets/media/logos/herbalife-logo.png')}}"><img src="{{url('admin/assets/media/logos/herbalife-logo.png')}}" alt="Canvas Logo"></a>
					</div><!-- #logo end -->
					
					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li class="current"><a @if(Auth::check()) href="{{url('distribuidor/inicio')}}"  @else href="{{url('inicio')}}" @endif><div>@lang('base.home')</div><span>Lets Start</span></a></li>
							<!-- Mega Menu
							============================================= -->
							<li class="sub-menu"><a href="#"><div>@lang('base.menu_our_products')</div><span>Out of the Box</span></a>
								
											<ul>
												<li><a href="{{url('productos')}}/personal"><div>Cuidado Personal</div></a></li>
												<li><a href="{{url('productos')}}/nutricion"><div>Nutrición</div></a></li>
												<li><a href="{{url('productos')}}/todos"><div>Todos los productos</div></a></li>
											</ul>
									
										
							</li><!-- .mega-menu end -->
							<li class=""><a href="{{url('distribuidor/registro')}}"><div>@lang('base.menu_start_business')</div><span>Out of the Box</span></a>
								
							</li><!-- .mega-menu end -->
							<!--<li><a href="{{url('sobre-nosotros')}}"><div>@lang('base.menu_about_us')</div><span>Awesome Works</span></a></li>
							<li><a href="{{url('contacto')}}"><div>@lang('base.menu_contact')</div><span>Awesome Works</span></a></li>-->
							<!--<li><a href="#"><div>@lang('base.menu_login')</div><span>Latest News</span></a></li>-->
							@if(Auth::check())
							<li class="sub-menu profile-button"><a class="btn btn-secondary btn-sm dropdown-toggle" style="color: #fff;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i></a>
								
								
								<ul>
									<li><a href="{{url('distribuidor/inicio')}}"><div>@lang('base.home') </div></a></li>
									
									<li><a class="dropdown-item tleft" href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">@lang('base.btn_sign_out')  <i class="icon-signout fright"></i></a>
										<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
										    {{ csrf_field() }}
										</form></li>
								</ul>
									
								
							</li>
							@endif
							
						</ul>

						<!-- Top Cart
						============================================= -->
						<!--<div id="top-cart">
							<a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>5</span></a>
							<div class="top-cart-content">
								<div class="top-cart-title">
									<h4>Shopping Cart</h4>
								</div>
								<div class="top-cart-items">
									<div class="top-cart-item clearfix">
										<div class="top-cart-item-image">
											<a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt" /></a>
										</div>
										<div class="top-cart-item-desc">
											<a href="#">Blue Round-Neck Tshirt</a>
											<span class="top-cart-item-price">$19.99</span>
											<span class="top-cart-item-quantity">x 2</span>
										</div>
									</div>
									<div class="top-cart-item clearfix">
										<div class="top-cart-item-image">
											<a href="#"><img src="images/shop/small/6.jpg" alt="Light Blue Denim Dress" /></a>
										</div>
										<div class="top-cart-item-desc">
											<a href="#">Light Blue Denim Dress</a>
											<span class="top-cart-item-price">$24.99</span>
											<span class="top-cart-item-quantity">x 3</span>
										</div>
									</div>
								</div>
								<div class="top-cart-action clearfix">
									<span class="fleft top-checkout-price">$114.95</span>
									<button class="button button-3d button-small nomargin fright">View Cart</button>
								</div>
							</div>
						</div>--><!-- #top-cart end -->

						<!-- Top Search
						============================================= -->
						<!--<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div>--><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->


		@yield('title')
		@yield('slider')

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				@yield('content')
			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2020 All Rights Reserved by mksoft.<br>
						
					</div>

					<div class="col_half col_last tright">
						

						<i class="icon-envelope2"></i> mksoft@gmail.com <span class="middot">&middot;</span> <!--<i class="icon-headphones"></i> +502 49004019--></div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

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

	<!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
	<script src="{{ URL::asset('public/include/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
	<script src="{{ URL::asset('public/include/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

	<script src="{{ URL::asset('public/include/rs-plugin/js/extensions/revolution.extension.video.min.js') }}"></script>
	<script src="{{ URL::asset('public/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
	<script src="{{ URL::asset('public/include/rs-plugin/js/extensions/revolution.extension.actions.min.js') }}"></script>
	<script src="{{ URL::asset('public/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
	<script src="{{ URL::asset('public/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
	<script src="{{ URL::asset('public/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js') }}"></script>
	<script src="{{ URL::asset('public/include/rs-plugin/js/extensions/revolution.extension.migration.min.js') }}"></script>
	<script src="{{ URL::asset('public/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js') }}"></script>
	
	<script src="{{ URL::asset('js/datatables.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('admin/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
	<script src="{{ URL::asset('admin/assets/vendors/custom/js/vendors/sweetalert2.init.js') }}" type="text/javascript"></script>

	<!-- Select-Boxes Plugin -->
	<script src="{{ URL::asset('public/js/components/select-boxes.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		</script>
	<script>

		var tpj=jQuery;
		tpj.noConflict();

		tpj(document).ready(function() {

			var apiRevoSlider = tpj('#rev_slider_ishop').show().revolution(
			{
				sliderType:"standard",
				jsFileLocation:"include/rs-plugin/js/",
				sliderLayout:"fullwidth",
				dottedOverlay:"none",
				delay:9000,
				navigation: {},
				responsiveLevels:[1200,992,768,480,320],
				gridwidth:1140,
				gridheight:500,
				lazyType:"none",
				shadow:0,
				spinner:"off",
				autoHeight:"off",
				disableProgressBar:"on",
				hideThumbsOnMobile:"off",
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				debugMode:false,
				fallbacks: {
					simplifyAll:"off",
					disableFocusListener:false,
				},
				navigation: {
					keyboardNavigation:"off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation:"off",
					onHoverStop:"off",
					touch:{
						touchenabled:"on",
						swipe_threshold: 75,
						swipe_min_touches: 1,
						swipe_direction: "horizontal",
						drag_block_vertical: false
					},
					arrows: {
						style: "ares",
						enable: true,
						hide_onmobile: false,
						hide_onleave: false,
						tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder"></span> </div>',
						left: {
							h_align: "left",
							v_align: "center",
							h_offset: 10,
							v_offset: 0
						},
						right: {
							h_align: "right",
							v_align: "center",
							h_offset: 10,
							v_offset: 0
						}
					}
				}
			});

			apiRevoSlider.bind("revolution.slide.onloaded",function (e) {
				SEMICOLON.slider.sliderParallaxDimensions();
			});

		}); //ready

	</script>

	@yield('scripts')

</body>
</html>