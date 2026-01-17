@extends('website.layouts.app')

@section('title', 'Withdraw Request')

@section('content')

    <div class="container py-4 text-muted">

        {{-- Page Header --}}
        <div class="mb-4">
            <h3 class="mb-1">Withdraw Request</h3>
            <p class="text-muted">Inquiry ID: <strong>{{ $inquiry->id }}</strong></p>
        </div>

        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-times-circle mr-1"></i> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        {{-- Inquiry / Flight Info Card --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Inquiry & Flight Details</h5>
            </div>
            <div class="card-body">
                <p><strong>Traveler:</strong> {{ $inquiry->traveler->full_name ?? '-' }}</p>
                <p><strong>PNR:</strong> {{ $inquiry->travelFlight->pnr_no ?? '-' }}</p>
                <p><strong>Flight Date:</strong> {{ $inquiry->travelFlight->flight_date ?? '-' }}</p>
                <p><strong>Status:</strong>
                    <span
                        class="badge 
                        @if ($inquiry->status == 'Pending') bg-warning
                        @elseif($inquiry->status == 'Delivered') bg-success
                        @else bg-secondary @endif">
                        {{ $inquiry->status }}
                    </span>
                </p>
            </div>
        </div>

        {{-- Items / Amount Summary --}}
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Items Summary</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Item</th>
                            <th>Qty</th>
                            <th>Rate</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inquiry->details as $item)
                            <tr>
                                <td>{{ optional($items->firstWhere('id', $item->item_id))->name ?? 'N/A' }}</td>
                                <td>{{ $item->qty ?? 0 }}</td>
                                <td>${{ number_format($item->rate ?? 0, 2) }}</td>
                                <td>${{ number_format($item->amount ?? 0, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="table-light">
                        <tr>
                            <th colspan="3" class="text-end">Total Amount:</th>
                            <th>${{ number_format($inquiry->details->sum('amount'), 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        {{-- Withdraw Request Form --}}
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Send Withdraw Request</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('traveler.inquiry.storeWithdraw') }}">
                    @csrf
                    <input type="hidden" name="inquiry_master_id" value="{{ $inquiry->id }}">

                    {{-- <div class="mb-3">
                        <label class="form-label">Inquiry ID</label>
                        <input type="text" class="form-control" value="{{ $inquiry->id }}" disabled>
                    </div> --}}

                    <div class="mb-3">
                        <label class="form-label">Withdrawable Amount</label>
                        <input type="text" name="amount" class="form-control"
                            value="{{ $inquiry->details->sum('amount') }}" readonly>
                    </div>
                    <button type="submit" class="btn btn-success" @if ($widthreq) disabled @endif>
                        @if ($widthreq)
                            Withdraw Request Already Sent
                        @else
                            Send Withdraw Request
                        @endif
                    </button>

                </form>
            </div>
        </div>

    </div>

@endsection
