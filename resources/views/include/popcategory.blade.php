<section class="popcategorieslist">
    <div class="container">
        <div class="thead">
            <div class="ticon">
                <img src="assets/img/icon/ticon.svg" alt="">
            </div>
            <h3>POPÜLER KATEGORİLERİMİZ</h3>
            <h6>16 Farklı kategoride yüzlerce farklı servisimiz ile 5 yıldır sosyal medyada gücünüze güç katıyoruz!
            </h6>
        </div>
    </div><!-- container -->

    <div class="pakettabs">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active instagram" id="paket-tab1" data-bs-toggle="tab"
                        data-bs-target="#paket-tab-pane1" type="button" role="tab" aria-controls="paket-tab-pane1"
                        aria-selected="true">
                        <i class="ri-instagram-fill"></i> <span>INSTAGRAM PAKETLERİ</span>
                    </button>
                </li><!-- li -->
                <li>
                    <button class="nav-link twitter" id="paket-tab2" data-bs-toggle="tab"
                        data-bs-target="#paket-tab-pane2" type="button" role="tab" aria-controls="paket-tab-pane2"
                        aria-selected="true">
                        <i class="ri-twitter-fill"></i> <span>TWITTER PAKETLERİ</span>
                    </button>
                </li><!-- li -->
                <li>
                    <button class="nav-link tiktok" id="paket-tab3" data-bs-toggle="tab"
                        data-bs-target="#paket-tab-pane3" type="button" role="tab" aria-controls="paket-tab-pane3"
                        aria-selected="true">
                        <i class="ri-tiktok-fill"></i> <span>TIKTOK PAKETLERİ</span>
                    </button>
                </li><!-- li -->
                <li>
                    <button class="nav-link facebook" id="paket-tab4" data-bs-toggle="tab"
                        data-bs-target="#paket-tab-pane4" type="button" role="tab" aria-controls="paket-tab-pane4"
                        aria-selected="true">
                        <i class="ri-facebook-fill"></i> <span>FACEBOOK PAKETLERİ</span>
                    </button>
                </li><!-- li -->
                <li>
                    <button class="nav-link youtube" id="paket-tab5" data-bs-toggle="tab"
                        data-bs-target="#paket-tab-pane5" type="button" role="tab" aria-controls="paket-tab-pane5"
                        aria-selected="true">
                        <i class="ri-youtube-fill"></i> <span>YOUTUBE PAKETLERİ</span>
                    </button>
                </li><!-- li -->
            </ul>
        </div>
    </div><!-- tabs -->

    <div class="pakettabsarea">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="paket-tab-pane1" role="tabpanel" aria-labelledby="paket-tab1"
                    tabindex="0">
                    <!-- Swiper -->
                    <div class="swiper paketSwiper">
                        <div class="swiper-wrapper">
                            @php
                                $count = 0;
                                $i=0;
                            @endphp
                            @foreach ($all_products as $item)
                                @if ($item['product_category']->parentCategories->parentCategories->id == 1 && $count < 4)
                                    <div class="swiper-slide">
                                        <div class="paketitem instagram">
                                            <div class="hshead">
                                                <div class="icon">
                                                    <i class="ri-instagram-line"></i>
                                                </div>
                                                <div class="text">
                                                    <h5>{{ $item['product_category']->parentCategories->parentCategories->product_category_name }}
                                                    </h5>
                                                    <p>{{ $item->product_title }}</p>
                                                </div>
                                                <button class="favorite" id="favoriteButton">
                                                    <input type="hidden" name="itemID" value="{{ $item->id }}">
                                                    <input type="hidden" name="userID" value="{{ Auth::id() }}">
                                                    <a href="#!">
                                                        <i id="kalpicon{{ $item->id }}" class="ri-heart-line"></i>
                                                    </a>
                                                </button>
                                            </div>
                                            <div class="hsbody">
                                                <ul>
                                                    <li>
                                                        <i class="ri-user-line"></i>
                                                        {{ $item->product_desc1 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-add-line"></i>
                                                        {{ $item->product_desc2 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-gift-line"></i>
                                                        {{ $item->product_desc3 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-check-double-line"></i>
                                                        {{ $item->product_desc4 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-keyhole-line"></i>
                                                        {{ $item->product_desc5 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-check-line"></i>
                                                        {{ $item->product_desc6 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-customer-service-2-line"></i>
                                                        {{ $item->product_desc7 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-unfollow-line"></i>
                                                        {{ $item->product_desc8 }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                            if ($item->product_price >= 1000) {
                                                $updatedPrice = $item->product_price + 600;
                                            } elseif ($item->product_price >= 100) {
                                                $updatedPrice = $item->product_price + 300;
                                            } elseif ($item->product_price >= 10) {
                                                $updatedPrice = $item->product_price + 20;
                                            }
                                            ?>
                                            <div class="hsprice">
                                                <div class="price">
                                                    <h5>{{ $updatedPrice }} TL</h5>
                                                    <p>{{ $item->product_price }} TL</p>
                                                </div>
                                                <div class="buy">
                                                    <a href="/mycart/add/{{ $item->id }}"><i
                                                            class="ri-shopping-basket-2-line"></i> SATIN AL</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- slide -->
                                    @php
                                    $i++;
                                        $count++;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div><!-- tab -->
                <div class="tab-pane fade" id="paket-tab-pane2" role="tabpanel" aria-labelledby="paket-tab2"
                    tabindex="0">
                    <!-- Swiper -->
                    <div class="swiper paketSwiper">
                        <div class="swiper-wrapper">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($all_products as $item)
                                @if ($item['product_category']->parentCategories->parentCategories->id == 2 && $count < 4)
                                    <div class="swiper-slide">

                                        <div class="paketitem twitter">
                                            <div class="hshead">
                                                <div class="icon">
                                                    <i class="ri-twitter-fill"></i>
                                                </div>
                                                <div class="text">
                                                    <h5>{{ $item['product_category']->parentCategories->parentCategories->product_category_name }}
                                                    </h5>
                                                    <p>{{ $item->product_title }}</p>
                                                </div>
                                                <button class="favorite" id="favoriteButton">
                                                    <input type="hidden" name="itemID"
                                                        value="{{ $item->id }}">
                                                    <input type="hidden" name="userID"
                                                        value="{{ Auth::id() }}">
                                                    <a href="#!">
                                                        <i id="kalpicon{{ $item->id }}"
                                                            class="ri-heart-line"></i>
                                                    </a>
                                                </button>
                                            </div>
                                            <div class="hsbody">
                                                <ul>
                                                    <li>
                                                        <i class="ri-user-line"></i>
                                                        {{ $item->product_desc1 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-add-line"></i>
                                                        {{ $item->product_desc2 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-gift-line"></i>
                                                        {{ $item->product_desc3 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-check-double-line"></i>
                                                        {{ $item->product_desc4 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-keyhole-line"></i>
                                                        {{ $item->product_desc5 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-check-line"></i>
                                                        {{ $item->product_desc6 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-customer-service-2-line"></i>
                                                        {{ $item->product_desc7 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-unfollow-line"></i>
                                                        {{ $item->product_desc8 }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                            if ($item->product_price >= 1000) {
                                                $updatedPrice = $item->product_price + 600;
                                            } elseif ($item->product_price >= 100) {
                                                $updatedPrice = $item->product_price + 300;
                                            } elseif ($item->product_price >= 10) {
                                                $updatedPrice = $item->product_price + 20;
                                            }
                                            ?>
                                            <div class="hsprice">
                                                <div class="price">
                                                    <h5>{{ $updatedPrice }} TL</h5>
                                                    <p>{{ $item->product_price }} TL</p>
                                                </div>
                                                <div class="buy">
                                                    <a href="/mycart/add/{{ $item->id }}"><i
                                                            class="ri-shopping-basket-2-line"></i> SATIN AL</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @php
                                        $count++;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div><!-- tab -->
                <div class="tab-pane fade" id="paket-tab-pane3" role="tabpanel" aria-labelledby="paket-tab3"
                    tabindex="0">
                    <!-- Swiper -->
                    <div class="swiper paketSwiper">
                        <div class="swiper-wrapper">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($all_products as $item)
                                @if ($item['product_category']->parentCategories->parentCategories->id == 5 && $count < 4)
                                    <div class="swiper-slide">

                                        <div class="paketitem tiktok">
                                            <div class="hshead">
                                                <div class="icon">
                                                    <i class="ri-tiktok-fill"></i>
                                                </div>
                                                <div class="text">
                                                    <h5>{{ $item['product_category']->parentCategories->parentCategories->product_category_name }}
                                                    </h5>
                                                    <p>{{ $item->product_title }}</p>
                                                </div>
                                                <button class="favorite" id="favoriteButton">
                                                    <input type="hidden" name="itemID"
                                                        value="{{ $item->id }}">
                                                    <input type="hidden" name="userID"
                                                        value="{{ Auth::id() }}">
                                                    <a href="#!">
                                                        <i id="kalpicon{{ $item->id }}"
                                                            class="ri-heart-line"></i>
                                                    </a>
                                                </button>
                                            </div>
                                            <div class="hsbody">
                                                <ul>
                                                    <li>
                                                        <i class="ri-user-line"></i>
                                                        {{ $item->product_desc1 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-add-line"></i>
                                                        {{ $item->product_desc2 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-gift-line"></i>
                                                        {{ $item->product_desc3 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-check-double-line"></i>
                                                        {{ $item->product_desc4 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-keyhole-line"></i>
                                                        {{ $item->product_desc5 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-check-line"></i>
                                                        {{ $item->product_desc6 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-customer-service-2-line"></i>
                                                        {{ $item->product_desc7 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-unfollow-line"></i>
                                                        {{ $item->product_desc8 }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                            if ($item->product_price >= 1000) {
                                                $updatedPrice = $item->product_price + 600;
                                            } elseif ($item->product_price >= 100) {
                                                $updatedPrice = $item->product_price + 300;
                                            } elseif ($item->product_price >= 10) {
                                                $updatedPrice = $item->product_price + 20;
                                            }
                                            ?>
                                            <div class="hsprice">
                                                <div class="price">
                                                    <h5>{{ $updatedPrice }} TL</h5>
                                                    <p>{{ $item->product_price }} TL</p>
                                                </div>
                                                <div class="buy">
                                                    <a href="/mycart/add/{{ $item->id }}"><i
                                                            class="ri-shopping-basket-2-line"></i> SATIN AL</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @php
                                        $count++;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div><!-- tab -->
                <div class="tab-pane fade" id="paket-tab-pane4" role="tabpanel" aria-labelledby="paket-tab4"
                    tabindex="0">
                    <!-- Swiper -->
                    <div class="swiper paketSwiper">
                        <div class="swiper-wrapper">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($all_products as $item)
                                @if ($item['product_category']->parentCategories->parentCategories->id == 3 && $count < 4)
                                    <div class="swiper-slide">

                                        <div class="paketitem facebook">
                                            <div class="hshead">
                                                <div class="icon">
                                                    <i class="ri-facebook-fill"></i>
                                                </div>
                                                <div class="text">
                                                    <h5>{{ $item['product_category']->parentCategories->parentCategories->product_category_name }}
                                                    </h5>
                                                    <p>{{ $item->product_title }}</p>
                                                </div>
                                                <button class="favorite" id="favoriteButton">
                                                    <input type="hidden" name="itemID"
                                                        value="{{ $item->id }}">
                                                    <input type="hidden" name="userID"
                                                        value="{{ Auth::id() }}">
                                                    <a href="#!">
                                                        <i id="kalpicon{{ $item->id }}"
                                                            class="ri-heart-line"></i>
                                                    </a>
                                                </button>
                                            </div>
                                            <div class="hsbody">
                                                <ul>
                                                    <li>
                                                        <i class="ri-user-line"></i>
                                                        {{ $item->product_desc1 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-add-line"></i>
                                                        {{ $item->product_desc2 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-gift-line"></i>
                                                        {{ $item->product_desc3 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-check-double-line"></i>
                                                        {{ $item->product_desc4 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-keyhole-line"></i>
                                                        {{ $item->product_desc5 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-check-line"></i>
                                                        {{ $item->product_desc6 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-customer-service-2-line"></i>
                                                        {{ $item->product_desc7 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-unfollow-line"></i>
                                                        {{ $item->product_desc8 }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                            if ($item->product_price >= 1000) {
                                                $updatedPrice = $item->product_price + 600;
                                            } elseif ($item->product_price >= 100) {
                                                $updatedPrice = $item->product_price + 300;
                                            } elseif ($item->product_price >= 10) {
                                                $updatedPrice = $item->product_price + 20;
                                            }
                                            ?>
                                            <div class="hsprice">
                                                <div class="price">
                                                    <h5>{{ $updatedPrice }} TL</h5>
                                                    <p>{{ $item->product_price }} TL</p>
                                                </div>
                                                <div class="buy">
                                                    <a href="/mycart/add/{{ $item->id }}"><i
                                                            class="ri-shopping-basket-2-line"></i> SATIN AL</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @php
                                        $count++;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div><!-- tab -->
                <div class="tab-pane fade" id="paket-tab-pane5" role="tabpanel" aria-labelledby="paket-tab5"
                    tabindex="0">
                    <!-- Swiper -->
                    <div class="swiper paketSwiper">
                        <div class="swiper-wrapper">
                            @php
                                $count = 0;
                            @endphp
                            @foreach ($all_products as $item)
                                @if ($item['product_category']->parentCategories->parentCategories->id == 6 && $count < 4)
                                    <div class="swiper-slide">

                                        <div class="paketitem youtube">
                                            <div class="hshead">
                                                <div class="icon">
                                                    <i class="ri-youtube-fill"></i>
                                                </div>
                                                <div class="text">
                                                    <h5>{{ $item['product_category']->parentCategories->parentCategories->product_category_name }}
                                                    </h5>
                                                    <p>{{ $item->product_title }}</p>
                                                </div>
                                                <button class="favorite" id="favoriteButton">
                                                    <input type="hidden" name="itemID"
                                                        value="{{ $item->id }}">
                                                    <input type="hidden" name="userID"
                                                        value="{{ Auth::id() }}">
                                                    <a href="#!">
                                                        <i id="kalpicon{{ $item->id }}"
                                                            class="ri-heart-line"></i>
                                                    </a>
                                                </button>
                                            </div>
                                            <div class="hsbody">
                                                <ul>
                                                    <li>
                                                        <i class="ri-user-line"></i>
                                                        {{ $item->product_desc1 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-add-line"></i>
                                                        {{ $item->product_desc2 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-gift-line"></i>
                                                        {{ $item->product_desc3 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-check-double-line"></i>
                                                        {{ $item->product_desc4 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-keyhole-line"></i>
                                                        {{ $item->product_desc5 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-shield-check-line"></i>
                                                        {{ $item->product_desc6 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-customer-service-2-line"></i>
                                                        {{ $item->product_desc7 }}
                                                    </li>
                                                    <li>
                                                        <i class="ri-user-unfollow-line"></i>
                                                        {{ $item->product_desc8 }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php
                                            if ($item->product_price >= 1000) {
                                                $updatedPrice = $item->product_price + 600;
                                            } elseif ($item->product_price >= 100) {
                                                $updatedPrice = $item->product_price + 300;
                                            } elseif ($item->product_price >= 10) {
                                                $updatedPrice = $item->product_price + 20;
                                            }
                                            ?>
                                            <div class="hsprice">
                                                <div class="price">
                                                    <h5>{{ $updatedPrice }} TL</h5>
                                                    <p>{{ $item->product_price }} TL</p>
                                                </div>
                                                <div class="buy">
                                                    <a href="/mycart/add/{{ $item->id }}"><i
                                                            class="ri-shopping-basket-2-line"></i> SATIN AL</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @php
                                        $count++;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                    </div><!-- tab -->
                </div>
            </div>
        </div><!-- area -->
</section>
