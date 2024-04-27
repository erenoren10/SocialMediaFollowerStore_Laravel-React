@extends('layouts.bloglayout')

@section('title','blog')
@section('blog')
                <!-- blog -->
                <div class="col-md-9">
                    <div class="blogdetay">
                        <div class="img">
                            <img src="{{ asset($blog->blog_image) }}" alt="">
                            <div class="infobar">
                                <div class="leftitem right">
                                    <i class="ri-timer-line"></i>
                                    <span>{{ $blog->created_at->locale('tr')->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="alan">
                            <div class="socialbar">
                                <div class="socialmedia">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="facebook">
                                                    <i class="ri-facebook-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="twitter">
                                                    <i class="ri-twitter-fill"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="whatsapp">
                                                    <i class="ri-whatsapp-line"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="telegram">
                                                    <i class="ri-telegram-line"></i>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="textareac">
                                <h2>{{ $blog->blog_title }}</h2>
                                <p>
                                {!! $blog->blog_description !!}
                                </p>
                                <div class="blogdetailfoot">
                                    <div class="tags">
                                        <div class="icon">
                                            #
                                        </div>
                                        <ul>
                                            <li>
                                                <a href="#">#instagram</a>
                                            </li>
                                            <li>
                                                <a href="#">#twitter</a>
                                            </li>
                                            <li>
                                                <a href="#">#fenomenpaket</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- teaxt -->
                        </div>
                    </div>
                </div><!-- colmd9 -->
                @endsection

