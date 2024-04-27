<!DOCTYPE html>
<html lang="tr">

<head>
	<title>FenomenPaket</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/icon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- header -->
    @include('data.head')
	<!-- header -->


    <div class="pagecontent">
        <div class="container">        
            <div class="pagedetail">
                <div class="pagetitle">
                    İletişim
                </div>
                <div class="contactarea">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="boxgs">
                                <div class="title">
                                    <span><i class="ri-chat-1-line"></i> MESAJ GÖNDERİN</span>
                                </div>
                                <form method="POST" action="{{ route('store.message') }}">
                                @csrf
                                <div class="bion">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item">
                                                <label>Adınız</label>
                                                <div class="inputitem">
                                                    <i class="ri-user-line"></i>
                                                    <input type="text" name="name" required>
                                                </div>
                                            </div>
                                        </div><!-- col6 -->
                                        <div class="col-md-6">
                                            <div class="item">
                                                <label>Soyadınız</label>
                                                <div class="inputitem">
                                                    <i class="ri-user-line"></i>
                                                    <input type="text" name="surname">
                                                </div>
                                            </div>
                                        </div><!-- col6 -->
                                        <div class="col-md-6">
                                            <div class="item">
                                                <label>E-Posta Adresi</label>
                                                <div class="inputitem">
                                                    <i class="ri-mail-open-line"></i>
                                                    <input type="text" name="email" required>
                                                </div>
                                            </div>
                                        </div><!-- col6 -->
                                        <div class="col-md-6">
                                            <div class="item">
                                                <label>Telefon Numarası</label>
                                                <div class="inputitem">
                                                    <i class="ri-phone-line"></i>
                                                    <input type="number" name="phone" required>
                                                </div>
                                            </div>
                                        </div><!-- col6 -->
                                        <div class="col-md-12">
                                            <div class="item">
                                                <label>Mesajınız</label>
                                                <div class="inputitem">
                                                    <i class="ri-chat-1-line"></i>
                                                    <textarea name="message"></textarea>
                                                </div>
                                            </div>
                                        </div><!-- col12 -->
                                    </div><!-- row -->
                                    <button type="submit">GÖNDER</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="boxgs">
                                <div class="title">
                                    <span>İLETİŞİM</span>
                                </div>
                                <div class="bion">
                                    <div class="listem">
                                        <label>Adres</label>
                                        <span>Devlet Mah. 5. Cad. No: 39 B
                                            Vize/Kırklareli</span>
                                    </div>
                                    <div class="listem">
                                        <label>Telefon</label>
                                        <span>+90 850 800 80 80</span>
                                    </div>
                                    <div class="listem">
                                        <label>E-Posta</label>
                                        <span>info@fenomenpaket.com</span>
                                    </div>
                                </div>
                                <div class="whatsappare">
                                    <img src="assets/img/icon/whatsappicon.svg" alt="">
                                    <span>WHATSAPP’TAN ULAŞIN</span>
                                    <a href="https://wa.me/08508508080?text=Merhaba,%20bir%20konu%20hakkinda%20yardim%20almak%20istiyorum." class="whatsappbtn">MESAJ GÖNDER</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- contact -->
            </div><!-- detail -->
        </div><!-- container -->
    </div><!-- content -->


<!-- footer -->
@include('data.footer')
<!-- /footer -->


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>