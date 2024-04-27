@php
    use App\Models\Product;
    $nextItem = null;
    $item = Product::latest()->get();
@endphp

<!DOCTYPE html>
<html lang="tr">

<head>
    <title>FenomenPaket</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/icon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <style>
        @keyframes beat {
            0% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(1.2);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        span.fa-beat {
            animation: beat 1s infinite;
        }

        i.fa-bolt {
            animation: beat 1s infinite;
        }

        i.fa-arrow-right {
            animation: beat 1s infinite;
        }
    </style>
    @yield('css')

</head>

<body>
    <div class="wrapper">
        <!-- header -->
        @include('data.head')
        <!-- header -->

        <div id="announcementBar" class="announcementBar">
            <i class="ri-notification-fill">&nbsp;</i>
            <b id="announcementTitle"></b>
            <p id="announcementDescription"></p>
        </div>


        <!-- Modal -->
        <div class="modal" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="phonecheckmodal">
                            <button type="button" class="btn-close" id="closeModalBtn" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <div class="ifraem">
                                <img src="assets/img/footerlogo.svg" alt="">
                            </div>
                            <h2 id="popuptitle"></h2>
                            <p id="popupDescription"></p>

                            <div class="indirimkod">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="left" id="discountRate">% İNDİRİM KODU</span>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="kopyala">
                                            <span id="code"></span>
                                            <button onclick="copyTextB('code')"><i
                                                    class="ri-file-copy-line"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="date">
                                        <span><i class="ri-calendar-line"></i> Geçerlilik Tarihi</span>
                                        <b id="validityDate"></b>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="date">
                                        <a href="#">Hemen Sipariş Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- modal -->
                    </div>
                </div>
            </div>
        </div>


        <!-- slider -->
        @include('include.slider')
        <!-- /slider -->

        <!-- SOSYAL MEDYA SERVİSLERİMİZ -->
        @include('include.smediaslider')
        <!-- /SOSYAL MEDYA SERVİSLERİMİZ -->

        <!-- POPÜLER KATEGORİLERİMİZ -->
        @include('include.popcategory')
        <!-- /POPÜLER KATEGORİLERİMİZ -->

        <!-- AVANTAJLI PAKETLER -->
        @include('include.advcategory')
        <!-- /AVANTAJLI PAKETLER -->

        <!-- biz kimiz -->
        @include('data.who_are_we')
        <!-- /biz kimiz -->

        <!-- section -->
        @include('include.SSS')

        <!-- /section -->

        <!-- sectiondesc -->
        @include('data.sectiondesc')

        <!-- sectiondesc -->

        <!-- benzersiz -->
        @include('data.ourquality')

        <!-- benzersiz -->

        <!-- mutlu müşteriler -->
        @include('include.happycustomer')

        <!-- /mutlu müşteriler -->

        <!-- paket bilgisi -->
        @include('data.packagedesc')

        <!-- /paket bilgisi -->

        <!-- footer -->
        @include('data.footer')

        <!-- /footer -->

    </div>
    <div class="" id="popduyuru"></div>


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var announcements = @json($fakenotification); // Fakenotification verilerini JavaScript dizisine dönüştürüyoruz
        var currentIndex = 0;

        function showAnnouncement(index) {
            if (index >= 0 && index < announcements.length) {
                var announcement = announcements[index];
                document.getElementById("announcementTitle").innerText = announcement.fake_title;
                document.getElementById("announcementDescription").innerHTML = announcement.fake_description;
                document.getElementById("announcementBar").style.display = "block";
                currentIndex = index;

                // 5 saniye sonra duyuruyu kapatmak için setTimeout kullanıyoruz
                setTimeout(function() {
                    document.getElementById("announcementBar").style.display = "none";
                    // 5 saniye sonra bir sonraki duyuruyu göstermek için nextAnnouncement() fonksiyonunu çağırıyoruz
                }, 5000); // 5 saniye (5000 milisaniye) bekle
            } else {
                document.getElementById("announcementBar").style.display = "none";
                currentIndex = 0;
            }
        }

        function nextAnnouncement() {
            currentIndex++;
            if (currentIndex >= announcements.length) {
                currentIndex = 0; // Dizinin sonuna geldiğimizde başa dön
            }
            showAnnouncement(currentIndex);
        }

        showAnnouncement(
            currentIndex
            ); // İlk duyuruyu göstermek için çağrılır (istenirse sayfa yüklendiğinde otomatik olarak gösterilebilir)

        // Her 30 saniyede bir bir sonraki duyuruyu göstermek için
        setInterval(nextAnnouncement, 30000);
    </script>
    <script>
        var popupnots = @json($popupnotification);
        var currentIndexs = -1;

        function showAnnouncements(index) {
            if (index >= 0 && index < popupnots.length) {
                var popupnot = popupnots[index];
                document.getElementById("popuptitle").innerText = popupnot.popup_title;
                document.getElementById("popupDescription").innerHTML = popupnot.popup_description;
                document.getElementById("discountRate").textContent = "%" + popupnot.discount_rate + " İNDİRİM KODU";
                document.getElementById("code").textContent = popupnot.code;
                document.getElementById("validityDate").textContent = popupnot.validity_date;
                document.getElementById("registerModal").style.display = "block";
                document.getElementById("registerModal").className = "modal fade show";
                document.getElementById("popduyuru").className = "modal-backdrop fade show";


                currentIndexs = index;

                setTimeout(function() {
                    document.getElementById("registerModal").style.display = "none";
                    document.getElementById("popduyuru").className = "";


                }, 10000);
            } else {
                document.getElementById("registerModal").style.display = "none";
                currentIndexs = 0;
            }
        }

        function nextAnnouncements() {
            currentIndexs++;
            if (currentIndexs >= popupnots.length) {
                currentIndexs = 0;
            }
            showAnnouncements(currentIndexs);
        }
        document.getElementById("closeModalBtn").addEventListener("click", function() {
            // Modalı kapat
            document.getElementById("registerModal").style.display = "none";
            document.getElementById("popduyuru").className = "";
        });


        showAnnouncements(currentIndexs);
        setInterval(nextAnnouncements, 65000);
    </script>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab-button");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Üst kategori seçildiğinde tetiklenecek fonksiyon
            document.getElementById('product_category_id').addEventListener('change', function() {
                var categoryId = document.getElementById('product_category_id')
                .value; // Seçilen üst kategori ID'si // Seçilen üst kategori ID'si

                // Ajax isteği gönderme
                axios.get('/get-subcategoriesindex/' + categoryId)
                    .then(function(response) {
                        var subCategories = response.data.subCategories;
                        // Alt kategorilerin seçeneklerini oluşturma ve güncelleme
                        var subCategorySelect = document.getElementById('sub_category');
                        subCategorySelect.innerHTML = '<option value="">-- Seçiniz --</option>';
                        subCategories.forEach(function(subCat) {
                            subCategorySelect.innerHTML += '<option value="' + subCat.id +
                                '">' + subCat.product_category_name + '</option>';

                        });


                        // Alt kategorileri görünür yapma
                        document.getElementById('sub_category').style.display = 'block';
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });

            // Üst kategori seçildiğinde tetiklenecek fonksiyon
            document.getElementById('sub_category').addEventListener('change', function() {
                var categoryId = document.getElementById('sub_category')
                    .value; // Seçilen üst kategori ID'si // Seçilen üst kategori ID'si

                // Ajax isteği gönderme
                axios.get('/get-subcategoriesindex/' + categoryId)
                    .then(function(response) {
                        var subCategories = response.data.subCategories;
                        // Alt kategorilerin seçeneklerini oluşturma ve güncelleme
                        var subCategorySelect = document.getElementById('sub_category1');
                        subCategorySelect.innerHTML = '<option value="">-- Seçiniz --</option>';
                        subCategories.forEach(function(subCat) {
                            subCategorySelect.innerHTML += '<option value="' + subCat.id +
                                '">' + subCat.product_category_name + '</option>';

                        });


                        // Alt kategorileri görünür yapma
                        document.getElementById('sub_category1').style.display = 'block';
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });

            // Üst kategori seçildiğinde tetiklenecek fonksiyon
            document.getElementById('sub_category1').addEventListener('change', function() {
                var categoryId2 = document.getElementById('sub_category1')
                    .value; // Seçilen üst kategori ID'si // Seçilen üst kategori ID'si

                // Ajax isteği gönderme
                axios.get('/get-packages/' + categoryId2)
                    .then(function(response) {
                        var packages = response.data.packages;
                        // Alt kategorilerin seçeneklerini oluşturma ve güncelleme
                        var subCategorySelect = document.getElementById('kategori3');
                        subCategorySelect.innerHTML = '<option value="">-- Seçiniz --</option>';
                        packages.forEach(function(package) {
                            subCategorySelect.innerHTML += '<option value="' + package.id +
                                '">' + package.product_title + '</option>';
                        });

                        // Alt kategorileri görünür yapma
                        document.getElementById('kategori3').style.display = 'block';
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
            document.getElementById('kategori3').addEventListener('change', function() {
                var categoryId3 = document.getElementById('kategori3').value; // Seçilen üst kategori ID'si

                // Ajax isteği gönderme
                axios.get('/get-packagesprice/' + categoryId3)
                    .then(function(response) {
                        var price = response.data
                            .price; // Varsayılan olarak doğru şekilde erişiliyor mu kontrol edin
                        // Alt kategorilerin seçeneklerini oluşturma ve güncelleme
                        var product_id = response.data.product_id;
                        console.log(product_id);
                        var productPrices = document.getElementById('product_prices');
                        var newHref = '/mycart/add/' + product_id;
                        productPrices.setAttribute('href', newHref);
                        var newContent =
                            '<i class="ri-heart-fill"></i> <b>Satın Al </b> <i class="ri-arrow-left-line"></i>  "' +
                            price + ' ₺"';
                        productPrices.innerHTML = newContent;

                        // Link içeriğini güncellemek için innerHTML kullanıyoruz
                        // Alt kategorileri görünür yapma
                        productPrices.style.display = 'block';
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.favorite').click(function(event) {
                event.preventDefault();
                var button = $(this);
                var userId = button.closest('.hshead').find('input[name="userID"]').val();
                var itemDetailId = button.closest('.hshead').find('input[name="itemID"]').val();
                var deger = document.getElementById('favoriteButton');

                if (!userId) {
                    // Kullanıcı giriş yapmamışsa başka bir sayfaya yönlendir
                    window.location.href = "{{ route('login') }}";
                    return; // Yönlendirme işlemi tamamlandığında işlemi sonlandır
                }

                $.ajax({
                    type: "POST",
                    url: "{{ route('add.favorite') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: userId,
                        product_id: itemDetailId
                    },
                    success: function(response) {
                        var idismi = "kalpicon" + itemDetailId
                        var kalp = document.getElementById(idismi);
                        if (kalp) {
                            kalp.classList.remove("ri-heart-line");
                            kalp.classList.add("ri-heart-fill");
                        }
                    },

                    error: function(error) {
                        // Hata durumunda yapılacaklar
                        console.log(error);
                    }
                });

            });
        });
    </script>
    @yield('js')

</body>

</html>
