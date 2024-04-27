<!DOCTYPE html>
<html lang="tr">

<head>
    <title>FenomenPaket - sonuc</title>
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
        <div class="title-bg red siparis">
            SİPARİŞ SORGULA
            <h5>BİNLERCE <b>MUTLU</b> MÜŞTERİ</h5>
        </div>

        <div class="container">
            <div class="sipariscontainer">
                <div class="sorgusonuc">
                    @foreach ($order as $item)
                        @foreach ($item->price as $orderitem)
                            @php
                                $cat = strtolower($orderitem->product_category->parentCategories->product_category_name);
                                $sayi = $orderitem->product_title;
                                $words = explode(' ', $sayi);
                                if (count($words) === 2) {
                                    $sayi = $words[0];
                                }
                                $email=$item->mail;
                                $telefon = $item->telefon;
                                
                                if (strlen($email) < 10 ) {

                                } else {
                                    $start = 2; 
                                    $end = 10; 
                                
                                    for ($i = $start; $i <= $end; $i++) {
                                        $email[$i] = '*';
                               
                                    }
                                }
                                if ($telefon <10) {

                                } else {
                                    $start = 2; 
                                    $end = 7; 
                                
                                    for ($i = $start; $i <= $end; $i++) {
                                   
                                        $telefon[$i] = '*';
                                    }
                                }
                            @endphp
                            <div class="area">
                                <div class="list">
                                    <div class="icon">
                                        <i class="ri-apps-line"></i>
                                    </div>
                                    <span>
                                        Siparişim
                                    </span>
                                    <div class="siparisno">#{{ $inquiry }}</div>
                                </div>
                                <div class="siparisdetay">
                                    <div class="icon">
                                        <i class="ri-{{ $cat }}-fill"></i>
                                    </div>
                                    <span>{{ strtoupper($orderitem->product_category->parentCategories->product_category_name) }}
                                        {{ $sayi }}
                                        {{ $orderitem->product_category->product_category_name }}
                                    </span>

                                    <div class="siaprisdurum">TAMAMLANDI</div>
                                </div>
                            </div><!-- area -->

                            <div class="area">
                                <div class="siparisbilgileri">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="item">
                                                <span>Ad Soyad</span>
                                                <b>{{ $item->adSoyad ?? 'Girilmemiş' }}</b>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item">
                                                <span>Mail:</span>
                                                <b>{{ $email ?? 'Girilmemiş' }}</b>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item">
                                                <span>Telefon:</span>
                                                <b>{{ $telefon ?? 'Girilmemiş' }}</b>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="item">
                                                <span>Tutar:</span>
                                                <h6>{{ $orderitem->product_price }} TL</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="item">
                                                <span>Durum:</span>
                                                <h6>Tamamlandı</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
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
</body>

</html>
