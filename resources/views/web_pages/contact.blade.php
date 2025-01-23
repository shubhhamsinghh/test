@extends('layouts.web_layout')
@section('title')
    Contact Us - Meditech Healthcare
@endsection
@section('keywords')
    Contact Us - Meditech Healthcare
@endsection
@section('description')
    Contact Us - Meditech Healthcare
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Contact Us</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>
                    <li class="active">Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- contact area -->
    <div class="contact-area ptb-60">
        <div class="container">
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="contact-info">
                                        <div class="contact-info-icon">
                                            <i class="fal fa-headset"></i>
                                        </div>
                                        <div class="contact-info-content">
                                            <h5>Call Us</h5>
                                            <p>+91 980 230 0540</p>
                                            <p>+91 701 564 2820</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-info">
                                        <div class="contact-info-icon">
                                            <i class="fal fa-envelopes"></i>
                                        </div>
                                        <div class="contact-info-content">
                                            <h5>Email Us</h5>
                                            <p><a href="mailto:mhchisar@gmail.com"
                                                    class="__cf_email__">mhchisar@gmail.com</a></p>
                                            <p><a href="mailto:Mhchisar1@gmail.com"
                                                    class="__cf_email__">Mhchisar1@gmail.com</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-info">
                                        <div class="contact-info-icon">
                                            <i class="fal fa-map-location-dot"></i>
                                        </div>
                                        <div class="contact-info-content">
                                            <h5>Office Address</h5>
                                            <p>Plot no 53, new aggersain market, near shiv mandir, Agroha -125047 Hisar
                                                Haryana</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="contact-info">
                                        <div class="contact-info-icon">
                                            <i class="fal fa-map-location-dot"></i>
                                        </div>
                                        <div class="contact-info-content">
                                            <h5>Workspace Address</h5>
                                            <p>Mini industrial area, behind power house , Chandigarh Road, Bhuna 125111
                                                District Fatehabad Haryana</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
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
    <!-- end contact area -->
    <!-- newsletter area -->
    <!--<div class="newsletter-area pb-100">-->
    <!--    <div class="container wow fadeInUp" data-wow-delay=".25s">-->
    <!--        <div class="newsletter-wrap">-->
    <!--            <div class="row">-->
    <!--                <div class="col-lg-6 mx-auto">-->
    <!--                    <div class="newsletter-content">-->
    <!--                        <h3>Get <span>20%</span> Off Discount Coupon</h3>-->
    <!--                        <p>By Subscribe Our Newsletter</p>-->
                            
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- newsletter area end -->


    <!-- map -->
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3478.7146193717176!2d75.63634927552634!3d29.32004577529631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjnCsDE5JzEyLjIiTiA3NcKwMzgnMjAuMSJF!5e0!3m2!1sen!2sin!4v1732029243354!5m2!1sen!2sin" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- end map -->
@endsection
