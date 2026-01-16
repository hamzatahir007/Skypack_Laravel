@extends('website.layouts.app')

@section('title', 'Available Baggage Space')

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
                    'description' => 'Traveling light with extra baggage allowance. Happy to help with small packages!',
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

        @foreach($flights as $flight)
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
                            @foreach($flight['restrictions'] as $r)
                                <span class="restriction-item">{{ $r }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="traveler-info mt-auto pt-3 border-top">
                        <div class="traveler-details d-flex justify-content-between flex-wrap">
                            <div class="traveler-name-rating">
                                <div class="traveler-name">{{ $flight['traveler'] }}</div>
                                <div class="rating text-warning">
                                    @for($i=1; $i<=5; $i++)
                                        @if($i <= floor($flight['rating']))
                                            <i class="bi bi-star-fill"></i>
                                        @elseif($i - $flight['rating'] < 1)
                                            <i class="bi bi-star-half"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @endfor
                                    <span class="rating-text text-muted">{{ $flight['rating'] }} ({{ $flight['reviews'] }} reviews)</span>
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
        <p>Available Baggage Space &copy; 2025. Connect with verified travelers who have spare baggage capacity on their flights.</p>
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
            alert(`Contacting ${traveler} for ${airline}. In a real application, this would connect you with the traveler.`);
        });
    });
</script>
@endpush
@endsection
