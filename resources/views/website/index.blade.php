@extends('website/layouts.app') <!-- Use your admin layout -->

@section('content')

    <body class="gray-bg">

        <!--====== PRELOADER PART START ======-->

        <div class="preloader" style="display: none;">
            <div class="loader">
                <div class="ytp-spinner">
                    <div class="ytp-spinner-container">
                        <div class="ytp-spinner-rotator">
                            <div class="ytp-spinner-left">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                            <div class="ytp-spinner-right">
                                <div class="ytp-spinner-circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--====== PRELOADER PART ENDS ======-->

        <!--====== HEADER PART START ======-->




        <div class="header_content bg_cover" style="background: url('{{ asset('img/bags.jpeg') }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="content_wrapper">
                            <h3 class="title">Welcome to SKY PACK Traveller</h3>
                            <p style="color: #ff0707;font-weight: bold;font-size: 21px;"><mark
                                    style="background-color: #3167ff;color:white;">Send & Receive Everything From Regular
                                    Flights. Your Luggage Transfer with few Clicks</mark></p>
                            <ul class="header_btn">
                                <li><a class="main-btn" href="#product.html">Browse Ads</a></li>
                                <li><a class="main-btn main-btn-2" href="#post-ads.html">Post Listing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header_search">
                    <form id="flight-search-form" action="{{ route('/') }}" method="GET">
                        <div class="search_wrapper d-flex flex-wrap">
                            <div class="search_column d-flex flex-wrap">
                                <div class="search_select mt-15">
                                    <div class="custom-dropdown">
                                        <div class="selected">
                                            <span class="select-icon-left"><i class="fa fa-map-marker-alt"></i></span>
                                            <span class="selected-text">Pickup Location</span>
                                            <span class="select-icon-right"><i class="fa fa-chevron-down"></i></span>
                                        </div>
                                        <ul class="options">
                                            @php
                                                $grouped = $cities->groupBy(fn($c) => $c->country->name ?? 'Other');
                                            @endphp
                                            @foreach ($grouped as $countryName => $groupCities)
                                                <li class="optgroup">{{ $countryName }}</li>
                                                @foreach ($groupCities as $city)
                                                    <li class="option" data-value="{{ $city->id }}">
                                                        {{ $city->name }}
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                        <input type="hidden" name="pickup" id="pickup"
                                            value="{{ request('pickup') }}" />
                                    </div>
                                </div>

                                <div class="search_select mt-15 ms-2">
                                    <div class="custom-dropdown">
                                        <div class="selected">
                                            <span class="select-icon-left"><i class="fa fa-tags"></i></span>
                                            <span class="selected-text">Drop Off Location</span>
                                            <span class="select-icon-right"><i class="fa fa-chevron-down"></i></span>
                                        </div>
                                        <ul class="options">
                                            @foreach ($grouped as $countryName => $groupCities)
                                                <li class="optgroup">{{ $countryName }}</li>
                                                @foreach ($groupCities as $city)
                                                    <li class="option" data-value="{{ $city->id }}">{{ $city->name }}
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                        <input type="hidden" name="dropoff" id="dropoff" />
                                    </div>
                                </div>

                            </div>
                            <div class="search_column d-flex flex-wrap">
                                <div class="search_form mt-15">
                                    <input type="date" name="flight_date" value="{{ request('flight_date') }}"
                                        class="form-control">
                                    <i class="fa fa-i-cursor"></i>
                                </div>
                                <div class="search_btn mt-15">
                                    <button class="main-btn" type="submit">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="header_keyword d-sm-flex">
                        <!-- <span class="title">Trending Keywords:</span>
                                                                                        <ul class="tags media-body">
                                                                                            <li><a href="#">Camera</a></li>
                                                                                            <li><a href="#">Mobile</a></li>
                                                                                            <li><a href="#">DSLR</a></li>
                                                                                            <li><a href="#">Packet</a></li>
                                                                                            <li><a href="#">Dress</a></li>
                                                                                            <li><a href="#">Shirt</a></li>
                                                                                            <li><a href="#">Pant</a></li>
                                                                                            <li><a href="#">Shoe</a></li>
                                                                                            <li><a href="#">Table</a></li>
                                                                                        </ul> -->
                    </div>
                </div>
            </div>
        </div>

        <!--====== HEADER PART ENDS ======-->


        <!--====== LOCATIONS PART START ======-->

        {{-- <section class="locations_area pt-25 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section_title pb-15">
                            <h3 class="title" style="color: black;">Explore The Locations</h3>
                        </div>
                    </div>
                </div>
                <div class="locations_wrapper">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="single_locations mt-30">
                                <div class="locations_image">
                                    <img src="{{ asset('img/itlay.jpg') }}" height="325" alt="Locations">
                                </div>
                                <div class="locations_content">
                                    <h5 class="title"><a href="#product.html"><i class="fa fa-map-marker-alt"></i>Italy</a>
                                    </h5>
                                    <p>25 Listing in this location</p>
                                    <a class="view" href="#product.html">View All Ads Here <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="single_locations mt-30">
                                <div class="locations_image">
                                    <img src="{{ asset('img/locations-2.jpg') }}"locations-2.jpg" alt="Locations">
                                </div>
                                <div class="locations_content">
                                    <h5 class="title"><a href="#product.html"><i class="fa fa-map-marker-alt"></i>USA</a>
                                    </h5>
                                    <p>7 Listing in this location</p>
                                    <a class="view" href="#product.html">View All Ads Here <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="single_locations mt-30">
                                <div class="locations_image">
                                    <img src="{{ asset('img/thailand.jpg') }}" height="325" alt="Locations">
                                </div>
                                <div class="locations_content">
                                    <h5 class="title"><a href="#product.html"><i
                                                class="fa fa-map-marker-alt"></i>Thailand</a></h5>
                                    <p>3 Listing in this location</p>
                                    <a class="view" href="#product.html">View All Ads Here <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="single_locations mt-30">
                                <div class="locations_image">
                                    <img src="{{ asset('img/london.jpg') }}" height="325" alt="Locations">
                                </div>
                                <div class="locations_content">
                                    <h5 class="title"><a href="#product.html"><i
                                                class="fa fa-map-marker-alt"></i>England</a></h5>
                                    <p>25 Listing in this location</p>
                                    <a class="view" href="#product.html">View All Ads Here <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="single_locations mt-30">
                                <div class="locations_image">
                                    <img src="{{ asset('img/paris.jpg') }}"height="325" alt="Locations">
                                </div>
                                <div class="locations_content">
                                    <h5 class="title"><a href="#product.html"><i
                                                class="fa fa-map-marker-alt"></i>France</a></h5>
                                    <p>7 Listing in this location</p>
                                    <a class="view" href="#product.html">View All Ads Here <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="single_locations mt-30">
                                <div class="locations_image">
                                    <img src="{{ asset('img/dubai.jpg') }}" height="325" alt="Locations">
                                </div>
                                <div class="locations_content">
                                    <h5 class="title"><a href="#product.html"><i
                                                class="fa fa-map-marker-alt"></i>UAE</a></h5>
                                    <p>3 Listing in this location</p>
                                    <a class="view" href="#product.html">View All Ads Here <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-7 col-sm-12">
                            <div class="single_locations mt-30">
                                <div class="locations_image">
                                    <img src="{{ asset('img/istanbul.jpg') }}" height="325" alt="Locations">
                                </div>
                                <div class="locations_content">
                                    <h5 class="title"><a href="#product.html"><i class="fa fa-map-marker-alt"></i>Turkey
                                        </a></h5>
                                    <p>7 Listing in this location</p>
                                    <a class="view" href="#product.html">View All Ads Here <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="single_locations mt-30">
                                <div class="locations_image">
                                    <img src="{{ asset('img/toronto.webp') }}" height="325" alt="Locations">
                                </div>
                                <div class="locations_content">
                                    <h5 class="title"><a href="#product.html"><i
                                                class="fa fa-map-marker-alt"></i>Canada</a></h5>
                                    <p>3 Listing in this location</p>
                                    <a class="view" href="#product.html">View All Ads Here <i
                                            class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="locations_btn text-center">
                        <a class="main-btn" href="#">View all Locations</a>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="locations_area pt-25 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section_title pb-15">
                            <h3 class="title" style="color: black;">Explore The Locations</h3>
                        </div>
                    </div>
                </div>

                <div class="locations_wrapper">
                    <div class="row justify-content-center">

                        @foreach ($countries as $country)
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <div class="single_locations mt-30">
                                    <div class="locations_image">
                                        {{-- IMAGE — If you stored country flags/photos in DB --}}
                                        @if ($country->image)
                                            <img src="{{ asset('storage/' . $country->image) }}" height="325"
                                                alt="{{ $country->name }}">
                                        @else
                                            <img src="{{ asset('img/default-country.jpg') }}" height="325">
                                        @endif
                                    </div>

                                    <div class="locations_content">
                                        <h5 class="title">
                                            <a href="#">
                                                <i class="fa fa-map-marker-alt"></i>
                                                {{ $country->name }}
                                            </a>
                                        </h5>

                                        <p>
                                            {{ $country->cities_count }} Cities in this country
                                        </p>

                                        <a class="view" href="#">
                                            View All Ads Here <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <div class="locations_btn text-center">
                        <a class="main-btn" href="#">View all Locations</a>
                    </div>
                </div>
            </div>
        </section>


        <section class="ads_area pt-10 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ads_tabs d-sm-flex align-items-end justify-content-between pb-30">
                            <div class="section_title mt-45">
                                <h3 class="title">Popular and Featured Flights</h3>
                            </div>

                            <div class="tabs_menu mt-50">
                                <ul class="nav" id="myTab" role="tablist">
                                    <li><a class="active" id="popular-tab" data-bs-toggle="tab" href="#popular"
                                            role="tab" aria-controls="popular" aria-selected="true">Popular
                                            Flights</a></li>
                                    <li><a id="featured-tab" data-bs-toggle="tab" href="#featured" role="tab"
                                            aria-controls="featured" aria-selected="false">Featured Flights</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ads_tabs">
                    <div class="tab-content" id="myTabContent">
                        {{-- Popular --}}
                        <div class="tab-pane fade show active" id="popular" role="tabpanel"
                            aria-labelledby="popular-tab">
                            <div class="row">
                                @forelse($popularFlights as $flight)
                                    <div class="col-lg-3 col-sm-6">
                                        <a href="{{ route('flight.details', $flight->id) }}" class="text-decoration-none text-dark">
                                        <div class="single_ads_card mt-30">
                                            <div class="ads_card_image">
                                                @if ($flight->ticket_pic)
                                                    <img src="{{ asset('storage/' . $flight->ticket_pic) }}"
                                                        alt="ticket">
                                                @else
                                                    <img src="{{ asset('img/itlay.jpeg') }}" alt="ticket">
                                                @endif
                                                {{-- <img src="{{ asset('img/itlay.jpg') }}" /> --}}

                                                @if ($flight->is_featured ?? false)
                                                    <p class="sticker">Featured</p>
                                                @endif
                                            </div>

                                            <div class="ads_card_content">
                                                <div class="meta d-flex justify-content-between">
                                                    <p>{{ $flight->traveler->full_name ?? 'Traveler' }}</p>
                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                </div>

                                                <h4 class="title">
                                                    <a>
                                                        PNR: {{ $flight->pnr_no ?? '—' }}
                                                    </a>
                                                </h4>

                                                <p><i class="fa fa-map-marker-alt"></i>
                                                    {{ $flight->cityOrigin->name ?? '-' }} →
                                                    {{ $flight->cityDestination->name ?? '-' }}
                                                </p>

                                                <div class="ads_price_date d-flex justify-content-between">
                                                    <span class="price">{{ number_format($flight->total, 2) }} AED</span>
                                                    <span
                                                        class="date">{{ optional($flight->flight_date)->format('d M, Y') ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-center">No popular flights found.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        {{-- Featured / All results (paged) --}}
                        <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                            <div class="row">
                                @forelse($flights as $flight)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single_ads_card mt-30">
                                            <div class="ads_card_image">
                                                @if ($flight->ticket_pic)
                                                    <img src="{{ asset('storage/' . $flight->ticket_pic) }}"
                                                        alt="ticket">
                                                @else
                                                    <img src="{{ asset('img/bags.jpeg') }}" alt="ticket">
                                                @endif

                                                @if ($flight->is_featured ?? false)
                                                    <p class="sticker">Featured</p>
                                                @endif
                                            </div>

                                            <div class="ads_card_content">
                                                <div class="meta d-flex justify-content-between">
                                                    <p>{{ $flight->traveler->full_name ?? 'Traveler' }}</p>
                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                </div>

                                                <h4 class="title"><a
                                                        href="{{ route('travel_flights.edit', $flight->id) }}">{{ $flight->pnr_no ?? '—' }}</a>
                                                </h4>

                                                <p><i class="fa fa-map-marker-alt"></i>
                                                    {{ $flight->originCity->name ?? '-' }} →
                                                    {{ $flight->destinationCity->name ?? '-' }}
                                                </p>

                                                <div class="ads_price_date d-flex justify-content-between">
                                                    <span class="price">{{ number_format($flight->total, 2) }} AED</span>
                                                    <span
                                                        class="date">{{ optional($flight->flight_date)->format('d M, Y') ?? '-' }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <p class="text-center">No flights found.</p>
                                    </div>
                                @endforelse
                            </div>

                            {{-- pagination --}}
                            <div class="row mt-4">
                                <div class="col-12 d-flex justify-content-center">
                                    {{ $flights->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- <section class="ads_area pt-10 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ads_tabs d-sm-flex align-items-end justify-content-between pb-30">
                            <div class="section_title mt-45">
                                <h3 class="title">Popular and Featured Ads</h3>
                            </div>
                            <div class="tabs_menu mt-50">
                                <ul class="nav" id="myTab" role="tablist">
                                    <li>
                                        <a class="active" id="popular-tab" data-toggle="tab" href="#popular"
                                            role="tab" aria-controls="popular" aria-selected="true">Popular Ads</a>
                                    </li>
                                    <li>
                                        <a id="featured-tab" data-toggle="tab" href="#featured" role="tab"
                                            aria-controls="featured" aria-selected="false">Featured Ads</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ads_tabs">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="popular" role="tabpanel"
                            aria-labelledby="popular-tab">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Gadgets</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">Nikon Camera</a></h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$129.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Camera</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">Fresh Digital Camera</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$99.00</span>
                                                <span class="date">12 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Mobile</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">Samsung Glalaxy S8</a></h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Mobile</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">iPhone X Fresh</a></h4>
                                            <p><i class="fa fa-map-marker-alt"></i>Delaware, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$234.00</span>
                                                <span class="date">10 Jun, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Vehicle</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">High-performance
                                                    Bi-Cycle</a></h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jun, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Vehicle</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">KTM 800CC Bike</a></h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$2399.00</span>
                                                <span class="date">25 Apr, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Computers</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">MacBook Pro - 8 GB /
                                                    256GB</a></h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$129.00</span>
                                                <span class="date">25 Dec, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Camera</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Ram &amp; Laptop</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Ram &amp; Laptop</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Ram &amp; Laptop</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Ram &amp; Laptop</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Ram &amp; Laptop</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Ram &amp; Laptop</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Ram &amp; Laptop</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single_ads_card mt-30">
                                        <div class="ads_card_image">
                                            <img src="{{ asset('img/bags.jpeg') }}" alt="ads">
                                            <p class="sticker">Featured</p>
                                        </div>
                                        <div class="ads_card_content">
                                            <div class="meta d-flex justify-content-between">
                                                <p>Ram &amp; Laptop</p>
                                                <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a>
                                            </h4>
                                            <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                            <div class="ads_price_date d-flex justify-content-between">
                                                <span class="price">$299.00</span>
                                                <span class="date">25 Jan, 2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!--====== ADS PART ENDS ======-->

        <!--====== CHOOSE PART START ======-->

        <section class="choose_area">
            <div class="container">

                <div class="row" style="text-align: center;">

                    <div class="col-lg-12">
                        <div class="choose_content pt-35">
                            <div class="section_title pb-20">
                                <h3 class="title">Why Choose LuggageLink</h3>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam.
                            </p>

                            <!-- <ul class="list">
                                                                                            <li><i class="fa fa-check"></i> Powerful feature one.</li>
                                                                                            <li><i class="fa fa-check"></i> Much needed and important feature two.</li>
                                                                                            <li><i class="fa fa-check"></i> Essential features to rock.</li>
                                                                                        </ul> -->
                            <!-- <a href="#" class="main-btn">Read More</a> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">Secure and Verified</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fas fa-money-bill"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">Earn While Travel</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">Global Network</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fal fa-shopping-bag"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">Fast Delivery</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="choose_image">
                                                                            <div class="image">
                                                                                <img src="{{ asset('img/bags.jpeg') }}"choose.png" alt="choose">
                                                                            </div>
                                                                        </div> -->
        </section>

        <!--====== CHOOSE PART ENDS ======-->



        <!--====== COUNETR PART START ======-->

        <!-- <section class="counter_area bg_cover" style="background-image: url(assets/images/counter-bg.jpg)">
                                                                        <div class="container">
                                                                            <div class="row justify-content-end">
                                                                                <div class="col-lg-9">
                                                                                    <div class="counter_wrapper d-flex flex-wrap justify-content-between">
                                                                                        <div class="single_counter">
                                                                                            <div class="counter_items d-flex">
                                                                                                <div class="counter_icon">
                                                                                                    <img src="{{ asset('img/bags.jpeg') }}"counter-1.svg" alt="counter">
                                                                                                </div>
                                                                                                <div class="counter_count media-body">
                                                                                                    <span class="count"><span class="counter">5000</span>+</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Published Ads Here</p>
                                                                                        </div>
                                                                                        <div class="single_counter">
                                                                                            <div class="counter_items d-flex">
                                                                                                <div class="counter_icon">
                                                                                                    <img src="{{ asset('img/bags.jpeg') }}"counter-2.svg" alt="counter">
                                                                                                </div>
                                                                                                <div class="counter_count media-body">
                                                                                                    <span class="count"><span class="counter">300</span>+</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Register User Using</p>
                                                                                        </div>
                                                                                        <div class="single_counter">
                                                                                            <div class="counter_items d-flex">
                                                                                                <div class="counter_icon">
                                                                                                    <img src="{{ asset('img/bags.jpeg') }}"counter-3.svg" alt="counter">
                                                                                                </div>
                                                                                                <div class="counter_count media-body">
                                                                                                    <span class="count"><span class="counter">200</span>+</span>
                                                                                                </div>
                                                                                            </div>
                                                                                            <p>Verified User Using</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section> -->

        <!--====== COUNETR PART ENDS ======-->

        <!--====== PUBLISHED PART START ======-->

        <!-- <section class="published_area pt-115">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="section_title pb-15">
                                                                                        <h3 class="title">Recently Published Ads</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="published_wrapper">
                                                                                <div class="row">
                                                                                    <div class="col-lg-3 col-sm-6">
                                                                                        <div class="single_ads_card mt-30">
                                                                                            <div class="ads_card_image">
                                                                                                <img src="{{ asset('img/bags.jpeg') }}"ads-1.png" alt="ads">
                                                                                            </div>
                                                                                            <div class="ads_card_content">
                                                                                                <div class="meta d-flex justify-content-between">
                                                                                                    <p>Ram &amp; Laptop</p>
                                                                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                                                                </div>
                                                                                                <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                                                                                <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                                                                                <div class="ads_price_date d-flex justify-content-between">
                                                                                                    <span class="price">$299.00</span>
                                                                                                    <span class="date">25 Jan, 2023</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-sm-6">
                                                                                        <div class="single_ads_card mt-30">
                                                                                            <div class="ads_card_image">
                                                                                                <img src="{{ asset('img/bags.jpeg') }}"ads-2.png" alt="ads">
                                                                                                <p class="sticker sticker_color-1">New</p>
                                                                                            </div>
                                                                                            <div class="ads_card_content">
                                                                                                <div class="meta d-flex justify-content-between">
                                                                                                    <p>Ram &amp; Laptop</p>
                                                                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                                                                </div>
                                                                                                <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                                                                                <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                                                                                <div class="ads_price_date d-flex justify-content-between">
                                                                                                    <span class="price">$299.00</span>
                                                                                                    <span class="date">25 Jan, 2023</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-sm-6">
                                                                                        <div class="single_ads_card mt-30">
                                                                                            <div class="ads_card_image">
                                                                                                <img src="{{ asset('img/bags.jpeg') }}"ads-3.png" alt="ads">
                                                                                            </div>
                                                                                            <div class="ads_card_content">
                                                                                                <div class="meta d-flex justify-content-between">
                                                                                                    <p>Ram &amp; Laptop</p>
                                                                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                                                                </div>
                                                                                                <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                                                                                <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                                                                                <div class="ads_price_date d-flex justify-content-between">
                                                                                                    <span class="price">$299.00</span>
                                                                                                    <span class="date">25 Jan, 2023</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-sm-6">
                                                                                        <div class="single_ads_card mt-30">
                                                                                            <div class="ads_card_image">
                                                                                                <img src="{{ asset('img/bags.jpeg') }}"ads-4.png" alt="ads">
                                                                                            </div>
                                                                                            <div class="ads_card_content">
                                                                                                <div class="meta d-flex justify-content-between">
                                                                                                    <p>Ram &amp; Laptop</p>
                                                                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                                                                </div>
                                                                                                <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                                                                                <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                                                                                <div class="ads_price_date d-flex justify-content-between">
                                                                                                    <span class="price">$299.00</span>
                                                                                                    <span class="date">25 Jan, 2023</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-sm-6">
                                                                                        <div class="single_ads_card mt-30">
                                                                                            <div class="ads_card_image">
                                                                                                <img src="{{ asset('img/bags.jpeg') }}"ads-5.png" alt="ads">
                                                                                            </div>
                                                                                            <div class="ads_card_content">
                                                                                                <div class="meta d-flex justify-content-between">
                                                                                                    <p>Ram &amp; Laptop</p>
                                                                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                                                                </div>
                                                                                                <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                                                                                <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                                                                                <div class="ads_price_date d-flex justify-content-between">
                                                                                                    <span class="price">$299.00</span>
                                                                                                    <span class="date">25 Jan, 2023</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-sm-6">
                                                                                        <div class="single_ads_card mt-30">
                                                                                            <div class="ads_card_image">
                                                                                                <img src="{{ asset('img/bags.jpeg') }}"ads-6.png" alt="ads">
                                                                                            </div>
                                                                                            <div class="ads_card_content">
                                                                                                <div class="meta d-flex justify-content-between">
                                                                                                    <p>Ram &amp; Laptop</p>
                                                                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                                                                </div>
                                                                                                <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                                                                                <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                                                                                <div class="ads_price_date d-flex justify-content-between">
                                                                                                    <span class="price">$299.00</span>
                                                                                                    <span class="date">25 Jan, 2023</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-sm-6">
                                                                                        <div class="single_ads_card mt-30">
                                                                                            <div class="ads_card_image">
                                                                                                <img src="{{ asset('img/bags.jpeg') }}"ads-7.png" alt="ads">
                                                                                                <p class="sticker sticker_color-2">Popular</p>
                                                                                            </div>
                                                                                            <div class="ads_card_content">
                                                                                                <div class="meta d-flex justify-content-between">
                                                                                                    <p>Ram &amp; Laptop</p>
                                                                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                                                                </div>
                                                                                                <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                                                                                <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                                                                                <div class="ads_price_date d-flex justify-content-between">
                                                                                                    <span class="price">$299.00</span>
                                                                                                    <span class="date">25 Jan, 2023</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-3 col-sm-6">
                                                                                        <div class="single_ads_card mt-30">
                                                                                            <div class="ads_card_image">
                                                                                                <img src="{{ asset('img/bags.jpeg') }}"ads-8.png" alt="ads">
                                                                                            </div>
                                                                                            <div class="ads_card_content">
                                                                                                <div class="meta d-flex justify-content-between">
                                                                                                    <p>Ram &amp; Laptop</p>
                                                                                                    <a class="like" href="#"><i class="fal fa-heart"></i></a>
                                                                                                </div>
                                                                                                <h4 class="title"><a href="#product-details.html">8 GB DDR4 Ram, 4th Gen</a></h4>
                                                                                                <p><i class="fa fa-map-marker-alt"></i>New York, USA</p>
                                                                                                <div class="ads_price_date d-flex justify-content-between">
                                                                                                    <span class="price">$299.00</span>
                                                                                                    <span class="date">25 Jan, 2023</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="published_btn">
                                                                                    <a href="#product.html" class="main-btn">View all Ads</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section> -->

        <!--====== PUBLISHED PART ENDS ======-->

        <!--====== SERVICES PART START ======-->

        <section class="services_area pt-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_title text-center pb-15">
                            <h3 class="title">How it works</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fal fa-hand-holding-box"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">Sign up</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fal fa-shopping-bag"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">Find Match</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fal fa-handshake"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">Connect</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fa fa-wallet"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">Complete</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fa fa-headset"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">24/7 Support</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single_services d-flex mt-30">
                            <div class="services_icon">
                                <i class="fal fa-certificate"></i>
                            </div>
                            <div class="services_content media-body">
                                <h4 class="title"><a href="#">Verified Users</a></h4>
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--====== SERVICES PART ENDS ======-->

        <!--====== PRICING PART START ======-->

        <section class="pricing_area pt-115">
            <div class="container">
                <!--<div class="row justify-content-center">
                                                                                <div class="col-lg-6">
                                                                                    <div class="section_title text-center pb-15">
                                                                                        <h3 class="title">Find a Plan <br> That's Right For You</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                          <div class="row no-gutters align-items-center justify-content-center">
                                                                                <div class="col-lg-4 col-md-7 col-sm-9">
                                                                                    <div class="single_pricing text-center">
                                                                                        <div class="pricing_icon iconbox">
                                                                                            <img src="{{ asset('img/bags.jpeg') }}"pricing-1.svg" alt="Icon">
                                                                                        </div>
                                                                                        <div class="pricing_title">
                                                                                            <h4 class="title">Beginners</h4>
                                                                                            <p>Lorem ipsum dolor sit amet, consetetur.</p>
                                                                                        </div>
                                                                                        <div class="pricing_content">
                                                                                            <p>Lorem ipsum dolor. Sit amet, consetetur dost. sadipscing elitr, sed. Diam nonumy eirmod. Tempor invidunt ut labore. Pet dolore magna. Aliquyam erat iamvoluptua.</p>
                                                                                            <span class="price">$50.00</span>
                                                                                        </div>
                                                                                        <div class="pricing_btn">
                                                                                            <a href="#" class="main-btn">View all Ads</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-7 col-sm-9">
                                                                                    <div class="single_pricing pricing_active text-center">
                                                                                        <div class="pricing_icon">
                                                                                            <img src="{{ asset('img/bags.jpeg') }}"pricing-2.svg" alt="Icon">
                                                                                        </div>
                                                                                        <div class="pricing_title">
                                                                                            <h4 class="title">Standard</h4>
                                                                                            <p>Lorem ipsum dolor sit amet, consetetur.</p>
                                                                                        </div>
                                                                                        <div class="pricing_content">
                                                                                            <p>Lorem ipsum dolor. Sit amet, consetetur dost. sadipscing elitr, sed. Diam nonumy eirmod. Tempor invidunt ut labore. Pet dolore magna. Aliquyam erat iamvoluptua.</p>
                                                                                            <span class="price">$100.00</span>
                                                                                        </div>
                                                                                        <div class="pricing_btn">
                                                                                            <a href="#" class="main-btn main-btn-2">View all Ads</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-7 col-sm-9">
                                                                                    <div class="single_pricing text-center">
                                                                                        <div class="pricing_icon">
                                                                                            <img src="{{ asset('img/bags.jpeg') }}"pricing-3.svg" alt="Icon">
                                                                                        </div>
                                                                                        <div class="pricing_title">
                                                                                            <h4 class="title">Premium</h4>
                                                                                            <p>Lorem ipsum dolor sit amet, consetetur.</p>
                                                                                        </div>
                                                                                        <div class="pricing_content">
                                                                                            <p>Lorem ipsum dolor. Sit amet, consetetur dost. sadipscing elitr, sed. Diam nonumy eirmod. Tempor invidunt ut labore. Pet dolore magna. Aliquyam erat iamvoluptua.</p>
                                                                                            <span class="price">$500.00</span>
                                                                                        </div>
                                                                                        <div class="pricing_btn">
                                                                                            <a href="#" class="main-btn">View all Ads</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->
            </div>
        </section>

        <!--====== PRICING PART ENDS ======-->

        <!--====== BLOG PART START ======-->

        <!-- <section class="blog_area pt-115 pb-120">
                                                                        <div class="container">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-lg-6">
                                                                                    <div class="section_title text-center pb-15">
                                                                                        <h3 class="title">Latest<br> From The Blog</h3>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-lg-4 col-md-7">
                                                                                    <div class="single_blog mt-30">
                                                                                        <div class="blog_image">
                                                                                            <img src="{{ asset('img/bags.jpeg') }}"blog-1.jpg" alt="blog">
                                                                                        </div>
                                                                                        <div class="blog_content">
                                                                                            <h4 class="title"><a href="#blog-details.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h4>
                                                                                            <ul class="meta">
                                                                                                <li><i class="fal fa-clock"></i><a href="#">23 Jan, 2023</a></li>
                                                                                                <li><i class="fal fa-comment-dots"></i><a href="#">4 Comments</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-7">
                                                                                    <div class="single_blog mt-30">
                                                                                        <div class="blog_image">
                                                                                            <img src="{{ asset('img/bags.jpeg') }}"blog-2.jpg" alt="blog">
                                                                                        </div>
                                                                                        <div class="blog_content">
                                                                                            <h4 class="title"><a href="#blog-details.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h4>
                                                                                            <ul class="meta">
                                                                                                <li><i class="fal fa-clock"></i><a href="#">23 Jan, 2023</a></li>
                                                                                                <li><i class="fal fa-comment-dots"></i><a href="#">4 Comments</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-4 col-md-7">
                                                                                    <div class="single_blog mt-30">
                                                                                        <div class="blog_image">
                                                                                            <img src="{{ asset('img/bags.jpeg') }}"blog-3.jpg" alt="blog">
                                                                                        </div>
                                                                                        <div class="blog_content">
                                                                                            <h4 class="title"><a href="#blog-details.html">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h4>
                                                                                            <ul class="meta">
                                                                                                <li><i class="fal fa-clock"></i><a href="#">23 Jan, 2023</a></li>
                                                                                                <li><i class="fal fa-comment-dots"></i><a href="#">4 Comments</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="blog_btn text-center mt-50">
                                                                                <a href="#blog.html" class="main-btn">View All Post</a>
                                                                            </div>
                                                                        </div>
                                                                    </section> -->

        <!--====== BLOG PART ENDS ======-->

        <!--====== CALL TO ACTION PART START ======-->

        <section class="call_to_action_area pt-20 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="call_to_action_content mt-45">
                            <h4 class="title">Subscribe For Update</h4>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="call_to_action_form mt-50">
                            <form action="#">
                                <i class="fal fa-envelope"></i>
                                <input type="text" placeholder="Enter your mail address . . .">
                                <button class="main-btn">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--====== CALL TO ACTION PART ENDS ======-->


        <!--====== FOOTER PART ENDS ======-->

        <!--====== BACK TOP TOP PART START ======-->

        <a href="#" class="back-to-top" style="display: none;"><i class="fa fa-angle-up"></i></a>

        <!--====== BACK TOP TOP PART ENDS ======-->

        <!--====== PART START ======-->

        <!--
                                                                    <section class="">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-lg-">
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                -->

        <!--====== PART ENDS ======-->


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                @if (!empty($scrollToPopular))
                    // wait a tick for layout to render
                    setTimeout(function() {
                        var el = document.getElementById('popular');
                        if (el) {
                            el.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                            // Optionally activate the Popular tab
                            var popularTab = document.querySelector('#popular-tab');
                            if (popularTab) popularTab.click();
                        }
                    }, 200);
                @endif
            });



            document.addEventListener('DOMContentLoaded', function() {
                const dropdowns = document.querySelectorAll('.custom-dropdown');

                dropdowns.forEach(drop => {
                    const selected = drop.querySelector('.selected');
                    const optionsContainer = drop.querySelector('.options');
                    const optionsList = drop.querySelectorAll('.option');
                    const hiddenInput = drop.querySelector('input[type="hidden"]');

                    // Toggle dropdown
                    selected.addEventListener('click', () => {
                        drop.classList.toggle('active');
                    });

                    // Option click
                    optionsList.forEach(option => {
                        option.addEventListener('click', () => {
                            selected.querySelector('.selected-text').textContent = option
                                .textContent;
                            hiddenInput.value = option.getAttribute('data-value');
                            drop.classList.remove('active');
                        });
                    });

                    // Click outside to close
                    document.addEventListener('click', e => {
                        if (!drop.contains(e.target)) {
                            drop.classList.remove('active');
                        }
                    });
                });
            });
        </script>


    </body>
