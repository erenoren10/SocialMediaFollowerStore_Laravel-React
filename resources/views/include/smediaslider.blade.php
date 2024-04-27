<section class="soservices_slider">
		<div class="container">
			<div class="thead">
				<div class="ticon">
					<img src="assets/img/icon/ticon.svg" alt="">
				</div>
				<h3>SOSYAL MEDYA SERVİSLERİMİZ</h3>
				<h6>16 Farklı kategoride yüzlerce farklı servisimiz ile 5 yıldır sosyal medyada gücünüze güç katıyoruz!
				</h6>
			</div>

			<div class="mobil_platform">
				<div class="row">
					@foreach ($categories as $headitem)
					@php
						$kucukisim = strtolower($headitem->product_category_name);
					@endphp
					<div class="col-md-6">
						<a href="{{ route('allproduct',['id'=>$headitem->id,'cat'=>$headitem->product_category_name]) }}">
							<div class="catitem {{$kucukisim}}">
								<div class="icon">
									<i class="ri-{{$kucukisim}}-line"></i>
								</div>
								<div class="text">
									<span>{{$headitem->product_category_name}}</span>
									<h5>Servisleri</h5>
								</div>
							</div>
						</a>
					</div><!-- col3 -->
					@endforeach
					<div class="col-md-6">
						<a href="{{route('instagrampr')}}">
							<div class="catitem instagram">
								<div class="icon">
									<i class="ri-instagram-fill"></i>
								</div>
								<div class="text">
									<h5>Instagram</h5>
									<span>Servisleri</span>
								</div>
							</div>
						</a>
					</div><!-- col6 -->
					<div class="col-md-6">
						<a href="{{route('twitterpr')}}">
							<div class="catitem twitter">
								<div class="icon">
									<i class="ri-twitter-fill"></i>
								</div>
								<div class="text">
									<h5>Twitter</h5>
									<span>Servisleri</span>
								</div>
							</div>
						</a>
					</div><!-- col6 -->
					<!-- Diğer öğeler -->
					<div class="col-md-6">
						<a href="{{route('facebookpr')}}">
							<div class="catitem facebook">
								<div class="icon">
									<i class="ri-facebook-fill"></i>
								</div>
								<div class="text">
									<h5>Facebook</h5>
									<span>Servisleri</span>
								</div>
							</div>
						</a>
					</div><!-- col6 -->
					<div class="col-md-6">
						<a href="{{route('twitchpr')}}">
							<div class="catitem twitch">
								<div class="icon">
									<i class="ri-twitch-fill"></i>
								</div>
								<div class="text">
									<h5>Twitch</h5>
									<span>Servisleri</span>
								</div>
							</div>
						</a>
					</div><!-- col6 -->
					<div class="col-md-6">
						<a href="{{route('spotifypr')}}">
							<div class="catitem spotify">
								<div class="icon">
									<i class="ri-spotify-fill"></i>
								</div>
								<div class="text">
									<h5>Spotify</h5>
									<span>Servisleri</span>
								</div>
							</div>
						</a>
					</div><!-- col6 -->
					<div class="col-md-6">
						<a href="#">
							<div class="catitem linkedin">
								<div class="icon">
									<i class="ri-linkedin-fill"></i>
								</div>
								<div class="text">
									<h5>LinkedIn</h5>
									<span>Servisleri</span>
								</div>
							</div>
						</a>
					</div><!-- col6 -->
				</div><!-- row -->
				
				<!-- Daha fazla göster/daha az göster düğmeleri -->
				<div id="show-more-container">
					<button id="show-more-btn" onclick="showMore()">Daha Fazla Göster <i
							class="ri-arrow-down-s-line"></i></button>
					<button id="show-less-btn" onclick="showLess()" style="display: none;">Daha Az Göster <i
							class="ri-arrow-up-s-line"></i></button>
				</div>
			</div><!-- platform -->

			<!-- Swiper -->
			<div class="ser_slider web-open">
				<div class="swiper servicesSwiper">
					<div class="swiper-wrapper">
						@foreach ($categories as $headitem)
						@php
							$kucukisim = strtolower($headitem->product_category_name);
						@endphp
						<div class="swiper-slide">
							<a href="{{ route('allproduct',['id'=>$headitem->id,'cat'=>$headitem->product_category_name]) }}">
								<div class="catitem {{$kucukisim}}">
									<div class="icon">
										<i class="ri-{{$kucukisim}}-fill"></i>
									</div>
									<div class="text">
										<span>{{$headitem->product_category_name}}</span>
										<h5>Servisleri</h5>
									</div>
								</div>
							</a>
						</div><!-- col3 -->
						@endforeach
					</div>
				</div>

				<div class="swiper-button-nextsr"><i class="ri-arrow-right-s-line"></i></div>
				<div class="swiper-button-prevsr"><i class="ri-arrow-left-s-line"></i></div>
			</div>
		</div><!-- container -->
	</section>