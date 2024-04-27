@extends('layouts.orderlayout')

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
                        <li>

                            <i class="ri-user-line"></i>
                            <span>KULLANICI BİLGİLERİ</span>

                        </li>
                        <li class="active">

                            <i class="ri-flashlight-fill"></i>
                            <span>ÖDEME</span>

                        </li>
                    </ul>
                </div><!-- menu -->

                <?php
                
                use App\Models\Cart;
                use Illuminate\Support\Facades\Auth;
                use Illuminate\Support\Str;
                if (!empty($_GET['totalprice'])) {
                    $totalprice = $_GET['totalprice'];
                } else {
                    $totalprice = 'Hesaplanamadı Tekrar deneyin';
                }
                if (!empty($_GET['name'])) {
                    $name = $_GET['name'];
                } else {
                    $name = 'Girilmedi';
                }
                if (!empty($_GET['email'])) {
                    $mail = $_GET['email'];
                } else {
                    $mail = 'Girilmedi';
                }
                if (!empty($_GET['phone_number'])) {
                    $phone_number = $_GET['phone_number'];
                } else {
                    $phone_number = 'Girilmedi';
                }
                
                if (Auth::check()) {
                    $user = Auth::id();
                } else {
                    $user = session()->getId();
                }
                ## 1. ADIM için örnek kodlar ##
                
                ####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
                #
                ## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
                $merchant_id = env('PAYTR_MERCHANT_ID');
                $merchant_key = env('PAYTR_MERCHANT_KEY');
                $merchant_salt = env('PAYTR_SECRET_KEY');
                #
                ## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
                $email = $mail;
                #
                ## Tahsil edilecek tutar.
                $payment_amount = $totalprice; //9.99 için 9.99 * 100 = 999 gönderilmelidir.
                #
                ## Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
                $merchant_oid = Str::random(8);
                #
                ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
                $user_name = $name;
                #
                ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
                $user_address = 'Deneme';
                #
                ## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
                $user_phone = $phone_number;
                
                #
                ## Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
                ## !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
                ## !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
                $merchant_ok_url = "{{route('statussuccess')}}";
                #
                ## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
                ## !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
                ## !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
                $merchant_fail_url = "{{route('statusdanger')}}"; #
                ## Müşterinin sepet/sipariş içeriği
                $user_basket = getBasketItems();
                #
                /* ÖRNEK $user_basket oluşturma - Ürün adedine göre array'leri çoğaltabilirsiniz
                $user_basket = base64_encode(json_encode(array(
                    array("Örnek ürün 1", "18.00", 1), // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
                    array("Örnek ürün 2", "33.25", 2), // 2. ürün (Ürün Ad - Birim Fiyat - Adet )
                    array("Örnek ürün 3", "45.42", 1)  // 3. ürün (Ürün Ad - Birim Fiyat - Adet )
                )));
                */
                ############################################################################################
                
                ## Kullanıcının IP adresi
                if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                } else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                
                ## !!! Eğer bu örnek kodu sunucuda değil local makinanızda çalıştırıyorsanız
                ## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
                $user_ip = $ip;
                ##
                
                ## İşlem zaman aşımı süresi - dakika cinsinden
                $timeout_limit = '30';
                
                ## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
                $debug_on = 1;
                
                ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
                $test_mode = 0;
                
                $no_installment = 1; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın
                
                ## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
                ## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
                $max_installment = 0;
                
                $currency = 'TL';
                
                ####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
                $hash_str = $merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $user_basket . $no_installment . $max_installment . $currency . $test_mode;
                $paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $merchant_salt, $merchant_key, true));
                $post_vals = [
                    'merchant_id' => $merchant_id,
                    'user_ip' => $user_ip,
                    'merchant_oid' => $merchant_oid,
                    'email' => $email,
                    'payment_amount' => $payment_amount,
                    'paytr_token' => $paytr_token,
                    'user_basket' => $user_basket,
                    'debug_on' => $debug_on,
                    'no_installment' => $no_installment,
                    'max_installment' => $max_installment,
                    'user_name' => $user_name,
                    'user_address' => $user_address,
                    'user_phone' => $user_phone,
                    'merchant_ok_url' => $merchant_ok_url,
                    'merchant_fail_url' => $merchant_fail_url,
                    'timeout_limit' => $timeout_limit,
                    'currency' => $currency,
                    'test_mode' => $test_mode,
                ];
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://www.paytr.com/odeme/api/get-token');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                
                // XXX: DİKKAT: lokal makinanızda "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
                // aşağıdaki kodu açıp deneyebilirsiniz. ANCAK, güvenlik nedeniyle sunucunuzda (gerçek ortamınızda) bu kodun kapalı kalması çok önemlidir!
                //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                
                $result = @curl_exec($ch);
                
                if (curl_errno($ch)) {
                    die('PAYTR IFRAME connection error. err:' . curl_error($ch));
                }
                
                curl_close($ch);
                
                $result = json_decode($result, 1);
                
                if ($result['status'] == 'success') {
                    $paytr_token = $result['token'];
                } else {
                    'PAYTR IFRAME failed. reason:' . $result['reason'];
                }
                #########################################################################
                
                /*


                
                $user_basket = getBasketItems();



                $merchant_oid = Str::random(8);
        
                $test_mode="0";
        
                //3d'siz işlem
                $non_3d="0";
        
                //Ödeme süreci dil seçeneği tr veya en
                $lang = "tr";
        
                //non3d işlemde, başarısız işlemi test etmek için 1 gönderilir (test_mode ve non_3d değerleri 1 ise dikkate alınır!)
                $non3d_test_failed="0";
        
                if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
                    $ip = $_SERVER["HTTP_CLIENT_IP"];
                } elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
                    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                } else {
                    $ip = $_SERVER["REMOTE_ADDR"];
                }
        
                $user_ip = "188.119.54.159";
        
                $email = Auth::user()->email;
        
                // 100.99 TL ödeme
                $payment_amount = calculateCartTotal();
                $currency="TL";
                //
                $payment_type = "card";
        
        
                $card_type = "bonus";       // Alabileceği değerler; advantage, axess, combo, bonus, cardfinans, maximum, paraf, world, saglamkart
            	$installment_count = "0";
                $installment_count = "0";
                $no_installment = "0";
                $max_installment = "0";
        
                $post_url = "https://www.paytr.com/odeme";
        
                $hash_str = $merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $payment_type . $installment_count. $currency. $test_mode. $non_3d;
                $token = base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
                print_r($merchant_ok_url);*/
                function getOrCreateCart(): Cart
                {
                    if (Auth::check()) {
                        $user = Auth::user();
                        $cart = Cart::firstOrCreate(['user_id' => $user->id], ['code' => Str::random(8)]);
                    } else {
                        $user = session()->getId();
                        $cart = Cart::firstOrCreate(['session_id' => $user], ['code' => Str::random(8)]);
                    }
                
                    return $cart;
                }
                
                function getBasketItems()
                {
                    $basketItems = [];
                    $cart = getOrCreateCart();
                    $cartDetails = $cart->details;
                    foreach ($cartDetails as $detail) {
                        $parentCategory = $detail->producttitlename->product_category->parentCategories->product_category_name;
                        $subCategory = $detail->producttitlename->product_category->product_category_name;
                
                        $categoryCombined = $parentCategory . ' - ' . $subCategory;
                        for ($i = 0; $i < $detail->quantity; $i++) {
                            $itemData[] = [$detail->producttitlename->product_title, $categoryCombined, $detail->producttitlename->product_price];
                            $basketItems = htmlentities(json_encode($itemData));
                        }
                    }
                    return $basketItems;
                }
                ?>
                <!-- Ödeme formunun açılması için gereken HTML kodlar / Başlangıç -->
                <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo $paytr_token; ?>" id="paytriframe" frameborder="0"
                    scrolling="no" style="width: 100%;"></iframe>
                <script>
                    iFrameResize({}, '#paytriframe');
                </script>
                <!-- Ödeme formunun açılması için gereken HTML kodlar / Bitiş -->

            </div>
        </div>
    </div>
@endsection
