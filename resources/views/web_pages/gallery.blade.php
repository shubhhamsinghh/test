@extends('layouts.web_layout')
@section('header')
{!! $data->cat_dec_meta !!}
@endsection
@section('content')
<div class="page-content">
            <!-- Breadcamb Area Start -->
            <section class="breadcamb-area bg-overlay-1" style="background: url({{asset('images/category/'.$data->cat_des_ban_image)}})">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bradcamb-content text-center text-white text-uppercase">
                                <h1>{{strtoupper($data->cat_dec_heading)}}</h1>
                                <ul>
                                    <li><a href="{{route('index')}}">HOME <span>/</span></a></li>
                                    <li>{{strtoupper($data->cat_dec_heading)}}</li>
                                </ul>	
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<!-- Breadcamb Area End -->
            <div class="gallery-area pt-95 pb-100">
                <div class="container">
                    <!-- Latest Shot Main Area Start -->
                    <div class="our-gallery">
                        <!-- Latest Shot/Portfolio Menu Tab -->
                        <div class="grid gallery-box">
                            <div class="gallery-content row">
                                @foreach($details as $d)
                                <div class="grid-item col-lg-4 col-md-6 col-sm-12 c1">
                                    <!-- Latest Shot/Portfolio Single -->
                                    <div class="gallery-single">
                                        <div class="gallery-image">
                                            <img src="{{asset('images/category-detail/'.$d->cat_des_cimg)}}" alt="">
                                            <a href="{{asset('images/category-detail/'.$d->cat_des_cimg)}}" class="popup-gallery"><i class="icofont-search"></i></a>
                                        </div>
                                    </div>
                                    <!-- Latest Shot/Portfolio Single -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Latest Shot Main Area End -->
                </div>
            </div>
        </div>
@endsection
