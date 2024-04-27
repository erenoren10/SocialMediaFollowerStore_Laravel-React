<!DOCTYPE html>
<html lang="tr">

<head>
    <title>Profil | @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/icon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    @yield('css')


</head>

<body>
    <!-- header -->
    @include('data.head')
    <!-- header -->

    <div class="pagecontent">
        <div class="title-bg red">
            @yield('headname')
        </div>
        <div class="container">
            <div class="musteripanel">
                <div class="row exs">
                    <div class="col-md-3">
                        <div class="accountsidebar">
                            <div class="user">
                                @php
                                    $nameParts = explode(' ', Auth::user()->name);
                                    $initials = '';
                                    foreach ($nameParts as $part) {
                                        $initials .= strtoupper(substr($part, 0, 1));
                                    }
                                @endphp
                                <div class="rowin"
                                    style="display: flex;
                                justify-content: center;
                                align-items: center;
                                align-content: flex-end;
                            ">
                                    <div class="col-md-3 icon"
                                        style="width: 100%;
                                        height: 37px;
                                        background: #EBEEFF;
                                        border-radius: 73px;
                                        color: #F70E36;
                                        font-weight: 600;
                                        font-size: 32px;
                                        text-align: center;
                                        line-height: 37px;
                                        margin-top: 3px;
                                        margin-bottom: 10px;
                                        margin-left:30px;">
                                        {{ Auth::user()->username }}

                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('profil') }}">
                                            <i class="fa-solid fa-pen-to-square"
                                                style="font-size:20px;color: #d92020; margin-left:5px;"></i>
                                        </a>
                                    </div>
                                </div>

                                {{-- <div class="img">
                                    @if (Auth::check() && Auth::user()->profile_photo)
										<img src="{{ asset('assets/img/' . Auth::user()->profile_photo) }}" alt="Profil Fotoğrafı">
									@else
										<img src="{{ asset('assets/img/user.jpg') }}" alt="">
									@endif
                                </div> --}}
                                <span><i class="ri-shield-check-fill"></i></span>
                                <div class="bakiyeyukle">
                                    <h6>Bakiye</h6>
                                    @if (Auth::check() && Auth::user()->balances->first()->balance)
                                        <b>{{ Auth::user()->balances->first()->balance ? Auth::user()->balances->first()->balance : ' 0.0 TL' }}</b>
                                    @endif
                                    <a href="{{ route('balance') }}"><i class="ri-add-circle-line"></i></a>
                                </div>
                            </div>
                            @yield('accountmenu')
                        </div>
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div><!-- col9 -->
                </div><!-- row -->
            </div><!-- musteripanel -->
        </div><!-- container -->
    </div><!-- content -->


    <!-- footer -->
    @include('data.footer')
    <!-- /footer -->

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('js')
</body>

</html>
