@extends('admin.app')
@section('admin')
@php
use Illuminate\Foundation\Auth\User;   
@endphp
<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                                <div>
                                                    <h4 class="fs-18 font-w600 mb-4 text-nowrap">Toplam Müşteri
                                                    </h4>
                                                    <div class="d-flex align-items-center">
                                                        <h2 class="fs-32 font-w700 mb-0">{{User::count()}}</h2>
                                                        <span class="d-block ms-4">
                                                            <svg width="21" height="11"
                                                                viewbox="0 0 21 11" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M1.49217 11C0.590508 11 0.149368 9.9006 0.800944 9.27736L9.80878 0.66117C10.1954 0.29136 10.8046 0.291359 11.1912 0.661169L20.1991 9.27736C20.8506 9.9006 20.4095 11 19.5078 11H1.49217Z"
                                                                    fill="#09BD3C"></path>
                                                            </svg>
                                                            <small
                                                                class="d-block fs-16 font-w400 text-success">+0,5%</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="columnChart"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body px-4 pb-0">
                                                <h4 class="fs-18 font-w600 mb-5 text-nowrap">Toplam Müşteri
                                                </h4>
                                                <div class="progress default-progress">
                                                    <div class="progress-bar bg-gradient1 progress-animated"
                                                        style="width: 40%; height:10px;" role="progressbar">
                                                        <span class="sr-only">45% Tamamlandı</span>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                    <span>76 Hedef kaldı</span>
                                                    <h4 class="mb-0">{{User::count()}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-sm-6">
                                                <div class=" owl-carousel card-slider">
                                                    <div class="items">
                                                        <h4 class="fs-20 font-w700 mb-4">Şirket Cürosu</h4>
                                                        <span class="fs-14 font-w400">Çok sayıda hataya neden olan her şeyi algılayabilen bir hata olup olmadığını kontrol edin </span>
                                                    </div>
                                                    <div class="items">
                                                        <h4 class="fs-20 font-w700 mb-4">Şirket Kârı</h4>
                                                        <span class="fs-14 font-w400">Çok sayıda hataya neden olan her şeyi algılayabilen bir hata olup olmadığını kontrol edin </span>
                                                    </div>
                                                    <div class="items">
                                                        <h4 class="fs-20 font-w700 mb-4"> Şirket Profili</h4>
                                                        <span class="fs-14 font-w400">Çok sayıda hataya neden olan her şeyi algılayabilen bir hata olup olmadığını kontrol edin </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 redial col-sm-6">
                                                <div id="redial"></div>
                                                <span class="text-center d-block fs-18 font-w600">ilerlemede
                                                    <small class="text-success">70%</small></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection