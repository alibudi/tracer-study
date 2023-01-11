<aside class="app-sidebar sidebar-scroll">
				<div class="main-sidebar-header active">
					{{-- <a class="desktop-logo logo-light active" href="index.html"><img src="{{ asset('admin/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
					<a class="desktop-logo logo-dark active" href="index.html"><img src="{{ asset('admin/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
					<a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="{{ asset('admin/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
					<a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="{{ asset('admin/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a> --}}
					<h3 style="color: white">Tracer Alumni</h3>
				</div>
				<div class="main-sidemenu">
					<div class="app-sidebar__user clearfix">
						<div class="dropdown user-pro-body">
							<div class="">
								<img alt="user-img" class="avatar avatar-xl brround" src="{{ asset('admin/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
							</div>
							<div class="user-info">
								<h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
								{{-- <span class="mb-0 text-muted">Premium Member</span> --}}
							</div>
						</div>
					</div>
					<ul class="side-menu">
						<li class="side-item side-item-category">Main</li>
						<li class="slide">
							<a class="side-menu__item" href="{{ route('dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/><path d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/></svg><span class="side-menu__label">Dashboard</span></a>
						</li>
						<li class="side-item side-item-category">General</li>
						@can('isAdmin')

						<li class="slide">
							<a class="side-menu__item" href="{{ route('pengumuman.index') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon" viewBox="0 0 16 16">
								  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
									</svg> <span class="side-menu__label">Pengumuman</span></a>
						</li>
						<li class="slide">
							<a class="side-menu__item" href="{{ route('kuesioner.index') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon" viewBox="0 0 16 16">
									   <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
								<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
								</svg><span class="side-menu__label">Kuesioner</span></a>
						</li> 
                        <li class="slide">
							<a class="side-menu__item" href="{{ route('role.index') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon" viewBox="0 0 16 16">
							<path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z"/>
							</svg> <span class="side-menu__label">Role</span></a>
						</li>
						<li class="slide">
							<a class="side-menu__item" href="{{ route('laporan-alumni.index') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon" viewBox="0 0 16 16">
								  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
									</svg> <span class="side-menu__label">Laporan</span></a>
						</li>
                        <li class="slide">
							<a class="side-menu__item" href="{{ route('user.index') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon" viewBox="0 0 16 16">
									<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
									</svg> <span class="side-menu__label">Users</span></a>
						</li>

					
						@elsecan('isUser')

						{{-- @can('isUser') --}}
						<li class="slide">
							<a class="side-menu__item" href="{{ route('kuesioner-user') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon" viewBox="0 0 16 16">
									   <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
								<path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
								</svg><span class="side-menu__label">Kuesioner</span></a>
						</li> 
						<li class="slide">
							<a class="side-menu__item" href="{{ route('pengumuman-user') }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon" viewBox="0 0 16 16">
								  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
									</svg> <span class="side-menu__label">Pengumuman</span></a>
						</li>

						<li class="slide">
							<a class="side-menu__item" href="{{ route('user.edit',Auth::user()->id) }}">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="side-menu__icon" viewBox="0 0 16 16">
									<path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
									</svg> <span class="side-menu__label">Profil</span></a>
						</li>
						@endcan
						</li>
					</ul>
				</div>
			</aside>