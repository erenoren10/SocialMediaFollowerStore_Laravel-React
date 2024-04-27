@extends('layouts.orderlayout')
@section('css')
    <style>
        /* Kart stilleri */
        .kart {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #fff;
        }

        .kart-ust {
            padding: 15px;
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        .kart-govde {
            display: none;
            padding: 15px;
        }

        .collaps {
            display: block;
        }

        /* Select kutusu stil */
        select.form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Banka listesi stilleri */
        .banklist {
            list-style: none;
            padding: 0;
        }

        .bank-flex {
            display: flex;
            align-items: center;
        }

        .bank-ico img {
            max-width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .bank-dets {
            flex-grow: 1;
        }

        /* Ödeme bildirimi formu stilleri */
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .col-md-6 {
            flex-basis: calc(50% - 10px);
        }

        .col-md-12 {
            flex-basis: 100%;
        }

        .text-right {
            text-align: right;
        }

        .butto {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
@endsection



@section('orderbody')
    @php
        $eftcode = Str::random(10);
        $time = today();
        $today = $time->format('Y-m-d');
        
        if (!empty($_GET['totalprice'])) {
            $totalprice = $_GET['totalprice'];
        } else {
            $totalprice = 'Hesaplanamadı Tekrar deneyin';
        }
        if (!empty($_GET['name'])) {
            $name = $_GET['name'];
        } else {
            $name = '';
        }
        if (!empty($_GET['email'])) {
            $mail = $_GET['email'];
        } else {
            if (Auth::check()) {
                # code...
                $mail = Auth::user()->email;
            }else{
            $mail = '';
			}
        }
        if (!empty($_GET['phone_number'])) {
            $phone_number = $_GET['phone_number'];
        } else {
            $phone_number = '';
        }
        if (!empty($_GET['vergiNo'])) {
            $vergino = $_GET['vergiNo'];
        } else {
            $vergino = '';
        }
        if (!empty($_GET['vergidaire'])) {
            $vergidaire = $_GET['vergidaire'];
        } else {
            $vergidaire = '';
        }
        if (!empty($_GET['faturaadresi'])) {
            $faturaadresi = $_GET['faturaadresi'];
        } else {
            $faturaadresi = '';
        }
        
    @endphp
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
                <div style="width: 100%;margin: 0 auto;display: table;">

                    <?php
                    
                    $merchant_id = env('PAYTR_MERCHANT_ID'); // Mağaza numarası
                    $merchant_key = env('PAYTR_MERCHANT_KEY'); // Mağaza Parolası - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
                    $merchant_salt = env('PAYTR_SECRET_KEY'); // Mağaza Gizli Anahtarı - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
                    
                    ## Kullanıcının IP adresi
                    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    } else {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }
                    $intValue = intval($totalprice);
                    $user_ip = $ip; // !!! Eğer bu kodu sunucuda değil local makinanızda çalıştırıyorsanız buraya dış ip adresinizi(https://www.whatismyip.com/) yazmalısınız.
                    
                    $merchant_oid = time(); //sipariş numarası: her işlemde benzersiz olmalıdır! Bu bilgi bildirim sayfanıza yapılacak bildirimde gönderilir.
                    $email = $mail; // Müşterinizin sitenizde kayıtlı eposta adresi
                    $payment_amount = $intValue; //9.99 TL
                    $payment_type = 'eft';
                    $debug_on = 1; //hata mesajlarını ekrana bas
                    
                    ## İşlem zaman aşımı süresi - dakika cinsinden
                    $timeout_limit = '30';
                    
                    ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir
                    $test_mode = 0;
                    
                    $hash_str = $merchant_id . $user_ip . $merchant_oid . $email . $payment_amount . $payment_type . $test_mode;
                    $paytr_token = base64_encode(hash_hmac('sha256', $hash_str . $merchant_salt, $merchant_key, true));
     
                    $post_vals = [
                        'merchant_id' => $merchant_id,
                        'user_ip' => $user_ip,
                        'merchant_oid' => $merchant_oid,
                        'email' => $email,
                        'payment_amount' => $payment_amount,
                        'payment_type' => $payment_type,
                        'paytr_token' => $paytr_token,
                        'debug_on' => $debug_on,
                        'timeout_limit' => $timeout_limit,
                        'test_mode' => $test_mode,
                    ];
                    
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://www.paytr.com/odeme/api/get-token');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
                    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    
                    //XXX: DİKKAT: lokal makinanızda "SSL certificate problem: unable to get local issuer certificate" uyarısı alırsanız eğer
                    //aşağıdaki kodu açıp deneyebilirsiniz. ANCAK, güvenlik nedeniyle sunucunuzda (gerçek ortamınızda) bu kodun kapalı kalması çok önemlidir!
                    //curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                    
                    $result = @curl_exec($ch);
                    
                    if (curl_errno($ch)) {
                        die('PAYTR EFT IFRAME connection error. err:' . curl_error($ch));
                    }
                    curl_close($ch);
                    
                    $result = json_decode($result, 1);
                    
                    /*
                Başarılı yanıt örneği: (token içerir)
                {"status":"success","token":"28cc613c3d7633cfa4ed0956fdf901e05cf9d9cc0c2ef8db54fa"}
                
                Başarısız yanıt örneği:
                {"status":"failed","reason":"Zorunlu alan degeri gecersiz: merchant_id"}
                */
                    
                    if ($result['status'] == 'success') {
                        $token = $result['token'];
                    } else {
                        die('PAYTR EFT IFRAME failed. reason:' . $result['reason']);
                    }
                    
                    ?>

                    <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                    <iframe src="https://www.paytr.com/odeme/api/<?php echo $paytr_token; ?>" id="paytriframe" frameborder="0"
                        scrolling="no" style="width: 100%;"></iframe>
                    <script>
                        iFrameResize({}, '#paytriframe');
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
