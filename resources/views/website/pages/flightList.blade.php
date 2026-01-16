@extends('website.layouts.app')

@section('title', 'Available Baggage Space')

@push('style')
    <style>
        .header-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%) !important;
            color: white;
            padding: 2rem 0;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header-section h1 {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .header-section p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
        }

        .flight-card {
            border-radius: 0.75rem;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 1.5rem;
            overflow: hidden;
            height: 100%;
        }

        .flight-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .flight-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .airline-badge {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--primary-color);
            line-height: 1.3;
        }

        .price-tag {
            background-color: var(--accent-color);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 1rem;
            white-space: nowrap;
        }

        .flight-details {
            margin-bottom: 1.25rem;
        }

        .flight-route {
            font-weight: 600;
            font-size: 1.15rem;
            margin-bottom: 0.5rem;
            color: #333;
            line-height: 1.4;
        }

        .departure-date {
            color: var(--secondary-color);
            font-size: 0.95rem;
            margin-bottom: 0.75rem;
        }

        .capacity-badge {
            background-color: rgba(25, 135, 84, 0.1);
            color: var(--accent-color);
            font-weight: 600;
            padding: 0.4rem 1rem;
            border-radius: 2rem;
            font-size: 0.95rem;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .flight-description {
            color: #555;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .restrictions-section {
            margin-bottom: 1.5rem;
        }

        .restrictions-label {
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #444;
            font-size: 0.95rem;
        }

        .restriction-item {
            background-color: rgba(108, 117, 125, 0.08);
            padding: 0.4rem 0.85rem;
            border-radius: 0.5rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            display: inline-block;
            font-size: 0.85rem;
            color: #555;
            line-height: 1.4;
        }

        .traveler-info {
            border-top: 1px dashed rgba(0, 0, 0, 0.1);
            padding-top: 1.25rem;
            margin-top: auto;
        }

        .traveler-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .traveler-name-rating {
            flex: 1;
            min-width: 200px;
        }

        .traveler-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
            color: #333;
            font-size: 1.05rem;
        }

        .rating {
            color: #ffc107;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .rating-text {
            color: #666;
            margin-left: 0.5rem;
        }

        .contact-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.6rem 1.75rem;
            border-radius: 0.5rem;
            font-weight: 500;
            transition: background-color 0.2s;
            white-space: nowrap;
            font-size: 0.95rem;
        }

        .contact-btn:hover {
            background-color: #0a58ca;
            color: white;
        }

        .section-title {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid rgba(13, 110, 253, 0.2);
            font-weight: 600;
        }

        .filter-section {
            background-color: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            margin-bottom: 2rem;
        }

        .filter-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: flex-end;
        }

        .filter-group {
            flex: 1;
            min-width: 180px;
        }

        .filter-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: #444;
            font-size: 0.95rem;
        }

        .stats-box {
            background-color: white;
            border-radius: 0.75rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            margin-bottom: 2rem;
            height: 100%;
        }

        .stats-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            line-height: 1.2;
            margin-bottom: 0.25rem;
        }

        .stats-label {
            color: var(--secondary-color);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        footer {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--secondary-color);
            text-align: center;
            font-size: 0.9rem;
            line-height: 1.6;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <!-- Header Section -->
        <div class="header-section text-center">
            <h1>Available Baggage Space</h1>
            <p class="px-3">Connect with verified travelers who have spare baggage capacity on their flights</p>
        </div>

        <!-- Stats Section -->
        <div class="row mb-4">
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-box">
                    <div class="stats-number">6</div>
                    <div class="stats-label">Available Flights</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-box">
                    <div class="stats-number">112kg</div>
                    <div class="stats-label">Total Capacity</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-box">
                    <div class="stats-number">2</div>
                    <div class="stats-label">Verified Travelers</div>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="stats-box">
                    <div class="stats-number">4.8</div>
                    <div class="stats-label">Avg. Rating</div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="filter-section">
            <h3 class="section-title">Filter Options</h3>
            <div class="filter-row d-flex flex-wrap align-items-end">
                <div class="filter-group flex-fill mr-2 mb-2">
                    <div class="filter-label">Departure City</div>
                    <select class="form-control" id="departureCity">
                        <option selected>All Cities</option>
                        <option>New York, NY</option>
                        <option>Los Angeles, CA</option>
                        <option>Miami, FL</option>
                        <option>Chicago, IL</option>
                        <option>Boston, MA</option>
                        <option>Seattle, WA</option>
                    </select>
                </div>
                <div class="filter-group flex-fill mr-2 mb-2">
                    <div class="filter-label">Destination City</div>
                    <select class="form-control" id="destinationCity">
                        <option selected>All Cities</option>
                        <option>London, UK</option>
                        <option>Paris, France</option>
                        <option>Barcelona, Spain</option>
                        <option>Frankfurt, Germany</option>
                        <option>Amsterdam, Netherlands</option>
                        <option>Tokyo, Japan</option>
                    </select>
                </div>
                <div class="filter-group flex-fill mr-2 mb-2">
                    <div class="filter-label">Max Price per kg</div>
                    <input type="range" class="custom-range" id="maxPrice" min="5" max="20" value="20">
                    <div class="d-flex justify-content-between mt-1">
                        <small class="text-muted">$5</small>
                        <small class="text-muted" id="priceValue">$20</small>
                    </div>
                </div>
                <div class="filter-group flex-fill mb-2">
                    <button class="btn btn-primary w-100">Apply Filters</button>
                </div>
            </div>
        </div>

        <!-- Flight Listings -->
        <h3 class="section-title">Available Flights</h3>
        <div class="row">
            @php
                $flights = [
                    [
                        'airline' => 'UA123 • United Airlines',
                        'price' => '$8/kg',
                        'route' => 'New York, NY → London, UK',
                        'departure' => '2/14/2025',
                        'capacity' => '15kg available',
                        'description' =>
                            'Traveling light with extra baggage allowance. Happy to help with small packages!',
                        'restrictions' => ['No liquids', 'No electronics', '+1 more'],
                        'traveler' => 'Sarah Johnson',
                        'rating' => '4.8',
                        'reviews' => 24,
                    ],
                    [
                        'airline' => 'BA456 • British Airways',
                        'price' => '$12/kg',
                        'route' => 'Los Angeles, CA → Paris, France',
                        'departure' => '2/17/2025',
                        'capacity' => '20kg available',
                        'description' => 'Business traveler with premium baggage allowance. Reliable and experienced.',
                        'restrictions' => ['No food items', 'No batteries'],
                        'traveler' => 'Emma Wilson',
                        'rating' => '4.8',
                        'reviews' => 24,
                    ],
                    [
                        'airline' => 'DL789 • Delta Airlines',
                        'price' => '$10/kg',
                        'route' => 'Miami, FL → Barcelona, Spain',
                        'departure' => '2/21/2025',
                        'capacity' => '12kg available',
                        'description' => 'Perfect for documents and small business items. Quick and secure delivery.',
                        'restrictions' => ['Documents only', 'Max 5kg per item'],
                        'traveler' => 'Sarah Johnson',
                        'rating' => '4.8',
                        'reviews' => 24,
                    ],
                    [
                        'airline' => 'LH321 • Lufthansa',
                        'price' => '$9/kg',
                        'route' => 'Chicago, IL → Frankfurt, Germany',
                        'departure' => '2/24/2025',
                        'capacity' => '18kg available',
                        'description' => 'Frequent flyer with excellent track record. Professional service guaranteed.',
                        'restrictions' => ['No liquids over 100ml', 'No sharp objects'],
                        'traveler' => 'Emma Wilson',
                        'rating' => '4.8',
                        'reviews' => 24,
                    ],
                    [
                        'airline' => 'AF654 • Air France',
                        'price' => '$11/kg',
                        'route' => 'Boston, MA → Amsterdam, Netherlands',
                        'departure' => '2/27/2025',
                        'capacity' => '25kg available',
                        'description' => 'Large capacity available for fashion items and personal goods.',
                        'restrictions' => ['No hazardous materials', 'Clothing and accessories only'],
                        'traveler' => 'Sarah Johnson',
                        'rating' => '4.8',
                        'reviews' => 24,
                    ],
                    [
                        'airline' => 'KL987 • KLM',
                        'price' => '$15/kg',
                        'route' => 'Seattle, WA → Tokyo, Japan',
                        'departure' => '3/4/2025',
                        'capacity' => '22kg available',
                        'description' => 'Tech-friendly traveler. Perfect for electronics and gadgets.',
                        'restrictions' => ['Electronics welcome', 'No food items'],
                        'traveler' => 'Emma Wilson',
                        'rating' => '4.8',
                        'reviews' => 24,
                    ],
                ];
            @endphp

            @foreach ($flights as $flight)
                <div class="col-lg-6 mb-4">
                    <div class="flight-card">
                        <div class="card-body d-flex flex-column">
                            <div class="flight-header d-flex justify-content-between flex-wrap mb-3">
                                <div class="airline-badge">{{ $flight['airline'] }}</div>
                                <div class="price-tag">{{ $flight['price'] }}</div>
                            </div>
                            <div class="flight-details mb-3">
                                <div class="flight-route">{{ $flight['route'] }}</div>
                                <div class="departure-date"><strong>Departs:</strong> {{ $flight['departure'] }}</div>
                                <div class="capacity-badge">{{ $flight['capacity'] }}</div>
                            </div>
                            <div class="flight-description">{{ $flight['description'] }}</div>
                            <div class="restrictions-section mb-3">
                                <div class="restrictions-label">Restrictions:</div>
                                <div>
                                    @foreach ($flight['restrictions'] as $r)
                                        <span class="restriction-item">{{ $r }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="traveler-info mt-auto pt-3 border-top">
                                <div class="traveler-details d-flex justify-content-between flex-wrap">
                                    <div class="traveler-name-rating">
                                        <div class="traveler-name">{{ $flight['traveler'] }}</div>
                                        <div class="rating text-warning">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($flight['rating']))
                                                    <i class="bi bi-star-fill"></i>
                                                @elseif($i - $flight['rating'] < 1)
                                                    <i class="bi bi-star-half"></i>
                                                @else
                                                    <i class="bi bi-star"></i>
                                                @endif
                                            @endfor
                                            <span class="rating-text text-muted">{{ $flight['rating'] }}
                                                ({{ $flight['reviews'] }} reviews)</span>
                                        </div>
                                    </div>
                                    <button class="contact-btn btn btn-primary">Contact</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Footer -->
        <footer class="mt-4 text-center text-muted">
            <p>Available Baggage Space &copy; 2025. Connect with verified travelers who have spare baggage capacity on their
                flights.</p>
            <p>This is a demonstration page. Actual booking and transactions would be handled through secure channels.</p>
        </footer>
    </div>

    <!-- Custom JS -->
    @push('scripts')
        <script>
            document.getElementById('maxPrice').addEventListener('input', function() {
                document.getElementById('priceValue').textContent = '$' + this.value;
            });

            document.querySelectorAll('.contact-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const flightCard = this.closest('.flight-card');
                    const airline = flightCard.querySelector('.airline-badge').textContent.split('•')[0].trim();
                    const traveler = flightCard.querySelector('.traveler-name').textContent;
                    alert(
                        `Contacting ${traveler} for ${airline}. In a real application, this would connect you with the traveler.`);
                });
            });
        </script>
    @endpush
@endsection
