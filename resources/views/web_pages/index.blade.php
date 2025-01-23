@extends('layouts.web_layout')
@section('title')
    Meditech Healthcare
@endsection
@section('keywords')
    Meditech Healthcare
@endsection
@section('description')
    Meditech Healthcare
@endsection
@section('content')
    <!-- hero slider -->
    <div class="hero-section hs-1">
        <div class="container">
            <div class="hero-slider owl-carousel owl-theme">
                <div class="hero-single">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome
                                        to MediTech</h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        Excellence in Healthcare <span>Furniture</span> Solutions
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        Enhancing Patient Comfort and Hospital Efficiency with Premium-Quality Beds, Chairs,
                                        and Furniture Tailored for Healthcare Needs.
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="https://meditechealthcare.com/product/medical-bed" class="theme-btn">Products<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="{{ route('about') }}" class="theme-btn theme-btn2">Learn More<i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="hero-right" data-animation="fadeInRight" data-delay=".25s">
                                    <div class="hero-img">
                                        <div class="hero-img-item">
                                            <button type="button"><i class="far fa-plus"></i></button>
                                            <div class="hero-img-content">
                                                <img src="https://meditechealthcare.com/images/products/icubedcat3_78620.png" alt="">
                                                <div class="hero-img-info">
                                                    <h6><a href="#">ICU Electric Bed</a></h6>
                                                    <p>MHC/EB-02</p>
                                                    <a href="#"data-bs-toggle="modal" data-bs-target="#quickview" class="theme-btn">Inquiry Now<i
                                                            class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="https://meditechealthcare.com/images/products/icubedcat3_78620.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome
                                        to MediTech</h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                        Wide Range of <span>Operating Lights</span>
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        Illuminating excellence in surgical care and advanced operating lights for optimal clarity and precision.
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="https://meditechealthcare.com/product/operating-lights" class="theme-btn">Products<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="{{ route('about') }}" class="theme-btn theme-btn2">Learn More<i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="hero-right" data-animation="fadeInRight" data-delay=".25s">
                                    <div class="hero-img">
                                        <div class="hero-img-item">
                                            <button type="button"><i class="far fa-plus"></i></button>
                                            <div class="hero-img-content">
                                                <img src="assets/img/hero/medibann2.png" alt="">
                                                <div class="hero-img-info">
                                                    <h6><a href="#">Ceiling OT Light</a></h6>
                                                    <p>MHC/OTL-226</p>
                                                    <a href="#"data-bs-toggle="modal" data-bs-target="#quickview" class="theme-btn">Inquiry Now<i
                                                            class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/img/hero/medibann2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-single">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="hero-content">
                                    <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome
                                        to MediTech</h6>
                                    <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                       Crafting comforting <span>Operating Beds</span>
                                    </h1>
                                    <p data-animation="fadeInLeft" data-delay=".75s">
                                        From general surgery to specialized care.Our operating beds meet your needs Quality, reliability, and innovation.
                                    </p>
                                    <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                        <a href="https://meditechealthcare.com/product/medical-furniture" class="theme-btn">Products<i
                                                class="fas fa-arrow-right"></i></a>
                                        <a href="{{ route('about') }}" class="theme-btn theme-btn2">Learn More<i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="hero-right" data-animation="fadeInRight" data-delay=".25s">
                                    <div class="hero-img">
                                        <div class="hero-img-item">
                                            <button type="button"><i class="far fa-plus"></i></button>
                                            <div class="hero-img-content">
                                                <img src="assets/img/hero/mtbanner1.png" alt="">
                                                <div class="hero-img-info">
                                                    <h6><a href="#">Pediatric ICU Bed</a></h6>
                                                    <p>MHC/EB-001</p>
                                                    <a href="#"data-bs-toggle="modal" data-bs-target="#quickview" class="theme-btn">Inquiry Now<i
                                                            class="fas fa-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="assets/img/hero/mtbanner1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- hero slider end -->

    <!-- latest item -->
    <div class="product-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                    <div class="site-heading-inline">
                        <h2 class="site-title">Our Products</h2>
                    </div>
                </div>
            </div>
            <div class="product-wrap item-big wow fadeInUp" data-wow-delay=".25s">
                <div class="product-slider2 owl-carousel owl-theme">
                    @foreach ($products as $product)
                        <div class="product-item">
                            <div class="product-img">
                                <!-- <span class="type new">New</span> -->
                                <a
                                    href="{{ route('home_get_product', ['cat_url' => $product->category->cat_url, 'sub_cat' => $product->sub_category->sub_cat_url, 'product' => $product->prod_url]) }}"><img
                                        src="{{ asset('images/products/' . $product->prod_image) }}"
                                        alt="{{ $product->image_alt }}"></a>
                                {{-- <div class="product-action-wrap">
                            <div class="product-action">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                    data-tooltip="tooltip" title="Quick View"><i class="far fa-eye"></i></a>
                            </div>
                        </div> --}}
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a
                                        href="{{ route('home_get_product', ['cat_url' => $product->category->cat_url, 'sub_cat' => $product->sub_category->sub_cat_url, 'product' => $product->prod_url]) }}">{{ $product->prod_name }}</a>
                                </h3>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>{{ $product->model_no }}</span>
                                    </div>
                                </div>
                                 <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- latest item end-->

    <!-- category area -->
    <div class="category-area ptb-60 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                    <div class="site-heading-inline">
                        <h2 class="site-title">Category</h2>
                        <!--<a href="#">View More <i class="fas fa-angle-double-right"></i></a>-->
                    </div>
                </div>
            </div>
            <div class="category-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
                @foreach ($categories as $category)
                    <div class="category-item">
                        <a href="{{ route('home_get_product', ['cat_url' => $category->cat_url]) }}">
                            <div class="category-info">
                                <div class="icon">
                                    <img src="{{ asset('images/category/' . $category->cat_image) }}"
                                        alt="{{ $category->image_alt }}">
                                </div>
                                <div class="content">
                                    <h4>{{ $category->cat_name }}</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- category area end-->


    <!-- small banner -->
    <div class="small-banner pb-100">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="banner-item">
                        <img src="assets/img/banner/mini-banner-11.png" alt="">
                        <div class="banner-content">
                            <p>We Provide</p>
                            <h3>Top Rated Operating<br> Beds for Hospitals </h3>
                            <a href="https://meditechealthcare.com/product/medical-bed">Discover Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="banner-item">
                        <img src="assets/img/banner/mini-banner-22.png" alt="">
                        <div class="banner-content">
                            <p>We Provide</p>
                            <h3>Advanced Surgical<br> Lightning Solutions</h3>
                            <a href="https://meditechealthcare.com/product/operating-lights">Discover Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="banner-item">
                        <img src="assets/img/banner/mini-banner-3.jpg" alt="">
                        <div class="banner-content">
                            <p>We Provide</p>
                            <h3>Extensive Range <br>of Hospital Equipment</h3>
                            <a href="https://meditechealthcare.com/product/medical-furniture">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- small banner end -->

    <!-- big banner -->
    <div class="big-banner">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="banner-wrap" style="background-image: url(assets/img/banner/big-banner2.png);">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="banner-content">
                            <div class="banner-info">
                                <h6>Mega Collections</h6>
                                <h2>Upgrade Your <span>Healthcare Facility</span> Now</h2>
                                <p>at our place</p>
                            </div>
                            <a href="#"data-bs-toggle="modal" data-bs-target="#quickview" class="theme-btn">Inquire Now<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- big banner end -->

    <!-- feature area -->
    <div class="feature-area ptb-60 pb-0">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="feature-wrap">
                <div class="row g-0">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fal fa-truck"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Quality Material</h4>
                                <p>The quality and standard of our product is very high</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fal fa-sync"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Trained Workers</h4>
                                <p>Everyone here at MediTech Health care is highly trained</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fal fa-wallet"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Time Availability</h4>
                                <p>We are always available for our clients and customers.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fal fa-headset"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Quick Response</h4>
                                <p>We always try to response as much as quick as possible</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature area end -->


    <!-- popular item -->
    <div class="product-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                    <div class="site-heading-inline item-tab">
                        <h2 class="site-title">Poduct Category</h2>
                        <ul class="nav nav-pills mt-3" id="item-tab" role="tablist">
                            <!--<li class="nav-item" role="presentation">-->
                            <!--    <button class="nav-link active" id="item-tab1" data-bs-toggle="pill"-->
                            <!--        data-bs-target="#pill-item-tab1" type="button" role="tab"-->
                            <!--        aria-controls="pill-item-tab1" aria-selected="true">All Items</button>-->
                            <!--</li>-->
                            @foreach ($categories as $key => $category)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{($key ==0)?'active':''}}" id="item-tab{{ $category->id }}" data-bs-toggle="pill"
                                        data-bs-target="#pill-item-tab{{ $category->id }}" type="button" role="tab"
                                        aria-controls="pill-item-tab{{ $category->id }}"
                                        aria-selected="false">{{ $category->cat_name }}</button>
                                </li>
                            @endforeach
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content wow fadeInUp" data-wow-delay=".25s" id="item-tabContent">
                @foreach($categories as $key => $category)
                    <div class="tab-pane {{($key ==0)?'show active':''}}" id="pill-item-tab{{ $category->id }}" role="tabpanel"
                        aria-labelledby="item-tab{{ $category->id }}" tabindex="0">
                        <div class="row g-3">
                            <?php 
                    $product = \App\Models\Product::with('sub_category')->where('category_id',$category->id)->where('tab_product', '1')->get();
                    if(count($product) > 0){
                        foreach($product as $p){
                    ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="product-item">
                                    <div class="product-img">
                                       
                                        <a
                                            href="{{ route('home_get_product', ['cat_url' => $category->cat_url, 'sub_cat' => $p->sub_category->sub_cat_url, 'product' => $p->prod_url]) }}"><img
                                                src="{{ asset('images/products/' . $p->prod_image) }}"
                                                alt="{{ $p->image_alt }}"></a>
                                        
                                    </div>
                                    <div class="product-content">
                                        <h3 class="product-title"><a
                                                href="{{ route('home_get_product', ['cat_url' => $category->cat_url, 'sub_cat' => $p->sub_category->sub_cat_url, 'product' => $p->prod_url]) }}">{{ $p->prod_name }}</a>
                                        </h3>
                                        <div class="product-bottom">
                                            <div class="product-price">
                                                <span>{{ $p->model_no }}</span>
                                            </div>
                                        </div>
                                        <div class="product-rate">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } } ?>
                            {{-- <div class="col-md-6 col-lg-4 col-xl">
                        <div class="product-item">
                            <div class="product-img">
                                <span class="type hot">Hot</span>
                                <a href="shop-single.html"><img src="assets/img/product/11.png" alt=""></a>
                                <div class="product-action-wrap">
                                    <div class="product-action">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                            data-bs-placement="top" data-tooltip="tooltip" title="Quick View"><i
                                                class="far fa-eye"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Compare"><i class="far fa-arrows-repeat"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>$250.00</span>
                                    </div>
                                    <button type="button" class="product-cart-btn" data-bs-placement="left"
                                        data-tooltip="tooltip" title="Add To Cart">
                                        <i class="far fa-shopping-bag"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl">
                        <div class="product-item">
                            <div class="product-img">
                                <span class="type oos">Out Of Stock</span>
                                <a href="shop-single.html"><img src="assets/img/product/12.png" alt=""></a>
                                <div class="product-action-wrap">
                                    <div class="product-action">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                            data-bs-placement="top" data-tooltip="tooltip" title="Quick View"><i
                                                class="far fa-eye"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Compare"><i class="far fa-arrows-repeat"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>$250.00</span>
                                    </div>
                                    <button type="button" class="product-cart-btn" data-bs-placement="left"
                                        data-tooltip="tooltip" title="Add To Cart">
                                        <i class="far fa-shopping-bag"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                        </div>
                    </div>
                @endforeach
                {{-- <div class="tab-pane" id="pill-item-tab3" role="tabpanel" aria-labelledby="item-tab3" tabindex="0">
                <div class="row g-3">
                    <div class="col-md-6 col-lg-4 col-xl">
                        <div class="product-item">
                            <div class="product-img">
                                <span class="type new">New</span>
                                <a href="shop-single.html"><img src="assets/img/product/17.png" alt=""></a>
                                <div class="product-action-wrap">
                                    <div class="product-action">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                            data-bs-placement="top" data-tooltip="tooltip" title="Quick View"><i
                                                class="far fa-eye"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Compare"><i class="far fa-arrows-repeat"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>$250.00</span>
                                    </div>
                                    <button type="button" class="product-cart-btn" data-bs-placement="left"
                                        data-tooltip="tooltip" title="Add To Cart">
                                        <i class="far fa-shopping-bag"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl">
                        <div class="product-item">
                            <div class="product-img">
                                <span class="type hot">Hot</span>
                                <a href="shop-single.html"><img src="assets/img/product/18.png" alt=""></a>
                                <div class="product-action-wrap">
                                    <div class="product-action">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                            data-bs-placement="top" data-tooltip="tooltip" title="Quick View"><i
                                                class="far fa-eye"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Compare"><i class="far fa-arrows-repeat"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>$250.00</span>
                                    </div>
                                    <button type="button" class="product-cart-btn" data-bs-placement="left"
                                        data-tooltip="tooltip" title="Add To Cart">
                                        <i class="far fa-shopping-bag"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl">
                        <div class="product-item">
                            <div class="product-img">
                                <span class="type oos">Out Of Stock</span>
                                <a href="shop-single.html"><img src="assets/img/product/19.png" alt=""></a>
                                <div class="product-action-wrap">
                                    <div class="product-action">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                            data-bs-placement="top" data-tooltip="tooltip" title="Quick View"><i
                                                class="far fa-eye"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Compare"><i class="far fa-arrows-repeat"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>$250.00</span>
                                    </div>
                                    <button type="button" class="product-cart-btn" data-bs-placement="left"
                                        data-tooltip="tooltip" title="Add To Cart">
                                        <i class="far fa-shopping-bag"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pill-item-tab4" role="tabpanel" aria-labelledby="item-tab4" tabindex="0">
                <div class="row g-3">
                    <div class="col-md-6 col-lg-4 col-xl">
                        <div class="product-item">
                            <div class="product-img">
                                <span class="type new">New</span>
                                <a href="shop-single.html"><img src="assets/img/product/22.png" alt=""></a>
                                <div class="product-action-wrap">
                                    <div class="product-action">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                            data-bs-placement="top" data-tooltip="tooltip" title="Quick View"><i
                                                class="far fa-eye"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Compare"><i class="far fa-arrows-repeat"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>$250.00</span>
                                    </div>
                                    <button type="button" class="product-cart-btn" data-bs-placement="left"
                                        data-tooltip="tooltip" title="Add To Cart">
                                        <i class="far fa-shopping-bag"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl">
                        <div class="product-item">
                            <div class="product-img">
                                <span class="type hot">Hot</span>
                                <a href="shop-single.html"><img src="assets/img/product/23.png" alt=""></a>
                                <div class="product-action-wrap">
                                    <div class="product-action">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                            data-bs-placement="top" data-tooltip="tooltip" title="Quick View"><i
                                                class="far fa-eye"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Compare"><i class="far fa-arrows-repeat"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>$250.00</span>
                                    </div>
                                    <button type="button" class="product-cart-btn" data-bs-placement="left"
                                        data-tooltip="tooltip" title="Add To Cart">
                                        <i class="far fa-shopping-bag"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl">
                        <div class="product-item">
                            <div class="product-img">
                                <span class="type oos">Out Of Stock</span>
                                <a href="shop-single.html"><img src="assets/img/product/24.png" alt=""></a>
                                <div class="product-action-wrap">
                                    <div class="product-action">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickview"
                                            data-bs-placement="top" data-tooltip="tooltip" title="Quick View"><i
                                                class="far fa-eye"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Wishlist"><i class="far fa-heart"></i></a>
                                        <a href="#" data-bs-placement="top" data-tooltip="tooltip"
                                            title="Add To Compare"><i class="far fa-arrows-repeat"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3 class="product-title"><a href="shop-single.html">Simple Denim Chair</a></h3>
                                <div class="product-rate">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <div class="product-bottom">
                                    <div class="product-price">
                                        <span>$250.00</span>
                                    </div>
                                    <button type="button" class="product-cart-btn" data-bs-placement="left"
                                        data-tooltip="tooltip" title="Add To Cart">
                                        <i class="far fa-shopping-bag"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </div>
    <!-- popular item end -->


    <!-- choose-area -->
    <div class="choose-area ptb-60">
        <div class="container">
            <div class="row g-4 align-items-center wow fadeInDown" data-wow-delay=".25s">
                <div class="col-lg-4">
                    <span class="site-title-tagline">Why Choose Us</span>
                    <h2 class="site-title">We Provide Hospitality Through Premium Furniture</h2>
                </div>
                <div class="col-lg-4">
                    <p>We provide premium quality furniture,to elevate healthcare environments. Our expert designers merge functionality, comfort, and style to create exceptional spaces for patients, families, and healthcare professionals. With focus on durability and sustainability, our furniture stands the test of time, ensuring optimal performance and aesthetic appeal.</p>
                </div>
                <div class="col-lg-4">
                    <div class="choose-img">
                        <img src="assets/img/choose/01.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="choose-content wow fadeInUp" data-wow-delay=".25s">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="assets/img/icon/warranty.svg" alt="">
                            </div>
                            <div class="choose-info">
                                <h4>Furniture Quality</h4>
                                <p>Uncompromising quality for exceptional patient care. Durable, ergonomic, and easy-to-clean designs.Certified materials and rigorous testing. Reliable and safe furniture solutions.Enhancing patient comfort.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="assets/img/icon/price.svg" alt="">
                            </div>
                            <div class="choose-info">
                                <h4>Wide Range</h4>
                                <p>Comprehensive furniture solutions.
Hospital beds to waiting area furniture.Innovative, functional, and comfortable.Meeting healthcare professionals' requirements.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="choose-item">
                            <div class="choose-icon">
                                <img src="assets/img/icon/delivery.svg" alt="">
                            </div>
                            <div class="choose-info">
                                <h4>Customer Support</h4>
                                <p>As your trusted healthcare partner, we prioritize supportive care. Our experienced professionals deliver customized solutions, addressing unique challenges and providing expert guidance for product optimization.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- choose-area end-->


    <!-- about area -->
    <div class="about-area ptb-60 mb-30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                        <div class="about-img">
                            <img class="img-1" src="assets/img/about/001.png" alt="">
                            <img class="img-2" src="assets/img/about/002.png" alt="">
                            <img class="img-3" src="assets/img/about/003.png" alt="">
                        </div>
                        <div class="about-experience">
                            <div class="about-experience-icon">
                                <img src="assets/img/icon/experience.svg" alt="">
                            </div>
                            <b>5+ Years Of <br> Experience</b>
                        </div>
                        <div class="about-shape">
                            <img src="assets/img/shape/01.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                        <div class="site-heading mb-3">
                            <span class="site-title-tagline justify-content-start">
                                <i class="flaticon-drive"></i> About Us
                            </span>
                            <h2 class="site-title">
                                We Provide <span> Premium Hospital Furniture</span> and <span>Medical Equipment </span> Solution
                            </h2>
                        </div>
                        <p>
                            At Meditechealthcare, we are dedicated to enhancing healthcare environments by providing high-quality hospital furniture and medical equipment designed to improve patient care and support healthcare professionals. With years of experience in the industry, we understand the critical role that comfortable, durable, and functional equipment plays in hospitals, clinics, and healthcare facilities.
                        </p>
                        <p>Our extensive range of products includes everything from patient beds and stretchers to examination tables, medical carts, and specialty furniture. Each piece is carefully designed with a focus on patient comfort, ease of use, and safety, while meeting the rigorous standards of healthcare regulations.</p>
                        <div class="about-list">
                            <ul>
                                <li><i class="fas fa-check-double"></i> ISO 9001 : 2015</li>
                                <li><i class="fas fa-check-double"></i> ISO 13485 : 2016</li>
                                <li><i class="fas fa-check-double"></i> INDIAN CE</li>
                                <li><i class="fas fa-check-double"></i> USFDA ACCREDITATION</li>
                                <li><i class="fas fa-check-double"></i> Msme/ Udyam</li>
                                <li><i class="fas fa-check-double"></i>  IEC 60601-1:2022</li>
                                <li><i class="fas fa-check-double"></i> ANSI/BIFMA E3-2012</li>
                                <li><i class="fas fa-check-double"></i> ISO 14001:2015</li>
                                <li><i class="fas fa-check-double"></i> ISO 45001:2018(OHSAS)</li>
                                <li><i class="fas fa-check-double"></i> ISO/IEC 17025</li>
                                <li><i class="fas fa-check-double"></i> NABL/NABH TEST CERTIFICATE</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->


    <!-- deal area -->
    <div class="deal-area bg pt-50 pb-50">
        <div class="deal-text-shape">Deal</div>
        <div class="container">
            <div class="deal-wrap wow fadeInUp" data-wow-delay=".25s">
                <div class="deal-slider owl-carousel owl-theme">
                    <div class="deal-item">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="deal-content">
                                    <div class="deal-info">
                                        <span>This Week Deal</span>
                                        <h1>Grab the Opportunity</h1>
                                        <p>Discover unbeatable offers on our comprehensive range of hospital furniture, designed to enhance patient comfort, safety, and satisfaction. From operating tables and surgical lights to hospital beds and medical storage solutions, our products are crafted with precision and care.</p>
                                    </div>
                                    <div class="deal-countdown">
                                        <div class="countdown" data-countdown="2024/12/10"></div>
                                    </div>
                                    <a href="#"data-bs-toggle="modal" data-bs-target="#quickview" class="theme-btn theme-btn2">Inquiry Now <i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="deal-img">
                                    <img src="assets/img/product/ot-tanle-deal.png" alt="">
                                    <!--<div class="deal-discount">-->
                                    <!--    <span>10%</span>-->
                                    <!--    <span>off</span>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- deal area end -->

    <!-- brand area -->
    <div class="brand-area bg pt-50 pb-50">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="site-title">Trusted by over <span>100+</span> companies</h2>
                    </div>
                </div>
            </div>
            <div class="brand-slider owl-carousel owl-theme">
                <div class="brand-item">
                    <img src="assets/img/brand/01.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="assets/img/brand/02.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="assets/img/brand/03.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="assets/img/brand/04.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="assets/img/brand/05.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="assets/img/brand/06.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- brand area end -->

    <!-- testimonial area -->
    <div class="testimonial-area bg ts-bg ptb-60">
        @include('includes.testimonial')
    </div>
    <!-- testimonial area end -->
@endsection
