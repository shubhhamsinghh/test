@extends('layouts.web_layout')
@section('header')
{!! $data->cat_meta !!}
@endsection
@section('content')
<div class="page-content">
            <section class="breadcamb-area bg-overlay-1" style="background: url({{asset('images/category/'.$data->cat_ban_image)}})">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bradcamb-content text-center text-white text-uppercase">
                                <h1>{{strtoupper($data->cat_name)}}</h1>
                                <ul>
                                    <li><a href="{{route('index')}}">HOME <span>/</span></a></li>
                                    <li>{{strtoupper($data->cat_name)}}</li>
                                </ul>	
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- All Service Area Start -->
            <section class="service-area service-style-two pt-100 pb-70 indicator-style">
                <div class="container">
                    <div class="row gap-25">
                        @foreach($details as $d)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="trailer-single">
                                <a href="{{route('web_portfolio',['url' => $data->cat_url, 'url2' => $d->cat_dec_url])}}">
                                    <div class="trailer-img">
                                        <img src="{{asset('images/category/'.$d->cat_des_image)}}" alt="">
                                    </div>
                                    <div class="trailer-titel">
                                        <h5><a href="{{route('web_portfolio',['url' => $data->cat_url, 'url2' => $d->cat_dec_url])}}">{{$d->cat_dec_heading}}</a></h5>
                                        <h6>{{$d->cat_images->count()}} Photos</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- All Service Area End -->
            <section class="service-area service-style-two pt-100 pb-70 indicator-style" style="color: #fff;">
                <div class="container">
                    <div class="content-wrap">
                        {!! $data->cat_detail_des !!}
                    </div>
                </div>
            </section>
        </div>
@endsection
