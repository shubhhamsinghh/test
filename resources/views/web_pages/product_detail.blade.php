@extends('layouts.web_layout')
@section('title') {{ $product->prod_name }} - Meditech Healthcare @endsection
@section('description') @endsection
@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">{{ $product->prod_name }}</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ route('index') }}"><i class="far fa-home"></i> Home</a></li>
                    <li>{{ $product->category->cat_name }}</li>
                    <li>{{ $product->sub_category->sub_cat_name }}</li>
                    <li class="active">{{ $product->prod_name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- shop single -->
    <div class="shop-single pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xxl-12">
                    <div class="shop-single-gallery">
                        <div class="flexslider-thumbnails">
                            <ul class="slides">
                                <li class="text-center">
                                    <img src="{{ asset('images/products/' . $product->prod_image) }}"
                                        alt="{{ $product->image_alt }}">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xxl-12">
                    <div class="shop-single-info">
                        <h4 class="shop-single-title text-center">{{ $product->prod_name }}</h4>
                        <h5 class="text-center">{{ $product->model_no }}</h5>
                        <div class="shop-single-rating text-center">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star-half-alt"></i>
                            <!--<span class="rating-count"> (4 Customer Reviews)</span>-->
                        </div>
                        <div class="invoice-table">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop single end -->
@endsection
