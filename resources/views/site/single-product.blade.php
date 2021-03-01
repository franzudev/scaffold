@extends('layouts.site')

@section('content')
    <!-- Start Bradcaump area -->
    <div class="htc__service__area service__page bg__gray ptb--100">

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section__title text-center">
                                <h2 class="title__line"><span class="text--theme">{{ $product->name }}</span></h2>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <!-- End Bradcaump area -->
        <!-- Start Blog Area -->
        <!--<section class="htc__project__area bg__white pb--150">-->
        <section class="htc__blog__details__page ptb--50 bg__white">
            <div class="container">
                <div class="row">
                	<div class="col-lg-3 col-xl-3 col-md-12 col-12 order-lg-1 order-2 smt-40 xmt-40">
                		<div class="htc__page__sidebar">
                			<!-- Start Single -->
                			<div class="htc__category bg__gray">
                                {!! $product->data_sheet !!}
                				{{--<h2 class="sidebar__title">TABELLA TECNICA</h2>
                				<ul class="cat__list">
                					<li style="text-align: left">Peso/pezzo: 3,375 Kg
                                        Peso/mq: 37,8 Kg
                                        Pezzi/pacco: 192
                                        Pezzi/mq: 11,2
                                        Passo: 35,6 cm
                                        Pendenza minima consigliata: 35% con guaina impermeabilizzante *</li>
                                    <li><b>DIMENSIONI</b></li>
                                    <li style="text-align: left">Lunghezza: 430 mm
                                        Larghezza: 272 mm
                                        Peso pacco: 648 Kg
                                        Stabilimento di Produzione: <b>Marsciano</b></li>
                				</ul>--}}
                			</div>
                			<!-- End Single -->
                			<!-- Start Single -->
                            @if(isset($product->product_download[0]->file))
                			<div class="htc__broc bg__gray sidebar__separator">
                				<h2 class="sidebar__title">DOWNLOAD SCHEDA TECNICA</h2>
                				<ul class="brocure__list">
                					<li><a target="_blank" href="{{ Storage::url($product->product_download[0]->file) }}"><i class="fa fa-file-pdf-o"></i>SCHEDA TECNICA</a></li>
                					<!--<li><a href="#"><i class="fa fa-wordpress"></i>DOWNLOAD DOC SCHEDA TECNICA</a></li>-->
                				</ul>
                			</div>
                            @endif
                			<!-- End Single -->
                		</div>
                	</div>
                    <div class="col-lg-9 col-xl-9 col-md-12 col-12 order-lg-2 order-1">
                        <div class="htc__single__service">
                            <div class="htc__single__service__tab">
                                <div class="ht-portfolio-pic-show">
                                    <div class="ht-portfolio-full-image tab-content">
                                        @foreach($product->product_photos as $prod)
                                        <div role="tabpanel" class="tab-pane fade {{$loop->first ? 'show active' : null}}" id="img-tab-{{ $loop->index + 1 }}">
                                            <img src="{{ $prod->image_url }}" alt="full-image">
                                        </div>
                                        @endforeach
                                        {{--@foreach($product->realizations as $realization)
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-{{ $loop->index + 1 + count($product->product_photos) }}">
                                            <img src="{{ $realization->image_url }}" alt="full-image">
                                        </div>
                                        @endforeach--}}
                                        {{--<div role="tabpanel" class="tab-pane fade" id="img-tab-2">
                                            <img src="../../images/blog/big-images/02.jpg" alt="full-image">
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-3">
                                            <img src="../../images/blog/big-images/2.jpg" alt="full-image">
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-4">
                                            <img src="../../images/blog/big-images/1.jpg" alt="full-image">
                                        </div>--}}
                                    </div>
                                </div>
                                <!-- Start Small images -->
                                <div class="ht__service__small__image nav nav-tabs clearfix">
                                    <ul role="tablist" class="prodict-det-small nav clearfix" style="width: 100%;">
                                        @foreach($product->product_photos as $prod)
                                        <li role="presentation" class="pot-small-img img-tab-{{$loop->index + 1}}">
                                            <a class="{{$loop->first ? 'active show' : null}}" href="#img-tab-{{ $loop->index + 1 }}" role="tab" data-toggle="tab">
                                                <img src="{{ $prod->image_url }}" width="188"  alt="small-image">
                                            </a>
                                        </li>
                                        @endforeach
                                        {{--<li role="presentation" class="pot-small-img img-tab-2">
                                            <a href="#img-tab-2" role="tab" data-toggle="tab">
                                                <img src="../../images/service/small-img/02.jpg" alt="small-image">
                                            </a>
                                        </li>
                                        <li role="presentation" class="pot-small-img img-tab-3 xmt-20">
                                            <a href="#img-tab-3" role="tab" data-toggle="tab">
                                                <img src="../../images/service/small-img/3.jpg" alt="small-image">
                                            </a>
                                        </li>
                                        <li role="presentation" class="pot-small-img img-tab-4 xmt-20">
                                            <a href="#img-tab-4" role="tab" data-toggle="tab">
                                                <img src="../../images/service/small-img/4.jpg" alt="small-image">
                                            </a>
                                        </li>--}}
                                    </ul>
                                </div>
                                <!-- End Small images -->
                                <!-- Start Small images -->
                                <div class="ht__service__small__image nav nav-tabs clearfix">
                                    <div class="service__details">
                                        <h2>REALIZZAZIONI</h2>
                                    </div>
                                    <ul class="prodict-det-small nav clearfix" style="width: 100%;">
                                        @foreach($product->realizations as $realization)
                                        <li class="pot-small-img">
                                            <a class="image-popup-vertical-fit"  href="{{ $realization->image_url }}">
                                                <img src="{{ $realization->image_url }}" width="188" alt="small-image">
                                            </a>
                                        </li>
                                        @endforeach
                                        {{--<li role="presentation" class="pot-small-img img-tab-2">
                                            <a href="#img-tab-2" role="tab" data-toggle="tab">
                                                <img src="../../images/service/small-img/2.jpg" alt="small-image">
                                            </a>
                                        </li>
                                        <li role="presentation" class="pot-small-img img-tab-3 xmt-20">
                                            <a href="#img-tab-3" role="tab" data-toggle="tab">
                                                <img src="../../images/service/small-img/3.jpg" alt="small-image">
                                            </a>
                                        </li>
                                        <li role="presentation" class="pot-small-img img-tab-4 xmt-20">
                                            <a href="#img-tab-4" role="tab" data-toggle="tab">
                                                <img src="../../images/service/small-img/4.jpg" alt="small-image">
                                            </a>
                                        </li>--}}
                                    </ul>
                                </div>
                                <!-- End Small images -->
                            </div>
                            <!--<div class="htc__service__dtl">

                                <div class="htc__ser__dtl">
                                    <h2 class="title__line--4">DESCRIZIONE</h2>
                                    <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled demoralized On the other hand, we denounce with pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents </p>
                                </div>


                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start Service Area -->
        @if(isset($product->related_products[0]))
        <section class="htc__project__area bg__white pb--150">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section__title text-center">
                            <h2 class="title__line">PRODOTTI <span class="text--theme">CORRELATI</span></h2>
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire</p>
                        </div>
                    </div>
                </div>
                <div class="row rl__project__wrap clearfix mt--60 xmt-40">
                    <!-- Start Single Service -->
                    @foreach($product->related_products as $related)
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 col-12">
                        <div class="rl__project foo">
                            <div class="project__thumb">
                                <a href="{{ route('product', ['product' => $related->id]) }}">
                                    <img src="{{ $related->product_photos[0]->image_url }}" alt="project images">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- End Single Service -->
                    {{--<!-- Start Single Service -->
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6  col-12">
                        <div class="rl__project foo">
                            <div class="project__thumb">
                                <a href="single-project.html">
                                    <img src="../../images/lst-project-2/2.jpg" alt="project images">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service -->
                    <!-- Start Single Service -->
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 smt-40 col-12">
                        <div class="rl__project foo">
                            <div class="project__thumb">
                                <a href="single-project.html">
                                    <img src="../../images/lst-project-2/3.jpg" alt="project images">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service -->
                    <!-- Start Single Service -->
                    <div class="col-lg-3 col-xl-3 col-md-6 col-sm-6 smt-40 col-12">
                        <div class="rl__project foo">
                            <div class="project__thumb">
                                <a href="single-project.html">
                                    <img src="../../images/lst-project-2/4.jpg" alt="project images">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service -->--}}
                </div>
            </div>
        </section>
        <!-- End Service Area -->
        @endif
        <!-- End Blog Area -->
@endsection
