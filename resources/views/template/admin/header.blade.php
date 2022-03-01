<div class="main-header sticky side-header nav nav-item">
					<div class="container-fluid">
						<div class="main-header-left ">
							<div class="responsive-logo">
								<a href="index.html"><img src="../../assets/img/brand/logo.png" class="logo-1" alt="logo"></a>
								<a href="index.html"><img src="../../assets/img/brand/logo-white.png" class="dark-logo-1" alt="logo"></a>
								<a href="index.html"><img src="../../assets/img/brand/favicon.png" class="logo-2" alt="logo"></a>
								<a href="index.html"><img src="../../assets/img/brand/favicon.png" class="dark-logo-2" alt="logo"></a>
							</div>
							<div class="app-sidebar__toggle" data-toggle="sidebar">
								<a class="open-toggle" href="#"><i class="header-icon fe fe-align-left" ></i></a>
								<a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
							</div>
							{{-- <div class="main-header-center ml-3 d-sm-none d-md-none d-lg-block">
								<input class="form-control" placeholder="Search for anything..." type="search"> <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
							</div> --}}
						</div>
						<div class="main-header-right">
						
							<div class="nav nav-item  navbar-nav-right ml-auto">
							
								<div class="dropdown main-profile-menu nav nav-item nav-link">
									<a class="profile-user d-flex" href=""><img alt="" src="{{ asset('admin/img/faces/6.jpg')}}"></a>
									<div class="dropdown-menu">
										<div class="main-header-profile bg-primary p-3">
											<div class="d-flex wd-100p">
												<div class="main-img-user"><img alt="" src="{{ asset('admin/img/faces/6.jpg')}}" class=""></div>
												<div class="ml-3 my-auto">
													<h6>{{ Auth::user()->name }}</h6>
                                                    {{-- <span>Premium Member</span> --}}
												</div>
											</div>
										</div>
										<a class="dropdown-item" href=""><i class="bx bx-user-circle"></i>Profile</a>
										<a class="dropdown-item" href=""><i class="bx bx-cog"></i> Edit Profile</a>
										{{-- <a class="dropdown-item" href=""><i class="bx bxs-inbox"></i>Inbox</a>
										<a class="dropdown-item" href=""><i class="bx bx-envelope"></i>Messages</a> --}}
										<a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>
										<a class="dropdown-item" href="page-signin.html"><i class="bx bx-log-out"></i> Sign Out</a>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>