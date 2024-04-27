<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <title>Admin - Şifre değiştirme</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('backend/images') }}/favicon.png">
    <link href="{{ asset('backend/css') }}/style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="vh-100"
style="background-image: url({{ asset('/assets/img/slider.png') }});
	float: left;
	width: 100%;
	height: 100vh;
	overflow-x: hidden;
	background: url(/assets/img/slider.png);
	background-size: cover;
	background-position: 50%;
	background-repeat: no-repeat;
  ">



<div class="loginarea">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex">
                    <div class="loginlogo">
                        <a href="{{ route('login') }}">
                        <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                        </a>
                    </div>
                    <div class="loginbox">
                        <div class="logintext">
                            <h5>
                                Şifremi Sıfırla
                            </h5>
                        </div>
                        <div class="loginform">
                            <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input mail">
                                            <i class="ri-mail-open-line"></i>
                                            <input id="email" name="email" type="email" placeholder="E-Posta Adresiniz">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit">SIFIRLAMA BAĞLANTISI GÖNDER <i class="ri-arrow-right-line"></i></button>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="{{ route('login') }}" class="loginresetps">GİRİŞ YAP</a>
                                    </div>
                                </div><!-- row -->
                            </form>
                        </div>
                    </div>


                    <a href="{{ route('register') }}" class="registerbtn">ÜCRETSİZ KAYIT OL <i class="ri-arrow-right-line"></i></a>
                </div>
            </div><!-- col6 -->
            <div class="col-md-6">
                <div class="img">
                    <img src="assets/img/loginimg.png" alt="">
                </div>
            </div>
        </div><!-- row -->
    </div><!-- loginarea -->







  {{--
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="{{ route('login') }}"><img src="{{ asset('backend/images') }}/logo.png"
                                                width="100px" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Şifremi unuttum</h4>
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div>
                                        Sorun değil, en iyilerimizin başına gelir. E-posta adresinizi bize bildirin, size e-postayla yeni bir parola seçmenize izin verecek bir parola sıfırlama bağlantısı gönderelim.
                                        </div>
                                        <div class="mb-3">
                                            <label><strong> Email:</strong></label>
                                            <input id="email" name="email" type="email" class="form-control" placeholder="hello@example.com">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Gönder</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="{{ asset('backend/vendor') }}/global/global.min.js"></script>
    <script src="{{ asset('backend/js') }}/custom.min.js"></script>
    <script src="{{ asset('backend/js') }}/dlabnav-init.js"></script>
    <script src="{{ asset('backend/js') }}/styleSwitcher.js"></script>
</body>

</html>
