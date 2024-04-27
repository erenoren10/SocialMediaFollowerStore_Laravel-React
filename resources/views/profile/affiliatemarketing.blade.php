@extends('layouts.LayoutProfil')

@section('title', 'Referans')
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
.notification-title{
    color: #4CAF50;
    display: block;
    margin: 5px 0 ;
}
.notification-text{
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
.headbt{
    z-index: 1;
}
header::after{
    z-index: -1;
}
</style>
@endsection
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
            <li class="active">
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
@section('headname', 'Satış Ortaklığı')
<div class="notification-container">
    <div class="notification">
        <i class="fa-regular fa-circle-check" style="color: #4CAF50; font-size:40px;margin-right: 15px;"></i>
        <div class="col-md">
            <span class="notification-title" id="notification-title"><b>Başarılı</b></span>
            <span class="notification-text" id="notification-text">Öğe başarıyla kopyalandı!</span>
        </div>
        <button class="notification-close" onclick="closeNotification()">&times;</button>
    </div>
</div>
<div class="col-md-12">
    <div class="orderslist" style="margin-top: 0;">
        <div class="orderfilter">
            <div class="row">
                <div class="col-md-6">
                    <div class="filttitle">
                        <div class="icon">
                            <i class="ri-share-line"></i>
                        </div>
                        <span>Size özel satış ortaklığı referans linkiniz:</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="copylink">
                        <span id="textToCopy">https://sultangaziwebtasarim.com.tr/register?ref={{ Auth::User()->user_code }}
                        </span>
                        <button onclick="copyText()"><i class="ri-file-copy-line"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- filter -->



        <div class="satisistas">
            <div class="row">
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="ri-user-line"></i>
                        </div>
                        <span>{{ $users->child->count() ?? 0 }}</span>
                        <h5>Kazandırılan Müşteri</h5>
                        <p>Sizin referans kodunuz ile sitemize giriş yapan müşteri sayısı.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="ri-secure-payment-line"></i>
                        </div>
                        <span>0</span>
                        <h5>Toplam Sipariş</h5>
                        <p>Referanslarınızın yaptığı siparişler.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="icon">
                            <i class="ri-shopping-basket-2-line"></i>
                        </div>
                        <span>0 TL</span>
                        <h5>Kazandığınız Tutar</h5>
                        <p>Lorem ipsum dolor sit adet to finder executive lorem ipsum.</p>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- list -->
</div><!-- col9 -->
</div><!-- row -->
</div><!-- musteripanel -->
</div><!-- container -->
</div><!-- content -->

@endsection
