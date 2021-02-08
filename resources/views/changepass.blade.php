<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Đổi mật khẩu </title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

	<!-- Fonts and icons -->
    <script src="{{secure_asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <link rel="icon" href="{{secure_asset('assets/img/logo-hmdn.png')}}" sizes="20x20" type="image/png">
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
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
	<link rel="stylesheet" href="{{secure_asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('assets/css/azzara.min.css')}}">
    <link rel="stylesheet" href="{{secure_asset('assets/css/style.css')}}">
</head>
<body class="login">
    <form id="myform" action="{{URL::TO('/changepass')}}" method="post">
        {{ csrf_field() }}
        <div class="wrapper wrapper-login">
            <div class="container container-login animated fadeIn">
                <img src="{{secure_asset('assets/img/logohmdn.png')}}" alt="..." class="avatar-img rounded-circle logo">
                <h1 class="h3 mb-3 font-weight-normal text-center">Khám Sức Khỏe Định Kỳ</h1>
                <h2 class="h3 mb-3 font-weight-normal text-center">  </h2>
                <h3 class="text-center">Đổi mật khẩu</h3>
                <?php
                    $message=Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session :: put('message',null);
                    }
                ?>
                <div class="login-form">
                    {{-- <div class="form-group form-floating-label">
                        <input id="user_mayte" name="user_mayte" type="text" class="form-control input-border-bottom" required>
                        <label for="user_mayte" class="placeholder">Tài khoản (Mã y tế)</label>
                    </div> --}}
                    <div class="form-group form-floating-label">
                        <input id="user_password" name="user_password" type="password" class="form-control input-border-bottom" required>
                        <label for="user_password" class="placeholder">Mật khẩu hiện tại</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="user_password_new" name="user_password_new" type="password" class="form-control input-border-bottom" required>
                        <label for="user_password_new" class="placeholder">Mật khẩu mới</label>
                        <div class="show-password">
                            <i class="flaticon-interface"></i>
                        </div>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="user_password_renew" name="user_password_renew" type="password" class="form-control input-border-bottom" required>
                        <label for="user_password_renew" class="placeholder">Nhập lại mật khẩu mới</label>
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
                        <input class="btn btn-primary btn-rounded btn-login login" type="submit" value="Đổi mật khẩu" name="login">
                        {{-- <a href="#" class="btn btn-primary btn-rounded btn-login">Đăng nhập</a> --}}
                    </div>
                
                </div>
            </div>

        </div>
    </form>
    <script src="{{secure_asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="{{secure_asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{secure_asset('assets/js/core/popper.min.js')}}"></script>
	<script src="{{secure_asset('assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{secure_asset('assets/js/ready.js')}}"></script>
    <script>
        $("#myform").validate({
            rules: {
                "user_password": {
                    required: true
                },
                "user_password_new": {
                    required: true,
                    minlength: 6
                },
                "user_password_renew": {
                    equalTo: "#user_password_new",
                    minlength: 6,
                    required: true
                }
            },
            messages: {
                user_password_new: {
                    required:"Bạn vui lòng nhập mật khẩu mới",
                    minlength: "Mật khẩu ít nhất 6 kí tự"
                },
                user_password_renew: {
                    equalTo:"Mật khẩu không khớp nhau",
                    required:"Bạn vui lòng nhập mật khẩu mới",
                    minlength: "Mật khẩu ít nhất 6 kí tự"
                },
                user_password: {
                    required:"Phải nhập mật khẩu hiện tại",
                }
            }
	});
        </script>
</body>
</html>