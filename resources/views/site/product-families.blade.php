@extends('layouts.site')

@section('content')
<!-- Start Service Area -->
<section class="htc__service__area service__page bg__gray ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section__title text-center">
                    <h2 class="title__line">Le Coperture In Laterizio<span class="text--theme"> FBM</span></h2>
                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire</p>
                </div>
            </div>
        </div>
        <div class="row service__section__wrap clearfix">
            @foreach($families as $family)
            <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                <div class="service foo">
                    <div class="service__thumb">
                        <a href="{{ route('products', ['family' => $family->id]) }}">
                            <img src="{{$family->image_url}}" alt="service images">
                        </a>
                        <div class="service__hover">
                            <div class="service__action">
                                <a href="{{ route('products', ['family' => $family->id]) }}">DETAILS</a>
                            </div>
                        </div>
                    </div>
                    <div class="service__details">
                        <h2><a href="{{ route('products', ['family' => $family->id]) }}">{{ $family->name }}</a></h2>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End Service Area -->
<!-- Start Testimonial Area -->
<section class="htc__testimonial__area ptb--130 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12  offset-xl-1 col-md-12 col-12 smt-40">
                <div class="reguest__quote">
                    <div class="section__title text-left">
                        <h2 class="title__line">RICHIEDI<span class="text--theme"> INFORMAZIONI</span></h2>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasur</p>
                    </div>
                    <div class="clint__comment__form">
                        <div class="single__cl__form">
                            <input type="text" placeholder="Name">
                            <input type="email" placeholder="Email">
                        </div>
                        <div class="single__cl__form">
                            <input type="tel" placeholder="Phone">
                            <input type="text" placeholder="Subject">
                        </div>
                        <div class="single__cl__message">
                            <textarea name="message" placeholder="Massage"></textarea>
                        </div>
                        <div class="clint__submit__btn">
                            <a class="htc__btn" href="#">SEND MESSAGE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Area -->
@endsection
