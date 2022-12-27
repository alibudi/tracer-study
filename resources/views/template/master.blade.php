<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Starter Laravel sederhana">
		<meta name="Author" content="Alibudi">
		<meta name="Keywords" content="Starter Laravel"/>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		<title> @yield('title') </title>

		<!-- Favicon -->
		<link rel="icon" href="{{ asset('admin/img/brand/favicon.png')}}" type="image/x-icon"/>

		<!-- Icons css -->
		<link href="{{ asset('admin/css/icons.css')}}" rel="stylesheet">

		<!--  Right-sidemenu css -->
		<link href="{{ asset('admin/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!--  Custom Scroll bar-->
		<link href="{{ asset('admin/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

		<!--  Left-Sidebar css -->
		<link rel="stylesheet" href="{{ asset('admin/css/sidemenu.css')}}">

		<!--- Style css --->
		<link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">

		<!--- Dark-mode css --->
		<link href="{{ asset('admin/css/style-dark.css')}}" rel="stylesheet">

		<!---Skinmodes css-->
		<link href="{{ asset('admin/css/skin-modes.css')}}" rel="stylesheet" />

		<!--- Animations css-->
		<link href="{{ asset('admin/css/animate.css')}}" rel="stylesheet">
		<!--- Internal Sweet-Alert css-->
		<link href="{{ asset('admin/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
		@stack('css')
	</head>

	<body class="main-body app sidebar-mini dark-theme">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ asset('admin/img/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- Page -->
		<div class="page">

			<!-- main-sidebar -->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
            @include('template.admin.sidebar')
			<!-- main-sidebar -->

			<!-- main-content -->
			<div class="main-content app-content">

				<!-- main-header -->
				@include('template.admin.header')
				<!-- /main-header -->

				<!-- container -->
				<div class="container-fluid">

					@yield('content')
					<!-- row closed -->
				</div>
				<!-- Container closed -->
			</div>
			<!-- main-content closed -->

		

			@include('sweetalert::alert')

			<!-- Footer opened -->
			@include('template.admin.footer')
			<!-- Footer closed -->

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!-- JQuery min js -->
		<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>

		<!-- Bootstrap Bundle js -->
		<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

		<!-- Ionicons js -->
		<script src="{{ asset('admin/plugins/ionicons/ionicons.js')}}"></script>

		<!-- Moment js -->
		<script src="{{ asset('admin/plugins/moment/moment.js')}}"></script>

		<!-- P-scroll js -->
		<script src="{{ asset('admin/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		<script src="{{ asset('admin/plugins/perfect-scrollbar/p-scroll.js')}}"></script>

		<!-- Sticky js -->
		<script src="{{ asset('admin/js/sticky.js')}}"></script>

		<!-- eva-icons js -->
		<script src="{{ asset('admin/js/eva-icons.min.js')}}"></script>

		<!-- Rating js-->
		<script src="{{ asset('admin/plugins/rating/jquery.rating-stars.js')}}"></script>
		<script src="{{ asset('admin/plugins/rating/jquery.barrating.js')}}"></script>

		<!-- Custom Scroll bar Js-->
		<script src="{{ asset('admin/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- Sidebar js -->
		<script src="{{ asset('admin/plugins/side-menu/sidemenu.js')}}"></script>

		<!-- Right-sidebar js -->
		<script src="{{ asset('admin/plugins/sidebar/sidebar.js')}}"></script>
		<script src="{{ asset('admin/plugins/sidebar/sidebar-custom.js')}}"></script>
		<script src="{{ asset('admin/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{ asset('admin/plugins/sweet-alert/jquery.sweet-alert.js')}}"></script>

		<!-- Sweet-alert js  -->
		<script src="{{ asset('admin/plugins/sweet-alert/sweetalert.min.js')}}"></script>
		<script src="{{ asset('admin/js/sweet-alert.js')}}"></script>
		<!-- custom js -->
		<script src="{{ asset('admin/js/custom.js')}}"></script>
		@stack('js')

	</body>
</html>