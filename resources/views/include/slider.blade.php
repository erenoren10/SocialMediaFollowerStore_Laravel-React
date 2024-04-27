<section class="sliderbanner tab  " id="tab1" >
		<img src="assets/img/slider.png" alt="">
		<div class="container">
			<div class="text">
				<h2>Sosyal Medya’da <br>
					<span>Fark Edilmek</span> mi İstiyorsunuz?
				</h2>
				<div class="subtext">
					<i class="ri-menu-4-line"></i>
					<span><b>136 Farklı</b> kategoriden size en uygun olanı hemen bulalım, fark edilmeye
						başlayın.</span>
				</div>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
					et dolore magna aliqua.
				</p>
				<div class="row tanorder">
					<div class="fastorder">
						<a href="#" onclick="openTab(event, 'tab2')" class="tab-button col-md-4">
							<i class="fa-solid fa-bolt"></i>
							<span class="fa-beat">  Hızlı Satın Al</span>
							<i class="fa-solid fa-arrow-right"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
</section>

	 

<section class="sliderbanner tab active " id="tab2" >
	<img src="assets/img/slider.png" alt="">
		<div class="container">
			<div class="text">
				<h2>Sosyal Medya’da <br>
					<span>Fark Edilmek</span> mi İstiyorsunuz?</h2>
				<div class="subtext">
					<i class="ri-menu-4-line"></i>
					<span><b>Hızlı sipariş</b>  sistemi ile ihtiyacınız olan pakete hızlıca erişin.</span>
				</div>
				<div class="dropdown-container">
					<div class="dropdownall" id="product_category_section">
						<div class="dropdown">
							<label for="kategori1">Platform Seç:</label>
							<select name="kategori1" id="product_category_id">
								<option value="">-- Seçiniz --</option>
								@foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->product_category_name }}
                                </option>
                                @endforeach
							</select>
						</div>
						<div class="dropdown">
							<label for="kategori2">1. Kategori Seç:</label>
							<select name="kategori2" id="sub_category">
					
							</select>
						</div>
						<div class="dropdown">
							<label for="kategori2">2. Kategori Seç:</label>
							<select name="kategori2" id="sub_category1">
					
							</select>
						</div>
						<div class="dropdown">
							<label for="kategori3">Paket Seç:</label>
							<select name="kategori3" id="kategori3">
								
							</select>
						</div>
						<div class="row hızlıbuton">
							<div class="col-md-6">
								<div class="tanvideo dropdown" >
									<a href="" class="col-md-6" id="product_prices">
										<i class="fa-solid fa-bolt"></i>
										<span class="fa-beat">  Hızlı Satın Al</span>
										<i class="fa-solid fa-arrow-right"></i>
									</a>
								</div>
							</div>

							<div class="col-md-6">
								<div class="tanvideo dropdown">
									<a href="#" onclick="openTab(event, 'tab1')" class="tab-button">
										<i class="ri-play-circle-line"></i>
										<b> Hızlı Siparişi Kapat</b>
										<i class="ri-close-line"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
</section>