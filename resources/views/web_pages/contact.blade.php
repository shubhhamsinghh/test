@extends('layouts.web_layout')
@section('title')
<title>Contact Us - Oberoi Production</title>
@endsection
@section('content')
<div class="page-content">
            <section class="breadcamb-area bg-17 bg-overlay-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bradcamb-content text-center text-white text-uppercase">
                                <h1>CONTACT US</h1>
                                <ul>
                                    <li><a href="index.html">HOME <span>/</span></a></li>
                                    <li>CONTACT US</li>
                                </ul>	
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="contact-us-area pt-90 pb-100">
                <div class="container">
                    <div class="row">
                        <!-- Section Title -->
                        <div class="col-lg-6 col-md-12">
                            <div class="section-titel-contact text-left">
                                <h3>QUICK CONTACT</h3>
                                <p>It is a long established fact that a reader will be distracted by the on readable content of a page when looking at its layout. The point of using Lorem Ipsum is that logic.</p>
                            </div>
                        </div>
                        <!-- Section Title -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-us-map">
                                
                                <!-- Google Map Area Start -->
                                <div class="google-map-area w-100">
                                    {!! $company_info->comp_map !!}
                                </div>
                                <!-- Google Map Area Start -->

                                <div class="contact-address">
                                    <div class="contact-adres-single">
                                        <h4>ADDRESS</h4>
                                        <p>{{$company_info->comp_address}}</p>
                                    </div>
                                    <div class="contact-adres-single">
                                        <h4>E-mail</h4>
                                        <p>{{$company_info->comp_email1}}</p>
                                    </div>
                                    <div class="contact-adres-single">
                                        <h4>PHONE</h4>
                                        <p>{{$company_info->comp_contact1}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @include('includes.contact_form')
        </div>
@endsection
