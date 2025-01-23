@extends('layouts.web_layout')
@section('title'){{ $products[0]->sub_category->sub_cat_name }} - Meditech Healthcare @endsection
@section('description')@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url({{ asset('assets/img/breadcrumb/01.jpg') }})"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">{{ $products[0]->sub_category->sub_cat_name }}</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="{{route('index')}}"><i class="far fa-home"></i> Home</a></li>
                    <li>{{ $products[0]->category->cat_name }}</li>
                    <li class="active">{{ $products[0]->sub_category->sub_cat_name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- shop-area -->
    <div class="shop-area2 ptb-60">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-9">
                    <div class="shop-item-wrap item-list item-2">
                        <div class="row g-4">
                            <div class="category-item-grid">
                                @foreach ($products as $product)
                                    <div class="category-item">
                                        <a
                                            href="{{ route('home_get_product', ['cat_url' => $product->category->cat_url, 'sub_cat' => $product->sub_category->sub_cat_url, 'product' => $product->prod_url]) }}">
                                            <div class="category-info">
                                                <div class="icon">
                                                    <img src="{{ asset('images/products/' . $product->prod_image) }}"
                                                        alt="{{ $product->image_alt }}">
                                                </div>
                                                <div class="content">
                                                    <h4>{{ $product->prod_name }}</h4>
                                                    <p>{{ $product->model_no }}</p>
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
