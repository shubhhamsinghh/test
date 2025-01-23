<link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.png') }}">
<!-- css -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/all-fontawesome.min.css?v2') }}">
<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css?v11') }}">
</head>

<body>
    <header class="header">
        <div class="header-top">
            <div class="container">
                <div class="header-top-wrapper">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-7">
                            <div class="header-top-left">
                                <ul class="header-top-list">
                                    <li><a href="mailto:mhchisar@gmail.com"><i
                                                class="far fa-envelopes"></i>
                                            <span class="__cf_email__">mhchisar@gmail.com</span></a></li>
                                    <li class="secondary_mail"><a href="mailto:meditechhealthcarehsr@gmail.com"><i
                                                class="far fa-envelopes"></i>
                                            <span class="__cf_email__">meditechhealthcarehsr@gmail.com</span></a></li>
                                    <!--<li><a href="tel:+919802300540"><i class="far fa-headset"></i> +91 980 230 0540</a>-->
                                    <!--</li>-->
                                    <li><a href="tel:+917015642820"><i class="far fa-headset"></i> +91 701 564 2820</a>
                                    </li>
                                    <li class="help"><a href="#"data-bs-toggle="modal" data-bs-target="#quickview" ><i class="far fa-comment-question"></i> Need
                                            Help?</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                            <div class="header-top-right">
                                <ul class="header-top-list">
                                    <li class="social">
                                        <div class="header-top-social">
                                            <span>Follow Us: </span>
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <!-- <a href="#"><i class="fab fa-x-twitter"></i></a> -->
                                            <a target="_blank" href="https://www.instagram.com/meditechhealthcarehsr/?igsh=dGVzaGVieDgzdmRv"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top end -->
        <!-- navbar -->
        <div class="main-navigation">
            <nav class="navbar navbar-expand-lg">
                <div class="container position-relative">
                    <a class="navbar-brand" href="{{route('index')}}">
                        <img src="{{asset('assets/img/logo/logo.png')}}" alt="logo">
                    </a>
                    <div class="mobile-menu-right">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                            aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <a href="index.html" class="offcanvas-brand" id="offcanvasNavbarLabel">
                                <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                                <?php
                                use App\Models\Category;
                                $categories = Category::with('sub_cat_order')->get();
                                ?>
                                <li class="nav-item mega-menu dropdown">
                                    <a class="nav-link dropdown-toggle" href="#"
                                        data-bs-toggle="dropdown">Products</a>
                                    <div class="dropdown-menu fade-down">
                                        <div class="mega-content">
                                            <div class="container-fluid px-lg-0">
                                                <div class="row space-between" style="align-items:flex-start">
                                                    @foreach ($categories as $cat)
                                                        <div class="col-12 col-lg-3">
                                                            <h5 class="mega-menu-title">{{ $cat->cat_name }}</h5>
                                                            @if(count($cat->sub_cat_order) > 0)
                                                                @foreach ($cat->sub_cat_order as $sub_cat)
                                                                    <ul class="mega-menu-item">
                                                                        <li><a class="dropdown-item"
                                                                                href="{{ route('home_get_product', ['cat_url' => $cat->cat_url, 'sub_cat' => $sub_cat->sub_cat_url]) }}">{{ $sub_cat->sub_cat_name }}</a>
                                                                        </li>
                                                                    </ul>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item"><a class="nav-link"
                                        href="{{ route('certification') }}">Certifications</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- navbar end -->

    </header>
    <!-- header area end -->


    <!-- popup search -->
    <div class="search-popup">
        <button class="close-search"><span class="far fa-times"></span></button>
        <form action="#">
            <div class="form-group">
                <input type="search" name="search-field" class="form-control" placeholder="Search Here..."
                    required>
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- popup search end -->
