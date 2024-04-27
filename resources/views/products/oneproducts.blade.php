@extends('layouts.productLayout')


@section('allproduct')
    @php
        $kucukcat = strtolower($categoryname);
        $numberOfChildCategories = $childcategories->count();
        // Burada $numberOfChildCategories'i kullanarak istediğiniz işlemi yapabilirsiniz
        $totalcategory = 12 / $numberOfChildCategories;
        $i = 1;
    @endphp
    <div class="paket_title {{ $kucukcat }}">
        <div class="container">
            <i class="ri-{{ $kucukcat }}-fill"></i>
            <h1>{{ $categoryname }}</h1>
            <h6>Hizmetlerimiz</h6>
        </div><!-- container -->
    </div><!-- title -->

    <div class="paket_exlist">
        <div class="container">
            <div class="paketmenu">
                <div class="row">
                    @foreach ($childcategories as $items)
                        <div class="col-md-{{ $totalcategory }}">
                            <a href="#tab{{ $i++ }}" data-value="{{ $items->id }}"
                                class="tab-link {{ $kucukcat }} {{ $i === 2 ? ' active' : '' }}">
                                <div class="text">
                                    <span>{{ $items->product_category_name }} </span>
                                </div>
                                <div class="icon">
                                    <i class="ri-arrow-right-s-line"></i>
                                </div>
                            </a>
                        </div><!-- col2 -->
                    @endforeach
                </div>
            </div><!-- menu -->

            @for ($i = 1; $i <= $numberOfChildCategories; $i++)
                <div class="tabs {{ $i === 1 ? ' active' : '' }}" id="tab{{ $i }}">
                    <div class="row">
                        @foreach ($all_products as $item)
                            <div class="col-md-3">
                                <div class="paketitem {{ $kucukcat }}">
                                    <div class="hshead">
                                        <div class="icon">
                                            <i class="ri-{{ $kucukcat }}-fill"></i>
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
                                            <li><i class="ri-user-line"></i>{{ $item->product_desc1 }}</li>
                                            <li><i class="ri-user-add-line"></i>{{ $item->product_desc2 }}</li>
                                            <li><i class="ri-gift-line"></i>{{ $item->product_desc3 }}</li>
                                            <li><i class="ri-check-double-line"></i>{{ $item->product_desc4 }}</li>
                                            <li><i class="ri-shield-keyhole-line"></i>{{ $item->product_desc5 }}</li>
                                            <li><i class="ri-shield-check-line"></i>{{ $item->product_desc6 }}</li>
                                            <li><i class="ri-customer-service-2-line"></i>{{ $item->product_desc7 }}</li>
                                            <li><i class="ri-user-unfollow-line"></i>{{ $item->product_desc8 }}</li>
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
                            </div><!-- col3 -->
                        @endforeach
                    </div><!-- row -->
                </div><!-- tabindex -->
            @endfor
        </div><!-- container -->
    </div><!-- list -->
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var tabLinks = document.querySelectorAll('.tab-link');



            tabLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var categoryId = this.getAttribute('data-value');
                    console.log(categoryId);



                    axios.get('/get-subproduct/' + categoryId)
                        .then(function(response) {
                            var subProducts = response.data.subProducts;

                            subProducts.forEach(function(link) {
                                console.log(link);
                            });

                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.tab-link').on('click', function(e) {
                e.preventDefault();

                // Tüm tab içeriklerini gizle
                $('.tabs').hide();

                // Tıklanan sekme bağlantısının href özelliğinden hedef tab ID'sini al
                var targetTab = $(this).attr('href');

                // Hedef tab içeriğini göster
                $(targetTab).show();

                // Aktif sekme bağlantısının "active" sınıfını ayarla
                $('.tab-link').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
@endsection
