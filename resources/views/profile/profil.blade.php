@extends('layouts.LayoutProfil')

@section('title', 'Profil panel')
@section('accountmenu')
    <div class="accountmenu">
        <ul>
            <li class=active>
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
            <li >
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

@section('headname', 'Profil Düzenle')

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
    <div class="passchangearea">
        <h3>PAROLANIZI GÜNCELLEYİN</h3>
        <form method="POST" action="">
            <div class="areabody">
                <div class="row">
                    <div class="col-md-6">
                        <div class="item">
                            <label>Mevcut Parolanız</label>
                            <input type="password" name="current_password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <label>Yeni Parolanız</label>
                            <input type="password" name="new_password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <label>Yeni Parolanız (Tekrar)</label>
                            <input type="password" name="confirm_password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <label></label>
                            <button type="submit" name="update_password">Parolamı
                                Güncelle</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div><!-- şifre değiştir -->

    <div class="passchangearea">
        <h3>KİŞİSEL BİLGİLER</h3>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            <div class="areabody">
                <div class="row">
                    <div class="col-md-6">
                        <div class="item">
                            <label>Kullanıcı Adı *</label>
                            <input type="text" name="username" value="{{ Auth::user()->username ?? '' }}" required> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <label>Ad & Soyad *</label>
                            <input type="text" name="name" value="{{ Auth::user()->name ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <label>Telefon *</label>
                            <input type="text" name="phone_number" value="{{ Auth::user()->phone_number ?? '' }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <label>E-posta adresi *</label>
                            <input type="text" name="email" value="{{ Auth::user()->email ?? '' }}" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="item">
                            <label>Firma adı (isteğe bağlı)</label>
                            <input type="text" name="company_name" value="{{ Auth::user()->company_name ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <label>Vergi No (isteğe bağlı)</label>
                            <input type="text" name="tax_number" value="{{ Auth::user()->tax_number ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="item">
                            <label>Fatura Adresi (isteğe bağlı)</label>
                            <input type="text" name="billing_address"
                                value="{{ Auth::user()->billing_address ?? ' ' }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="item">
                            <label></label>
                            <button type="submit" name="update_profile">Bilgilerimi
                                Güncelle</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div><!-- kullanıcı bilgileri -->
</div>
@endsection
