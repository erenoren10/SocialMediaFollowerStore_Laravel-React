@extends('layouts.LayoutProfil')

@section('title', 'favori')
@section('accountmenu')
    <div class="accountmenu">
        <ul>
            <li>
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
            <li class="active">
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
@section('headname', 'Favorilerim')
<div class="col-md-12">
    <div class="orderslist" style="margin-top: 0;">
        <div class="orderfilter">
            <div class="row">
                <div class="col-md-3">
                    <div class="filttitle">
                        <div class="icon">
                            <i class="ri-heart-line"></i>
                        </div>
                        <span>FAVORİLERİM</span>
                    </div>
                </div>
            </div>
        </div><!-- filter -->
        <div class="dashboardfavorite">
            <div class="row">
                @foreach ($favorite as $favorites)
                    @php($catisim = strtolower($favorites['favoriteproducts']->product_category->parentCategories->parentCategories->product_category_name))
                    <div class="col-md-4">
                        <div class="paketitem {{ $catisim }}">
                            <div class="hshead">
                                <div class="icon">
                                    <i class="ri-{{ $catisim }}-fill"></i>
                                </div>
                                <div class="text">

                                    <h5>{{ $favorites['favoriteproducts']->product_category->parentCategories->parentCategories->product_category_name }}
                                    </h5>
                                    <p>{{ explode(' ', $favorites['favoriteproducts']->product_title)[0] }}
                                        {{ $favorites['favoriteproducts']->product_category->product_category_name }}
                                    </p>
                                </div>
                                <button class="favorite">
                                    <a href="{{ route('delete.favorite', ['id' => $favorites->id]) }}">
                                        <i class="ri-heart-fill"></i>
                                    </a>
                                </button>
                            </div>
                            <div class="hsbody">
                                <ul>
                                    <li>
                                        <i class="ri-user-line"></i>
                                        {{ $favorites['favoriteproducts']->product_desc1 }}
                                    </li>
                                    <li>
                                        <i class="ri-user-add-line"></i>
                                        {{ $favorites['favoriteproducts']->product_desc2 }}

                                    </li>
                                    <li>
                                        <i class="ri-gift-line"></i>
                                        {{ $favorites['favoriteproducts']->product_desc3 }}
                                    </li>
                                    <li>
                                        <i class="ri-check-double-line"></i>
                                        {{ $favorites['favoriteproducts']->product_desc4 }}
                                    </li>
                                    <li>
                                        <i class="ri-shield-keyhole-line"></i>
                                        {{ $favorites['favoriteproducts']->product_desc5 }}
                                    </li>
                                    <li>
                                        <i class="ri-shield-check-line"></i>
                                        {{ $favorites['favoriteproducts']->product_desc6 }}
                                    </li>
                                    <li>
                                        <i class="ri-customer-service-2-line"></i>
                                        {{ $favorites['favoriteproducts']->product_desc7 }}
                                    </li>
                                    <li>
                                        <i class="ri-user-unfollow-line"></i>
                                        {{ $favorites['favoriteproducts']->product_desc8 }}
                                    </li>
                                </ul>
                            </div>
                            <div class="hsprice">
                                <div class="price">
                                    <h5>1,899 TL</h5>
                                    <p> {{ $favorites['favoriteproducts']->product_price }}
                                    </p>
                                </div>
                                <div class="buy">
                                    <a href="/mycart/add/{{ $favorites['favoriteproducts']->id }}"><i class="ri-shopping-basket-2-line"></i> SATIN AL</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- col3 -->
                @endforeach
            </div><!-- row -->
        </div><!-- favorilerim -->
    </div><!-- list -->
</div><!-- col9 -->
</div><!-- row -->
</div><!-- musteripanel -->
</div><!-- container -->
</div><!-- content -->

@endsection
