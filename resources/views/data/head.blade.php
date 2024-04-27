<header>
    <div class="headtop">
        <div class="container">
            <a href="{{ route('orderinquiry') }}" class="siparis">
                <i class="ri-timer-flash-line"></i> Sipariş Sorgula
            </a>

            <div class="right">
                <a href="mailto:destek@fenomenpaket.com" target="_blank" class="mail"><i class="ri-mail-open-fill"></i>
                    destek@fenomenpaket.com</a>
                <a href="https://wa.me/08508508080?text=Merhaba,%20bir%20konu%20hakkinda%20yardim%20almak%20istiyorum."
                    target="_blank" class="whatsapp"><i class="ri-whatsapp-line"></i> 0850 850 80 80</a>
            </div>
        </div>
    </div>

    <div class="mobilbottommenu">
        <ul>
            <li>
                <a href="{{ route('not.found') }}">
                    <i class="ri-home-6-line"></i>
                    <span>Anasayfa</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ri-heart-line"></i>
                    <span>FAVORİLER</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('ordercheck1') }}">
                    <span class="yüzencart">
                        @if (Auth::check() == true)
                            <div class="cartcoun"> {{ App\Http\Controllers\Home\CartController::getCartItemCount() }}
                            </div>
                        @else
                            <div class="cartcoun">{{ App\Http\Controllers\Home\CartController::getCartItemCount() }}</i>
                            </div>
                        @endif
                    </span>
                    <i class="ri-shopping-basket-2-line"></i>
                    <span>SEPET</span>
                </a>
            </li>
            <li>
                <a href="https://wa.me/08508508080?text=Merhaba,%20bir%20konu%20hakkinda%20yardim%20almak%20istiyorum.">
                    <i class="ri-whatsapp-line"></i>
                    <span>WHATSAPP</span>
                </a>
            </li>
        </ul>
    </div><!-- mobilfixed -->

    <div class="headbt">
        <div class="mobilwo">
            <a href="{{ route('orderinquiry') }}" class="siparis">
                <i class="ri-timer-flash-line"></i> Sipariş Sorgula
            </a>
            <div class="right">
                <a href="https://wa.me/08508508080?text=Merhaba,%20bir%20konu%20hakkinda%20yardim%20almak%20istiyorum."
                    target="_blank" class="whatsapp"><i class="ri-whatsapp-line"></i> 0850 850 80 80</a>
            </div>
        </div>
        <div class="container">
            <div class="mobilmenu" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample">
                <i class="ri-menu-4-line"></i>
            </div><!-- mobilmenu -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                        <div class="canvaslogo">
                            <a href="{{ route('not.found') }}">
                                <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                            </a>
                        </div>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                        <span><i class="ri-close-line"></i></span>
                    </button>
                </div>
                <div class="offcanvas-body">
                    <div class="canvasmenu">

                        {{--
							<div class="mobilmenufavori">
								<a href="#">
									<i class="ri-star-fill"></i> <span>FAVORİLERİM</span>
									<div class="nubmer">6</div>
								</a>
							</div>
							--}}

                        <nav class='animated bounceInDown'>
                            <ul>
                                <li class='sub-menu'><a href='#!'>SOSYAL MEDYA HİZMETLERİ <i
                                            class="ri-arrow-right-s-line"></i></a>
                                    <ul>
                                        @foreach ($categories as $headitem)
                                            @php
                                                $kucukisim = strtolower($headitem->product_category_name);
                                            @endphp
                                            <li>
                                                <a
                                                    href="{{ route('allproduct', ['id' => $headitem->id, 'cat' => $headitem->product_category_name]) }}">
                                                    <i class="ri-{{ $kucukisim }}-fill"></i>
                                                    <span> <b>{{ $headitem->product_category_name }}</b>
                                                        Servisleri</span>
												</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class='sub-menu'><a href='#!'>KURUMSAL
                                        <i class="ri-arrow-right-s-line"></i></a>
                                    <ul>
                                        <li><a href="{{ route('about') }}">Hakkımızda</a></li>
                                        <li><a href="#">Ödeme</a></li>
                                        <li><a href="#">Müşteri Sözleşmesi</a></li>
                                        <li><a href="#">Aydınlatma Metni</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('blog') }}">BLOG</a></li>
                                <li><a href="{{ route('contact.me') }}">İLETİŞİM</a></li>
                            </ul>
                        </nav>
                    </div><!-- canvasmenu -->
                </div><!-- canvasbody -->
            </div><!-- offcanvas -->

            <div class="logo">
                <a href="/">
                    <img src="{{ asset('assets/img/logo.svg') }}" alt="">
                </a>
            </div>
            <div class="mobiluser">
                @if (Auth::check())
                    <a href="{{ route('customerp') }}"><i class="ri-user-3-line"></i></a>
                @else
                    <a href="{{ route('login') }}"><i class="ri-user-3-line"></i></a>
                @endif
            </div>
            @if (Auth::check() && Auth::id() == 1)
                <div class="panelbtn">
                    <a href="{{ url('/dashboard') }}">
                        <i class="fa fa-rocket"></i>
                        Panele <strong>Git</strong>
                    </a>
                </div>
            @endif

            <div class="topbtnlist">
                <a href="{{ route('ordercheck1') }}" class="cartbtn">
                    <i class="ri-shopping-basket-2-line"></i>
                    <span>Sepetim</span>
                    @if (Auth::check() == true)
                        <div class="cartcoun"> {{ App\Http\Controllers\Home\CartController::getCartItemCount() }}</div>
                    @else
                        <div class="cartcoun">{{ App\Http\Controllers\Home\CartController::getCartItemCount() }}</i>
                        </div>
                    @endif
                </a>
                @if (Auth::check())
                    <div class="loginbtn userlogin">
                        <div class="icon">
                            @php
                                $nameParts = explode(' ', Auth::user()->name);
                                $initials = '';
                                foreach ($nameParts as $part) {
                                    $initials .= strtoupper(substr($part, 0, 1));
                                }
                            @endphp
                            {{ $initials }}
                        </div>
                        <a href="{{ route('customerp') }}"><span>{{ Auth::user()->username }}</span>
                            <b>{{ Auth::user()->balances->first()->balance ? Auth::user()->balances->first()->balance : ' 0.0 TL' }}</b></a>
                        <div class="drop-user">
                            <div class="area">
                                <div class="userinfo">
                                    <div class="icon">
                                        {{ $initials }}
                                    </div>
                                    <span>{{ Auth::user()->username }}</span>
                                    <b>{{ Auth::user()->balances->first()->balance ? Auth::user()->balances->first()->balance : ' 0.0 TL' }}</b>
                                </div>
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
                        </div><!-- cdop -->
                    </div>
                    {{-- <a href="{{ route('admin.logout') }}" class="loginbtn ri-user-3-line"> Çıkış Yap</a> --}}
                @else
                    <!-- Kayıtlı olmayan kullanıcı için -->
                    <a href="{{ route('login') }}" class="loginbtn ri-user-3-line"> Giriş Yap</a>
                @endif

            </div>

            <div class="topmenu">
                <ul>

                    <li class="submenu">
                        <a href="#">SOSYAL MEDYA HİZMETLERİ</a>
                        <div class="dropdownmenu digerhizmetler">
                            <div class="area">
                                <div class="row">
                                    @foreach ($categories as $headitem)
                                        @php
                                            $kucukisim = strtolower($headitem->product_category_name);
                                        @endphp
                                        <div class="col-md-3">
                                            <a
                                                href="{{ route('allproduct', ['id' => $headitem->id, 'cat' => $headitem->product_category_name]) }}">
                                                <div class="item {{ $kucukisim }}">
                                                    <div class="icon">
                                                        <i class="ri-{{ $kucukisim }}-line"></i>
                                                    </div>
                                                    <div class="inftext">
                                                        <span>{{ $headitem->product_category_name }}</span>
                                                        <h5>HİZMETLERİ</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </div><!-- col3 -->
                                    @endforeach
                                    {{-- <div class="col-md-3">
											<a href="{{ route('twitterpr') }}">
												<div class="item twitter">
													<div class="icon">
														<i class="ri-twitter-fill"></i>
													</div>
													<div class="inftext">
														<span>TWİTTER</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="{{ route('youtubepr') }}">
												<div class="item youtube">
													<div class="icon">
														<i class="ri-youtube-fill"></i>
													</div>
													<div class="inftext">
														<span>YOUTUBE</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="{{ route('facebookpr') }}">
												<div class="item facebook">
													<div class="icon">
														<i class="ri-facebook-fill"></i>
													</div>
													<div class="inftext">
														<span>FACEBOOK</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="{{ route('tiktokpr') }}">
												<div class="item tiktok">
													<div class="icon">
														<i class="ri-tiktok-fill"></i>
													</div>
													<div class="inftext">
														<span>TİKTOK</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="{{ route('twitchpr') }}">
												<div class="item twitch">
													<div class="icon">
														<i class="ri-twitch-fill"></i>
													</div>
													<div class="inftext">
														<span>TWİTCH</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="{{ route('spotifypr') }}">
												<div class="item spotify">
													<div class="icon">
														<i class="ri-spotify-fill"></i>
													</div>
													<div class="inftext">
														<span>SPOTİFY</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="#">
												<div class="item clubhouse">
													<div class="icon">
														<i class="fa-brands fa-youtube"></i>
													</div>
													<div class="inftext">
														<span>CLUBHOUSE</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="#">
												<div class="item soundcloud">
													<div class="icon">
														<i class="ri-soundcloud-fill"></i>
													</div>
													<div class="inftext">
														<span>SOUNDCLOUD</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="#">
												<div class="item pinterest">
													<div class="icon">
														<i class="ri-pinterest-fill"></i>
													</div>
													<div class="inftext">
														<span>PİNTEREST</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="#">
												<div class="item vimeo">
													<div class="icon">
														<i class="ri-vimeo-fill"></i>
													</div>
													<div class="inftext">
														<span>VİMEO</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="#">
												<div class="item linkedin">
													<div class="icon">
														<i class="ri-linkedin-fill"></i>
													</div>
													<div class="inftext">
														<span>LİNKEDIN</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="#">
												<div class="item seo">
													<div class="icon">
														<i class="ri-search-line"></i>
													</div>
													<div class="inftext">
														<span>SEO</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="#">
												<div class="item telegram">
													<div class="icon">
														<i class="ri-telegram-line"></i>
													</div>
													<div class="inftext">
														<span>TELEGRAM</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="#">
												<div class="item tumblr">
													<div class="icon">
														<i class="ri-tumblr-fill"></i>
													</div>
													<div class="inftext">
														<span>TUMBLR</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										<div class="col-md-3">
											<a href="#">
												<div class="item ozel">
													<div class="icon">
														<img src="assets/img/icon/ticon.svg" alt="">
													</div>
													<div class="inftext">
														<span>FENOMEN ÖZEL</span>
														<h5>HİZMETLERİ</h5>
													</div>
												</div>
											</a>
										</div><!-- col3 -->
										--}}
                                </div><!-- row -->
                            </div>
                        </div>
                    </li>

                    <li class="submenu relative">
                        <a href="#">KURUMSAL</a>
                        <div class="dropdownmenu">
                            <div class="area">
                                <ul>
                                    <li>
                                        <a href="{{ route('about') }}">Hakkımızda</a>
                                    </li>
                                    <li>
                                        <a href="#">Ödeme</a>
                                    </li>
                                    <li>
                                        <a href="#">Müşteri Sözleşmesi</a>
                                    </li>
                                    <li>
                                        <a href="#">Aydınlatma Metni</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}">BLOG</a>
                    </li>
                    <li>
                        <a href="{{ route('contact.me') }}">İLETİŞİM</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>
