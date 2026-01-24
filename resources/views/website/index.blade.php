@extends('website/layouts.app') <!-- Use your admin layout -->

<style>
    /* ===============================
   PRELOADER – THIS PAGE ONLY
   =============================== */
    #ll-preloader {
        position: fixed;
        inset: 0;
        background: #ffffff;
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* prevent scroll while loading */
    body.ll-loading {
        overflow: hidden;
    }
</style>


@section('content')

    <!--====== PRELOADER PART START ======-->

    <div class="preloader" id="ll-preloader">
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

    <div class="gray-bg">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif



        <!--====== HEADER PART START ======-->

        <!-- HERO SECTION -->
        <div class="header_content" style="background: linear-gradient(135deg, #0d6efd 0%, #1158d6 100%);">
            <div class="container text-center">

                <!-- Title -->
                <h1 class="fw-bold text-white mb-3" style="font-size:48px;">
                    Ship with <br> Fellow Travelers
                </h1>

                <!-- Description -->
                <p class="mb-5" style="color: #fff; font-weight: 500; font-size: 18px;">
                    Connect with passengers who have spare baggage space<br>
                    on their flights. Send packages worldwide safely and affordably.
                </p>

                <!-- SEARCH BOX -->
                <div class="search-box mx-auto col-lg-8 col-md-10 p-4">

                    <form id="flight-search-form" action="{{ route('/listspace') }}" method="GET">

                        @php
                            $grouped = $cities->groupBy(fn($c) => $c->country->name ?? 'Other');
                        @endphp

                        <div class="row g-3">
                            <!-- FROM CITY -->
                            <div class="col-md-3">
                                <label class="text-dark fw-semibold">From City</label>
                                <select  name="pickup" id="fromCity" class="form-control">
                                    <option value="">Select City</option>
                                    @foreach ($grouped as $country => $groupCities)
                                        <optgroup label="{{ $country }}">
                                            @foreach ($groupCities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ request('pickup') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <!-- TO CITY -->
                            <div class="col-md-3">
                                <label class="text-dark fw-semibold">To City</label>
                                <select id="toCity" name="dropoff" id="selectOp" class="form-control">
                                    <option value="">Select City</option>
                                    @foreach ($grouped as $country => $groupCities)
                                        <optgroup label="{{ $country }}">
                                            @foreach ($groupCities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ request('dropoff') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>

                            <!-- DATEPICKER -->
                            <div class="col-md-3">
                                <label class="text-dark fw-semibold">Travel Date</label>
                                <input type="text" name="flight_date" value="{{ request('flight_date') }}"
                                    id="travelDate" class="form-control" placeholder="Select Date">
                            </div>

                            <!-- MIN CAPACITY -->
                            <div class="col-md-3">
                                <label class="text-dark fw-semibold">Min Capacity (kg)</label>
                                <input type="number" name="min_capacity" class="form-control" placeholder="5"
                                    value="{{ request('min_capacity') }}">
                            </div>

                            <!-- SEARCH BUTTON -->
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary w-100 py-2">
                                    🔍 Find Baggage Space
                                </button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

            <!-- STATS SECTION -->
            <div class="container-fluid mt-5">
                <div class="container py-5 text-center">
                    <div class="row justify-content-center">

                        <div class="col-md-3 mb-3">
                            <div class="stats-number">10K+</div>
                            <div class="stats-label">Active Travelers</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="stats-number">500+</div>
                            <div class="stats-label">Flight Routes</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="stats-number">98%</div>
                            <div class="stats-label">Safe Delivery</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <div class="stats-number">60%</div>
                            <div class="stats-label">Cost Savings</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <section class="locations_area pt-25 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section_title pb-15">
                            <h3 class="title">Explore The Locations</h3>
                        </div>
                    </div>
                </div>

                <div class="locations_wrapper">
                    <div class="row justify-content-center">

                        @foreach ($countries as $country)
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-3">
                                <a href="{{ route('/listspace', ['country' => $country->id]) }}"
                                    class="text-decoration-none d-block">
                                    <div class="single_locations mt-30 btn-radius">
                                        <div class="locations_image">
                                            {{-- IMAGE — If you stored country flags/photos in DB --}}
                                            @if ($country->image)
                                                <img src="{{ asset('storage/' . $country->image) }}"
                                                    class="rounded-country" alt="{{ $country->name }}">
                                            @else
                                                <img src="{{ asset('img/default-country.jpg') }}">
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
                                </a>
                            </div>
                        @endforeach

                    </div>

                    <div class="locations_btn text-center ">
                        <a class="main-btn btn-radius" href="#">View all Locations</a>
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

                            <div class="tabs_menu mt-50 ">
                                <ul class="nav btn-radius" id="myTab" role="tablist">
                                    <li><a class="active btn-radius" id="popular-tab" data-bs-toggle="tab"
                                            href="#popular" role="tab" aria-controls="popular"
                                            aria-selected="true">Popular
                                            Flights</a></li>
                                    <li><a class="btn-radius" id="featured-tab" data-bs-toggle="tab" href="#featured"
                                            role="tab" aria-controls="featured" aria-selected="false">Featured
                                            Flights</a></li>
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
                                        <a href="{{ route('flight.details', $flight->id) }}"
                                            class="text-decoration-none text-dark">
                                            <div class="single_ads_card mt-30 btn-radius">
                                                <div class="ads_card_image">
                                                    @if ($flight->ticket_pic)
                                                        <img src="{{ asset('storage/' . $flight->ticket_pic) }}"
                                                            alt="ticket" class="ads-img">
                                                    @else
                                                        <img src="{{ asset('img/itlay.jpeg') }}" alt="ticket"
                                                            class="ads-img">
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
                                                        <span class="price">{{ number_format($flight->total, 2) }}
                                                            USD</span>
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
                                                    <span class="price">{{ number_format($flight->total, 2) }} USD</span>
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


        {{-- <section class="choose_area">
            <div class="container">

                <div class="row" style="text-align: center;">

                    <div class="col-lg-12">
                        <div class="choose_content pt-35">
                            <div class="section_title pb-20">
                                <h3 class="title">Why Choose LuggageLink</h3>
                            </div>
                            <p>
                                The smart way to ship internationally
                            </p>

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
                                <h4 class="title"><a href="#">Cost-Effective Shipping</a></h4>
                                <p>Save up to 70% on international shipping costs</p>
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
                                <h4 class="title"><a href="#">Verified Travelers</a></h4>
                                <p>All travelers are verified and rated</p>
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
                                <h4 class="title"><a href="#">Real-time Tracking</a></h4>
                                <p>Track your items from pickup to delivery</p>
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
                                <h4 class="title"><a href="#">Secure Payments</a></h4>
                                <p>Protected payments until delivery</p>
                                <a class="more" href="#">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="choose_area py-5">
            <div class="container">

                <!-- Section Header -->
                <div class="row text-center mb-4">
                    <div class="col-12">
                        <h2 class="fw-bold">Why Choose LuggageLink?</h2>
                        <p class="text-muted">The smart way to ship internationally</p>
                    </div>
                </div>

                <div class="row">
                    <!-- Feature 1 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="feature-card text-center p-4 bg-white shadow-sm rounded">
                            <div class="feature-icon mb-3" style="font-size:32px;">💰</div>
                            <div class="feature-title font-weight-bold mb-2">Cost-Effective Shipping</div>
                            <div class="feature-text text-muted" style="font-size:14px;">
                                Save up to 70% on international shipping costs
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="feature-card text-center p-4 bg-white shadow-sm rounded">
                            <div class="feature-icon mb-3" style="font-size:32px;">✔️</div>
                            <div class="feature-title font-weight-bold mb-2">Verified Travelers</div>
                            <div class="feature-text text-muted" style="font-size:14px;">
                                All travelers are verified <br />and rated
                            </div>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="feature-card text-center p-4 bg-white shadow-sm rounded">
                            <div class="feature-icon mb-3" style="font-size:32px;">📍</div>
                            <div class="feature-title font-weight-bold mb-2">Real-time Tracking</div>
                            <div class="feature-text text-muted" style="font-size:14px;">
                                Track your items from pickup to delivery
                            </div>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="feature-card text-center p-4 bg-white shadow-sm rounded">
                            <div class="feature-icon mb-3" style="font-size:32px;">🔒</div>
                            <div class="feature-title font-weight-bold mb-2">Secure Payments</div>
                            <div class="feature-text text-muted" style="font-size:14px;">
                                Protected payments until <br />delivery
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        {{-- <section class="services_area pt-115">
            
        </section> --}}
        <section class="how-works py-5">
            <div class="container">

                <!-- Section Header -->
                <div class="row text-center mb-5">
                    <div class="col-12">
                        <h2 class="font-weight-bold mb-2">How LuggageLink Works</h2>
                        <p class="text-muted mb-4">Simple, secure, and efficient shipping</p>
                    </div>
                </div>

                <div class="row">

                    <!-- Traveler Journey -->
                    <div class="col-md-6 mb-4">
                        <div class="journey-box p-4"
                            style="background: #f7faff; border-radius:12px; box-shadow:0 0 20px rgba(0,0,0,0.05);">

                            <h3 class="text-primary font-weight-bold mb-4">Traveler Journey</h3>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; background:#dfeaff; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    ✈️</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 1</div>
                                <div class="step-title font-weight-bold">Create Your Profile</div>
                                <p>Sign up and verify your identity with required documents</p>
                            </div>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; background:#dfeaff; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    🛄</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 1–2</div>
                                <div class="step-title font-weight-bold">List Your Journey</div>
                                <p>Add your flight details, dates, and available luggage space</p>
                            </div>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon bg-success text-white"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    ✔</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 2–3</div>
                                <div class="step-title font-weight-bold">Accept Requests</div>
                                <p>Review and accept shipping requests from customers</p>
                            </div>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; background:#dfeaff; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    📦</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 3–4</div>
                                <div class="step-title font-weight-bold">Collect Items</div>
                                <p>Meet the customer at agreed location to collect items</p>
                            </div>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; background:#dfeaff; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    🎯</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 4–5</div>
                                <div class="step-title font-weight-bold">Safe Delivery</div>
                                <p>Deliver items at destination and receive your payment</p>
                            </div>

                        </div>
                    </div>

                    <!-- Customer Journey -->
                    <div class="col-md-6 mb-4">
                        <div class="journey-box customer p-4"
                            style="background:#fff8e8; border-radius:12px; box-shadow:0 0 20px rgba(0,0,0,0.05);">

                            <h3 class="text-warning font-weight-bold mb-4">Customer Journey</h3>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; background:#dfeaff; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    👤</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 1</div>
                                <div class="step-title font-weight-bold">Create Account</div>
                                <p>Sign up and verify your identity for secure shipping</p>
                            </div>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; background:#dfeaff; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    🔍</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 1–2</div>
                                <div class="step-title font-weight-bold">Find Travelers</div>
                                <p>Search for verified travelers matching your route</p>
                            </div>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; background:#dfeaff; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    💳</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 2–3</div>
                                <div class="step-title font-weight-bold">Book & Pay</div>
                                <p>Make secure payment and arrange item handoff</p>
                            </div>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; background:#dfeaff; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    📡</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 3–4</div>
                                <div class="step-title font-weight-bold">Track Shipment</div>
                                <p>Monitor your items with real-time tracking updates</p>
                            </div>

                            <div class="step-item mb-4" style="position:relative; padding-left:40px;">
                                <div class="step-icon"
                                    style="position:absolute; left:0; top:0; width:26px; height:26px; border-radius:50%; background:#dfeaff; display:flex; align-items:center; justify-content:center; font-size:14px;">
                                    📥</div>
                                <div class="step-days text-muted" style="font-size:14px;">Day 4–5</div>
                                <div class="step-title font-weight-bold">Receive Items</div>
                                <p>Collect your items at the destination</p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>



        <section class="call_to_action_area pt-20 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="call_to_action_content mt-45">
                            <h4 class="title">Subscribe For Update</h4>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="call_to_action_form mt-50 ">
                            <form action="#">
                                <i class="fal fa-envelope"></i>
                                <input class="btn-radius" type="text" placeholder="Enter your mail address . . .">
                                <button class="main-btn btn-radius">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- <a href="#" class="back-to-top" ><i class="fa fa-angle-up"></i></a> --}}


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


            document.addEventListener('DOMContentLoaded', function() {

                const preloader = document.getElementById('ll-preloader');
                const page = document.getElementById('ll-page-wrapper');

                document.body.classList.add('ll-loading');

                // FORCE loader for 3 seconds
                setTimeout(function() {

                    if (preloader) {
                        preloader.style.opacity = '0';
                        preloader.style.transition = 'opacity 0.4s ease';
                    }

                    setTimeout(function() {
                        if (preloader) preloader.style.display = 'none';
                        if (page) page.style.display = 'block';
                        document.body.classList.remove('ll-loading');
                    }, 400);

                }, 3000); // ⏱️ 3 seconds guaranteed
            });
        </script>



    </div>
