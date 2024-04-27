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

    <title>Fenomen Paket - Giriş</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('backend/images') }}/favicon.ico">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

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
                                Giriş Yapın
                            </h5>
                        </div>
                        <div class="loginform">
                            <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if($errors->has('login'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('login') }}
                                </div>
                            @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input mail">
                                            <i class="ri-mail-open-line"></i>
                                            <input id="username" type="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Kullanıcı Adınız " required autofocus>
                                            @error('usarname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input pass">
                                            <i class="ri-key-line"></i>
                                            <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Parolanız" required autofocus>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit">GİRİŞ YAP <i class="ri-arrow-right-line"></i></button>
                                    </div>
                                </div><!-- row -->
                                <div class="col-md-12">
                                        <a href="{{ route('password.request') }}" class="loginresetps">ŞİFREMİ UNUTTUM!</a>
                                </div>
                            </form>
                        </div>
                    </div>


                    <a href="{{ route('register') }}" class="registerbtn">ÜCRETSİZ KAYIT OL <i class="ri-arrow-right-line"></i></a>
                </div>
            </div><!-- col6 -->
            
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
                                                alt="" width="100px"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Hesabına giriş yap</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input id="user" type="email" name="email" class="form-control"
                                                placeholder="hello@example.com " required autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Şifre</strong></label>
                                            <input id="password" type="password" name="password" class="form-control"
                                                placeholder="*********" required autofocus>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox"
                                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                    name="remember">
                                                <span class="ml-2 text-sm text-gray-600">{{ __('Beni Hatırla') }}</span>
                                            </label>
                                        </div>
                                    </form>
                                    <div class="row d-flex justify-content-between mt-4 mb-2">
                                        <div class="mb-1">
                                            <a href="{{ route('password.request') }}">Şifremi Unuttun Mu?</a>
                                        </div>
                                    </div>
                                    <div class="new-account mt-1">
                                        <p>Hesabın yok mu?
                                            <a class="text-primary" href="{{ route('register') }}">Kaydol</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="{{ asset('backend/vendor') }}/global/global.min.js"></script>
    <script src="{{ asset('backend/js') }}/custom.min.js"></script>
    <script src="{{ asset('backend/js') }}/dlabnav-init.js"></script>
    <script src="{{ asset('backend/js') }}/styleSwitcher.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;
                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;
                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;
                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>
</body>

</html>
