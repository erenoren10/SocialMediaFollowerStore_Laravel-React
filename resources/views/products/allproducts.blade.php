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
</head>

<body>
    <!-- header -->
    @include('data.head')
    <!-- header -->
    @php
        $kucukcat=strtolower($categoryname);
    @endphp

    <div class="paket_title {{$kucukcat}}">
        <div class="container">
            <i class="ri-{{$kucukcat}}-fill"></i>
            <h1>{{$categoryname}}</h1>
            <h6>Hizmetlerimiz</h6>
            <p>{{$categoryname}}’da ihtiyaçlarınıza uygun paketlerle etkileşimi artırmaya ve hesabınızı
                geliştirmeye hazır mısınız?</p>
        </div><!-- container -->
    </div><!-- title -->

    <div class="kategori_list {{$kucukcat}}">
        <div class="container">
            <div class="row">
                @foreach ($childcategories as $childitem)
                <div class="col-md-3">
                    <div class="item">
                        <a href="{{ route('oneproduct',['id'=>$childitem->id,'cat'=>$categoryname]) }}">
                            <div class="left">
                                <div class="icon">
                                    <i class="ri-user-add-line"></i>
                                </div>
                                <span>{{$childitem->product_category_name}} Paketleri</span>
                            </div>
                            <div class="right">
                                <i class="ri-arrow-right-line"></i>
                            </div>
                        </a>
                    </div>
                </div><!-- col3 -->
                @endforeach
            </div><!-- row -->
        </div><!-- container -->
    </div><!-- list -->
  

	<!-- footer -->
	@include('data.footer')
	<!-- /footer -->


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>