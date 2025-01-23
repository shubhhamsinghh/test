@extends('layouts.web_layout')
@section('title')
    Thank You
@endsection
@section('keywords')
    Thank You
@endsection
@section('description')
    Thank You
@endsection
@section('content')
    <!-- breadcrumb -->
    <!--<div class="site-breadcrumb">-->
    <!--    <div class="site-breadcrumb-bg" style="background: url(assets/img/breadcrumb/01.jpg)"></div>-->
    <!--    <div class="container">-->
    <!--        <div class="site-breadcrumb-wrap">-->
    <!--            <h4 class="breadcrumb-title">Thank you</h4>-->
    <!--            <ul class="breadcrumb-menu">-->
    <!--                <li><a href="index.html"><i class="far fa-home"></i> Home</a></li>-->
    <!--                <li class="active">Thank you</li>-->
    <!--            </ul>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
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
    <!-- breadcrumb end -->
@endsection
