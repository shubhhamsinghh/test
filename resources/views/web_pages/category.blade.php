@extends('layouts.web_layout')
@section('title') {{ $cat->cat_name }} - Meditech Healthcare @endsection
@section('description') @endsection
@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">{{ $cat->cat_name }}</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ route('index') }}"><i class="far fa-home"></i> Home</a></li>
                    <li class="active">{{ $cat->cat_name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- shop-area -->
    <div class="shop-area2 py-90">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-9">
                    <div class="shop-item-wrap item-list item-2">
                        <div class="row g-4">
                            <div class="category-item-grid">
                                @foreach ($subCategories as $sub)
                                    <div class="category-item">
                                        <a
                                            href="{{ route('home_get_product', ['cat_url' => $sub->category->cat_url, 'sub_cat' => $sub->sub_cat_url]) }}">
                                            <div class="category-info">
                                                <div class="icon">
                                                    <img src="{{ asset('images/sub_category/' . $sub->sub_cat_image) }}"
                                                        alt="{{ $sub->image_alt }}">
                                                </div>
                                                <div class="content">
                                                    <h4>{{ $sub->sub_cat_name }}</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="shop-widget">
                            <h4 class="shop-widget-title">Category</h4>
                            <ul class="shop-category-list">
                                @foreach ($categories as $cat)
                                    <li><a
                                            href="{{ route('home_get_product', ['cat_url' => $cat->cat_url]) }}">{{ $cat->cat_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-area end -->
@endsection
