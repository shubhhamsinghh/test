@extends('layouts.web_layout')
@section('header')
    <title> Thank You </title> 

@endsection
@section('content')
<div class="page-content">
            <!-- Breadcamb Area Start -->
            <section class="breadcamb-area bg-17 bg-overlay-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bradcamb-content text-center text-white text-uppercase">
                                <h1>Thank You</h1>
                                <ul>
                                    <li><a href="{{route('index')}}">HOME <span>/</span></a></li>
                                    <li>Thank You</li>
                                </ul>	
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <div class="error-area py-100">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <div class="error-wrapper">
                    <div class="error-img">
                        <img src="assets/img/error/thank-you.png" alt="">
                    </div>
                    <!--<h2>Thank you</h2>-->
                    <h5>Thank you for submitting the form. We will revert back to you shortly!!!</h5>
                    <a href="{{route('index')}}" class="theme-btn">Back To Home <i class="far fa-home"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- breadcrumb end -->
@endsection
