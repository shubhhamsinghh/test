<footer class="bg-5 bg-overlay-2">
    <div class="footer-top pt-60 pb-40">
        <div class="container">
            <div class="row justify-content-lg-between">
                <!-- Footer Single Item -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-single">
                        <figure><img src="{{asset('img/home-one/icon/logo.png')}}" alt=""></figure>
                        <h5>Oberoi Production</h5>
                        <div class="stay-with-content">
                            <p>It is a long established fact that a good reader on will be distracted by the by readable content of a page when looking at its layout. </p>
                        </div>
                    </div>
                </div>
                <!-- Footer Single Item -->
                <!-- Footer Single Item -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-single com-mt-50">
                        <h5>Links</h5>
                        <div class="footer-menu">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About</a></li>
                                <li><a href="{{route('contact')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Single Item -->
                <!-- Footer Single Item -->
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="footer-single com-mt-50">
                        <h5>Portfolio</h5>
                        <div class="footer-menu">
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{$category->cat_url}}">{{$category->cat_name}}</a></li>
                                @endforeach
                                <li><a href="cinematography">Cinematography</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Single Item -->
                <!-- Footer Single Item -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-single com-mt-50">
                        <h5>QUICK CONTACT</h5>
                        <div class="contact-info">
                            <ul>
                                <li>
                                    <p><i class="icofont-location-pin"></i> {{$company_info->comp_address}}</p>
                                </li>
                                <li>
                                    <p> <i class="icofont-ui-call"></i><a href="tel:{{$company_info->comp_contact1}}"> {{$company_info->comp_contact1}}</a></p>
                                </li>
                                <li>
                                    <p><i class="icofont-email"></i><a href="mailto:{{$company_info->comp_email1}}"> {{$company_info->comp_email1}} </a></p>
                                </li>
                            </ul>
                        </div>
                        <div class="footer-right-social mt-30">
                            <ul>
                                <li><a href="{{$company_info->comp_sm1}}"><i class="icofont icofont-facebook"></i></a></li>
                                <li><a href="{{$company_info->comp_sm2}}"><i class="icofont-instagram"></i></a></li>
                                <li><a href="{{$company_info->comp_sm3}}"><i class="icofont-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Footer Single Item -->
            </div>
        </div>
    </div>
    <!-- Footer Top Area End -->
    <!-- Footer Bottom Area Start -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer-bottom">
                    <div class="footer-left">
                        <p>© {{date('Y')}} <b class="text-white">OberoiProduction.</b> Made with <i class="fa fa-heart text-danger"></i> by <a target="_blank" href="https://codingnectar.com/"><b>Coding Nectar</b></a></p>
                    </div>
                    <div class="f-right footer-menu">
                        <ul>
                            <li><a href="#">Tearm & Condition</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom Area End -->
</footer>
			<!-- Footer Area End -->
		<!-- </div> -->
       <!-- Page Wraper Here Start -->
       
		<!-- all js here -->
        <script src="{{asset('js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
        <script src="{{asset('js/popper.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('js/plugins.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
		
		<!-- Revolution Slider JS -->
	    <script src="{{asset('assets/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
	    <script src="{{asset('assets/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
		<script src="{{asset('assets/revolution/revolution-active.js')}}"></script>
		
		<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
		<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('assets/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>

    </body>
</html>
