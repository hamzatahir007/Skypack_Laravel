@extends('website.layouts.app')

@section('title', 'Available Baggage Space')

@section('content')

    {{-- PAGE-ONLY STYLES --}}

    <style>
        .flightlist-page {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --accent-color: #198754;
            /* background: #f8f9fa; */
            padding-bottom: 150px;
        }

        .flightlist-page .header-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: #fff;
            padding: 2rem 0;
            border-radius: 20px;
            margin-bottom: 2rem;
            box-shadow: 0 14px 42px rgba(0, 0, 0, .08);
        }

        .filter-options {
            border-radius: .75rem;
            border: none;
            box-shadow: 0 14px 42px rgba(0, 0, 0, .08);
            transition: .3s;
            overflow: hidden;
            /* height: 100% */
        }

        .flightlist-page .flight-card {
            border-radius: .75rem;
            border: none;
            box-shadow: 0 14px 42px rgba(0, 0, 0, .08);
            transition: .3s;
            overflow: hidden;
            height: 100%
        }

        .flightlist-page .flight-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .12)
        }

        .flightlist-page .airline-badge {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--primary-color)
        }

        .flightlist-page .price-tag {
            background: var(--accent-color);
            color: #fff;
            padding: .4rem 1rem;
            border-radius: 2rem;
            font-weight: 600
        }

        .flightlist-page .capacity-badge {
            background: rgba(25, 135, 84, .1);
            color: var(--accent-color);
            font-weight: 600;
            padding: .4rem 1rem;
            border-radius: 2rem;
            display: inline-block
        }

        .flightlist-page .restriction-item {
            background: rgba(108, 117, 125, .08);
            padding: .4rem .85rem;
            border-radius: .5rem;
            font-size: .85rem;
            margin-right: .4rem;
            margin-bottom: .4rem;
            display: inline-block
        }

        .flightlist-page .contact-btn {
            background: var(--primary-color);
            color: #fff;
            border: none;
            padding: .6rem 1.75rem;
            border-radius: .5rem;
            font-weight: 500
        }

        .flightlist-page .contact-btn:hover {
            background: #0a58ca
        }

        .flightlist-page .stats-box {
            background: #fff;
            border-radius: 20px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 14px 42px rgba(0, 0, 0, .08);
        }

        .flightlist-page .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color)
        }

        .flightlist-page footer {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0, 0, 0, .1);
            color: #6c757d;
            text-align: center;
            font-size: .9rem
        }


        /* BOOTSTRAP 4 FLIGHT CARD ONLY */
        .flight-card-bs4 {
            background: #ffffff;
            border-radius: 20px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            height: 100%;
        }

        .flight-card-bs4:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .flight-card-bs4 .flight-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .flight-card-bs4 .airline-badge {
            font-weight: 600;
            font-size: 1.05rem;
            color: #0d6efd;
        }

        .flight-card-bs4 .price-tag {
            background: #198754;
            color: #fff;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .flight-card-bs4 .flight-route {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .flight-card-bs4 .departure-date {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .flight-card-bs4 .capacity-badge {
            display: inline-block;
            background: rgba(25, 135, 84, 0.12);
            color: #198754;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.9rem;
        }

        .flight-card-bs4 .flight-description {
            margin: 15px 0;
            color: #555;
            line-height: 1.6;
        }

        .flight-card-bs4 .restrictions-label {
            font-weight: 600;
            margin-bottom: 6px;
        }

        .flight-card-bs4 .restriction-item {
            display: inline-block;
            background: rgba(108, 117, 125, 0.1);
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            margin-right: 6px;
            margin-bottom: 6px;
        }

        .flight-card-bs4 .traveler-info {
            border-top: 1px dashed rgba(0, 0, 0, 0.1);
            padding-top: 15px;
            margin-top: 20px;
        }

        .flight-card-bs4 .traveler-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .flight-card-bs4 .traveler-name {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .flight-card-bs4 .rating {
            color: #ffc107;
            font-size: 0.9rem;
        }

        .flight-card-bs4 .rating-text {
            color: #6c757d;
            margin-left: 6px;
        }

        .flight-card-bs4 .contact-btn {
            background: #0d6efd;
            color: #fff;
            border: none;
            padding: 8px 24px;
            border-radius: 8px;
            font-weight: 500;
            transition: background 0.2s;
        }

        .flight-card-bs4 .contact-btn:hover {
            background: #0a58ca;
        }
    </style>

    <div class="flightlist-page text-muted">
        <div class="container">
            {{-- HEADER --}}
            <div class="header-section text-center">
                <h1 style="color: white">Available Baggage Space</h1>
                <p class="px-3" style="color: white">Connect with verified travelers who have spare baggage capacity on
                    their flights</p>
            </div>

            {{-- STATS --}}
            <div class="row mb-4">
                <div class="col-md-3 col-6 mb-3">
                    <div class="stats-box">
                        <div class="stats-number"> {{ $stats['total_flights'] ?? '6' }}</div>
                        <div class="text-muted">Available Flights</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="stats-box">
                        <div class="stats-number">{{ $stats['total_capacity'] ?? '112' }}kg</div>
                        <div class="text-muted">Total Capacity</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="stats-box">
                        <div class="stats-number">{{ $stats['verified_travelers'] ?? '2' }}</div>
                        <div class="text-muted">Verified Travelers</div>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="stats-box">
                        <div class="stats-number">4.8</div>
                        <div class="text-muted">Avg. Rating</div>
                    </div>
                </div>
            </div>

            {{-- FILTER --}}
            <div class="card mb-4 filter-options">
                <div class="card-body">
                    <h4 class="text-primary mb-3">Filter Options</h4>
                    <form method="GET" action="{{ route('/listspace') }}">
                        @php
                            $grouped = $cities->groupBy(fn($c) => $c->country->name ?? 'Other');
                        @endphp

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label>Departure City</label>
                                <select id="fromCity" name="pickup" class="form-control">
                                    <option value="">All Cities</option>
                                    @foreach ($grouped as $country => $groupCities)
                                        <optgroup label="{{ $country }}">
                                            @foreach ($groupCities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ request('pickup') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                    {{-- <option>All Cities</option>
                                    <option>New York</option>
                                    <option>Los Angeles</option> --}}
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Destination City</label>
                                <select id="toCity" name="dropoff" class="form-control">
                                    <option value="">All Cities</option>
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
                            <div class="col-md-3 mb-3">
                                <label>Max Price / kg</label>
                                <input type="range" name="max_price" class="custom-range" min="1" max="50"
                                    value="20" id="priceRange" value="{{ request('max_price', 50) }}"
                                    oninput="document.getElementById('priceValue').innerText='$'+this.value">
                                <small id="priceValue">${{ request('max_price', 50) }}</small>
                            </div>
                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <button class="btn btn-primary btn-block btn-radius">Apply Filters</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <h4 class="text-primary mb-3">Available Flights
            </h4>

            {{-- FLIGHTS --}}
            <div class="row">
                {{-- @foreach ([['UA123 • United Airlines', '$8/kg', 'New York → London', '2/14/2025', '15kg', 'Sarah Johnson'], ['BA456 • British Airways', '$12/kg', 'Los Angeles → Paris', '2/17/2025', '20kg', 'Emma Wilson'], ['DL789 • Delta', '$10/kg', 'Miami → Barcelona', '2/21/2025', '12kg', 'Sarah Johnson'], ['LH321 • Lufthansa', '$9/kg', 'Chicago → Frankfurt', '2/24/2025', '18kg', 'Emma Wilson'], ['AF654 • Air France', '$11/kg', 'Boston → Amsterdam', '2/27/2025', '25kg', 'Sarah Johnson'], ['KL987 • KLM', '$15/kg', 'Seattle → Tokyo', '3/4/2025', '22kg', 'Emma Wilson']] as $flight) --}}
                @forelse ($flights as $flight)
                    <div class="col-lg-6 mb-4">
                        <div class="flight-card-bs4">
                            <div class="card-body">

                                <div class="flight-header">
                                    <div class="airline-badge">
                                        Flight PNR: {{ $flight->pnr_no ?? 'Flight' }}
                                        {{-- UA123 • United Airlines --}}
                                    </div>
                                    <div class="price-tag">
                                        {{-- $8/kg --}}
                                        ${{ $flight->rate_per_unit }}/kg
                                    </div>
                                </div>

                                <div class="flight-details">
                                    <div class="flight-route">
                                        {{ $flight->cityOrigin->name }}
                                        →
                                        {{ $flight->cityDestination->name }}
                                        {{-- New York, NY → London, UK --}}
                                    </div>
                                    <div class="departure-date">
                                        <strong>Departs:</strong>
                                        {{ optional($flight->flight_date)->format('d M Y') }}
                                        {{-- 2/14/2025 --}}
                                    </div>
                                    <div class="capacity-badge">
                                        {{ $flight->weight }}kg available
                                        {{-- 15kg available --}}
                                    </div>
                                </div>

                                @if ($flight->description)
                                    <div class="flight-description">
                                        {{ $flight->description }}
                                    </div>
                                @endif


                                {{-- <div class="flight-description">
                                    Traveling light with extra baggage allowance. Happy to help with small packages!
                                </div> --}}

                                {{-- <div class="restrictions-section">
                                    <div class="restrictions-label">Restrictions:</div>
                                    <span class="restriction-item">No liquids</span>
                                    <span class="restriction-item">No electronics</span>
                                    <span class="restriction-item">+1 more</span>
                                </div> --}}

                                @if (!empty($flight->restrictions))
                                    <div class="restrictions-section">
                                        <div class="restrictions-label">Restrictions:</div>

                                        @foreach (array_slice($flight->restrictions, 0, 2) as $tag)
                                            <span class="restriction-item">{{ $tag }}</span>
                                        @endforeach

                                        @if (count($flight->restrictions) > 2)
                                            <span class="restriction-item">
                                                +{{ count($flight->restrictions) - 2 }} more
                                            </span>
                                        @endif
                                    </div>
                                @endif


                                <div class="traveler-info">
                                    <div class="traveler-details">
                                        <div>
                                            <div class="traveler-name">
                                                {{ $flight->traveler->full_name }}
                                                {{-- Sarah Johnson --}}
                                            </div>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span class="rating-text">4.8 (24 reviews)</span>
                                            </div>
                                        </div>

                                        <a href="{{ route('flight.details', $flight->id) }}"
                                            class="contact-btn text-white btn-radius">View Details</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        No flights found.
                    </div>
                @endforelse
            </div>


        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $flights->links() }}
    </div>
    {{-- PAGE JS --}}

    <script>
        document.getElementById('priceRange').addEventListener('input', function() {
            document.getElementById('priceValue').innerText = '$' + this.value
        })
    </script>

@endsection
