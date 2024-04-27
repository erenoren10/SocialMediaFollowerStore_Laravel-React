<!DOCTYPE html>
<html lang="tr">

<head>
	<title>Sepet | @yield('title')</title>
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

    <!-- body -->
    @yield('orderbody')
    <!-- body -->
    

    <!-- footer -->
    @include('data.footer')
    <!-- /footer -->


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
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
    
</body>

</html>