@php
    use App\Models\Blog;
    $randomBlogs = Blog::inRandomOrder()->take(3)->get();
@endphp
<!DOCTYPE html>
<html lang="tr">

<head>
	<title>Blog | @yield('title')</title>
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
    


    <div class="blogliste">
        <div class="pagecontent">
            <div class="title-bg">
                Blog
            </div>
            <div class="container">
                <div class="kvpage_menu">
                    <ul>
                        <li>
                            <a href="{{ route('blog')}}">
                                Tümü
                            </a>
                        </li><!-- li -->
                        <li>
                            <a href="{{ route('category.blog', ['id' =>1])}}">
                                İnstagram
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.blog', ['id' =>2])}}">
                                Twitter
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.blog', ['id' =>5])}}">
                                Facebook
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.blog', ['id' =>3])}}">
                                Tiktok
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.blog', ['id' =>4])}}">
                                Twitch
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.blog', ['id' =>6])}}">
                                Spotify
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.blog', ['id' =>7])}}">
                                Telegram
                            </a>
                        </li>
                    </ul>
                </div><!-- menu -->
                <div class="row">
                    @yield('sliderblog')
                    <div class="col-md-3">
                        <div class="bloglistver">
                            @foreach($randomBlogs as $rblog)
                                <div class="item">
                                    <a href="{{ route('blogdetay', ['id' => $rblog->id]) }}">
                                        <div class="img">
                                            <img src="{{ asset($rblog->blog_image) }}" alt="">
                                        </div>
                                        <div class="text">
                                            <h5>{{ $rblog->blog_title }}</h5>
                                            <span>Devamını Oku <i class="ri-arrow-right-line"></i></span>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- blog -->
                    @yield('blog')

                    <div class="col-md-3">
                        <div class="sidebar" style="margin-top:12px;">
                            <div class="sidebarcat">
                                <div class="title">
                                    <div class="icon">
                                        <i class="ri-menu-4-line"></i>
                                    </div>
                                    <h5>KATEGORİLER</h5>
                                </div><!-- title -->
                                <div class="blogsearch">
                                    <input type="text" placeholder="Blog’da arama yap…">
                                    <i class="ri-search-line"></i>
                                </div>
                                <ul class="blogsec">
                                    <li>
                                        <a href="{{ route('blog')}}">
                                            <i class="ri-share-forward-fill"></i> Tüm Bloglar
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="{{ route('category.blog', ['id' =>1])}}">
                                            <i class="ri-instagram-fill"></i> Instagram
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="{{ route('category.blog', ['id' =>2])}}">
                                            <i class="ri-twitter-fill"></i> Twitter
                                        </a>
                                    </li>
                                    <li class="tiktok">
                                        <a href="{{ route('category.blog', ['id' =>3])}}">
                                            <i class="ri-tiktok-fill"></i> TikTok
                                        </a>
                                    </li>
                                    <li class="twitch">
                                        <a href="{{ route('category.blog', ['id' =>4])}}">
                                            <i class="ri-twitch-fill"></i> Twitch
                                        </a>
                                    </li>
                                    <li class="facebook">
                                        <a href="{{ route('category.blog', ['id' =>5])}}">
                                            <i class="ri-facebook-fill"></i> Facebook
                                        </a>
                                    </li>
                                    <li class="spotify">
                                        <a href="{{ route('category.blog', ['id' =>6])}}">
                                            <i class="ri-spotify-fill"></i> Spotify
                                        </a>
                                    </li>
                                    <li class="telegram">
                                        <a href="{{ route('category.blog', ['id' =>7])}}">
                                            <i class="ri-telegram-fill"></i> Telegram
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- sidebar -->
                    </div><!-- col3 -->
                </div>
            </div><!-- container -->
        </div>
    </div><!-- bloglist -->




    <!-- footer -->
    @include('data.footer')
    <!-- /footer -->


    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function(){
        $('ul.blogsec li').mouseover(function(){
            $('ul.blogsec li').removeClass("active");
            $(this).addClass("active");
        });
        });
    </script>
    
</body>

</html>