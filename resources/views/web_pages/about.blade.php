@extends('layouts.web_layout')
@section('header')
<title>About Us - Oberoi Production</title>
@endsection
@section('content')
<div class="page-content">
            <section class="breadcamb-area bg-17 bg-overlay-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bradcamb-content text-center text-white text-uppercase">
                                <h1>ABOUT US</h1>
                                <ul>
                                    <li><a href="{{route('index')}}">HOME <span>/</span></a></li>
                                    <li>ABOUT US</li>
                                </ul>	
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Us Area Start -->
            <section class="about-area pt-100 pb-90">
                <div class="container">
                    <div class="row">
                        <!-- Section Titel -->
                        <div class="col-md-6 col-sm-6 col-sm-12">
                            <div class="section-titel-contact text-left">
                                <h3>WE ARE PROUD</h3>
                                <p>It is a long establishedgfdg fact that a reader will be distracted by the on readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                            </div>
                        </div>
                        <!-- Section Titel -->
                        <div class="col-md-6 col-sm-6 col-sm-12">
                            <div class="abt-sm-img">
                                <img src="img/other/about-2.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-12 col-sm-12">
                            <div class="abt-lrg-img">
                                <img src="img/other/about-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Us End -->
            <!-- Project Area Start -->
            <section class="campaign-count pb-80">
                @include('includes.stats')
			</section>
            <!-- Project Area End -->
            <!-- Our Team Area Start -->
            <section class="ourteam-area pt-95 pb-100">
                <div class="container">
                    <div class="row">
                        <!-- Section Titel -->
                        <div class="col-md-12">
                            <div class="section-titel text-left two">
                                <h2>OUR TEAM</h2>
                                <p>It is a long established fact that a reader will be distracted readable </p>
                            </div>
                        </div>
                        <!-- Section Titel -->
                    </div>
                    <!-- Service Main Area Start -->
                    <div class="team-area-main">
                        <div class="row overflow-hidden">
                            <div class="col-md-12 position-relative">
                                <div class="slider slider-for">
                                    <!-- Service Slider Single -->
                                    <div class="single-item">
                                        <div class="large-img">
                                            <img src="img/home-one/team/1.png" alt="">
                                        </div>
                                        <div class="thumb-content text-right">
                                            <div class="thumb-personal-info">
                                                <div class="teamper-titel">
                                                    <h5>THOMASH ALVIN</h5>
                                                    <span>Film Director</span>
                                                </div>
                                                <div class="team-social">
                                                    <ul>
                                                        <li><a href="#"><i class="icofont icofont-facebook"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-twitter"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-google-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in  randomised words which don't look even slightly believable.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Service Slider Single -->
                                    <!-- Service Slider Single -->
                                    <div class="single-item">
                                        <div class="large-img">
                                            <img src="img/home-one/team/2.png" alt="">
                                        </div>
                                        <div class="thumb-content text-right">
                                            <div class="thumb-personal-info">
                                                <div class="teamper-titel">
                                                    <h5>MOMENZ VONG</h5>
                                                    <span>Script Writer</span>
                                                </div>
                                                <div class="team-social">
                                                    <ul>
                                                        <li><a href="#"><i class="icofont icofont-facebook"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-twitter"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-google-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in  randomised words which don't look even slightly believable.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Service Slider Single -->
                                    <!-- Service Slider Single -->
                                    <div class="single-item">
                                        <div class="large-img">
                                            <img src="img/home-one/team/3.png" alt="">
                                        </div>
                                        <div class="thumb-content text-right">
                                            <div class="thumb-personal-info">
                                                <div class="teamper-titel">
                                                    <h5>JHONE DOE</h5>
                                                    <span>Assistant Director</span>
                                                </div>
                                                <div class="team-social">
                                                    <ul>
                                                        <li><a href="#"><i class="icofont icofont-facebook"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-twitter"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-google-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in  randomised words which don't look even slightly believable.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Service Slider Single -->
                                    <!-- Service Slider Single -->
                                    <div class="single-item">
                                        <div class="large-img">
                                            <img src="img/home-one/team/4.png" alt="">
                                        </div>
                                        <div class="thumb-content text-right">
                                            <div class="thumb-personal-info">
                                                <div class="teamper-titel">
                                                    <h5>MARK DOE</h5>
                                                    <span>Film Assistant</span>
                                                </div>
                                                <div class="team-social">
                                                    <ul>
                                                        <li><a href="#"><i class="icofont icofont-facebook"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-twitter"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-google-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in  randomised words which don't look even slightly believable.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Service Slider Single -->
                                    <!-- Service Slider Single -->
                                    <div class="single-item">
                                        <div class="large-img">
                                            <img src="img/home-one/team/5.png" alt="">
                                        </div>
                                        <div class="thumb-content text-right">
                                            <div class="thumb-personal-info">
                                                <div class="teamper-titel">
                                                    <h5>MOUNTAN KHAN</h5>
                                                    <span>Film Manager</span>
                                                </div>
                                                <div class="team-social">
                                                    <ul>
                                                        <li><a href="#"><i class="icofont icofont-facebook"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-twitter"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-google-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in  randomised words which don't look even slightly believable.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Service Slider Single -->
                                    <!-- Service Slider Single -->
                                    <div class="single-item">
                                        <div class="large-img">
                                            <img src="img/home-one/team/3.png" alt="">
                                        </div>
                                        <div class="thumb-content text-right">
                                            <div class="thumb-personal-info">
                                                <div class="teamper-titel">
                                                    <h5>ABULA DE</h5>
                                                    <span>Director Script</span>
                                                </div>
                                                <div class="team-social">
                                                    <ul>
                                                        <li><a href="#"><i class="icofont icofont-facebook"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-pinterest"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-twitter"></i></a></li>
                                                        <li><a href="#"><i class="icofont icofont-google-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in  randomised words which don't look even slightly believable.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Service Slider Single -->
                                </div>
                                <!-- Service Thumb Area Start -->
                                <div class="slider slider-nav">
                                    <div class="thumb-single">
                                        <img src="img/home-one/team/thumb-1.png" alt="">
                                    </div>
                                    <div class="thumb-single">
                                        <img src="img/home-one/team/thumb-2.png" alt="">
                                    </div>
                                    <div class="thumb-single">
                                        <img src="img/home-one/team/thumb-3.png" alt="">
                                    </div>
                                    <div class="thumb-single">
                                        <img src="img/home-one/team/thumb-4.png" alt="">
                                    </div>
                                    <div class="thumb-single">
                                        <img src="img/home-one/team/thumb-5.png" alt="">
                                    </div>
                                    <div class="thumb-single">
                                        <img src="img/home-one/team/thumb-3.png" alt="">
                                    </div>
                                </div>
                                <!-- Service Thumb Area Start -->
                            </div>
                        </div>
                        <!-- Service Main Area End -->
                    </div>
                </div>
            </section>

            <!-- Testimonial Area Start -->
            <section class="clientsay-area  pt-90 pb-100">
            @include('includes.testimonial')
			</section>
            <!-- Testimonial Area End -->
        </div>
@endsection
