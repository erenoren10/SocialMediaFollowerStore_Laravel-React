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
    @yield('css')
</head>

<body>
	<!-- header -->
	@include('data.head')
	<!-- header -->
   
    @yield('allproduct')

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


	<!-- mutlu müşteriler -->
	@include('data.footer')

	<!-- /mutlu müşteriler -->

    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.favorite').click(function(event) {
				event.preventDefault();
				var button = $(this);
				var userId = button.closest('.hshead').find('input[name="userID"]').val();
				var itemDetailId = button.closest('.hshead').find('input[name="itemID"]').val();
				var deger = document.getElementById('favoriteButton');
				console.log(deger);
	
				if (!userId) {
					// Kullanıcı giriş yapmamışsa başka bir sayfaya yönlendir
					window.location.href = "{{ route('login') }}";
					return; // Yönlendirme işlemi tamamlandığında işlemi sonlandır
				}
	
				$.ajax({
					type: "POST",
					url: "{{ route('add.favorite')}}",
					data: {
						_token: "{{ csrf_token() }}",
						user_id: userId,
						product_id: itemDetailId
					},
					success: function(response) {
						var idismi = "kalpicon"+itemDetailId
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