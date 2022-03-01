<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Laravel Starter">
		<meta name="Author" content="Alibudi">
		<meta name="Keywords" content="Laravel Starter"/>

		<!-- Title -->
		<title>Login</title>

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

	</head>
	<body class="main-body bg-light">

		<!-- Loader -->
		<div id="global-loader">
			<img src="../../assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
		
		<!-- Page -->
		<div class="page">
		
			<div class="container-fluid">
				<div class="row no-gutter">
					<!-- The image half -->
					<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
						<div class="row wd-100p mx-auto text-center">
							<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
								<img src="{{ asset('admin/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
							</div>
						</div>
					</div>
					<!-- The content half -->
					<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
										<div class="card-sigin">
											{{-- <div class="mb-5 d-flex"> <a href="index.html"><img src="../../assets/img/brand/favicon.png" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div> --}}
											<div class="card-sigin">
												<div class="main-signup-header">
													<h2>Welcome back!</h2>
													<h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5>
													<form action="{{ route('actionLogin') }}" method="POST">
                                                        @csrf
														<div class="form-group">
															<label>Email</label> <input class="form-control" placeholder="Enter your email" name="email" type="text">
														</div>
														<div class="form-group">
															<label>Password</label> <input class="form-control" placeholder="Enter your password" name="password" type="password">
														</div><button class="btn btn-main-primary btn-block">Sign In</button>
														{{-- <div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
															</div>
														</div> --}}
													</form>
													{{-- <div class="main-signin-footer mt-5">
														<p><a href="">Forgot password?</a></p>
														<p>Don't have an account? <a href="page-signup.html">Create an Account</a></p>
													</div> --}}
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- End -->
						</div>
					</div><!-- End -->
				</div>
			</div>
			
		</div>
		<!-- End Page -->

		<!-- JQuery min js -->
		<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>

		<!-- Bootstrap Bundle js -->
		<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

		<!-- Ionicons js -->
		<script src="{{ asset('admin/plugins/ionicons/ionicons.js')}}"></script>

		<!-- Moment js -->
		<script src="{{ asset('admin/plugins/moment/moment.js')}}"></script>

		<!-- eva-icons js -->
		<script src="{{ asset('admin/js/eva-icons.min.js')}}"></script>

		<!-- Rating js-->
		<script src="{{ asset('admin/plugins/rating/jquery.rating-stars.js')}}"></script>
		<script src="{{ asset('admin/plugins/rating/jquery.barrating.js')}}"></script>

		<!-- custom js -->
		<script src="{{ asset('admin/js/custom.js')}}"></script>

	</body>
</html>