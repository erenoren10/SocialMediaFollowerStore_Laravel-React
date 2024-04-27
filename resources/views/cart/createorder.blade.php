@extends('layouts.orderlayout')
@section('css')
    <style>
        .notification-container {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 10;
            display: none;
        }

        .notification {
            background-color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .notification-title {
            color: #F70E36;
            display: block;
            margin: 5px 0;
        }

        .notification-text {
            color: black;
        }

        .notification-close {
            background: none;
            border: none;
            color: inherit;
            cursor: pointer;
            font-size: 20px;
        }


        .notification-close:hover {
            color: #fff;
        }

        .headbt {
            z-index: 1;
        }

        header::after {
            z-index: -1;
        }
    </style>
@endsection

@section('orderbody')
    @php
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $cart_ids = DB::table('carts')
                ->where('user_id', $userId)
                ->pluck('cart_id')
                ->toArray();
        } else {
            $sessionId = session()->getId();
            $cart_idunk = DB::table('carts')
                ->where('session_id', $sessionId)
                ->pluck('cart_id');
        }
    @endphp
    <div class="notification-container">
        <div class="notification">
            <i class="fa-regular fa-circle-check" style="color: #F70E36; font-size:40px;margin-right: 15px;"></i>
            <div class="col-md">
                <span class="notification-title" id="notification-title"><b>Başarılı</b></span>
                <span class="notification-text" id="notification-text">Kullanıcı adı başarıyla Kaydedildi!</span>
            </div>
            <span id="countdown" style="margin-left: 15px;">s</span>
            <button class="notification-close" onclick="closeNotification()">&times;</button>
        </div>
    </div>
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
                        <li class="active" readonly>

                            <i class="ri-funds-fill"></i>
                            <span>SİPARİŞ OLUŞTUR</span>

                        </li>
                        <li readonly>

                            <i class="ri-shopping-basket-2-fill"></i>
                            <span>SEPETİM</span>

                        </li>
                        <li readonly>
                            <i class="ri-user-line"></i>
                            <span>KULLANICI BİLGİLERİ</span>

                        </li>
                        <li readonly>
                            <i class="ri-flashlight-fill"></i>
                            <span>ÖDEME</span>
                        </li>
                    </ul>
                </div><!-- menu -->

                <div class="basketcontent">
                    <div class="row">
                        <form action="{{ route('update-platform-username') }}" method="POST">
                            @csrf
                            @foreach ($details as $detail)
                                @if (Auth::check() && $detail->cart_id === $cart_ids[0])
                                    <div class="col-md-12" style="margin-bottom: 15px;">
                                        <div class="siparissepetitem">
                                            <div class="row">
                                                <?php
                                                $update_c_name = strtolower($detail->producttitlename->product_category->parentCategories->parentCategories->product_category_name);
                                                $categoryName = $detail->producttitlename->product_title;
                                                $words = explode(' ', $categoryName);
                                                if (count($words) === 2) {
                                                    $categoryName = $words[0];
                                                }
                                                ?>
                                                <div class="col-md-12">
                                                    <div
                                                        class="platform {{ $detail->producttitlename->product_category->parentCategories->parentCategories->product_category_name }}">
                                                        <div
                                                            class="title {{ $detail->producttitlename->product_category->parentCategories->parentCategories->product_category_name }}">
                                                            <i class="ri-{{ $update_c_name }}-fill"></i>
                                                            <span>
                                                                {{ $detail->producttitlename->product_category->parentCategories->parentCategories->product_category_name }}
                                                                {{ $categoryName }}
                                                                {{ $detail->producttitlename->product_category->product_category_name }}
                                                            </span>
                                                        </div>
                                                        <div class="area">
                                                            <h5>
                                                                Kullanıcı Adı Giriniz. Hesap Herkese Açık Olması Gerekli
                                                            </h5>
                                                            <p>
                                                                Lütfen Kullanıcı Adınızı Doğru Yazdığınızdan ve Profil Gizli
                                                                Olmadığına Emin Olun.
                                                            </p>
                                                            <?php
                                                            if ($detail->producttitlename->product_price >= 1000) {
                                                                $updatedPrice = $detail->producttitlename->product_price + 600;
                                                            } elseif ($detail->producttitlename->product_price >= 100) {
                                                                $updatedPrice = $detail->producttitlename->product_price + 300;
                                                            } elseif ($detail->producttitlename->product_price >= 10) {
                                                                $updatedPrice = $detail->producttitlename->product_price + 20;
                                                            }
                                                            ?>

                                                            <div class="summary entry-summary">
                                                                <p class="price"><del aria-hidden="true"><span
                                                                            class="woocommerce-Price-amount amount">{{ $updatedPrice }}&nbsp;₺</span></del>
                                                                    <ins><span
                                                                            class="woocommerce-Price-amount amount">{{ $detail->producttitlename->product_price }}&nbsp;₺</span></ins>
                                                                </p>

                                                                <div class="single_variation_wrap">
                                                                    <p class="custom_link">
                                                                        <input type="hidden" name="cart_detail_id"
                                                                            value="{{ $detail->cart_detail_id }}">
                                                                        <input type="text" name="platform_username"
                                                                            id="platformUsernameInput_{{ $detail->cart_detail_id }}"
                                                                            class="input-text platform-username"
                                                                            value="{{ $detail->platform_username ?? '' }}">
                                                                    </p>
                                                                    <div>
                                                                        <a id="sepeteekle"
                                                                            href="{{ route('ordercheck1') }}">
                                                                            <button type="submit"
                                                                                class="single_add_to_cart_button button alt">Sepete
                                                                                Ekle
                                                                            </button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif (!Auth::check() && $detail->cart_id === $cart_idunk[0])
                                    <div class="col-md-12" style="margin-bottom: 15px;">
                                        <div class="siparissepetitem">
                                            <div class="row">
                                                <?php
                                                $update_c_name = strtolower($detail->producttitlename->product_category->parentCategories->product_category_name);
                                                $categoryName = $detail->producttitlename->product_title;
                                                $words = explode(' ', $categoryName);
                                                if (count($words) === 2) {
                                                    $categoryName = $words[0];
                                                }
                                                ?>
                                                <div class="col-md-12">
                                                    <div
                                                        class="platform {{ $detail->producttitlename->product_category->parentCategories->product_category_name }}">
                                                        <div
                                                            class="title {{ $detail->producttitlename->product_category->parentCategories->product_category_name }}">
                                                            <i class="ri-{{ $update_c_name }}-fill"></i>
                                                            <span>
                                                                {{ $detail->producttitlename->product_category->parentCategories->product_category_name }}
                                                                {{ $categoryName }}
                                                                {{ $detail->producttitlename->product_category->product_category_name }}
                                                            </span>
                                                        </div>
                                                        <div class="area">
                                                            <h5>
                                                                Kullanıcı Adı Giriniz. Hesap Herkese Açık Olması Gerekli
                                                            </h5>
                                                            <p>
                                                                Lütfen Kullanıcı Adınızı Doğru Yazdığınızdan ve Profil Gizli
                                                                Olmadığına Emin Olun.
                                                            </p>
                                                            <?php
                                                            if ($detail->producttitlename->product_price >= 1000) {
                                                                $updatedPrice = $detail->producttitlename->product_price + 600;
                                                            } elseif ($detail->producttitlename->product_price >= 100) {
                                                                $updatedPrice = $detail->producttitlename->product_price + 300;
                                                            } elseif ($detail->producttitlename->product_price >= 10) {
                                                                $updatedPrice = $detail->producttitlename->product_price + 20;
                                                            }
                                                            ?>

                                                            <div class="summary entry-summary">
                                                                <p class="price"><del aria-hidden="true"><span
                                                                            class="woocommerce-Price-amount amount">{{ $updatedPrice }}&nbsp;₺</span></del>
                                                                    <ins><span
                                                                            class="woocommerce-Price-amount amount">{{ $detail->producttitlename->product_price }}&nbsp;₺</span></ins>
                                                                </p>

                                                                <div class="single_variation_wrap">
                                                                    <p class="custom_link">
                                                                        <input type="hidden" name="cart_detail_id"
                                                                            value="{{ $detail->cart_detail_id }}">
                                                                        <input type="text" name="platform_username"
                                                                            id="platformUsernameInput_{{ $detail->cart_detail_id }}"
                                                                            class="input-text platform-username"
                                                                            value="{{ $detail->platform_username ?? '' }}">
                                                                    </p>
                                                                    <div>
                                                                        <a href="#!">
                                                                            <button type="submit"
                                                                                class="single_add_to_cart_button button alt">Sepete
                                                                                Ekle</button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.single_add_to_cart_button').click(function(event) {
                event.preventDefault();
                var button = $(this);
                var platformUsername = button.closest('.single_variation_wrap').find('.platform-username')
                    .val();
                var cartDetailId = button.closest('.single_variation_wrap').find(
                    'input[name="cart_detail_id"]').val();
                var deger = document.getElementById('sepeteekle');
                console.log(deger);

                $.ajax({
                    type: "POST",
                    url: "{{ route('update-platform-username') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        platform_username: platformUsername,
                        cart_detail_id: cartDetailId
                    },
                    success: function(response) {
                        const notificationText = document.getElementById("notification-text");
                        document.querySelector(".notification-container").style.display =
                            "block";
                        setTimeout(function() {
                            closeNotification();
                            window.location.href = "{{ route('ordercheck1') }}";
                        }, 3000);
                    },

                    error: function(error) {
                        // Hata durumunda yapılacaklar
                        console.log(error);
                    }
                });

            });
        });
    </script>
    <script>
        var countdownElement = document.getElementById("countdown");
        var countdownDuration = 3; // Geriye sayma süresi (saniye)

        function startCountdown() {
            var countdown = countdownDuration;
            countdownElement.innerText = countdown;

            var countdownInterval = setInterval(function() {
                countdown--;
                countdownElement.innerText = countdown;

                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    countdownElement.style.display = "none";
                }
            }, 1500); // Her 1 saniyede bir güncelle
        }

        // Sayfa yüklendiğinde geriye sayımı başlat
        window.onload = startCountdown;

        function closeNotification() {
            // Bildirimi kapatmak için burada gerekli işlemleri yapabilirsiniz.
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const customInputs = document.querySelectorAll('.input-text');
            const addToCartButton = document.querySelector('.single_add_to_cart_buttn ');

            addToCartButton.disabled = true;
            addToCartButton.style.backgroundColor = '#DFF7ED';

            customInputs.forEach(input => {
                input.addEventListener('input', function() {
                    const allInputsFilled = Array.from(customInputs).every(input => input.value
                        .trim() !== '');
                    addToCartButton.disabled = !allInputsFilled;

                    if (allInputsFilled) {
                        addToCartButton.style.backgroundColor = '#4FD19C';
                    } else {
                        addToCartButton.style.backgroundColor = '#DFF7ED';
                    }
                });
            });
        });
    </script>
@endsection
