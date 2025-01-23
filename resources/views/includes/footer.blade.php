  <!-- footer area -->
  <footer class="footer-area ft-bg">
      <div class="footer-widget">
          <div class="container">
              <div class="row footer-widget-wrapper ptb-60 space-between" style="align-items: flex-start">
                  <div class="col-md-6 col-lg-3">
                      <div class="footer-widget-box about-us">
                          <a href="index.html" class="footer-logo">
                              <img src="{{ asset('assets/img/logo/meditech-logo-wh.png') }}" alt="">
                          </a>
                          <p class="mb-3">
                              At Meditechealthcare, we are dedicated to enhancing healthcare environments by providing high-quality hospital furniture and medical equipment designed to improve patient care and support healthcare professionals. 
                          </p>
                          <!--<ul class="footer-contact">-->
                          <!--    <li><i class="far fa-phone"></i><a href="tel:+919802300540"><span>+91 980 230 0540</span></a></li>-->
                          <!--    <li><i class="far fa-map-marker-alt"></i><span>Plot no 53, new aggersain market, near shiv-->
                          <!--        mandir, Agroha -125047 Hisar, Haryana</span></li>-->
                          <!--    <li><i class="far fa-envelope"></i><a href="mailto:mhchisar@gmail.com"><span-->
                          <!--                class="__cf_email__">mhchisar@gmail.com</span></a>-->
                          <!--    </li>-->
                          <!--</ul>-->
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-2">
                      <div class="footer-widget-box list">
                          <h4 class="footer-widget-title">Quick Links</h4>
                          <ul class="footer-list">
                              <li><a href="{{ route('index') }}">Home</a></li>
                              <li><a href="{{ route('about') }}">About Us</a></li>
                              <li><a href="{{ route('certification') }}">Certifications</a></li>
                              <li><a href="{{ route('contact') }}">Contact Us</a></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-2">
                      <div class="footer-widget-box list">
                          <h4 class="footer-widget-title">Product Category</h4>
                          <?php
                                use App\Models\Category;
                                $categories = Category::get();
                                ?>
                          <ul class="footer-list">
                              @foreach($categories as $cat)
                              <li><a href="{{ route('home_get_product', ['cat_url' => $cat->cat_url]) }}">{{$cat->cat_name}}</a></li>
                             @endforeach
                          </ul>
                      </div>
                  </div>
                  <div class="col-md-6 col-lg-4">
                      <div class="footer-widget-box list">
                          <h4 class="footer-widget-title">Contact Us</h4>
                          <ul class="footer-contact">
                              <!--<li><i class="far fa-phone"></i><a href="tel:+919802300540"><span>+91 980 230 0540</span></a></li>-->
                              <li><i class="far fa-phone"></i><a href="tel:+917015642820"><span>+91 701 564 2820</span></a></li>
                              <li><i class="far fa-envelope"></i><a href="mailto:mhchisar@gmail.com"><span
                                          class="__cf_email__">mhchisar@gmail.com</span></a>
                              </li>
                              <li><i class="far fa-envelope"></i><a href="mailto:meditechhealthcarehsr@gmail.com"><span
                                          class="__cf_email__">meditechhealthcarehsr@gmail.com</span></a>
                              </li>
                              <li><i class="far fa-map-marker-alt"></i><span>Plot no 53, new aggersain market, near shiv
                                  mandir, Agroha -125047 Hisar, Haryana</span></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="copyright">
          <div class="container">
              <div class="copyright-wrap">
                  <div class="row">
                      <div class="col-12 col-lg-6 align-self-center">
                          <p class="copyright-text">
                              &copy; Copyright <span id="date"></span> <a href="{{ route('index') }}"> MediTech Health
                                  Care.</a> Designed By <a href="https://codingnectar.com/" target="_blank">Coding Nectar</a>
                          </p>
                      </div>
                      <div class="col-12 col-lg-6 align-self-center">
                          <div class="footer-social">
                              <span>Follow Us:</span>
                              <!--<a href="#"><i class="fab fa-facebook-f"></i></a>-->
                              <a target="_blank" href="https://www.instagram.com/meditechhealthcarehsr/?igsh=dGVzaGVieDgzdmRv"><i class="fab fa-instagram"></i></a>
                              <a href="https://api.whatsapp.com/send?phone=+919802300540&text=Hello MediTech Healthcare, I'm interested one of your product."><i class="fab fa-whatsapp"></i></a>
                              <!--<a href="#"><i class="fab fa-linkedin-in"></i></a>-->
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- footer area end -->


  <!-- scroll-top -->
  <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
  <!-- scroll-top end -->


  <!-- modal quick shop-->
  <div class="modal quickview fade" id="quickview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="quickview" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                      class="far fa-xmark"></i></button>
              <div class="modal-body">
                  <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="contact-form">
                                <div class="contact-form-header">
                                    <h2>Get In Touch</h2>
                                    <p>Fill the form below or write us .We will help you as soon as possible.</p>
                                </div>
                                @include('includes.contact_form')
                            </div>
                        </div>
                      
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- modal quick shop end -->


  <!-- js -->
  <!--<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>-->
  <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/js/counter-up.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('assets/js/countdown.min.js') }}"></script>
  <script src="{{ asset('assets/js/wow.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  </body>


  <!-- Mirrored from live.themewild.com/fameo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Nov 2024 12:46:50 GMT -->

  </html>
