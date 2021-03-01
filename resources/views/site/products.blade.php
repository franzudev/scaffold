@extends('layouts.site')

@section('content')
        <!-- Start Service Area -->
        <section class="htc__service__area service__page bg__gray ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section__title text-center">
                            <h2 class="title__line"><span class="text--theme">{{$family->name}}</span></h2>
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire</p>
                        </div>
                    </div>
                </div>
                <div class="row service__section__wrap clearfix">
                    <!-- Start Single Service -->
                    @foreach($products as $product)
                    <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="service foo">
                            <div class="service__thumb">
                                <a href="{{ route('product', ['product' => $product->id]) }}">
                                    <img src="{{ isset($product->product_photos[0]) ? $product->product_photos[0]->image_url : '' }}" alt="service images">
                                </a>
                                <div class="service__hover">
                                    <div class="service__action">
                                        <a href="{{ route('product', ['product' => $product->id]) }}">DETAILS</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service__details">
                                <h2><a href="{{ route('product', ['product' => $product->id]) }}">{{ $product->name }}</a></h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Service -->
                    {{--<!-- Start Single Service -->
                    <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="service foo">
                            <div class="service__thumb">
                                <a href="single-service.html">
                                    <img src="../../images/service/big-img/2.jpg" alt="service images">
                                </a>
                                <div class="service__hover">
                                    <div class="service__action">
                                        <a href="single-service.html">DETAILS</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service__details">
                                <h2><a href="single-service.html">Enzo Pietra</a></h2>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service -->
                    <!-- Start Single Service -->
                    <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="service foo">
                            <div class="service__thumb">
                                <a href="single-service.html">
                                    <img src="../../images/service/big-img/3.jpg" alt="service images">
                                </a>
                                <div class="service__hover">
                                    <div class="service__action">
                                        <a href="single-service.html">DETAILS</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service__details">
                                <h2><a href="single-service.html">Enzo testa di moro</a></h2>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service -->
                    <!-- Start Single Service -->
                    <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="service foo">
                            <div class="service__thumb">
                                <a href="single-service.html">
                                    <img src="../../images/service/big-img/4.jpg" alt="service images">
                                </a>
                                <div class="service__hover">
                                    <div class="service__action">
                                        <a href="single-service.html">DETAILS</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service__details">
                                <h2><a href="single-service.html">Ardesiata</a></h2>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service -->
                    <!-- Start Single Service -->
                    <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="service foo">
                            <div class="service__thumb">
                                <a href="single-service.html">
                                    <img src="../../images/service/big-img/5.jpg" alt="service images">
                                </a>
                                <div class="service__hover">
                                    <div class="service__action">
                                        <a href="single-service.html">DETAILS</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service__details">
                                <h2><a href="single-service.html">Grigio cemento</a></h2>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service -->
                    <!-- Start Single Service -->
                    <div class="col-lg-4 col-xl-4 col-md-6 col-sm-6 col-12">
                        <div class="service foo">
                            <div class="service__thumb">
                                <a href="single-service.html">
                                    <img src="../../images/service/big-img/6.jpg" alt="service images">
                                </a>
                                <div class="service__hover">
                                    <div class="service__action">
                                        <a href="single-service.html">DETAILS</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service__details">
                                <h2><a href="single-service.html">Bianca</a></h2>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service -->--}}
                </div>
            </div>
        </section>
        <!-- End Service Area -->
@endsection
