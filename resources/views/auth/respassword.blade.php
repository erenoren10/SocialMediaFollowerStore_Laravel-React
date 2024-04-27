<!DOCTYPE html>
<html lang="tr">

<head>
    <title>FenomenPaket</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/icon/remixicon.css" rel="stylesheet">
    <link href="assets/css/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="loginarea">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex">
                    <div class="loginlogo">
                        <a href="{{ route('not.found') }}"><img src="{{ asset('backend/images') }}/logo.png"
                        alt="" width="100px"></a>
                    </div>
                    <div class="loginbox">
                        <div class="logintext">
                            <h5>
                                Şifremi Sıfırla
                            </h5>
                        </div>
                        <div class="loginform">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input mail">
                                            <i class="ri-mail-open-line"></i>
                                            <input type="text" placeholder="E-Posta Adresiniz">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit">SIFIRLAMA BAĞLANTISI GÖNDER <i class="ri-arrow-right-line"></i></button>
                                    </div>
                                    <div class="col-md-12">
                                        <a href="/login" class="loginresetps">GİRİŞ YAP</a>
                                    </div>
                                </div><!-- row -->
                            </form>
                        </div>
                    </div>


                    <a href="#" class="registerbtn">ÜCRETSİZ KAYIT OL <i class="ri-arrow-right-line"></i></a>
                </div>
            </div><!-- col6 -->
            <div class="col-md-6">
                <div class="img">
                    <img src="assets/img/loginimg.png" alt="">
                </div>
            </div>
        </div><!-- row -->
    </div><!-- loginarea -->

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>