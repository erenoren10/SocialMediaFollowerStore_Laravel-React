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
            $email = $_GET['email'];
        } else {
            $email = '';
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
                <div class="nspay-mt">
                    <div class="kart mb-3 show">
                        <div class="kart-ust colpz c-pointer kbt">
                            <div class="font-weight-bold">
                                <b> Banka Hesapları </b><i class="chevron float-right"></i>
                            </div>
                        </div>
                        <div class="kart-govde collaps">
                            <select class="form-control" id="_selectbank">
                                <option value="">Banka Seçin</option>
                                @foreach ($bank as $bankitem)
                                    <option value="{{ $bankitem->id }}">{{ $bankitem->bank_name }}</option>
                                @endforeach
                            </select>
                            <ul class="banklist">
                                <li class="bank-flex 1">
                                    <div class="bank-ico">
                                        <img src="" alt="" />
                                    </div>
                                    <div class="bank-dets">
                                        <div class="d-block">
                                            ALICI ADI:
                                            <span class="font-weight-bold" id="bankName"></span>
                                        </div>
                                        <div class="d-block">
                                            ŞUBE KODU:
                                            <span class="font-weight-bold" id="branchCode"></span>
                                        </div>
                                        <div class="d-block">
                                            HESAP NO:
                                            <span class="font-weight-bold" id="accountNumber"></span>
                                        </div>
                                        <div class="d-block">
                                            IBAN:
                                            <span class="font-weight-bold" id="iban"></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="alert alert-light">
                                <p class="nspat-dtext">
                                    Ödenmesi gereken tutar <strong>{{ $totalprice }} TL</strong> Lütfen
                                    EFT-Havale açıklamanıza
                                    <strong>{{ $eftcode }}</strong> sipariş kodunuzu ekleyiniz.
                                    İşlem sonrası alt bölümden ödeme bildiriminde
                                    bulunabilirsiniz
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="odeme-bildirimi" class="kart mb-4">
                        <div class="kart-ust colpz c-pointer kbt">
                            <div class="font-weight-bold">
                                <b>Ödeme Bildirimi Yap </b><i class="chevron float-right"></i>
                            </div>
                        </div>
                        <div class="kart-govde text-left collaps">
                            <form method="POST" action="{{ route('eftorder') }}">
                                @csrf
                                <div class="form-row p-2">
                                    <div class="col-md-12 mb-3">
                                        <label for="" class="font-weight-bold">Ad Soyad</label>
                                        <input type="text" class="form-control" name="o_ad_soyad"
                                            value="{{ $name }}" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="" class="font-weight-bold">Ödeme Yapılan Banka</label>
                                        <select class="form-control" name="o_banka" id="_selectbank2">
                                            @foreach ($bank as $bankitem)
                                                <option value="{{ $bankitem->bank_name }}">{{ $bankitem->bank_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="font-weight-bold">Yatırılan Tutar</label>
                                        <input type="text" class="form-control" required value=" {{ $totalprice }}"
                                            name="o_price" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="font-weight-bold">Ödeme Tarihi</label>
                                        <input type="date" class="form-control" required value="{{ $today }}"
                                            name="o_date" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="" class="font-weight-bold">Açıklama</label>
                                        <textarea class="form-control" name="o_aciklama" name="o_description"></textarea>
                                    </div>
                                    <input type="hidden" name="o_email" value="{{ $email }}">
                                    <input type="hidden" name="o_phone_number" value="{{ $phone_number }}">
                                    <input type="hidden" name="o_code" value="{{ $eftcode }}" />
                                    <input type="hidden" name="o_vergino" value="{{ $vergino }}" />
                                    <input type="hidden" name="o_vergiadres" value="{{ $vergidaire }}" />
                                    <input type="hidden" name="o_faturaadres" value="{{ $faturaadresi }}" />
                                    <div class="col-md-12 text-right mb-2">
                                        <button type="sutmit" class="butto butto-dark butto-lg butbor">
                                            GÖNDER
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("_selectbank").addEventListener("change", function() {
            const selectedBankId = this.value;

            if (selectedBankId) {
                fetch('/get-bank-info/' + selectedBankId)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById("bankName").textContent = data.bank_name;
                        document.getElementById("branchCode").textContent = data.branch_code;
                        document.getElementById("accountNumber").textContent = data.account_number;
                        document.getElementById("iban").textContent = data.IBAN;
                    })
                    .catch(error => {
                        console.error('Veri alınırken bir hata oluştu:', error);
                    });
            } else {
                // Seçilen banka bilgisi bulunamadı
                console.log("Seçilen banka bilgisi bulunamadı.");
            }
        });
    </script>
@endsection
