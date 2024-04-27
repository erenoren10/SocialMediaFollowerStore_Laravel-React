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

    <title>Fenomen Paket - Kaydol</title>

    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" type="image/png" href="{{ asset('backend/images') }}/favicon.ico">
    <link href="{{ asset('backend/css') }}/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

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
                    <div class="loginlogo" style="margin-top:-10px;">
                        <a href="{{ route('login') }}">
                        <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                        </a>
                    </div>
                    <div class="loginbox">
                        <div class="logintext">
                            <h5>
                                Kayıt Ol
                            </h5>
                        </div>
                        <div class="loginform">
                            <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input mail">
                                            <i class="ri-mail-open-line"></i>
                                            <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Posta Adresiniz..">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input pass">
                                            <i class="ri-user-line"></i>
                                            <input id="username" type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="name" placeholder="Kullanıcı Adınız..">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input pass">
                                            <i class="ri-user-line"></i>
                                            <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" placeholder="Adınız Soyadınız..">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input pass">
                                            <i class="ri-key-line"></i>
                                            <input id="password" type="password"
                                                name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="new-password" placeholder="Parola..">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input pass">
                                            <i class="ri-key-line"></i>
                                            <input id="password_confirmation" type="password"
                                                name="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="Parola Tekrar..">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input pass">
                                            <i class="ri-key-line"></i>
                                            <input id="referance" type="text"
                                                name="referance" class="form-control @error('referance') is-invalid @enderror" placeholder="Var ise referans Kodunuz.." value="{{ request('ref', '') }}">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12">
                                        <div class="input phone">
                                            <i class="ri-smartphone-line"></i>
                                            <input id="phone_number" type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required autocomplete="new-password" placeholder="Cep Telefonu Numaranız..*">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">KAYIT OL</button>
                                        <span class="aktivstes">Telefon numaranız Aktivasyon için gereklidir.</span>
                                    </div>
                                </div><!-- row -->
                            </form>
                        </div>
                    </div>


                    <a href="{{ route('login') }}" class="registerbtn">ZATEN ÜYE MİSİNİZ? GİRİŞ YAPIN <i class="ri-arrow-right-line"></i></a>
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
                                                alt="" width="100px"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Kaydol</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>İsim & Soyisim</strong></label>
                                            <input id="name" type="text" name="name" class="form-control"
                                                placeholder="İsim ve Soyisim" required autofocus>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Kullanıcı adı</strong></label>
                                            <input id="username" type="text" name="username" class="form-control"
                                                placeholder="Kullanıcı Adı" required autofocus>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input id="email" type="email" name="email" class="form-control"
                                                placeholder="example@gmail.com" required autofocus>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Şifre</strong></label>
                                            <input id="password" type="password" name="password" class="form-control"
                                                placeholder="**********" required autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Şifre doğrulama</strong></label>
                                            <input id="password_confirmation" type="password"
                                                name="password_confirmation" class="form-control"
                                                placeholder="**********" required autofocus>
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Telefon numarası</strong></label>
                                            <input id="phone_number" type="text" name="phone_number" class="form-control"
                                                placeholder="+(90)5.." required autofocus>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Kaydol</button>
                                        </div>

                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Zaten Bir Hesabın Var mı? <a class="text-primary"
                                                href="{{ route('login') }}">Giriş Yap</a></p>
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
