@extends('layouts.bloglayout')

@section('title','blog')
@section('blog')
<div class="col-md-9">
                    <div class="bloglist">
                        <div class="row">
                            @foreach ($blog_post as $item)
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
