<!-- Start Header Style -->
<div id="header" class="htc-header">
    <!-- Start Header Top -->
    <div class="htc__header__top bg__cat--1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <ul class="heaher__top__left">
                        <li><i class="fa fa-clock-o"></i>7.30 AM  -  19.30 PM</li>
                        <li><a href="tel:+3907587461"><i class="fa fa-phone"></i>+39 07587461</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top -->
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-7">
                    <div class="logo">
                        <a href="{{route('homepage')}}">
                            <img width="130" src="/images/logo/logoFBM300.png" alt="logo image">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-5 d-lg-block d-none">
                    <nav class="main__menu__nav d-lg-block d-md-none d-none">
                        <ul class="main__menu">
                            <li class="drop"><a href="{{route('homepage')}}">HOME</a></li>
                            <li class="drop"><a href="{{route('about')}}">AZIENDA</a>
                                <ul class="dropdown">
                                    <li><a href="#">La Nostra Azienda</a></li>
                                    <li><a href="#">Gli Stabilimenti</a></li>
                                    <li><a href="#">Rete Commerciale</a></li>
                                    <li><a href="#">Certificazioni</a></li>
                                    <li><a href="#">GDPR</a></li>
                                    <li><a href="#">Corporate Governace </a></li>
                                    <li><a href="#">Lavora con Noi</a></li>
                                </ul>
                            </li>
                            <li class="drop"><a href="{{route('macro-categories')}}">PRODOTTI</a>
                                <ul class="dropdown">
                                    @foreach(collect(App\Models\Category::whereHas('product_families')->get()) as $category)
                                        <li><a href="{{ route('families', ['category' => $category->id]) }}">{{$category->name}}</a></li>
                                    @endforeach
                                    {{--<li><a href="product-families.html">COPERTURE (TEGOLE E COPPI)</a></li>
                                    <li><a href="#">MATTONI PASTA MOLLE</a></li>
                                    <li><a href="#">MATTONI TRAFILATI</a></li>
                                    <li><a href="#">FORATI E BLOCCHI</a></li>
                                    <li><a href="#">SOLAI</a></li>
                                    <li><a href="#">TAVELLE E TAVELLONI</a></li>--}}
                                </ul>
                            </li>
                            <li class="drop"><a href="#">DOCUMENTAZIONE</a></li>
                            <li class="drop"><a href="#">SISTEMI</a></li>
                            <li class="drop"><a href="blog.html">CONTATTI</a></li>
                        </ul>
                    </nav>
                    <!-- Start Mainmenu Mobile-->
                    <div class="mobile-menu clearfix d-lg-none d-md-block d-block">
                        <nav id="mobile_dropdown">
                            <ul>
                                <li><a href="{{route('homepage')}}">HOME</a></li>
                                <li><a href="{{route('about')}}">AZIENDA</a>
                                    <ul>
                                        <li><a href="#">La Nostra Azienda</a></li>
                                        <li><a href="#">Gli Stabilimenti</a></li>
                                        <li><a href="#">Rete Commerciale</a></li>
                                        <li><a href="#">Certificazioni</a></li>
                                        <li><a href="#">GDPR</a></li>
                                        <li><a href="#">Corporate Governace </a></li>
                                        <li><a href="#">Lavora con Noi</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('macro-categories')}}">PRODOTTI</a>
                                    <ul>
                                        @foreach(collect(App\Models\Category::whereHas('product_families')->get()) as $category)
                                            <li><a href="{{ route('families', ['category' => $category->id]) }}">{{$category->name}}</a></li>
                                        @endforeach
                                        {{--<li><a href="#">MATTONI PASTA MOLLE</a></li>
                                        <li><a href="#">MATTONI TRAFILATI</a></li>
                                        <li><a href="#">FORATI E BLOCCHI</a></li>
                                        <li><a href="#">SOLAI</a></li>
                                        <li><a href="#">TAVELLE E TAVELLONI</a></li>--}}
                                    </ul>
                                </li>
                                <li><a href="#">DOCUMENTAZIONE</a></li>
                                <li><a href="#">SISTEMI</a></li>
                                <li><a href="blog.html">CONTATTI</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 d-lg-block d-md-block d-none">
                    <div class="htc__header__search">
                        <input type="text" placeholder="SEARCH">
                        <a href="#"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</div>
<!-- End Header Style -->
