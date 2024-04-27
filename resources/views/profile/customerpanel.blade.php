@extends('layouts.LayoutProfil')

@section('title', 'Profil')
@section('accountmenu')
    <div class="accountmenu">
        <ul>
            <li class="active">
                <a href="{{ route('customerp') }}">
                    <div class="icon">
                        <i class="ri-user-line"></i>
                    </div>
                    <div class="text">
                        <span>Müşteri Paneli</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('orders') }}">
                    <div class="icon">
                        <i class="ri-shopping-cart-2-line"></i>
                    </div>
                    <div class="text">
                        <span>Siparişler</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('balance') }}">
                    <div class="icon">
                        <i class="ri-secure-payment-line"></i>
                    </div>
                    <div class="text">
                        <span>Bakiye İşlemleri</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('favorite') }}">
                    <div class="icon">
                        <i class="ri-heart-line"></i>
                    </div>
                    <div class="text">
                        <span>Favorilerim</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('support') }}">
                    <div class="icon">
                        <i class="ri-customer-service-2-line"></i>
                    </div>
                    <div class="text">
                        <span>Destek Talebi</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('codes') }}">
                    <div class="icon">
                        <i class="ri-user-line"></i>
                    </div>
                    <div class="text">
                        <span>İndirim Kodları</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('affiliate') }}">
                    <div class="icon">
                        <i class="ri-share-line"></i>
                    </div>
                    <div class="text">
                        <span>Satış Ortaklığı</span>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.logout') }}">
                    <div class="icon">
                        <i class="ri-contract-right-fill"></i>
                    </div>
                    <div class="text">
                        <span>Güvenli Çıkış</span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
@endsection
@section('content')
@section('headname', 'Müşteri Paneli')




<div class="dashistatisc">
    <div class="row">
        <div class="col-md-4">
            <div class="item">
                <div class="icon">
                    <i class="ri-secure-payment-line"></i>
                </div>
                <div class="text">
                    @if (Auth::check() && Auth::user()->balances)
                        <b>{{ Auth::user()->balances->first()->balance ? Auth::user()->balances->first()->balance : ' 0.0 TL' }}
                            TL</b>
                    @else
                        <b> 0.0 TL</b>
                    @endif
                    <h6>Bakiye</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="item">
                <div class="icon">
                    <i class="ri-shopping-cart-line"></i>
                </div>
                <div class="text">
                    <span>{{ App\Http\Controllers\Home\OrderController::getOrderItemCount() }} Adet</span>
                    <h6>Sipariş</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="item">
                <div class="icon">
                    <i class="ri-shopping-basket-line"></i>
                </div>
                <div class="text">
                    <span> {{ App\Http\Controllers\Home\CartController::getCartItemCount() }} Adet</span>
                    <h6>Sepetim</h6>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-3">
            <div class="item">
                <div class="icon">
                    <i class="ri-heart-line"></i>
                </div>
                <div class="text">
                    <span>48 Adet</span>
                    <h6>Favori</h6>
                </div>
            </div>
        </div> --}}
    </div>
</div><!-- istatiskler -->

<div class="orderslist">
    <div class="orderfilter">
        <div class="row">
            <div class="col-md-3">
                <div class="filttitle">
                    <div class="icon">
                        <i class="ri-apps-line"></i>
                    </div>
                    <span>Siparişlerim</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="servissearch">
                    <div class="icon">
                        <button type="submit"><i class="ri-search-line"></i></button>
                    </div>
                    <input type="text" placeholder="Sipariş arayın…">
                </div>
            </div>
            <div class="col-md-5">
                <ul>
                    <li>
                        <button class="active">Tüm Siparişler</button>
                    </li>
                    <li>
                        <button>Aktif Siparişler</button>
                    </li>
                    <li>
                        <button>İptal Siparişler</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="siparistable">
        <div class="thad">
            <div class="row">
                <div class="col-md-2">
                    <span class="idspan">Sipariş No</span>
                </div>
                <div class="col-md-4">
                    <span>Sipariş Detay</span>
                </div>
                <div class="col-md-2">
                    <span>Fiyat</span>
                </div>
                <div class="col-md-2">
                    <span>Tarih</span>
                </div>
                <div class="col-md-2">
                    <span>Sipariş Durumu</span>
                </div>
            </div>
        </div><!-- head -->
        <div class="tbody">
            @php
                $i = 0;
            @endphp
            @foreach ($orders as $orderitems)
                @foreach ($orderitems->details as $detailitems)
                    <div class="item">
                        <div class="row">
                            <div class="col-md-1">
                                <div class="id">#{{ $detailitems->order_details_id }}</div>
                            </div>
                            <div class="col-md-5">
                                <span>
                                    <div>
                                        @php
                                            $categoryName = $detailitems->price[0]->product_title;
                                            $words = explode(' ', $categoryName);
                                            if (count($words) === 2) {
                                                $categoryName = $words[0];
                                            }
                                        @endphp
                                        {{ $detailitems->price[0]->product_category->parentCategories->product_category_name }}
                                        -
                                        {{ $categoryName }}
                                        {{ $detailitems->price[0]->product_category->product_category_name }}

                                        <a href="#">kullanıcı adı: {{ $detailitems->platform_username }}</a>
                                    </div>
                                </span>
                            </div>
                            <div class="col-md-2">
                                <div class="price">{{ $detailitems->price[0]->product_price }} TL </div>
                            </div>
                            <div class="col-md-2">
                                <span class="date">{{ $detailitems->created_at }}</span>
                            </div>
                            <div class="col-md-2">
                                <div class="status succes">TAMAMLANDI</div>
                            </div>
                        </div>
                    </div><!-- item -->
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="pagination"
        style="
    display: inline-block;
    padding-left: 0;
    margin-top: 20px;
    list-style: none;">
        {{ $orders->links() }}
    </div>
</div><!-- list -->
@endsection
