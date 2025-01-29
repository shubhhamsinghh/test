<link rel="apple-touch-icon" href="{{asset('img/home-one/apple-touch-icon.html')}}">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
        <!-- Place favicon.ico in the root directory -->
		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/icofont.css')}}">
        <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('css/meanmenu.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/plugins.cs')}}s">
        <link rel="stylesheet" href="{{asset('css/shortcode/shortcodes.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
        <link rel="stylesheet" href="{{asset('fonts/stylesheet.css')}}">
		
		<!-- Revolution Slider CSS -->
		<link href="{{asset('assets/revolution/css/settings.css')}}" rel="stylesheet">
		<link href="{{asset('assets/revolution/css/navigation.css')}}" rel="stylesheet">
		<link href="{{asset('assets/revolution/custom-setting.css')}}" rel="stylesheet">

        <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
        <div class="page-wraper home-production two-blck default-bg" id="main-home">
			<!-- Header Area Start -->
			<header>
				<!-- Header Menu Area Start -->
				<div class="header-menu header header-style-2" id="sticky-header">
					<div class="container-fluid pl-135 pr-150">
						<div class="row align-items-center">
							<!-- Menu Area Start -->
							<div class="col d-lg-block d-md-none d-sm-none d-none">
								<div class="main-menu text-left">
									<nav>
										<ul>
											<li class="{{ request()->route()->getName() == 'index' ? 'active' : '' }}">
                                                <a href="{{route('index')}}">Home</a>
											</li>
											<li class="{{ request()->route()->getName() == 'about' ? 'active' : '' }}"><a href="{{route('about')}}">About</a></li>
											<li class="{{ request()->route()->getName() == 'web_portfolio' ? 'active' : '' }} {{ request()->route()->getName() == 'cinematography' ? 'active' : '' }}"><a href="#">Portfolio</a>
												<ul>
												   @foreach($categories as $category)
												   <li  class="{{ request()->route()->getName() == 'web_portfolio' ? 'active' : '' }}"><a href="{{route('web_portfolio',['url' => $category->cat_url])}}">{{$category->cat_name}}</a></li>
												   @endforeach
													<li class="{{ request()->route()->getName() == 'cinematography' ? 'active' : '' }}"><a href="{{route('cinematography')}}">Cinematography</a></li>
												</ul>
											</li>
											<li class="{{ request()->route()->getName() == 'contact' ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
										</ul>
									</nav>
								</div>
							</div>
							<!-- Logo Area Start -->
							<div class="col col-md-auto">
								<div class="logo-img">
									<a href="{{route('index')}}"><img src="{{asset('img/home-one/icon/logo.png')}}" alt=""></a>
								</div>
							</div>
							<!-- Logo Area End -->
							<div class="col align-self-center d-lg-block d-md-block d-sm-none d-none">
								<div class="pro-mre-btn text-right">
									<a href="tel:{{$company_info->comp_contact1}}">Call Now</a>
								</div>
							</div>
						</div>
					</div>
					<!-- MOBILE-MENU-AREA START --> 
					<div class="mobile-menu-area">
						<div class="container">
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="mobile-area">
										<div class="mobile-menu">
											<nav id="mobile-nav">
												<ul>
													<li class="active">
                                                        <a href="{{route('index')}}">Home</a>
													</li>
													<li><a href="{{route('about')}}">About</a></li>
													<li><a href="#">Portfolio</a>
													   <ul>
														@foreach($categories as $category)
														<li><a href="{{route('web_portfolio',['url' => $category->cat_url])}}">{{$category->cat_name}}</a></li>
													    @endforeach
														<li><a href="{{route('cinematography')}}">Cinematography</a></li>
													  </ul>
													</li>
													<!-- <li>
                                                        <a href="portfolio.php"> Portfolio </a>
													</li> -->
													<li><a href="{{route('contact')}}">Contact</a></li>
												</ul>
											</nav>
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- MOBILE-MENU-AREA END  -->
				</div>
				<!-- Header Menu Area Start -->
				<!-- Slider Area Start -->
				
				<!-- Slider Area End -->
			</header>