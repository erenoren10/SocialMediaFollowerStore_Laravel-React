@extends('layouts.LayoutProfil')

@section('title', 'Profil panel')
@section('accountmenu')
@php

@endphp
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
<div class="col-md-12">
    <div class="orderslist" style="margin-top: 0;">
        <div class="orderfilter">
            <div class="row">
                <div class="col-md-12">
                    <div class="filttitle">
                        <div class="icon">
                            <i class="ri-customer-service-2-line"></i>
                        </div>
                        <span>#{{$request_id}} Destek Talebi</span>
                    </div>
                </div>
            </div>
        </div><!-- filter -->

        <div class="dashboardbox">
            <div class="alan">
                <div class="destektalebikonusma">
                    <div class="scrool">

                       {{-- <div class="customeritem">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt</p>
                            </div>
                            <div class="user">
                                <div class="userimg">
                                </div>
                                <div class="userinfo">
                                    <span>Müşteri</span>
                                    <div class="date">2 Saat önce</div>
                                </div>
                            </div>
                        </div><!-- customer -->
                        <div class="officialitem">
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                </p>
                            </div>
                            <div class="user">
                                <div class="userimg">
                                </div>
                                <div class="userinfo">
                                    <span>Support</span>
                                    <div class="date"></div>
                                </div>
                            </div>
                        </div><!-- official -->--}}
                        @foreach($support as $requestmessage)
                        @foreach ($requestmessage->details as $messageitem)                            
                        @if ($messageitem->request_id == $request_id)
                        <div class="{{$messageitem->alici}}">
                            <div class="text">
                                <p>{{$messageitem->messages}}
                                </p>
                            </div>
                            <div class="user">
                                <div class="userinfo">
                                    <span>{{$messageitem->gonderen }}</span>
                                    <div class="date">{{Carbon\Carbon::parse($messageitem->created_at)->diffForHumans()}}</div>
                                </div>
                            </div>
                        </div><!-- official -->
                        @endif
                        @endforeach
                        @endforeach
                    </div><!-- scrol -->
                    
                    <div class="replysupport">
                        <form action="{{route('send.message', ['id' =>$request_id])}}" method="POST" >
                            @csrf
                            <input type="hidden" name="request_id" value="{{$request_id}}">
                            <input type="text" name="messages" placeholder="Bir şeyler yazın....">
                            <button type="submit"><i class="ri-send-plane-fill"></i></button>
                        </form>
                    </div>

                </div><!-- konuşma -->
            </div><!-- alan -->
        </div>

    </div><!-- list -->
</div><!-- col9 -->
@endsection
