@php
    use App\Models\Blog;
    $randomBlogs = Blog::inRandomOrder()
        ->take(5)
        ->get();
    $randomBlogs1 = Blog::inRandomOrder()
        ->take(5)
        ->get();
@endphp

@extends('layouts.bloglayout')


@section('title', 'blog')
@section('sliderblog')
    <div class="col-md-3">
        <div class="blogleftslider">
            <!-- Swiper -->
            <div class="swiper blogleftSwiper">
                <div class="swiper-wrapper">
                    @foreach ($randomBlogs as $rblog)
                        <div class="swiper-slide">
                            <a href="{{ route('blogdetay', ['id' => $rblog->id]) }}">
                                <div class="item">
                                    <img src="{{ asset($rblog->blog_image) }}" alt="">
                                    <div class="text">
                                        <h4>{{ $rblog->blog_title }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div><!-- slide -->
                    @endforeach
                </div>
                <div class="swiper-button-nextlft"><i class="ri-arrow-right-line"></i></div>
                <div class="swiper-button-prevlft"><i class="ri-arrow-left-line"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="bloganaslider">
            <!-- Swiper -->
            <div class="swiper blogsliderSwiper">
                <div class="swiper-wrapper">
                    @foreach ($randomBlogs1 as $ranblog)
                        <div class="swiper-slide">
                            <div class="item">
                                <a href="{{ route('blogdetay', ['id' => $ranblog->id]) }}">
                                    <img src="{{ asset($ranblog->blog_image) }}" alt="">
                                    <div class="text">
                                        <h4>{{ $ranblog->blog_title }}</h4>
                                    </div>
                                </a>
                            </div>
                        </div><!-- slide -->
                    @endforeach

                </div>
                <div class="swiper-button-nextbg"><i class="ri-arrow-right-line"></i></div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prevbg"><i class="ri-arrow-left-line"></i></div>
            </div>
        </div>
    </div><!-- col6 -->
@endsection
<!-- blog -->
@section('blog')
    <div class="col-md-9">
        <div class="bloglist">
            <div class="row">
                @foreach ($all_blogs as $item)
                    <div class="col-md-4">
                        <div class="blogitem">
                            <a href="{{ route('blogdetay', ['id' => $item->id]) }}">
                                <img src="{{ asset($item->blog_image) }}" alt="">
                                <div class="text">
                                    <h5>{{ $item->blog_title }}</h5>
                                    <p>
                                        {!! Str::limit($item->blog_description, 75) !!}
                                    </p>
                                    <div class="view">
                                        <i class="ri-eye-2-line"></i> {{ $item->created_at->locale('tr')->diffForHumans() }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div><!-- col4 -->
                @endforeach
            </div><!-- row -->
        </div><!-- lit -->
    </div><!-- col9 -->
@endsection
