<!DOCTYPE html>
<html lang="tr">

<head>
    <title>FenomenPaket - Siparis Sorgula</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/icon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
	<style>
        .alert-success {
            color: #ff0000;
            position: fixed;
            font-size: 17px;
            top: 11px;
            right: 11px;
            z-index: 99;
            background-color: #ffffff;
            border-color: #badbcc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>

<body>
	<!-- header -->
	@include('data.head')
	<!-- header -->  

  
    <div class="pagecontent">

        <div class="title-bg red siparis">

            SİPARİŞ SORGULA
            <h5>BİNLERCE <b>MUTLU</b> MÜŞTERİ</h5>
            <form action="{{ route('inquiryresult') }}" method="POST">
                @csrf
            <div class="siparissorguitem">
                <input type="text" name="siparis" placeholder="#125912471201">
                <button type="submit">SORGULA</button>
            </div>

            </form>
            @if(session('message'))
            <div class="alert alert-{{ session('alert-type') }}">
                {{ session('message') }}
            </div>
            @endif
        </div>
        <div class="container">
            <div class="sipariscontainer">
                <div class="whydetail">
                    <div class="title">
                        <div class="icon">
                            <i class="ri-user-smile-line"></i>
                        </div>
                        <div class="icontext">
                            <h3>Fenomen Paket’in Dünyasını Keşfedin!</h3>
                            <p>Lorem ipsum dolor sit amet, lorem</p>
                        </div>
                    </div><!-- title -->
                    <div class="row">
                        <div class="col-md-3">
                            <div class="flitem">
                                <div class="flicon">
                                    <i class="ri-loop-right-line"></i>
                                </div>
                                <div class="fltext">
                                    <h5>Telafili Paketler</h5>
                                    <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod</span>
                                </div>
                            </div>
                        </div><!-- col3 -->
                        <div class="col-md-3">
                            <div class="flitem">
                                <div class="flicon">
                                    <i class="ri-medal-2-fill"></i>
                                </div>
                                <div class="fltext">
                                    <h5>Hızlı İşlem Garantisi</h5>
                                    <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod</span>
                                </div>
                            </div>
                        </div><!-- col3 -->
                        <div class="col-md-3">
                            <div class="flitem">
                                <div class="flicon">
                                    <i class="ri-customer-service-2-line"></i>
                                </div>
                                <div class="fltext">
                                    <h5>7/24 Canlı Destek</h5>
                                    <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod</span>
                                </div>
                            </div>
                        </div><!-- col3 -->
                        <div class="col-md-3">
                            <div class="flitem">
                                <div class="flicon">
                                    <i class="ri-secure-payment-line"></i>
                                </div>
                                <div class="fltext">
                                    <h5>Güvenilir Ödeme</h5>
                                    <span>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod</span>
                                </div>
                            </div>
                        </div><!-- col3 -->
                    </div><!-- row -->
                </div>
                    <!-- section -->
                    @include('include.SSS')
                    <!-- /section --><!-- section -->
            </div><!-- cs -->
        </div><!-- container -->
    </div><!-- content -->


	<!-- footer -->
	@include('data.footer')
	<!-- /footer -->

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
	<script>
        $(document).ready(function () {
            // 5 saniye sonra alert'ı gizle
            setTimeout(function () {
                $(".alert").slideUp();
            }, 5000);
        });
    </script>
</body>

</html>