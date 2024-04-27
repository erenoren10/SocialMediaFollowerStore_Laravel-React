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
                        <li class="active">

                            <i class="ri-shopping-basket-2-fill"></i>
                            <span>SEPETİM &nbsp;</span>

                        </li>
                        <li>

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
                                        <div class="col-md-8">
                                            <span>Hizmet Adı</span>
                                        </div>
                                        <div class="col-md-4">
                                            <span>Fiyat</span>
                                        </div>
                                    </div>
                                </div><!-- head -->
                                <div class="sptbody">

                                    <div class="sptbsitem">
                                        <div class="row">
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
                                            @foreach ($details as $detail)
                                                @if (Auth::check() && $detail->cart_id === $cart_ids[0])
                                                    <?php
                                                    $icon_name = strtolower($detail->producttitlename->product_category->parentCategories->parentCategories->product_category_name);
                                                    $icon_color = '';
                                                    if ($icon_name == 'facebook') {
                                                        $icon_color = '#3374E3';
                                                    } elseif ($icon_name == 'twitter') {
                                                        $icon_color = '#1DA1F2';
                                                    } elseif ($icon_name == 'tiktok') {
                                                        $icon_color = '#000';
                                                    } elseif ($icon_name == 'youtube') {
                                                        $icon_color = '#FF0000';
                                                    } elseif ($icon_name == 'twitch') {
                                                        $icon_color = '#9146FF';
                                                    } elseif ($icon_name == 'instagram') {
                                                        $icon_color = '#E1306C';
                                                    }
                                                    ?>
                                                    <div class="col-md-8">
                                                        <div class="icon " style="background:{{ $icon_color }}; ">
                                                            <i class="ri-{{ $icon_name }}-line"></i>
                                                        </div>
                                                        <?php
                                                        $categoryName = $detail->producttitlename->product_title;
                                                        $words = explode(' ', $categoryName);
                                                        if (count($words) === 2) {
                                                            $categoryName = $words[0];
                                                        }
                                                        ?>
                                                        <div class="text">
                                                            <h5>{{ $categoryName }}
                                                                {{ $detail->producttitlename->product_category->product_category_name }}
                                                                - {{ $categoryName }}</h5>
                                                            <span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="fiyat">
                                                            <span
                                                                class="woocommerce-Price-amount amount">{{ number_format($detail->producttitlename->product_price, 2, '.', ',') }}</span>
                                                        </div>
                                                        <div class="deletebtnlist">
                                                            <button class="delebtns" type="submit" name=""
                                                                value="">
                                                                <a href="/mycart/remove/{{ $detail->cart_detail_id }}"
                                                                    class="ri-delete-bin-2-fill"></a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @elseif (!Auth::check() && $detail->cart_id === $cart_idunk[0])
                                                    <?php
                                                    
                                                    $icon_name = strtolower($detail->producttitlename->product_category->parentCategories->parentCategories->product_category_name);
                                                    $icon_color = '';
                                                    
                                                    if ($icon_name == 'facebook') {
                                                        $icon_color = '#3374E3';
                                                    } elseif ($icon_name == 'twitter') {
                                                        $icon_color = '#1DA1F2';
                                                    } elseif ($icon_name == 'tiktok') {
                                                        $icon_color = '#000';
                                                    } elseif ($icon_name == 'youtube') {
                                                        $icon_color = '#FF0000';
                                                    } elseif ($icon_name == 'twitch') {
                                                        $icon_color = '#9146FF';
                                                    } elseif ($icon_name == 'instagram') {
                                                        $icon_color = '#E1306C';
                                                    }
                                                    ?>
                                                    <div class="col-md-8">
                                                        <div class="icon " style="background:{{ $icon_color }}; ">
                                                            <i class="ri-{{ $icon_name }}-line"></i>
                                                        </div>
                                                        <?php
                                                        $categoryName = $detail->producttitlename->product_title;
                                                        $words = explode(' ', $categoryName);
                                                        if (count($words) === 2) {
                                                            $categoryName = $words[0];
                                                        }
                                                        ?>
                                                        <div class="text">
                                                            <h5>{{ $categoryName }}
                                                                {{ $detail->producttitlename->product_category->product_category_name }}
                                                                - {{ $categoryName }}</h5>
                                                            <span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="fiyat">
                                                            <span
                                                                class="woocommerce-Price-amount amount">{{ number_format($detail->producttitlename->product_price, 2, '.', ',') }}</span>
                                                        </div>
                                                        <div class="deletebtnlist">
                                                            <button class="delebtns" type="submit" name=""
                                                                value="">
                                                                <a href="/mycart/remove/{{ $detail->cart_detail_id }}"
                                                                    class="ri-delete-bin-2-fill"></a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div><!-- item -->
                                </div>
                            </div><!-- sepet listele -->
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
                                    <b>
                                        {{ number_format($totalPrice, 2, '.', ',') }} TL
                                    </b>
                                </div>
                            </div><!-- total -->

                            {{-- <div class="basetcupon">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                Kupon Kodu Kullan
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <form action="https://fenomen.lalesoft.com/sepet/" method="post">
                                                    <input type="text" name="coupon_code" placeholder="Kupon Kodu">
                                                    <button type="submit" class="button"
                                                        name="apply_coupon">Uygula</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- kupon --> --}}

                            <div class="basettotal">
                                <div class="item">
                                    <span>Ara Toplam:</span>
                                    <b>
                                        {{ number_format($totalPrice, 2, '.', ',') }} TL
                                    </b>
                                </div>
                            </div><!-- total -->
                            <div class="basettotal">
                                <div class="item">
                                    <span>Genel Toplam:</span>
                                    <b>
                                        {{ number_format($totalPrice, 2, '.', ',') }} TL
                                    </b>
                                </div>
                            </div><!-- total -->
                            <a href="{{ route('ordercheck3') }}">
                                <button class="buybtns">
                                    <i class="ri-shopping-basket-2-line"></i> Sepeti Onayla
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
                                                    class="ri-shopping-basket-2-line"></i>
                                                SATIN AL</a>
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
@endsection
