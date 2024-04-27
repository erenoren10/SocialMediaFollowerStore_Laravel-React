<div class="mutlumustericontent">
		<div class="aboutslider">
			<div class="icon">
				<i class="ri-chat-smile-2-line"></i>
			</div>
			<h5 >Mutlu Müşteriler</h5>
			<p >Tüm bireysel ve kurumsal müşterilerimizin yorumlarını <br> bir araya topladık!</p>

			<div class="markaslider">
				<!-- Swiper -->
				<div class="swiper markaSwiper swiper-initialized swiper-horizontal swiper-pointer-events">
					<div class="swiper-wrapper" id="swiper-wrapper-955c896568ed51b6" aria-live="polite"
						style="transform: translate3d(-1348.2px, 0px, 0px); transition-duration: 0ms;">
						@foreach ($happycustomer as $customer)
						<div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="5" role="group"
							aria-label="6 / 6" style="width: 429.4px; margin-right: 20px;">
							<div class="commentitem">
								<div class="hdtop">
									<div class="user">
										<img src="{{ asset('assets/img/user.jpg') }}" alt="">
										<div class="info">
											<h6>{{$customer->customer_name}}</h6>
											<span>{{$customer->customer_job}}</span>
										</div>
									</div>
									<div class="starlist">
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
										<i class="ri-star-fill"></i>
									</div>
								</div>
								<p>
									{{$customer->customer_comments}}
								</p>
							</div>
						</div><!-- item -->
						@endforeach
					</div>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
					<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
				</div>
				<div class="d-flex">
					<div class="markapagi">
						<div class="swiper-button-nextc" tabindex="0" role="button" aria-label="Next slide"
							aria-controls="swiper-wrapper-955c896568ed51b6" aria-disabled="false">
							<svg xmlns="http://www.w3.org/2000/svg" width="7.333" height="12" viewBox="0 0 7.333 12">
								<path id="Path_20146" data-name="Path 20146"
									d="M4.667,6,0,1.333,1.333,0l6,6-6,6L0,10.667Z" fill="#F70E36"></path>
							</svg>
						</div>
						<div class="swiper-button-prevc swiper-button-disabled" tabindex="0" role="button"
							aria-label="Previous slide" aria-controls="swiper-wrapper-955c896568ed51b6"
							aria-disabled="true">
							<svg xmlns="http://www.w3.org/2000/svg" width="7.333" height="12" viewBox="0 0 7.333 12">
								<path id="Path_20146" data-name="Path 20146"
									d="M4.667,6,0,1.333,1.333,0l6,6-6,6L0,10.667Z"
									transform="translate(7.333 12) rotate(180)" fill="#F70E36"></path>
							</svg>
						</div>
						<div class="swiper-pagination swiper-pagination-progressbar swiper-pagination-horizontal"><span
								class="swiper-pagination-progressbar-fill"
								style="transform: translate3d(0px, 0px, 0px) scaleX(0.166667) scaleY(1); transition-duration: 300ms;"></span>
						</div>
					</div>
				</div>
			</div><!-- slider -->
		</div>
	</div>