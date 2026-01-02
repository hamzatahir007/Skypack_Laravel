@extends('website/layouts.app') {{-- or layouts.admin / your main layout --}}

@section('title', 'Flight Details - ' . ($flight->pnr_no ?? 'PNR'))

@section('content')
    <div class="container py-4">
        <div class="row g-3">

            {{-- Left / Main Column --}}
            <div class="col-lg-8">
                <div class="card mb-3 shadow-sm">
                    {{-- Cover image --}}
                    <div class="row g-0">
                        <div class="col-md-5">
                            @if ($flight->ticket_pic)
                                <img src="{{ asset('storage/' . $flight->ticket_pic) }}"
                                    class="img-fluid h-100 w-100 object-fit-cover" alt="Ticket image">
                            @else
                                <img src="{{ asset('img/bags.jpeg') }}" class="img-fluid h-100 w-100 object-fit-cover"
                                    alt="default">
                            @endif
                        </div>

                        <div class="col-md-7">
                            <div class="card-body">
                                <h3 class="card-title mb-1">PNR: {{ $flight->pnr_no ?? '—' }}</h3>
                                <p class="text-muted mb-2">Posted:
                                    {{ optional($flight->created_at)->format('d M, Y H:i') ?? '-' }}</p>

                                <div class="mb-3">
                                    <strong>Traveler:</strong>
                                    <div>{{ $flight->traveler->full_name ?? 'Traveler' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mb-2">
                                        <small class="text-muted">Origin</small>
                                        <div class="fw-medium">
                                            <i class="fa fa-map-marker-alt text-primary me-1"></i>
                                            {{ $flight->cityOrigin->name ?? ($flight->origin ?? '-') }}
                                        </div>
                                        <div class="text-muted small">
                                            {{ optional($flight->origin_date_time)->format('d M, Y H:i') ?? '-' }}
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mb-2">
                                        <small class="text-muted">Destination</small>
                                        <div class="fw-medium">
                                            <i class="fa fa-map-marker-alt text-danger me-1"></i>
                                            {{ $flight->cityDestination->name ?? ($flight->destination ?? '-') }}
                                        </div>
                                        <div class="text-muted small">
                                            {{ optional($flight->destination_date_time)->format('d M, Y H:i') ?? '-' }}
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="mb-2">
                                    <strong>Status:</strong>
                                    <span
                                        class="badge
                                    @if ($flight->status == 'Pending') bg-warning
                                    @elseif($flight->status == 'Completed') bg-success
                                    @else bg-secondary @endif">
                                        {{ $flight->status }}
                                    </span>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <small class="text-muted">Weight (kg)</small>
                                        <div>{{ $flight->weight ?? '-' }}</div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Rate / Unit (USD)</small>
                                        <div>{{ $flight->rate_per_unit ? number_format($flight->rate_per_unit, 2) : '-' }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <small class="text-muted">Keyfield:</small>
                                    <div>{{ $flight->keyfield ?? '-' }}</div>
                                </div>

                                <div class="mt-3">
                                    <small class="text-muted">QR Code:</small>
                                    <div>
                                        @if ($flight->Qrcode)
                                            {{-- assume Qrcode stores filename in storage or text (if image path) --}}
                                            @if (Str::endsWith($flight->Qrcode, ['.png', '.jpg', '.jpeg', '.svg']))
                                                <img src="{{ asset('storage/' . $flight->Qrcode) }}" alt="QR"
                                                    style="max-width:150px;">
                                            @else
                                                <div class="p-2 border rounded">{{ $flight->Qrcode }}</div>
                                            @endif
                                        @else
                                            <div class="text-muted">No QR code available.</div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- Description / Additional Info card (expandable if needed) --}}
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3">Additional Details</h5>

                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <small class="text-muted">Created by (user id)</small>
                                <div>{{ $flight->create_by ?? '-' }}</div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <small class="text-muted">Updated by</small>
                                <div>{{ $flight->update_by ?? '-' }}</div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <small class="text-muted">Deleted by</small>
                                <div>{{ $flight->delete_by ?? '-' }}</div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <small class="text-muted">Soft Deleted At</small>
                                <div>{{ optional($flight->deleted_at)->format('d M, Y H:i') ?? '-' }}</div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            {{-- Right / Sidebar --}}
            <div class="col-lg-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="mb-3">Booking Summary</h5>

                        <div class="d-flex justify-content-between">
                            <div>Weight</div>
                            <div>{{ $flight->weight ? number_format($flight->weight, 2) . ' kg' : '-' }}</div>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <div>Rate / Unit</div>
                            <div>{{ $flight->rate_per_unit ? number_format($flight->rate_per_unit, 2) . ' USD' : '-' }}
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted d-block">Total</small>
                                <strong class="h4">{{ $flight->total ? number_format($flight->total, 2) : '0.00' }}
                                    USD</strong>
                            </div>
                        </div>

                        <div class="mt-3">
                            @if (session()->has('client_id'))

                                @php
                                    $alreadySent = \App\Models\InquiryMaster::where('client_id', session('client_id'))
                                        ->where('travel_flight_id', $flight->id)
                                        ->exists();
                                @endphp

                                @if ($alreadySent)
                                    <div class="alert alert-success text-center">
                                        <strong>You already sent an inquiry for this flight.</strong>
                                    </div>
                                @else
                                    <a href="{{ route('client.inquiries.create', ['flight_id' => $flight->id]) }}"
                                        class="btn btn-primary w-100 mb-2">
                                        Send Inquiry
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('client.login') }}" class="btn btn-primary w-100 mb-2">
                                    Login to Send Inquiry
                                </a>
                            @endif

                            {{-- <a href="{{ route('travel_flights.edit', $flight->id) }}" class="btn btn-primary w-100 mb-2">Edit Flight</a>

                        <form action="{{ route('travel_flights.destroy', $flight->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger w-100">Delete Flight</button>
                        </form> --}}
                        </div>
                    </div>
                </div>

                {{-- Small card for map / locations (optional) --}}
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h6>Route</h6>
                        <p class="mb-0"><i class="fa fa-map-marker-alt text-primary me-1"></i>
                            {{ $flight->cityOrigin->name ?? ($flight->origin ?? '-') }}</p>
                        <p class="mb-0"><i class="fa fa-map-marker-alt text-danger me-1"></i>
                            {{ $flight->cityDestination->name ?? ($flight->destination ?? '-') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Small responsive tweaks --}}
    @push('styles')
        <style>
            .object-fit-cover {
                object-fit: cover;
                height: 100%;
            }

            .card .img-fluid {
                max-height: 280px;
            }

            @media (max-width: 991px) {
                .card .img-fluid {
                    max-height: 220px;
                }
            }
        </style>
    @endpush

@endsection
