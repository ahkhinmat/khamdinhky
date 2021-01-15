<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Đăng nhập</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('public/assets/img/logo-hoanmy.png')}}" type="image/png"/>

	<!-- Fonts and icons -->
	<script src="{{asset('public/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/azzara.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
</head>
<body class="login">
    <form action="{{URL::TO('/dashboard')}}" method="post">
        {{ csrf_field() }}
        <div class="wrapper wrapper-login">
            <div class="container container-login animated fadeIn">

                <h1 class="h3 mb-3 font-weight-normal text-center">Khám định kỳ Hoàn Mỹ Đà Nẵng</h1>
                {{-- <h3 class="text-center">Đăng nhập</h3> --}}


                <?php
                    $message=Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session :: put('message',null);
                    }
                ?>
                <div class="login-form">
                    <div class="form-group form-floating-label">
                        <input id="user_mayte" name="user_mayte" type="text" class="form-control input-border-bottom" required>
                        <label for="user_mayte" class="placeholder">Tài khoản (Mã y tế)</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="user_password" name="user_password" type="password" class="form-control input-border-bottom" required>
                        <label for="user_password" class="placeholder">Mật khẩu</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="row form-sub m-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label class="custom-control-label" for="rememberme">Nhớ mật khẩu</label>
                        </div>
                        
                        {{-- <a href="#" class="link float-right">Quên mật khẩu ?</a> --}}
                    </div>
                    <div class="form-action mb-3">
                        <input class="btn btn-primary btn-rounded btn-login login" type="submit" value="Đăng nhập" name="login">
                        {{-- <a href="#" class="btn btn-primary btn-rounded btn-login">Đăng nhập</a> --}}
                    </div>
                
                </div>
            </div>

        </div>
    </form>
	<script src="{{asset('public/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('public/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('public/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('public/assets/js/core/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/assets/js/ready.js')}}"></script>
</body>
</html>