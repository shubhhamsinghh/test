<?php 
$testimonials = \DB::table('testimonials')->get();
?>

<div class="container">
    <div class="row">
        <div class="clientsay-active owl-carousel owl-theme">
            <!-- Testimonial Single Item -->
             @foreach($testimonials as $testi)
            <div class="col-md-12">
                <div class="client-feedback text-center">
                    <h3>{{$testi->t_heading}}</h3>
                </div>
                <div class="clientsay-single d-flex flex-wrap text-center mt-50">
                    <div class="clientsay-content">
                        <p>{{$testi->t_description}}</p>
                        <h6>{{$testi->t_name}}</h6>
                    </div>
                    <div class="client-img">
                        <img src="{{asset('images/testimonials/'.$testi->t_image)}}" alt="">
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Testimonial Single Item -->
           
    </div>
</div>