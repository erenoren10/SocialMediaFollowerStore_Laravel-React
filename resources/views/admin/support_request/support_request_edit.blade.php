@extends('admin.app')
@section('admin')
    <link href="{{ asset('backend/vendor') }}/datatables/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="{{ asset('backend/vendor') }}/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
    <link href="{{ asset('assets/css') }}/style.css" rel="stylesheet" />
    <div class="admin">
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
                </div><!-- official --> --}}
                        @foreach ($support as $requestmessage)
                        @foreach ($requestmessage->userdetails as $useritems)
                            @foreach ($requestmessage->details as $messageitem)
                                @if ($messageitem->request_id == $request_id)
                                    <div
                                        class="{{ $messageitem->alici }}">
                                        <div class="text">
                                            <p>{{ $messageitem->messages }}
                                            </p>
                                        </div>
                                        <div class="user">
                                            <div class="userinfo">
                                                <span>{{ $messageitem->gonderen}}</span>
                                                <div class="date">
                                                    {{ Carbon\Carbon::parse($messageitem->created_at)->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- official -->
                                @endif
                                @endforeach
                            @endforeach
                        @endforeach
                    </div><!-- scrol -->

                    <div class="replysupport">
                        <form action="{{ route('sendAnswer.support', ['id' => $request_id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="request_id" value="{{ $request_id }}">
                            <input type="text" name="messages" placeholder="Bir şeyler yazın....">
                            <button type="submit"><i class="fa-regular fa-paper-plane"></i></button>
                        </form>
                    </div>

                </div><!-- konuşma -->
            </div><!-- alan -->
        </div>
    </div>

    <script rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></script>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('backend/vendor') }}/global/global.min.js"></script>
    <script src="{{ asset('backend/vendor') }}/chart.js/Chart.bundle.min.js"></script>

    <script src="{{ asset('backend/vendor') }}/apexchart/apexchart.js"></script>

    <script src="{{ asset('backend/vendor') }}/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend/js') }}/plugins-init/datatables.init.js"></script>
    <script src="{{ asset('backend/vendor') }}/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('backend/js') }}/custom.min.js"></script>
    <script src="{{ asset('backend/js') }}/dlabnav-init.js"></script>
    <script src="{{ asset('backend/js') }}/demo.js"></script>
    <script src="{{ asset('backend/js') }}/styleSwitcher.js"></script>
@endsection
