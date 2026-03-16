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

    <div class="container text-muted client-dashboard-page" style="max-width: 800px">

        <div class="mb-4">
            <h4 class="fw-bold text-primary">Review Your Inquiry</h4>
            <p class="text-muted small mb-0">Please review your inquiry details before proceeding to payment.</p>
        </div>

        <div class="card shadow-sm border-1 mb-4">
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
                        <div class="text-muted small">Total Weight</div>
                        <div class="fw-semibold">{{ number_format($inq->details->sum('qty'), 2) }} kg</div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="text-muted small">Total Amount</div>
                        <div class="fw-semibold text-success">${{ number_format($totalAmount, 2) }}</div>
                    </div> --}}
                </div>

                <hr>

                <div class="mb-3">
                    <div class="fw-semibold mb-2">Items Summary</div>
                    <ul class="list-group list-group-flush small">
                        <li class="list-group-item d-flex fw-bold justify-content-between">
                            <span style="width: 40%;">Item</span>
                            <span style="width: 15%;" class="text-muted">Qty</span>
                            <span style="width: 15%;" class="text-muted">Weight</span>
                            <span style="width: 20%;" class="text-muted">Rate</span>
                            <span style="width: 25%;" class="text-muted">Total</span>
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
                                <span style="width: 15%;" class="text-muted">{{ $item->weight ?? 0 }}</span>
                                <span style="width: 20%;"
                                    class="text-muted">${{ number_format($item->rate ?? 0, 2) }}</span>
                                <span style="width: 25%;"
                                    class="text-muted">${{ number_format($item->amount ?? 0, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>

        {{-- ── Payment Breakdown Card ── --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-primary text-white py-3">
                <h6 class="mb-0 fw-bold">
                    <i class="fas fa-receipt mr-2"></i> Payment Breakdown
                </h6>
            </div>
            <div class="card-body p-0">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td class="pl-4 text-muted py-3">
                            Baggage Charge
                            <div class="small text-muted">
                                {{ number_format($inq->details->sum('qty'), 2) }}kg
                                × ${{ number_format(\App\Pricing::RATE_PER_KG, 2) }}/kg
                            </div>
                        </td>
                        <td class="text-right pr-4 py-3 font-weight-bold">
                            ${{ number_format($breakdown['cargo_amount'], 2) }}
                        </td>
                    </tr>
                    <tr class="border-top">
                        <td class="pl-4 text-muted py-3">
                            Platform Fee
                            <div class="small text-info">Service & handling charge</div>
                        </td>
                        <td class="text-right pr-4 py-3 font-weight-bold">
                            ${{ number_format($breakdown['platform_fee'], 2) }}
                        </td>
                    </tr>
                    <tr class="border-top bg-light">
                        <td class="pl-4 py-3 font-weight-bold text-dark" style="font-size: 1.05rem;">
                            Total to Pay
                        </td>
                        <td class="text-right pr-4 py-3 font-weight-bold text-success" style="font-size: 1.2rem;">
                            ${{ number_format($breakdown['total'], 2) }} USD
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('client.inquiries.edit', $inq->id) }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Edit Inquiry
            </a>

            <form method="POST" action="{{ route('client.inquiries.checkout', $inq->id) }}">
                @csrf
                <button class="btn btn-primary px-4">
                     <i class="fas fa-lock mr-2"></i> Pay ${{ number_format($breakdown['total'], 2) }} USD
                </button>
            </form>
        </div>

    </div>

@endsection
