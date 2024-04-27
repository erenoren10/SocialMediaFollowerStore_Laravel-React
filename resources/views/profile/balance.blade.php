@extends('layouts.LayoutProfil')

@section('title', 'Bakiye')
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
            <li class="active">
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
@section('headname', 'Bakiye İşlemleri')
<div class="col-md-12">
    <div class="orderslist" style="margin-top: 0;">
        <div class="orderfilter">
            <div class="row">
                <div class="col-md-3">
                    <div class="filttitle">
                        <div class="icon">
                            <i class="ri-secure-payment-line"></i>
                        </div>
                        <span>Bakiye İşlemleri</span>
                    </div>
                </div>
            </div>
        </div><!-- filter -->

        <div class="odeme_method">
            <h3>Ödeme Yöntemi</h3>
            <div class="form">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">
                            <div class="icon">
                                <i class="ri-check-line"></i>
                            </div>
                            Online Ödeme / 3D Secure
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                            data-bs-target="#profile-tab-pane" type="button" role="tab"
                            aria-controls="profile-tab-pane" aria-selected="false">
                            <div class="icon">
                                <i class="ri-check-line"></i>
                            </div>
                            Havale / EFT / Fast
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                            data-bs-target="#contact-tab-pane" type="button" role="tab"
                            aria-controls="contact-tab-pane" aria-selected="false">
                            <div class="icon">
                                <i class="ri-check-line"></i>
                            </div>
                            Mobil Ödeme
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <div class="cuzdankart">
                    <div class="title">
                        <h5>Kredi &amp; Banka Kartı</h5>
                        <p>Bu alandan Banka &amp; Kredi kartı bakiyenizi kullanarak ödeme
                            yapabilirsiniz.</p>
                    </div>
                    <div class="bos">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inputitem">
                                    <label>Yüklemek istediğiniz tutar</label>
                                    <input type="number" id="y_balance" placeholder="Tutar girin…">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="inputitem">
                                    <label>Ödenecek tutar</label>
                                    <input type="text" id="o_balance" placeholder="0.00 TL" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="komisyon">
                                    <div class="icon">
                                        <i class="ri-percent-fill"></i>
                                    </div>
                                    <span>%1.2 Komisyon</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a id="ode_btn" href="#!">
                                <button>ÖDEME YAP</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li>Ödemeleriniz 7/24 otomatik olarak onaylanmaktadır.</li>
                        <li>Bu alan üzerinden bakiye yükleme yapabilmek için banka veya kredi
                            kartına sahip
                            olmalısınız.</li>
                        <li>Yüklenen bakiyelerin iadesi bulunmamaktadır.</li>
                    </ul>
                </div>
            </div><!-- tab -->
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                tabindex="0">
                <div class="cuzdankart">
                    <div class="title">
                        <h5>Havale/EFT</h5>
                        <p>Bu alandan Havele veya EFT yaparak ödeme
                            yapabilirsiniz.</p>
                    </div>
                    <div class="bos">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inputitem">
                                    <label>Yüklemek istediğiniz tutar</label>
                                    <input type="number" id="y_balance1" placeholder="Tutar girin…">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="inputitem">
                                    <label>Ödenecek tutar</label>
                                    <input type="text" id="o_balance1" placeholder="0.00 TL" readonly> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="komisyon">
                                    <div class="icon">
                                        <i class="ri-percent-fill"></i>
                                    </div>
                                    <span>%1.2 Komisyon</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a id="ode_btn1" href="#!">
                                <button>ÖDEME YAP</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li>Ödemeleriniz 7/24 otomatik olarak onaylanmaktadır.</li>
                        <li>Bu alan üzerinden bakiye yükleme yapabilmek için banka veya kredi
                            kartına sahip
                            olmalısınız.</li>
                        <li>Yüklenen bakiyelerin iadesi bulunmamaktadır.</li>
                    </ul>
                </div>
            </div><!-- tab -->
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                tabindex="0">
                <div class="cuzdankart">
                    <div class="title">
                        <h5>Mobil Ödeme</h5>
                        <p>Bu alandan Mobil Ödeme sistemimizi kullanarak ödeme
                            yapabilirsiniz.</p>
                    </div>
                    <div class="bos">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inputitem">
                                    <label>Yüklemek istediğiniz tutar</label>
                                    <input type="number" id="y_balance2" placeholder="Tutar girin…">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="inputitem">
                                    <label>Ödenecek tutar</label>
                                    <input type="text" id="o_balance2" placeholder="0.00 TL" readonly> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="komisyon">
                                    <div class="icon">
                                        <i class="ri-percent-fill"></i>
                                    </div>
                                    <span>%1.2 Komisyon</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a id="ode_btn2" href="#!">
                                <button>ÖDEME YAP</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <ul>
                        <li>Ödemeleriniz 7/24 otomatik olarak onaylanmaktadır.</li>
                        <li>Bu alan üzerinden bakiye yükleme yapabilmek için banka veya kredi
                            kartına sahip
                            olmalısınız.</li>
                        <li>Yüklenen bakiyelerin iadesi bulunmamaktadır.</li>
                    </ul>
                </div>
            </div><!-- tab -->
        </div>
    </div><!-- list -->
</div><!-- col9 -->
</div><!-- row -->
</div><!-- musteripanel -->
</div><!-- container -->
</div><!-- content -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const yukle_balance = document.getElementById('y_balance');
        const ode_balance = document.getElementById('o_balance');
        const ode_btn = document.getElementById('ode_btn');


        yukle_balance.addEventListener('input', function() {
        var tutar = this.value;
        var komisyon = (tutar*(1.2)).toFixed(2);
        ode_balance.value=komisyon
        var totalprice =komisyon

        ode_btn.href="https://sultangaziwebtasarim.com.tr/card/paycc?totalprice="+totalprice
        console.log(ode_btn);
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const yukle_balance1 = document.getElementById('y_balance1');
        const ode_balance1 = document.getElementById('o_balance1');
        const ode_btn1 = document.getElementById('ode_btn1');
        console.log(ode_btn1);

        yukle_balance1.addEventListener('input', function() {
        var tutar1 = this.value;
        var komisyon1 = (tutar1*(1.2)).toFixed(2);
        ode_balance1.value=komisyon1
        var totalprice1 =komisyon1 

        ode_btn1.href="https://sultangaziwebtasarim.com.tr/card/payeft?totalprice="+totalprice1
        console.log(ode_btn1);

        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const yukle_balance2 = document.getElementById('y_balance2');
        const ode_balance2 = document.getElementById('o_balance2');
        const ode_btn2 = document.getElementById('ode_btn2');
    

        yukle_balance2.addEventListener('input', function() {
        var tutar2 = this.value;
        var komisyon2 = (tutar2*(1.2)).toFixed(2);
        ode_balance2.value=komisyon2
        var totalprice2 =komisyon2

        ode_btn2.href="https://sultangaziwebtasarim.com.tr/card/mobile?totalprice="+komisyon2
  

        });
    });
</script>
@endsection
