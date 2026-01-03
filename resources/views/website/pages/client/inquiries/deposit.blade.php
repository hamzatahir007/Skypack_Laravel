{{-- @extends('website.layouts.app')

@section('title', 'Add Inquiry')

@section('content')
    <h3>Inquiry Summary</h3>
    <p>Traveler: {{ $inq->traveler->full_name }}</p>
    <p>Items: {{ $inq->details->count() }}</p>
    <p>Amount: ${{ $totalAmount }}</p>

    <form method="POST" action="{{ route('client.inquiries.checkout', $inq->id) }}">
        @csrf
        <button class="btn btn-primary">Proceed to Checkout</button>
    </form>


@endsection --}}


@extends('website.layouts.app')

@section('title', 'Review Inquiry')

@section('content')

    <div class="container" style="max-width: 800px">

        <div class="mb-4">
            <h4 class="fw-bold text-primary">Review Your Inquiry</h4>
            <p class="text-muted small mb-0">Please review your inquiry details before proceeding to payment.</p>
        </div>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="text-muted small">Traveler</div>
                        <div class="fw-semibold">{{ $inq->traveler->full_name }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted small">Inquiry ID</div>
                        <div class="fw-semibold">#{{ $inq->id }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="text-muted small">Total Items</div>
                        <div class="fw-semibold">{{ $inq->details->count() }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-muted small">Total Amount</div>
                        <div class="fw-semibold text-success">${{ number_format($totalAmount, 2) }}</div>
                    </div>
                </div>

                <hr>

                <div class="mb-3">
                    <div class="fw-semibold mb-2">Items Summary</div>
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item d-flex fw-bold justify-content-between">
                            <span style="width: 40%;">Item</span>
                            <span style="width: 15%;" class="text-muted">Qty</span>
                            <span style="width: 20%;"class="text-muted">Rate</span>
                            <span style="width: 25%;"class="text-muted">Total</span>
                        </li>
                    </ul>
                    <ul class="list-group list-group-flush small">
                        @foreach ($inq->details as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                <span style="width: 40%;">
                                    {{ optional($items->firstWhere('id', $item->item_id))->name ?? 'N/A' }}

                                </span>
                                {{-- <span>{{ $item->item_id ?? 'Item' }}</span> --}}
                                <span style="width: 15%;" class="text-muted">{{ $item->qty ?? 0 }}</span>
                                <span style="width: 20%;" class="text-muted">${{ number_format($item->rate ?? 0, 2) }}</span>
                                <span style="width: 25%;" class="text-muted">${{ number_format($item->amount ?? 0, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('client.inquiries.edit', $inq->id) }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Edit Inquiry
            </a>

            <form method="POST" action="{{ route('client.inquiries.checkout', $inq->id) }}">
                @csrf
                <button class="btn btn-primary px-4">
                    Proceed to Secure Payment <i class="fas fa-lock ml-1"></i>
                </button>
            </form>
        </div>

    </div>

@endsection
