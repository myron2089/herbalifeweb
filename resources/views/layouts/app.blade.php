<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>

		<!--begin::Base Path (base relative path for assets of this page) -->
		<base href="../">

		<!--end::Base Path -->
		<meta charset="utf-8" />
		<meta name="_token" content="{!! csrf_token() !!}"/>
		<title>Herbalife | Admin</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Asap+Condensed:500"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Vendors Styles(used by this page) -->
		<link href="{{ asset('admin/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="{{ asset('admin/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="{{ asset('admin/assets/vendors/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/datatables.css') }}" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="{{ asset('admin/assets/css/demo11/style.bundle.css') }}" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin:: Custom Styles -->
		<link href="{{ asset('admin/assets/css/custom-admin.css') }}" rel="stylesheet" type="text/css" />

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{ asset('admin/assets/media/logos/favicon.ico') }}" />

		@yield('css')
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="demo11/index.html">
					<img alt="Logo" src="{{url('admin/assets/media/logos/herbalife-logo.png')}}" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
			</div>
		</div>

		<!-- end:: Header Mobile -->
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					<!-- begin:: Header -->
					<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
						<div class="kt-container  kt-container--fluid ">

							<!-- begin:: Brand -->
							<div class="kt-header__brand " id="kt_header_brand">
								<div class="kt-header__brand-logo">
									<a href="demo11/index.html">
										<img alt="Logo" src="{{url('admin/assets/media/logos/herbalife-logo.png')}}" />
									</a>
								</div>
								<div class="kt-header__brand-nav">
									<div class="dropdown">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
											Dashboard
										</button>
										<div class="dropdown-menu dropdown-menu-fit dropdown-menu-md">
											<ul class="kt-nav kt-nav--bold kt-nav--md-space kt-margin-t-20 kt-margin-b-20">
												<li class="kt-nav__item">
													<a class="kt-nav__link active" href="#">
														<span class="kt-nav__link-icon"><i class="flaticon2-user"></i></span>
														<span class="kt-nav__link-text">Human Resources</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a class="kt-nav__link" href="#">
														<span class="kt-nav__link-icon"><i class="flaticon-feed"></i></span>
														<span class="kt-nav__link-text">Customer Relationship</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a class="kt-nav__link" href="#">
														<span class="kt-nav__link-icon"><i class="flaticon2-settings"></i></span>
														<span class="kt-nav__link-text">Order Processing</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a class="kt-nav__link" href="#">
														<span class="kt-nav__link-icon"><i class="flaticon2-chart2"></i></span>
														<span class="kt-nav__link-text">Accounting</span>
													</a>
												</li>
												<li class="kt-nav__separator"></li>
												<li class="kt-nav__item">
													<a class="kt-nav__link" href="#">
														<span class="kt-nav__link-icon"><i class="flaticon-security"></i></span>
														<span class="kt-nav__link-text">Finance</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a class="kt-nav__link" href="#">
														<span class="kt-nav__link-icon"><i class="flaticon2-cup"></i></span>
														<span class="kt-nav__link-text">Administration</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<!-- end:: Brand -->

							<!-- begin:: Header Topbar -->
							<div class="kt-header__topbar">

								<!--begin: Search -->
								<!--<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon"><i class="flaticon2-search-1"></i></span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
										<div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
											<form method="get" class="kt-quick-search__form">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
													<input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
													<div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
												</div>
											</form>
											<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
											</div>
										</div>
									</div>
								</div>-->

								<!--end: Search -->

								<!--begin: Notifications -->
								<!--<div class="kt-header__topbar-item dropdown">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i></span>
										<span class="kt-hidden kt-badge kt-badge--danger"></span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
										<form>

											
											<div class="kt-head kt-head--skin-light kt-head--fit-x kt-head--fit-b">
												<h3 class="kt-head__title">
													User Notifications
													&nbsp;
													<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 new</span>
												</h3>
												<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
													<li class="nav-item">
														<a class="nav-link active show" data-toggle="tab" href="#topbar_notifications_notifications" role="tab" aria-selected="true">Alerts</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#topbar_notifications_events" role="tab" aria-selected="false">Events</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#topbar_notifications_logs" role="tab" aria-selected="false">Logs</a>
													</li>
												</ul>
											</div>

											
											<div class="tab-content">
												<div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
													<div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-line-chart kt-font-success"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New order has been received
																</div>
																<div class="kt-notification__item-time">
																	2 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-box-1 kt-font-brand"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New customer is registered
																</div>
																<div class="kt-notification__item-time">
																	3 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-chart2 kt-font-danger"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	Application has been approved
																</div>
																<div class="kt-notification__item-time">
																	3 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-image-file kt-font-warning"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New file has been uploaded
																</div>
																<div class="kt-notification__item-time">
																	5 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-bar-chart kt-font-info"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New user feedback received
																</div>
																<div class="kt-notification__item-time">
																	8 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-pie-chart-2 kt-font-success"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	System reboot has been successfully completed
																</div>
																<div class="kt-notification__item-time">
																	12 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-favourite kt-font-danger"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New order has been placed
																</div>
																<div class="kt-notification__item-time">
																	15 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item kt-notification__item--read">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-safe kt-font-primary"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	Company meeting canceled
																</div>
																<div class="kt-notification__item-time">
																	19 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-psd kt-font-success"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New report has been received
																</div>
																<div class="kt-notification__item-time">
																	23 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon-download-1 kt-font-danger"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	Finance report has been generated
																</div>
																<div class="kt-notification__item-time">
																	25 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon-security kt-font-warning"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New customer comment recieved
																</div>
																<div class="kt-notification__item-time">
																	2 days ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-pie-chart kt-font-success"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New customer is registered
																</div>
																<div class="kt-notification__item-time">
																	3 days ago
																</div>
															</div>
														</a>
													</div>
												</div>
												<div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
													<div class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-psd kt-font-success"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New report has been received
																</div>
																<div class="kt-notification__item-time">
																	23 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon-download-1 kt-font-danger"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	Finance report has been generated
																</div>
																<div class="kt-notification__item-time">
																	25 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-line-chart kt-font-success"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New order has been received
																</div>
																<div class="kt-notification__item-time">
																	2 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-box-1 kt-font-brand"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New customer is registered
																</div>
																<div class="kt-notification__item-time">
																	3 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-chart2 kt-font-danger"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	Application has been approved
																</div>
																<div class="kt-notification__item-time">
																	3 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-image-file kt-font-warning"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New file has been uploaded
																</div>
																<div class="kt-notification__item-time">
																	5 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-bar-chart kt-font-info"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New user feedback received
																</div>
																<div class="kt-notification__item-time">
																	8 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-pie-chart-2 kt-font-success"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	System reboot has been successfully completed
																</div>
																<div class="kt-notification__item-time">
																	12 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-favourite kt-font-brand"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New order has been placed
																</div>
																<div class="kt-notification__item-time">
																	15 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item kt-notification__item--read">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-safe kt-font-primary"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	Company meeting canceled
																</div>
																<div class="kt-notification__item-time">
																	19 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-psd kt-font-success"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New report has been received
																</div>
																<div class="kt-notification__item-time">
																	23 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon-download-1 kt-font-danger"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	Finance report has been generated
																</div>
																<div class="kt-notification__item-time">
																	25 hrs ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon-security kt-font-warning"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New customer comment recieved
																</div>
																<div class="kt-notification__item-time">
																	2 days ago
																</div>
															</div>
														</a>
														<a href="#" class="kt-notification__item">
															<div class="kt-notification__item-icon">
																<i class="flaticon2-pie-chart kt-font-success"></i>
															</div>
															<div class="kt-notification__item-details">
																<div class="kt-notification__item-title">
																	New customer is registered
																</div>
																<div class="kt-notification__item-time">
																	3 days ago
																</div>
															</div>
														</a>
													</div>
												</div>
												<div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
													<div class="kt-grid kt-grid--ver" style="min-height: 200px;">
														<div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
															<div class="kt-grid__item kt-grid__item--middle kt-align-center">
																All caught up!
																<br>No new notifications.
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div> -->

								<!--end: Notifications -->

								<!--begin: Quick actions -->
								<!-- <div class="kt-header__topbar-item dropdown">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon"><i class="flaticon2-gear"></i></span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
										<form>

											
											<div class="kt-head kt-head--skin-light">
												<h3 class="kt-head__title">
													User Quick Actions
													<span class="kt-space-15"></span>
													<span class="btn btn-success btn-sm btn-bold btn-font-md">23 tasks pending</span>
												</h3>
											</div>

											
											<div class="kt-grid-nav kt-grid-nav--skin-light">
												<div class="kt-grid-nav__row">
													<a href="#" class="kt-grid-nav__item">
														<span class="kt-grid-nav__icon">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect id="bound" x="0" y="0" width="24" height="24" />
																	<path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
																	<path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" id="C" fill="#000000" />
																</g>
															</svg> </span>
														<span class="kt-grid-nav__title">Accounting</span>
														<span class="kt-grid-nav__desc">eCommerce</span>
													</a>
													<a href="#" class="kt-grid-nav__item">
														<span class="kt-grid-nav__icon">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect id="bound" x="0" y="0" width="24" height="24" />
																	<path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
																	<path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" id="Combined-Shape" fill="#000000" />
																</g>
															</svg> </span>
														<span class="kt-grid-nav__title">Administration</span>
														<span class="kt-grid-nav__desc">Console</span>
													</a>
												</div>
												<div class="kt-grid-nav__row">
													<a href="#" class="kt-grid-nav__item">
														<span class="kt-grid-nav__icon">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect id="bound" x="0" y="0" width="24" height="24" />
																	<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" id="Combined-Shape" fill="#000000" />
																	<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" id="Path" fill="#000000" opacity="0.3" />
																</g>
															</svg> </span>
														<span class="kt-grid-nav__title">Projects</span>
														<span class="kt-grid-nav__desc">Pending Tasks</span>
													</a>
													<a href="#" class="kt-grid-nav__item">
														<span class="kt-grid-nav__icon">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon id="Shape" points="0 0 24 0 24 24 0 24" />
																	<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																	<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" />
																</g>
															</svg> </span>
														<span class="kt-grid-nav__title">Customers</span>
														<span class="kt-grid-nav__desc">Latest cases</span>
													</a>
												</div>
											</div>

											
										</form>
									</div>
								</div> -->

								<!--end: Quick actions -->

								<!--begin: Cart -->
								<!--<div class="kt-header__topbar-item dropdown">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon"><i class="flaticon2-shopping-cart-1"></i></span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
										<form>

											
											<div class="kt-mycart">
												<div class="kt-mycart__head kt-head" style="background-image: url(./assets/media/misc/bg-1.jpg);">
													<div class="kt-mycart__info">
														<span class="kt-mycart__icon"><i class="flaticon2-shopping-cart-1 kt-font-success"></i></span>
														<h3 class="kt-mycart__title">My Cart</h3>
													</div>
													<div class="kt-mycart__button">
														<button type="button" class="btn btn-success btn-sm" style=" ">2 Items</button>
													</div>
												</div>
												<div class="kt-mycart__body kt-scroll" data-scroll="true" data-height="245" data-mobile-height="200">
													<div class="kt-mycart__item">
														<div class="kt-mycart__container">
															<div class="kt-mycart__info">
																<a href="#" class="kt-mycart__title">
																	Samsung
																</a>
																<span class="kt-mycart__desc">
																	Profile info, Timeline etc
																</span>
																<div class="kt-mycart__action">
																	<span class="kt-mycart__price">$ 450</span>
																	<span class="kt-mycart__text">for</span>
																	<span class="kt-mycart__quantity">7</span>
																	<a href="#" class="btn btn-label-success btn-icon">&minus;</a>
																	<a href="#" class="btn btn-label-success btn-icon">&plus;</a>
																</div>
															</div>
															<a href="#" class="kt-mycart__pic">
																<img src="{{url('admin/assets/media/logos/herbalife-logo.png')}}" title="">
															</a>
														</div>
													</div>
													<div class="kt-mycart__item">
														<div class="kt-mycart__container">
															<div class="kt-mycart__info">
																<a href="#" class="kt-mycart__title">
																	Panasonic
																</a>
																<span class="kt-mycart__desc">
																	For PHoto & Others
																</span>
																<div class="kt-mycart__action">
																	<span class="kt-mycart__price">$ 329</span>
																	<span class="kt-mycart__text">for</span>
																	<span class="kt-mycart__quantity">1</span>
																	<a href="#" class="btn btn-label-success btn-icon">&minus;</a>
																	<a href="#" class="btn btn-label-success btn-icon">&plus;</a>
																</div>
															</div>
															<a href="#" class="kt-mycart__pic">
																<img src="{{url('admin/assets/media/logos/herbalife-logo.png')}}" title="">
															</a>
														</div>
													</div>
													<div class="kt-mycart__item">
														<div class="kt-mycart__container">
															<div class="kt-mycart__info">
																<a href="#" class="kt-mycart__title">
																	Fujifilm
																</a>
																<span class="kt-mycart__desc">
																	Profile info, Timeline etc
																</span>
																<div class="kt-mycart__action">
																	<span class="kt-mycart__price">$ 520</span>
																	<span class="kt-mycart__text">for</span>
																	<span class="kt-mycart__quantity">6</span>
																	<a href="#" class="btn btn-label-success btn-icon">&minus;</a>
																	<a href="#" class="btn btn-label-success btn-icon">&plus;</a>
																</div>
															</div>
															<a href="#" class="kt-mycart__pic">
																<img src="{{url('admin/assets/media/logos/herbalife-logo.png')}}" title="">
															</a>
														</div>
													</div>
													<div class="kt-mycart__item">
														<div class="kt-mycart__container">
															<div class="kt-mycart__info">
																<a href="#" class="kt-mycart__title">
																	Candy Machine
																</a>
																<span class="kt-mycart__desc">
																	For PHoto & Others
																</span>
																<div class="kt-mycart__action">
																	<span class="kt-mycart__price">$ 784</span>
																	<span class="kt-mycart__text">for</span>
																	<span class="kt-mycart__quantity">4</span>
																	<a href="#" class="btn btn-label-success btn-icon">&minus;</a>
																	<a href="#" class="btn btn-label-success btn-icon">&plus;</a>
																</div>
															</div>
															<a href="#" class="kt-mycart__pic">
																<img src="{{url('admin/assets/media/logos/herbalife-logo.png')}}" title="" alt="">
															</a>
														</div>
													</div>
												</div>
												<div class="kt-mycart__footer">
													<div class="kt-mycart__section">
														<div class="kt-mycart__subtitel">
															<span>Sub Total</span>
															<span>Taxes</span>
															<span>Total</span>
														</div>
														<div class="kt-mycart__prices">
															<span>$ 840.00</span>
															<span>$ 72.00</span>
															<span class="kt-font-brand">$ 912.00</span>
														</div>
													</div>
													<div class="kt-mycart__button kt-align-right">
														<button type="button" class="btn btn-primary btn-sm">Place Order</button>
													</div>
												</div>
											</div>

											
										</form>
									</div>
								</div> -->

								<!--end: Cart-->

								<!--begin: Quick panel toggler -->
								<!--<div class="kt-header__topbar-item" data-toggle="kt-tooltip" title="Quick panel" data-placement="top">
									<div class="kt-header__topbar-wrapper">
										<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="flaticon2-menu-2"></i></span>
									</div>
								</div> -->

								<!--end: Quick panel toggler -->

								<!--begin: Language bar -->
								<!--<div class="kt-header__topbar-item kt-header__topbar-item--langs">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon">
											<img class="" src="./assets/media/flags/012-uk.svg" alt="" />
										</span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
										<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
											<li class="kt-nav__item kt-nav__item--active">
												<a href="#" class="kt-nav__link">
													<span class="kt-nav__link-icon"><img src="./assets/media/flags/020-flag.svg" alt="" /></span>
													<span class="kt-nav__link-text">English</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<span class="kt-nav__link-icon"><img src="./assets/media/flags/016-spain.svg" alt="" /></span>
													<span class="kt-nav__link-text">Spanish</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<span class="kt-nav__link-icon"><img src="./assets/media/flags/017-germany.svg" alt="" /></span>
													<span class="kt-nav__link-text">German</span>
												</a>
											</li>
										</ul>
									</div>
								</div> -->

								<!--end: Language bar -->

								<!--begin: User bar -->
								<div class="kt-header__topbar-item kt-header__topbar-item--user">
									@if(Auth::check())
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										
										<span class="kt-header__topbar-welcome kt-visible-desktop">@lang('base.hi'),</span>
										
										@php
											$firstLetter = substr(Auth::user()->userFirstName,0,1);
										@endphp

										<span class="kt-header__topbar-username kt-visible-desktop">{{Auth::user()->userFirstName}}</span>
										<!--<img alt="Pic" src="./assets/media/users/300_21.jpg" /> -->
										<span class="kt-header__topbar-icon kt-bg-brand"><b>{{$firstLetter}}</b></span>
										
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

										<!--begin: Head -->
										<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
											<div class="kt-user-card__avatar">
												<!--<img class="kt-hidden" alt="Pic" src="./assets/media/users/300_25.jpg" />-->

												<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
												<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden-">{{$firstLetter}}</span>
											</div>
											<div class="kt-user-card__name">
												{{Auth::user()->userFirstName}}
											</div>
											<!--<div class="kt-user-card__badge">
												<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
											</div> -->
										</div>

										<!--end: Head -->

										<!--begin: Navigation -->
										<div class="kt-notification">
											<!--<a href="#" class="kt-notification__item">
												<div class="kt-notification__item-icon">
													<i class="flaticon2-calendar-3 kt-font-success"></i>
												</div>
												<div class="kt-notification__item-details">
													<div class="kt-notification__item-title kt-font-bold">
														@lang('base.my_profile')
													</div>
													<div class="kt-notification__item-time">
														@lang('base.my_profile_description')
													</div>
												</div> 
											</a>-->
											
											<div class="kt-notification__custom kt-space-between">
												<a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="btn btn-label btn-label-brand btn-sm btn-bold">@lang('base.btn_sign_out')</a>
												<!--<a href="demo11/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>-->
												<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
												    {{ csrf_field() }}
												</form>
											</div>
										</div>

										<!--end: Navigation -->
									</div>
									@else
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										
										<span class="kt-header__topbar-welcome kt-visible-desktop"><a href="{{url('login')}}">@lang('base.login')</a></span>
									</div>

									@endif
								</div>

								<!--end: User bar -->
							</div>

							<!-- end:: Header Topbar -->
						</div>
					</div>

					<!-- end:: Header -->
					<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
						<div class="kt-container  kt-container--fluid  kt-grid kt-grid--ver">
							

							<!-- begin::Admin submenu -->
								<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
								<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside" style="opacity: 1;">

								   <!-- begin:: Aside Menu -->
								    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
								        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
								            <ul class="kt-menu__nav ">
								                <li class="kt-menu__item " aria-haspopup="false"><a href="{{url('administracion/inicio')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-home"></i><span class="kt-menu__link-text">@lang('base.home')</span></a></li>

								                <!--<li class="kt-menu__item " aria-haspopup="false"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">@lang('base.account')</span></a></li>-->

								                @if(Auth::user()->user_type_id == 1)
								                <li class="kt-menu__section kt-menu__section--first">
								                    <h4 class="kt-menu__section-text">@lang('base.management')</h4>
								                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
								                </li>
								                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-users-1"></i><span class="kt-menu__link-text">@lang('base.users')</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
								                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								                        <ul class="kt-menu__subnav">
								                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Resources</span></span></li>
								                            <li class="kt-menu__item " aria-haspopup="false"><a href="{{url('administracion/usuarios/create')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('base.create_user')</span></a></li>
								                            <li class="kt-menu__item " aria-haspopup="false"><a href="{{url('administracion/usuarios')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('base.show_users')</span></a></li>
								                            
								                        </ul>
								                    </div>
								                </li>

								                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-box-1"></i><span class="kt-menu__link-text">@lang('base.products')</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
								                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								                        <ul class="kt-menu__subnav">
								                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Resources</span></span></li>
								                            <li class="kt-menu__item " aria-haspopup="false"><a href="{{url('administracion/productos')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('base.products_management')</span></a></li>
								                            <li class="kt-menu__item " aria-haspopup="false"><a href="{{url('administracion/productos/create')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('base.new_product')</span></a></li>
								                        </ul>
								                    </div>
								                </li>

								                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-group"></i><span class="kt-menu__link-text">@lang('base.suppliers')</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
								                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								                        <ul class="kt-menu__subnav">
								                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Resources</span></span></li>
								                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('administracion/proveedores')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('base.suppliers_management')</span></a></li>
								                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('administracion/proveedores/create')}}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('base.new_supplier')</span></a></li>
								                        </ul>
								                    </div>
								                </li>



								                <li class="kt-menu__section kt-menu__section--first">
								                    <h4 class="kt-menu__section-text">@lang('base.distributors')</h4>
								                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
								                </li>


								                <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('administracion/distribuidores')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-suitcase"></i><span class="kt-menu__link-text">@lang('base.distributors_management')</span></a></li>

								                @endif

								                @if(Auth::user()->user_type_id==1 || Auth::user()->user_type_id == 2)
								                
								                <li class="kt-menu__section kt-menu__section--first">
								                    <h4 class="kt-menu__section-text">@lang('base.products_income')</h4>
								                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
								                </li>

								                <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('administracion/ingresos/create')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-plus"></i><span class="kt-menu__link-text">@lang('base.new_income')</span></a></li>

								                @endif

								                <li class="kt-menu__item " aria-haspopup="true"><a href="{{url('administracion/ingresos')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-list"></i><span class="kt-menu__link-text">@lang('base.show_incomes')</span></a></li>

								                <li class="kt-menu__section kt-menu__section--first">
								                    <h4 class="kt-menu__section-text">@lang('base.sales')</h4>
								                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
								                </li>
								                
								                
								                <!--<li class="kt-menu__item " aria-haspopup="true"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-plus"></i><span class="kt-menu__link-text">@lang('base.new_sale')</span></a></li>-->
								                <li class="kt-menu__item " aria-haspopup="false"><a href="{{url('administracion/ventas')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-list"></i><span class="kt-menu__link-text">@lang('base.show_sales')</span></a></li>


								                <li class="kt-menu__section kt-menu__section--first">
								                    <h4 class="kt-menu__section-text">@lang('base.orders')</h4>
								                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
								                </li>
								                <li class="kt-menu__item " aria-haspopup="false"><a href="{{url('administracion/pedidos')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-notes"></i><span class="kt-menu__link-text">@lang('base.show_orders')</span></a></li>



								                <li class="kt-menu__section ">
								                    <h4 class="kt-menu__section-text">@lang('base.reports')</h4>
								                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
								                </li>
								                <li class="kt-menu__item " aria-haspopup="false"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-graphic"></i><span class="kt-menu__link-text">@lang('base.purchases')</span></a></li>
								                <li class="kt-menu__item " aria-haspopup="false"><a href="#" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-network"></i><span class="kt-menu__link-text">@lang('base.sales')</span></a></li>
								                
								            </ul>
								        </div>
								    </div>

								    <!-- end:: Aside Menu -->
								</div>
							<!-- end::Admin submenu -->

							@yield('content')
						</div>
					</div>
					<!-- end:: Body-->

					<!-- begin:: Footer -->
					<div class="kt-footer kt-grid__item" id="kt_footer">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-footer__wrapper">
								<div class="kt-footer__copyright">
									2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Keenthemes</a>
								</div>
								<div class="kt-footer__menu">
									<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">About</a>
									<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Team</a>
									<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Contact</a>
								</div>
							</div>
						</div>
					</div>

					<!-- end:: Footer -->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->



		

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"light": "#ffffff",
						"dark": "#282a3c",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin:: Global Mandatory Vendors -->
		<script src="{{ URL::asset('admin/assets/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/wnumb/wNumb.js') }}" type="text/javascript"></script>

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<script src="{{ URL::asset('admin/assets/vendors/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/js/vendors/bootstrap-switch.init.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/js/vendors/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/js/vendors/bootstrap-notify.init.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/js/vendors/jquery-validation.init.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/raphael/raphael.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/morris.js/morris.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/js/vendors/sweetalert2.init.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{ URL::asset('admin/assets/js/demo11/scripts.bundle.js') }}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		<script src="{{ URL::asset('admin/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
		<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
		<script src="{{ URL::asset('admin/assets/vendors/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="{{ URL::asset('admin/assets/js/demo11/pages/dashboard.js') }}" type="text/javascript"></script>

		
		<!--begin::Page Scripts(used by this page) -->
		<script src="{{ URL::asset('admin/assets/js/demo1/pages/crud/metronic-datatable/base/html-table.js') }}" type="text/javascript"></script>

		<script src="{{ URL::asset('js/datatables.js') }}" type="text/javascript"></script>

		<script type="text/javascript">
		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		</script>
		@yield('scripts')
		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>