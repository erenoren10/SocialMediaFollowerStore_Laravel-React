@extends('layouts.LayoutProfil')

@section('title', 'Profil panel')
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
            <li class="active">
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

@section('headname', 'Destek Talebi')
<div class="orderslist" style="margin-top: 0;">
    <div class="orderfilter">
        <div class="row">
            <div class="col-md-12">
                <div class="filttitle">
                    <div class="icon">
                        <i class="ri-customer-service-2-line"></i>
                    </div>
                    <span>Destek Talepleri</span>
                </div>
            </div>
        </div>
    </div><!-- filter -->

    <div class="dashboardbox supportarea">
        <div class="alan">
            <div class="row">
                <form action="{{route('add.support')}}" method="POST">
                @csrf
                    <div class="col-md-12">
                        <div class="inputitem">
                            <label>Sipariş Numaranız</label>
                            <select name="order_id">
                                <option value="">Seçin</option>
                                @foreach ($orders as $orderitems)
                                    @foreach ($orderitems->details as $detailitems)
                                        <option value="{{$detailitems->order_details_id}}">{{$detailitems->order_details_id}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="inputitem">
                            <label>Konu Başlığı</label>
                            <input type="text" name="request_title" placeholder="Konu Başlığı Giriniz…">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="inputitem">
                            <label>Mesajınız (Opsiyonel)</label>
                            <textarea name="request_message" placeholder="Mesajınızı giriniz…"></textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button class="dashbtn" type="submit">DESTEK TALEBİ OLUŞTUR</button>
                    </div>
                </form>
            </div>
        </div><!-- alan -->
    </div>

    <div class="orderfilter">
        <div class="row">
            <div class="col-md-12">
                <div class="filttitle">
                    <div class="icon">
                        <i class="ri-history-line"></i>
                    </div>
                    <span>Geçmiş Taleplerim</span>
                </div>
            </div>
        </div>
    </div><!-- filter -->

    <div id="ticketList">
        @foreach ($support as $supportitem)
        @php
            $date = \Carbon\Carbon::parse($supportitem->created_at);
            $formattedDate = $date->formatLocalized('%d %B %Y');

            $now = \Carbon\Carbon::now();

            if ($date->addMinutes(60)->lte($now)) {
                // Oluşturulma tarihinden 15 dakika geçmiş
                $view = "closed";
                $viewsonuc="Kapandı" ;
                $route = "support";

            } else {
                // Oluşturulma tarihinden 15 dakika daha az zaman geçmiş
                $view = "reply";
                $viewsonuc="Hazır" ;
                $route = "supportdetails/$supportitem->request_id";
            }   
        @endphp

        <div class="supportdeskitem">
            <div class="text">
                <div class="tks">
                    <span>Ticket ID</span>
                    <b>#{{$supportitem->request_id}}</b>
                </div>
                <div class="tks">
                    <span>Muhasebe</span>
                    <b>{{$formattedDate}}</b>
                </div>
                <div class="tks">
                    <span>Destek Başlığı</span>
                    <b>{{$supportitem->request_title}}</b>
                </div>
            </div>
            <div class="btnlist">
                <a href={{$route}} class="view">İncele</a>
                <div class="status {{$view}}">{{$viewsonuc}}</div>
            </div>
        </div>
        @endforeach
        <div class="pagination" style="
            display: inline-block;
            padding-left: 0;
            margin-top: 20px;
            list-style: none;">
            {{ $support->links() }}
        </div>
    </div><!-- list -->
</div>
<script>
    // Your ticket data
   /* const ticketData = [

    ];

    // Constants for pagination
    const itemsPerPage = 5;
    let currentPage = 1;

    // Function to display tickets on the current page
    function displayTickets() {
        const ticketList = document.getElementById('ticketList');
        ticketList.innerHTML = '';

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const currentTickets = ticketData.slice(startIndex, endIndex);

        currentTickets.forEach(ticket => {
            const ticketItem = document.createElement('div');
            ticketItem.classList.add('supportdeskitem');
            // Create ticket item content here
            ticketList.appendChild(ticketItem);
        });
    }

    // Event listener for "Önceki Sayfa" button
    document.getElementById('prevPage').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            displayTickets();
        }
    });

    // Event listener for "Sonraki Sayfa" button
    document.getElementById('nextPage').addEventListener('click', () => {
        const totalPages = Math.ceil(ticketData.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            displayTickets();
        }
    });

    // Initial display
    displayTickets();*/
</script>

@endsection
