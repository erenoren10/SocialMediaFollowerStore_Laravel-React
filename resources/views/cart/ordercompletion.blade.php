@extends('layouts.orderlayout')
@section('css')
    <style>
        .alert-success {
            background-color: #d1e7dd;
            /* Arkaplan rengi */
            border: 1px solid #CED4DA;
            /* Kenar rengi */
            border-radius: 5px;
            /* Kenar yuvarlaklığı */
            color: #333;
            /* Yazı rengi */
            padding: 10px;
            /* İç içe padding */
            position: fixed;
            top: 23px;
            right: 31px;
            z-index: 999999;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        .alert-danger {
            background-color: #FE0000;
            /* Arkaplan rengi */
            border: 1px solid #CED4DA;
            /* Kenar rengi */
            border-radius: 5px;
            /* Kenar yuvarlaklığı */
            color: #ffffff;
            /* Yazı rengi */
            padding: 10px;
            /* İç içe padding */
            position: fixed;
            top: 23px;
            right: 31px;
            z-index: 999999;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
@endsection

@section('orderbody')
    <div class="sepetbasl">
        <div class="container">
            <i class="ri-shopping-basket-2-line"></i>
            <h1>SİPARİŞ OLUŞTUR</h1>
        </div>
    </div>
    <div class="sitecotent sepetozel">
        <div class="container">
            <div class="basketarea">

                <div class="basketmenu">
                    <ul>
                        <li>

                            <i class="ri-funds-fill"></i>
                            <span>SİPARİŞ OLUŞTUR</span>

                        </li>
                        <li>

                            <i class="ri-shopping-basket-2-fill"></i>
                            <span>SEPETİM</span>

                        </li>
                        <li class="active">

                            <i class="ri-user-line"></i>
                            <span>KULLANICI BİLGİLERİ</span>

                        </li>
                        <li>
                            <i class="ri-flashlight-fill"></i>
                            <span>ÖDEME</span>
                        </li>
                    </ul>
                </div><!-- menu -->

                <div class="basketcontent">

                    <div class="row">
                        <div class="col-md-9">
                            <div class="sepetlistele">
                                <div class="spthead">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span>Kullanıcı Bilgileri</span>
                                        </div>
                                    </div>
                                </div><!-- head -->
                                <div class="sptbody">
                                    <div class="alan">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="sptkls">
                                                    <input type="text" placeholder="Adınız Soyadınız*" name="name"
                                                        value="{{ Auth::user()->name ?? '' }}">
                                                    <i class="ri-user-line"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="sptkls">
                                                    <input type="text" placeholder="E-Posta Adresiniz*" name="email"
                                                        value="{{ Auth::user()->email ?? '' }}">
                                                    <i class="ri-mail-open-line"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="sptkls">
                                                    <input type="text" placeholder="Telefon Numaranız*"
                                                        name="phone_number" value="{{ Auth::user()->phone_number ?? '' }}">
                                                    <i class="ri-smartphone-line"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="sptkls">
                                                    <input type="text" placeholder="Fatura Adresi (isteğe bağlı)"
                                                        name="faturaAdresi" value="">
                                                    <i class="ri-numbers-line"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="sptkls">
                                                    <input type="text" placeholder="Vergi Numaranız (isteğe bağlı)"
                                                        name="vergiNo" value="">
                                                    <i class="ri-numbers-line"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="sptkls">
                                                    <input type="text" placeholder="Vergi Dairesi (isteğe bağlı)"
                                                        name="vergiDaire" value="">
                                                    <i class="ri-numbers-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- sepet -->

                            <div class="sepetlistele">
                                <div class="spthead">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span>Ödeme Yöntemi</span>
                                        </div>
                                    </div>
                                </div><!-- head -->
                                <div class="sptbody">
                                    <div class="alan">
                                        @if (Auth::check())
                                            <ul class="wc_payment_methods payment_methods methods" id="secimalani">
                                                <li class="wc_payment_method payment_method_paytrcheckout">
                                                    <input id="payment_method_paytrcheckout" type="radio"
                                                        class="input-radio" name="payment_method" value="paytrcheckout">
                                                    <label for="payment_method_paytrcheckout">
                                                        Bakiye İle Ödeme
                                                    </label>
                                                </li>
                                                <li class="wc_payment_method payment_method_wps_wcb_wallet_payment_gateway">
                                                    <input id="payment_method_wps_wcb_wallet_payment_gateway" type="radio"
                                                        class="input-radio" name="payment_method"
                                                        value="wps_wcb_wallet_payment_gateway" checked="checked">
                                                    <label for="payment_method_wps_wcb_wallet_payment_gateway">
                                                        Kredi / Banka Kartı
                                                    </label>
                                                </li>
                                                <li class="wc_payment_method payment_method_bacs">
                                                    <input id="payment_method_bacs" type="radio" class="input-radio"
                                                        name="payment_method" value="bacs">
                                                    <label for="payment_method_bacs">
                                                        Havale / FAST
                                                    </label>
                                                </li>
                                                <li class="wc_payment_method payment_method_mobile">
                                                    <input id="payment_method_mobile" type="radio" class="input-radio"
                                                        name="payment_method" value="mobile">
                                                    <label for="payment_method_mobile">
                                                        Mobil Ödeme <span style="color: #7a0014;">(+10%)</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        @else
                                            <ul class="wc_payment_methods payment_methods methods" id="secimalani">
                                                <li
                                                    class="wc_payment_method payment_method_wps_wcb_wallet_payment_gateway">
                                                    <input id="payment_method_wps_wcb_wallet_payment_gateway"
                                                        type="radio" class="input-radio" name="payment_method"
                                                        value="wps_wcb_wallet_payment_gateway" checked="checked">

                                                    <label for="payment_method_wps_wcb_wallet_payment_gateway">
                                                        Kredi / Banka Kartı
                                                    </label>
                                                </li>
                                                <li class="wc_payment_method payment_method_bacs">
                                                    <input id="payment_method_bacs" type="radio" class="input-radio"
                                                        name="payment_method" value="bacs">

                                                    <label for="payment_method_bacs">
                                                        Havale / FAST </label>
                                                </li>
                                                <li class="wc_payment_method payment_method_mobile">
                                                    <input id="payment_method_mobile" type="radio" class="input-radio"
                                                        name="payment_method" value="mobile">
                                                    <label for="payment_method_mobile">
                                                        Mobil Ödeme <span style="color: #7a0014;">(+10%)</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- sepet  -->
                        </div><!-- col9 -->


                        <div class="col-md-3">
                            <h3 class="sepetdtayi">Sepet Detayı</h3>
                            <div class="basettotal">
                                <div class="item">
                                    @foreach ($details as $detailprice)
                                        @if (Auth::check() && $detailprice->cart_id === $cart_ids[0])
                                            @php
                                                $totalPrice += $detailprice->producttitlename->product_price * $detailprice->quantity;
                                            @endphp
                                        @elseif (!Auth::check() && $detailprice->cart_id === $cart_idunk[0])
                                            @php
                                                $totalPrice += $detailprice->producttitlename->product_price * $detailprice->quantity;
                                            @endphp
                                        @endif
                                    @endforeach
                                    <span>Ödenecek Tutar:</span>
                                    <b>{{ number_format($totalPrice, 2, '.', ',') }} TL </b>
                                </div>
                            </div><!-- total -->

                            <div class="basettotal">
                                <div class="item">
                                    <span>Ara Toplam:</span>
                                    <b> {{ number_format($totalPrice, 2, '.', ',') }} TL
                                    </b>
                                </div>
                            </div><!-- total -->
                            <div class="basettotal">
                                <div class="item">
                                    @php
                                        if (!empty($_GET['newprice'])) {
                                            $totalPrice = $_GET['newprice'];
                                        }
                                    @endphp
                                    <span>Genel Toplam:</span>
                                    <b>{{ number_format($totalPrice, 2, '.', ',') }} TL</b>
                                </div>
                            </div><!-- total -->
                            <div class="basettotal">
                                <div class="basetcupon">
                                    <div class="item">
                                        <form action="{{ route('apply.discount') }}" method="post">
                                            @csrf
                                            <span>Kupon kodu: </span>
                                            <input type="text" name="coupon_code">
                                            <button type="submit" class="button" name="apply_coupon"
                                                style="top:35px;">Uygula</button>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- kupon -->
                            @if (session('message'))
                                <div class="alert alert-{{ session('alert-type') }}">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <a id="buylink" href="#!">
                                <button class="buybtns">
                                    <i class="ri-shopping-basket-2-line"></i> ÖDEMEYE GEÇ
                                </button>
                            </a>
                        </div><!-- col3 -->
                    </div><!-- row -->
                </div><!-- content -->
            </div><!-- area -->

            <div class="sepetbenzer">
                <h6>Bu ürünlerde dikkatini çekebilir.</h6>
                <h4>Sepetine uygun şekilde en doğru paket önerilerini sizler için hazırladık.</h4>
                <div class="row">
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($randomproduct as $item)
                        @if ($count < 4)
                            <div class="col-md-3">
                                <div
                                    class="paketitem {{ strtolower($item['product_category']->parentCategories->parentCategories->product_category_name) }}">
                                    <div class="hshead">
                                        <div class="icon">
                                            <i
                                                class="ri-{{ strtolower($item['product_category']->parentCategories->parentCategories->product_category_name) }}-fill"></i>
                                        </div>
                                        <div class="text">
                                            <h5>{{ $item['product_category']->parentCategories->parentCategories->product_category_name }}
                                            </h5>
                                            <p>{{ $item->product_title }}</p>
                                        </div>
                                        <button class="favorite" id="favoriteButton">
                                            <input type="hidden" name="itemID" value="{{ $item->id }}">
                                            <input type="hidden" name="userID" value="{{ Auth::id() }}">
                                            <a href="#!">
                                                <i id="kalpicon{{ $item->id }}" class="ri-heart-line"></i>
                                            </a>
                                        </button>
                                    </div>
                                    <div class="hsbody">
                                        <ul>
                                            <li>
                                                <i class="ri-user-line"></i>
                                                {{ $item->product_desc1 }}
                                            </li>
                                            <li>
                                                <i class="ri-user-add-line"></i>
                                                {{ $item->product_desc2 }}
                                            </li>
                                            <li>
                                                <i class="ri-gift-line"></i>
                                                {{ $item->product_desc3 }}
                                            </li>
                                            <li>
                                                <i class="ri-check-double-line"></i>
                                                {{ $item->product_desc4 }}
                                            </li>
                                            <li>
                                                <i class="ri-shield-keyhole-line"></i>
                                                {{ $item->product_desc5 }}
                                            </li>
                                            <li>
                                                <i class="ri-shield-check-line"></i>
                                                {{ $item->product_desc6 }}
                                            </li>
                                            <li>
                                                <i class="ri-customer-service-2-line"></i>
                                                {{ $item->product_desc7 }}
                                            </li>
                                            <li>
                                                <i class="ri-user-unfollow-line"></i>
                                                {{ $item->product_desc8 }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="hsprice">
                                        <div class="price">
                                            <h5>1,899 TL</h5>
                                            <p>{{ $item->product_price }} TL</p>
                                        </div>
                                        <div class="buy">
                                            <a href="/mycart/add/{{ $item->id }}"><i
                                                    class="ri-shopping-basket-2-line"></i> SATIN AL</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                </div><!-- row -->
            </div><!-- row -->
        </div><!-- benzer -->
    </div>



    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            document.getElementById('secimalani').addEventListener('click', (event) => {
                var selectedRadio = document.querySelector('input[name="payment_method"]:checked').value;
                var paymentButton = document.querySelector('#buylink');
                console.log(selectedRadio);

                var name = document.querySelector('input[name="name"]').value;
                var email = document.querySelector('input[name="email"]').value;
                var phone_number = document.querySelector('input[name="phone_number"]').value;
                var vergiNo = document.querySelector('input[name="vergiNo"]').value;
                var vergiDaire = document.querySelector('input[name="vergiDaire"]').value;
                var faturaAdresi = document.querySelector('input[name="faturaAdresi"]').value;



                if (selectedRadio === 'bacs') {
                    var url = "{{ route('cardeft', ['totalprice' => $totalPrice]) }}";
                    url += "&name=" + name + "&email=" + email + "&phone_number=" + phone_number +
                        "&vergiNo=" + vergiNo + "&vergidaire=" + vergiDaire + "&faturaadresi=" +
                        faturaAdresi;
                    paymentButton.href = url;
                    console.log(paymentButton);


                } else if (selectedRadio === 'wps_wcb_wallet_payment_gateway') {
                    var url = "{{ route('cardcc', ['totalprice' => $totalPrice]) }}";
                    url += "&name=" + name + "&email=" + email + "&phone_number=" + phone_number;
                    paymentButton.href = url;
                    console.log(paymentButton);

                } else if (selectedRadio === 'paytrcheckout') {
                    var url = "{{ route('cardbalance', ['totalprice' => $totalPrice]) }}";
                    url += "&name=" + name + "&email=" + email + "&phone_number=" + phone_number;
                    paymentButton.href = url;
                    console.log(paymentButton);

                }
                if (selectedRadio === 'mobile') {
                    var url = "{{ route('cardmobile', ['totalprice' => $totalPrice]) }}";
                    url += "&name=" + name + "&email=" + email + "&phone_number=" + phone_number;
                    paymentButton.href = url;
                    console.log(paymentButton);

                }

            });
        });
    </script>
    <script>
        // Sayfa yüklendiğinde çalışacak kod
        document.addEventListener("DOMContentLoaded", function() {
            var notificationTimeout = {{ session('notificationTimeout', 0) }};

            if (notificationTimeout > 0) {
                // Bildirimi belirtilen süre sonra otomatik olarak gizle
                setTimeout(function() {
                    var notification = document.querySelector('.alert');
                    if (notification) {
                        notification.style.display = 'none';
                    }
                }, notificationTimeout * 1000); // Saniye cinsinden süreyi milisaniyeye çevir
            }
        });
    </script>
@endsection
