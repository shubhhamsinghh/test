@extends('layouts.web_layout')
@section('header')
{!! $data->p_meta !!}
@endsection
@section('content')
<div class="page-content">
            <!-- Breadcamb Area Start -->
            <section class="breadcamb-area bg-overlay-1" style="background: url({{asset('images/portfolio/'.$data->p_image)}})">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="bradcamb-content text-center text-white text-uppercase">
                                <h1>{{strtoupper($data->p_heading)}}</h1>
                                <ul>
                                    <li><a href="{{route('index')}}">HOME <span>/</span></a></li>
                                    <li>{{strtoupper($data->p_heading)}}</li>
                                </ul>	
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			<!-- Breadcamb Area End -->
            <div class="gallery-area pt-95 pb-100">
                <div class="container">
                    <!-- Latest Shot Main Area Start -->
                    <div class="our-gallery">
                        <!-- Latest Shot/Portfolio Menu Tab -->
                        <div class="gallery">
                            <ul class="text-center gallery-menu mr-0">
                                <!-- <li class="" data-filter="*">All</li> -->
                                 @foreach($tabs as $key=>$tab)
                                <li class="filter {{$key == 0 ? 'active' : ''}}" data-filter=".c{{$tab->id}}">{{$tab->tab}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Latest Shot/Portfolio Menu Tab -->
                        <div class="grid gallery-box">
                            <div class="gallery-content row">
                               @foreach($details as $d)
                                <div class="grid-item col-lg-4 col-md-6 col-sm-12 c{{$d->tab_id}}">
                                    <!-- Latest Shot/Portfolio Single -->
                                    <div class="gallery-single">
                                        <div class="gallery-image">
                                            <img src="{{asset('images/portfolio-detail/'.$d->pd_image)}}">
                                            <a class="popup-youtube" href="{{$d->pd_video}}"><i class="icofont icofont-play-alt-2"></i></a>
                                        </div>
                                    </div>
                                    <!-- Latest Shot/Portfolio Single -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Latest Shot Main Area End -->
                </div>
            </div>
        </div>
@endsection
@section('script')
<script>
$(document).ready(function () {
    var $grid = $('.gallery-box .gallery-content').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });

    // Set default filter to .c1 (Wedding)
    $grid.isotope({ filter: '.c1' });

    // Filtering on click
    $('.gallery-menu li').on('click', function () {
        $('.gallery-menu li').removeClass('active');
        $(this).addClass('active');

        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });
});
</script>
@endsection