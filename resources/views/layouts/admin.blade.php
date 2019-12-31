<!DOCTYPE html>
<html lang="en" @if(App::isLocale('ar')) dir="rtl" @endif >

	<!-- begin::Head -->
	<head>

		<!--begin::Base Path (base relative path for assets of this page) -->
		<base href="../">

		<!--end::Base Path -->
		<meta charset="utf-8" />
		<title>E-Commerce | Admin</title>
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
		<link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

		<!--end::Page Vendors Styles -->

		<!--begin:: Global Mandatory Vendors -->
		<link href="{{asset('assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<link href="{{asset('assets/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link @if(App::isLocale('ar')) href="{{asset('assets/css/demo11/style.bundle.rtl.css')}}"  @else href="{{asset('assets/css/demo11/style.bundle.css')}}"  @endif rel="stylesheet" type="text/css" />
        

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="demo11/index.html">
					
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
										
				                 	<img src="{{ asset('storage/'. $logo) }}" alt=""  style="width:50px"/>
									</a>
								</div>
								<div class="kt-header__brand-nav">
									<div class="dropdown">
										
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
								<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon"><i class="flaticon2-search-1"></i></span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
										<div class="kt-quick-search kt-quick-search--inline" id="kt_quick_search_inline">
											 @yield('search')
											<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
											</div>
										</div>
									</div>
								</div>

								<!--end: Search -->

								<!--begin: Notifications -->
								<div class="kt-header__topbar-item dropdown">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon"><i class="flaticon2-bell-alarm-symbol"></i></span>
										<span class="kt-hidden kt-badge kt-badge--danger"></span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
										<form>

											<!--begin: Head -->
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

											<!--end: Head -->
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
								</div>

								<!--end: Notifications -->

								

								<!--begin: Cart -->
								<div class="kt-header__topbar-item dropdown">
									
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
										<form>

											<!-- begin:: Mycart -->
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
																<img src="./assets/media/products/product9.jpg" title="">
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
																<img src="./assets/media/products/product13.jpg" title="">
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
																<img src="./assets/media/products/product16.jpg" title="">
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
																<img src="./assets/media/products/product15.jpg" title="" alt="">
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

											<!-- end:: Mycart -->
										</form>
									</div>
								</div>

								<!--end: Cart-->


								<!--begin: Language bar -->
								<div class="kt-header__topbar-item kt-header__topbar-item--langs">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
										<span class="kt-header__topbar-icon">
											<i class="fas fa-globe-europe"></i>
										</span>
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
										<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
											<li class="kt-nav__item kt-nav__item--active">
												<a href="{{ route('lang', ['en'])}}"  class="kt-nav__link">
													<span class="kt-nav__link-text" >{{__('English')}}</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="{{ route('lang', ['ar']) }}" class="kt-nav__link">
												
													<span class="kt-nav__link-text">{{__('Arabic')}}</span>
												</a>
											</li>
										
										</ul>
									</div>
								</div>

								<!--end: Language bar -->

								<!--begin: User bar -->
								<div class="kt-header__topbar-item kt-header__topbar-item--user">
									<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									
										<span class="kt-header__topbar-username kt-visible-desktop">
										{{ auth()->guard('admin')->user()->username }} </span>
										<img src="{{ asset('storage/'. auth()->guard('admin')->user()->img) }}" alt="" style="height: 50px;" />
									</div>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

										<!--begin: Head -->
										<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
											<div class="kt-user-card__avatar">
												<img class="kt-hidden-" alt="Pic" src="{{ asset('storage/'. auth()->guard('admin')->user()->img) }}"/>

												<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
												<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
											</div>
											<div class="kt-user-card__name">
											{{ auth()->guard('admin')->user()->username }}
											</div>
											<div class="kt-user-card__badge">
												<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
											</div>
										</div>

										<!--end: Head -->

										<!--begin: Navigation -->
										<div class="kt-notification">
											<a href="#" class="kt-notification__item">
												<div class="kt-notification__item-icon">
													<i class="flaticon2-calendar-3 kt-font-success"></i>
												</div>
												<div class="kt-notification__item-details">
													<div class="kt-notification__item-title kt-font-bold">
														My Profile
													</div>
													<div class="kt-notification__item-time">
														Account settings and more
													</div>
												</div>
											</a>
											<a href="#" class="kt-notification__item">
												<div class="kt-notification__item-icon">
													<i class="flaticon2-mail kt-font-warning"></i>
												</div>
												<div class="kt-notification__item-details">
													<div class="kt-notification__item-title kt-font-bold">
														My Messages
													</div>
													<div class="kt-notification__item-time">
														Inbox and tasks
													</div>
												</div>
											</a>
											<a href="#" class="kt-notification__item">
												<div class="kt-notification__item-icon">
													<i class="flaticon2-rocket-1 kt-font-danger"></i>
												</div>
												<div class="kt-notification__item-details">
													<div class="kt-notification__item-title kt-font-bold">
														My Activities
													</div>
													<div class="kt-notification__item-time">
														Logs and notifications
													</div>
												</div>
											</a>
											<a href="#" class="kt-notification__item">
												<div class="kt-notification__item-icon">
													<i class="flaticon2-hourglass kt-font-brand"></i>
												</div>
												<div class="kt-notification__item-details">
													<div class="kt-notification__item-title kt-font-bold">
														My Tasks
													</div>
													<div class="kt-notification__item-time">
														latest tasks and projects
													</div>
												</div>
											</a>
											<a href="#" class="kt-notification__item">
												<div class="kt-notification__item-icon">
													<i class="flaticon2-cardiogram kt-font-warning"></i>
												</div>
												<div class="kt-notification__item-details">
													<div class="kt-notification__item-title kt-font-bold">
														Billing
													</div>
													<div class="kt-notification__item-time">
														billing & statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
													</div>
												</div>
											</a>
											<div class="kt-notification__custom kt-space-between">
												<a href="{{ route('admin.logout') }}"  class="btn btn-label btn-label-brand btn-sm btn-bold">{{__('Sign Out')}}</a>
                                               
												<a href="demo11/custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
											</div>
										</div>

										<!--end: Navigation -->
									</div>
								</div>

								<!--end: User bar -->
							</div>

							<!-- end:: Header Topbar -->
						</div>
					</div>

					<!-- end:: Header -->
					<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
						<div class="kt-container  kt-container--fluid  kt-grid kt-grid--ver">

							<!-- begin:: Aside -->
						
							<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

								<!-- begin:: Aside Menu -->
								<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper"
								style="overflow: auto; height: 100%;">
									<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
										<ul class="kt-menu__nav " style="padding-top:0px;">

										<li class="kt-menu__item " aria-haspopup="true">
											  <a href="{{ route('site.index') }}" class="kt-menu__link ">
                                                <span class="kt-menu__link-text">{{ __('Dashbord')}}</span></a></li>
                                            
                                              <li class="kt-menu__item " aria-haspopup="true">
											  <a href="{{ route('admin.admins') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-icon fa fa-user-lock"></i>
                                                <span class="kt-menu__link-text">{{ __('Admin')}}</span></a></li>
                                             <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('admin.users') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-icon fa fa-users-cog"></i>
                                                <span class="kt-menu__link-text"> {{ __('User')}}</span></a></li>

											<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('admin.supplier') }}" class="kt-menu__link ">
											<i class="kt-menu__link-icon fa fa-user-tag"></i>
											<span class="kt-menu__link-text"> {{ __('Supplier')}}</span></a></li>

											<li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('admin.changecompany.index') }}" class="kt-menu__link ">
												<i class="kt-menu__link-icon fas fa-building fa-lg"></i>
												
                                                <span class="kt-menu__link-text"> {{ __('Change Company')}}</span></a></li>
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                <i class="kt-menu__link-icon fas fa-building fa-lg"></i>
                                                <span class="kt-menu__link-text">{{ __('company')}}</span>
                                                <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                                    
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">company</span></span></li>
                                                        
                                                        @foreach(\App\Company::all() as $company)
                                                        <li class="kt-menu__item " aria-haspopup="true">
                                                            <a href="{{ route('admin.company.index', ['id' => $company->id]) }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">{{ $company->name}}</span></a></li>
                                                        @endforeach
													</ul>
												</div>
											</li>
											
           
											<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
											<a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                                <i class="kt-menu__link-icon fa fa-layer-group"></i>
                                                <span class="kt-menu__link-text">{{ __('Departments')}}</span>
                                                <i class="kt-menu__ver-arrow la la-angle-right"></i>
												</a>
												<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
													<ul class="kt-menu__subnav">
														<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true">
														<span class="kt-menu__link"><span class="kt-menu__link-text">Departments</span>
														<span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger">23</span>
														</span>
														</span>
														</li>
														@foreach(\App\Department::all() as $department)
                                                        <li class="kt-menu__item " aria-haspopup="true">
                                                            <a data-toggle="modal" data-target="#add-department{{$department->id}}" class="kt-menu__link kt-menu__toggle">
															
															<span class="kt-menu__link-text">{{ $department->name}}</span></a></li>
                                                        @endforeach
														
														
													</ul>
													
												</div>
                                                
                                            </li>

                                            <li class="kt-menu__item " aria-haspopup="true">
											<a href="{{ route('admin.products') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-icon fa fa-solar-panel"></i>
                                                <span class="kt-menu__link-text">{{ __('Product')}}</span></a></li>

												<li class="kt-menu__item " aria-haspopup="true">
											<a href="{{ route('admin.manufacturers.index') }}" class="kt-menu__link ">
                                               <i class="kt-menu__link-icon fa fa-chess-queen"></i>
                                                <span class="kt-menu__link-text"> {{ __('Manufacturer')}}</span>
												</a>
											</li>

											<li class="kt-menu__item " aria-haspopup="true">
											<a href="{{ route('admin.brands.index') }}" class="kt-menu__link ">
                                               <i class="kt-menu__link-icon fa fa-feather-alt"></i>
                                                <span class="kt-menu__link-text"> {{ __('Brand')}}</span>
												</a>
											</li>
											<li class="kt-menu__item " aria-haspopup="true">
											<a href="{{ route('admin.countries') }}" class="kt-menu__link ">
                                               <i class="kt-menu__link-icon fa fa-globe"></i>
                                                <span class="kt-menu__link-text"> {{ __('Country')}}</span>
												</a>
											</li>
											<li class="kt-menu__item " aria-haspopup="true">
											<a href="{{ route('admin.cities') }}" class="kt-menu__link ">
                                               <i class="kt-menu__link-icon fa fa-city"></i>
                                                <span class="kt-menu__link-text"> {{ __('City')}}</span>
												</a>
											</li>
											<li class="kt-menu__item " aria-haspopup="true">
											<a href="{{ route('admin.sizes') }}" class="kt-menu__link ">
                                               <i class="kt-menu__link-icon fa fa-star-half-alt"></i>
                                                <span class="kt-menu__link-text"> {{ __('Size')}}</span>
												</a>
											</li>
											<li class="kt-menu__item " aria-haspopup="true">
											<a href="{{ route('admin.colors') }}" class="kt-menu__link ">
                                               <i class="kt-menu__link-icon fa fa-palette"></i>
                                                <span class="kt-menu__link-text"> {{ __('Color')}}</span>
												</a>
											</li>
											<li class="kt-menu__item " aria-haspopup="true">
                                                <a href="{{ route('admin.logos') }}" class="kt-menu__link ">
                                                <i class="kt-menu__link-icon fa fa-cogs"></i>
                                                <span class="kt-menu__link-text"> {{ __('Setting')}}</span></a></li> 

										</ul>
									</div>
								</div>

								<!-- end:: Aside Menu -->
							</div>

							<!-- end:: Aside -->
                           <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                                <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                                        @yield('content')
                                </div>
								
                                     
							
								<!-- end:: Subheader -->
                            </div>
					

				</div>
			</div>
		        </div>

		<!-- end:: Page -->

		<!-- begin::Quick Panel -->
		<div id="kt_quick_panel" class="kt-quick-panel">
			<a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
			<div class="kt-quick-panel__nav">
				<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
					<li class="nav-item active">
						<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
					</li>
				</ul>
			</div>
			<div class="kt-quick-panel__content">
				<div class="tab-content">
					<div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
						<div class="kt-notification">
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
									<i class="flaticon2-pie-chart kt-font-warning"></i>
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
					<div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
						<div class="kt-notification-v2">
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon-bell kt-font-brand"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										5 new user generated report
									</div>
									<div class="kt-notification-v2__item-desc">
										Reports based on sales
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-box kt-font-danger"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										2 new items submited
									</div>
									<div class="kt-notification-v2__item-desc">
										by Grog John
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon-psd kt-font-brand"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										79 PSD files generated
									</div>
									<div class="kt-notification-v2__item-desc">
										Reports based on sales
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-supermarket kt-font-warning"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										$2900 worth producucts sold
									</div>
									<div class="kt-notification-v2__item-desc">
										Total 234 items
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon-paper-plane-1 kt-font-success"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										4.5h-avarage response time
									</div>
									<div class="kt-notification-v2__item-desc">
										Fostest is Barry
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-information kt-font-danger"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										Database server is down
									</div>
									<div class="kt-notification-v2__item-desc">
										10 mins ago
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-mail-1 kt-font-brand"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										System report has been generated
									</div>
									<div class="kt-notification-v2__item-desc">
										Fostest is Barry
									</div>
								</div>
							</a>
							<a href="#" class="kt-notification-v2__item">
								<div class="kt-notification-v2__item-icon">
									<i class="flaticon2-hangouts-logo kt-font-warning"></i>
								</div>
								<div class="kt-notification-v2__itek-wrapper">
									<div class="kt-notification-v2__item-title">
										4.5h-avarage response time
									</div>
									<div class="kt-notification-v2__item-desc">
										Fostest is Barry
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings" role="tabpanel">
						<form class="kt-form">
							<div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Enable Notifications:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_1">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Enable Case Tracking:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" name="quick_panel_notifications_2">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-last form-group-xs row">
								<label class="col-8 col-form-label">Support Portal:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_2">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
							<div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Generate Reports:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_3">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Enable Report Export:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" name="quick_panel_notifications_3">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-last form-group-xs row">
								<label class="col-8 col-form-label">Allow Data Collection:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_4">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
							<div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Enable Member singup:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_5">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-xs row">
								<label class="col-8 col-form-label">Allow User Feedbacks:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" name="quick_panel_notifications_5">
											<span></span>
										</label>
									</span>
								</div>
							</div>
							<div class="form-group form-group-last form-group-xs row">
								<label class="col-8 col-form-label">Enable Customer Portal:</label>
								<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_6">
											<span></span>
										</label>
									</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- end::Quick Panel -->

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		<!-- begin::Sticky Toolbar -->
		<ul class="kt-sticky-toolbar" style="margin-top: 30px;">
			<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle" data-toggle="kt-tooltip" title="Check out more demos" data-placement="right">
				<a href="#" class=""><i class="flaticon2-drop"></i></a>
			</li>
			
            
			<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip" title="Documentation" data-placement="left">
				<a href="https://keenthemes.com/metronic/?page=docs" target="_blank"><i class="flaticon2-telegram-logo"></i></a>
			</li>
			<li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler" data-toggle="kt-tooltip" title="Chat Example" data-placement="left">
				<a href="#" data-toggle="modal" data-target="#kt_chat_modal"><i class="flaticon2-chat-1"></i></a>
			</li>
		</ul>

		<!-- end::Sticky Toolbar -->

		<!-- begin::Demo Panel -->
		<div id="kt_demo_panel" class="kt-demo-panel">
			<div class="kt-demo-panel__head">
				<h3 class="kt-demo-panel__title">
					Select A Demo

					<!--<small>5</small>-->
				</h3>
				<a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
			</div>
			<div class="kt-demo-panel__body">
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 1
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo1.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo1/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 2
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo2.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo2/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 3
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo3.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo3/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 4
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo4.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo4/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 5
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo5.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo5/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 6
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo6.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo6/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 7
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo7.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo7/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 8
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo8.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo8/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 9
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo9.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo9/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 10
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo10.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo10/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item kt-demo-panel__item--active">
					<div class="kt-demo-panel__item-title">
						Demo 11
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo11.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo11/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 12
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo12.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="demo12/index.html" class="btn btn-brand btn-elevate " target="_blank">Preview</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 13
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo13.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
						</div>
					</div>
				</div>
				<div class="kt-demo-panel__item ">
					<div class="kt-demo-panel__item-title">
						Demo 14
					</div>
					<div class="kt-demo-panel__item-preview">
						<img src="./assets/media/demos/preview/demo14.jpg" alt="" />
						<div class="kt-demo-panel__item-preview-overlay">
							<a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
						</div>
					</div>
				</div>
				<a href="https://1.envato.market/EA4JP" target="_blank" class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
					Buy Metronic Now!
				</a>
			</div>
		</div>

		<!-- end::Demo Panel -->

		<!--Begin:: Chat-->
		<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="kt-chat">
						<div class="kt-portlet kt-portlet--last">
							<div class="kt-portlet__head">
								<div class="kt-chat__head ">
									<div class="kt-chat__left">
										<div class="kt-chat__label">
											<a href="#" class="kt-chat__title">Jason Muller</a>
											<span class="kt-chat__status">
												<span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
											</span>
										</div>
									</div>
									<div class="kt-chat__right">
										<div class="dropdown dropdown-inline">
											<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="flaticon-more-1"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">

												<!--begin::Nav-->
												<ul class="kt-nav">
													<li class="kt-nav__head">
														Messaging
														<i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
													</li>
													<li class="kt-nav__separator"></li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon flaticon2-group"></i>
															<span class="kt-nav__link-text">New Group</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon flaticon2-open-text-book"></i>
															<span class="kt-nav__link-text">Contacts</span>
															<span class="kt-nav__link-badge">
																<span class="kt-badge kt-badge--brand  kt-badge--rounded-">5</span>
															</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon flaticon2-bell-2"></i>
															<span class="kt-nav__link-text">Calls</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon flaticon2-dashboard"></i>
															<span class="kt-nav__link-text">Settings</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon flaticon2-protected"></i>
															<span class="kt-nav__link-text">Help</span>
														</a>
													</li>
													<li class="kt-nav__separator"></li>
													<li class="kt-nav__foot">
														<a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
														<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
													</li>
												</ul>

												<!--end::Nav-->
											</div>
										</div>
										<button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
											<i class="flaticon2-cross"></i>
										</button>
									</div>
								</div>
							</div>
							<div class="kt-portlet__body">
								<div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="300">
									<div class="kt-chat__messages kt-chat__messages--solid">
										<div class="kt-chat__message kt-chat__message--success">
											<div class="kt-chat__user">
												<span class="kt-userpic kt-userpic--circle kt-userpic--sm">
													<img src="./assets/media/users/100_12.jpg" alt="image">
												</span>
												<a href="#" class="kt-chat__username">Jason Muller</span></a>
												<span class="kt-chat__datetime">2 Hours</span>
											</div>
											<div class="kt-chat__text">
												How likely are you to recommend our company<br> to your friends and family?
											</div>
										</div>
										<div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
											<div class="kt-chat__user">
												<span class="kt-chat__datetime">30 Seconds</span>
												<a href="#" class="kt-chat__username">You</span></a>
												<span class="kt-userpic kt-userpic--circle kt-userpic--sm">
													<img src="./assets/media/users/300_21.jpg" alt="image">
												</span>
											</div>
											<div class="kt-chat__text">
												Hey there, we’re just writing to let you know that you’ve<br> been subscribed to a repository on GitHub.
											</div>
										</div>
										<div class="kt-chat__message kt-chat__message--success">
											<div class="kt-chat__user">
												<span class="kt-userpic kt-userpic--circle kt-userpic--sm">
													<img src="./assets/media/users/100_12.jpg" alt="image">
												</span>
												<a href="#" class="kt-chat__username">Jason Muller</span></a>
												<span class="kt-chat__datetime">30 Seconds</span>
											</div>
											<div class="kt-chat__text">
												Ok, Understood!
											</div>
										</div>
										<div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
											<div class="kt-chat__user">
												<span class="kt-chat__datetime">Just Now</span>
												<a href="#" class="kt-chat__username">You</span></a>
												<span class="kt-userpic kt-userpic--circle kt-userpic--sm">
													<img src="./assets/media/users/300_21.jpg" alt="image">
												</span>
											</div>
											<div class="kt-chat__text">
												You’ll receive notifications for all issues, pull requests!
											</div>
										</div>
										<div class="kt-chat__message kt-chat__message--success">
											<div class="kt-chat__user">
												<span class="kt-userpic kt-userpic--circle kt-userpic--sm">
													<img src="./assets/media/users/100_12.jpg" alt="image">
												</span>
												<a href="#" class="kt-chat__username">Jason Muller</span></a>
												<span class="kt-chat__datetime">2 Hours</span>
											</div>
											<div class="kt-chat__text">
												You were automatically <b class="kt-font-brand">subscribed</b> <br>because you’ve been given access to the repository
											</div>
										</div>
										<div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
											<div class="kt-chat__user">
												<span class="kt-chat__datetime">30 Seconds</span>
												<a href="#" class="kt-chat__username">You</span></a>
												<span class="kt-userpic kt-userpic--circle kt-userpic--sm">
													<img src="./assets/media/users/300_21.jpg" alt="image">
												</span>
											</div>
											<div class="kt-chat__text">
												You can unwatch this repository immediately <br>by clicking here: <a href="#" class="kt-font-bold kt-link"></a>
											</div>
										</div>
										<div class="kt-chat__message kt-chat__message--success">
											<div class="kt-chat__user">
												<span class="kt-userpic kt-userpic--circle kt-userpic--sm">
													<img src="./assets/media/users/100_12.jpg" alt="image">
												</span>
												<a href="#" class="kt-chat__username">Jason Muller</span></a>
												<span class="kt-chat__datetime">30 Seconds</span>
											</div>
											<div class="kt-chat__text">
												Discover what students who viewed Learn <br>Figma - UI/UX Design Essential Training also viewed
											</div>
										</div>
										<div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
											<div class="kt-chat__user">
												<span class="kt-chat__datetime">Just Now</span>
												<a href="#" class="kt-chat__username">You</span></a>
												<span class="kt-userpic kt-userpic--circle kt-userpic--sm">
													<img src="./assets/media/users/300_21.jpg" alt="image">
												</span>
											</div>
											<div class="kt-chat__text">
												Most purchased Business courses during this sale!
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-portlet__foot">
								<div class="kt-chat__input">
									<div class="kt-chat__editor">
										<textarea placeholder="Type here..." style="height: 50px"></textarea>
									</div>
									<div class="kt-chat__toolbar">
										<div class="kt_chat__tools">
											<a href="#"><i class="flaticon2-link"></i></a>
											<a href="#"><i class="flaticon2-photograph"></i></a>
											<a href="#"><i class="flaticon2-photo-camera"></i></a>
										</div>
										<div class="kt_chat__actions">
											<button type="button" class="btn btn-brand btn-md  btn-font-sm btn-upper btn-bold kt-chat__reply">reply</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
         </div>

		<!--ENd:: Chat-->
		@foreach(\App\Department::all() as $department)
		<div id="add-department{{$department->id}}" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"> {{ $department->name }}</h4>
					<div class="kt-subheader__toolbar">
						<a href="#" class="">
						</a>
						<a data-toggle="modal" data-target="#add-part{{$department->id}}" class="btn btn-label-brand btn-bold" style="color:#5d78ff;margin-bottom: 1%;">
						<i class="kt-menu__link-icon fa fa-layer-group fa-lg"></i> Add Part in {{ $department->name }} 
						</a>
					</div>
					
					<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
				</div>
				<div class="modal-body">
				<div class="kt-grid__item kt-wizard-v2__aside">

				<!--begin: Form Wizard Nav -->
				<div class="kt-wizard-v2__nav">
					<div class="kt-wizard-v2__nav-items">
					@foreach($department->parts as $part)
						<a class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="current">
							<div class="kt-wizard-v2__nav-body">
								
								<div class="kt-wizard-v2__nav-label">
									<div class="kt-wizard-v2__nav-label-title" style="display: inline;">
									{{ $department->name }}/ {{$part->name}}
									</div>
									<div class="kt-wizard-v2__nav-label-desc" style="display: inline;">
									<a  data-toggle="modal" data-target="#edit-part{{$part->id}}">
										@csrf
										<button type="submit" class="btn btn-label-brand btn-lg btn-upper" style="width: 10px;height: 10px;"> 
										<i class="fas fa-plus-circle" style="    margin-left: -8px;margin-top: -20px;"></i>
										</button>
									</a>

									<form method="post" action="{{ route('admin.part.delete', ['id' => $part->id]) }}" style="display: inline;">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-label-danger btn-lg btn-upper" style="width: 10px;height: 10px;">
										<i class="fas fa-times-circle"  style="    margin-left: -8px;margin-top: -20px;"></i>
										</button>
									</form>
								
									</div>
								</div>
							</div>
						</a>
						
					@endforeach
					</div>
				</div>

				<!--end: Form Wizard Nav -->
				</div>
				
				</div>
				</div>

			</div>
		</div>
		@endforeach
		@foreach(\App\Department::all() as $department)
		<div id="add-part{{$department->id}}" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add Part in  {{ $department->name }}</h4>
					
					<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
				</div>
				<div class="modal-body">
				<form method="post" action="{{ route('admin.part.store') }}" enctype="multipart/form-data" >
					@csrf
					<input name="modal_dep" value="{{ $department->id }}" hidden >
					<div class="form-group">
						<label class="control-label">{{ __('Name')}}</label>
						<div>
							<input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
							@error('name')
							<p class="text-danger">{{ $message }}</p>
							@enderror
						</div>
					</div>
					
					<button type="submit" class="btn btn-primary">Save</button>
			   </form>
				</div>
				</div>

			</div>
		</div>
		@endforeach

		@foreach(\App\Part::all() as $part)
		<div id="edit-part{{$part->id}}" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit {{ $part->name }}</h4>
					<button type="button" class="close" data-dismiss="modal" style="padding:0px;margin:0px;">&times;</button>
				</div>
				<div class="modal-body">
				<form method="post" action="{{ route('admin.part.update', ['id' => $part->id]) }}" enctype="multipart/form-data">
					@method('PUT')
					@csrf
					<div class="form-group">
						<label class="control-label">{{__('Name')}}</label>
						<div>
							<input type="text" name="name" value="{{ $part->name }}" class="form-control">
						</div>
					</div>
				
						<button type="submit" class="btn btn-primary">{{__('Save')}}</button>
				</form>
				</div>
				</div>

			</div>
		</div>
		@endforeach

		
		
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
		<script src="{{asset('assets/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/wnumb/wNumb.js')}}"type="text/javascript"></script>

		<!--end:: Global Mandatory Vendors -->

		<!--begin:: Global Optional Vendors -->
		<script src="{{asset('assets/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/handlebars/dist/handlebars.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/autosize/dist/autosize.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/clipboard/dist/clipboard.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/markdown/lib/markdown.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-markdown.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/js/vendors/bootstrap-notify.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/js/vendors/jquery-validation.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/raphael/raphael.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/morris.js/morris.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/waypoints/lib/jquery.waypoints.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/es6-promise-polyfill/promise.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/js/vendors/sweetalert2.init.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>

		<!--end:: Global Optional Vendors -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<script src="{{asset('assets/js/demo11/scripts.bundle.js')}}" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<!--begin::Page Vendors(used by this page) -->
		<script src="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
		<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
		<script src="{{asset('assets/vendors/custom/gmaps/gmaps.js')}}" type="text/javascript"></script>

		<!--end::Page Vendors -->

		<!--begin::Page Scripts(used by this page) -->
		<script src="{{asset('assets/js/demo11/pages/dashboard.js')}}" type="text/javascript"></script>

		<!--end::Page Scripts -->
		@stack('js')
	</body>

	<!-- end::Body -->
</html>