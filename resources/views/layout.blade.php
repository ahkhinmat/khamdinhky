<?php    $user_id=Session::get('user_id');
$user_mayte=Session::get('user_mayte');
$user_name=Session::get('user_name');

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>CHC</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	{{-- <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet"> --}}
<link rel="icon" href="{{asset('public/assets/img/favicon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('public/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['public/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/assets/css/azzara.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('public/assets/css/demo.css')}}">
</head>
<body>
	<div class="wrapper">
		<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="#9b2">
			<!-- Logo Header -->
			<div class="logo-header">
				<a href="dashboard" class="logo">
				<img src="{{asset('public/assets/img/logohmdn.png')}}" alt="..." class="avatar-img rounded-circle logo">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							{{-- <div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div> --}}
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						{{-- <li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li> --}}

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{('public/assets/img/avata_user.png')}}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="{{('public/assets/img/avata_user.png')}}" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
										<h4>{{$user_name}}</h4>
											{{-- <p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a> --}}
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{route('home.userprofile')}}">Thông tin cá nhân</a>
									<a class="dropdown-item" href="{{route('home.logout')}}">Đăng xuất</a>			
									{{-- <a class="dropdown-item" href="{{URL::to('login')}}">Log in</a> --}}
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar">
			
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
						
							<img src="{{('public/assets/img/avata_user.png')}}" alt="..." class="avatar-img rounded-circle">
						</div>
						
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php   
									echo $user_name;
									 ?>
									<span class="user-level">	<?php echo'Mã y tế '. $user_mayte; ?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a  href="{{route('home.userprofile')}}">Thông tin cá nhân</a>
											<span class="link-collapse">Thông tin cá nhân</span>
										</a>
									</li>
									<li>
										<a href="{{route('home.logout')}}">Đăng xuất</a>
											<span class="link-collapse">Cài đặt</span>
										</a>
									</li>
								</ul>
							</div>
						</div>

					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="dashboard">
								<i class="fas fa-home home-icon"></i>
								<p>Thông tin chung</p>
								<span class="badge badge-count">5</span>
							</a>
						</li>
						<li class="nav-section">
							
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Hồ sơ bệnh sử</h4>
						
						</li>
						<li class="nav-item">
							<a  href="{{URL::to('/tuvan')}}">
								<i class="far fa-comment"></i>
								<p>Tư vấn</p>
							</a>
						</li>
						<li class="nav-item">
						<a href="{{URL::to('/khambenh')}}">
							<i class="fas fa-file-medical"></i>
								<p>Khám bệnh</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{URL::to('/xetnghiem')}}">
								<i class="fas fa-vial"></i>
								<p>Xét nghiệm</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{URL::to('/chandoanhinhanh')}}">
								<i class="far fa-images"></i>
								<p>Chẩn đoán hình ảnh</p>
								{{-- <span class="caret"></span> --}}
							</a>
							{{-- <div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="maps/googlemaps.html">
											<span class="sub-item">Google Maps</span>
										</a>
									</li>
									<li>
										<a href="maps/fullscreenmaps.html">
											<span class="sub-item">Full Screen Maps</span>
										</a>
									</li>
									<li>
										<a href="maps/jqvmap.html">
											<span class="sub-item">JQVMap</span>
										</a>
									</li>
								</ul>
							</div> --}}
						</li>
						<li class="nav-item">
							<a  href="{{URL::to('/thuoc')}}">
								<i class="fas fa-capsules"></i>
								<p>Thuốc</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				@yield('content')

			</div>

		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Topbar</h4>
						<div class="btnSwitch">
							<button type="button" class="changeMainHeaderColor" data-color="blue"></button>
							<button type="button" class="changeMainHeaderColor" data-color="purple"></button>
							<button type="button" class="changeMainHeaderColor" data-color="light-blue"></button>
							<button type="button" class="selected changeMainHeaderColor" data-color="#9b2"></button>
							<button type="button" class="changeMainHeaderColor" data-color="orange"></button>
							<button type="button" class="changeMainHeaderColor" data-color="red"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('public/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('public/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('public/assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('public/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('public/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Moment JS -->
<script src="{{asset('public/assets/js/plugin/moment/moment.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('public/assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('public/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('public/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('public/assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('public/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- Bootstrap Toggle -->
<script src="{{asset('public/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('public/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Google Maps Plugin -->
<script src="{{asset('public/assets/js/plugin/gmaps/gmaps.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('public/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Azzara JS -->
<script src="{{asset('public/assets/js/ready.min.js')}}"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="{{asset('public/assets/js/setting-demo.js')}}"></script>
<script src="{{asset('public/assets/js/demo.js')}}"></script>
</body>
</html>