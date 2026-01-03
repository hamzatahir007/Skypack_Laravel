@extends('website.layouts.app')

@section('title', 'Flight Inquiries')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">Inquiries for PNR: <span class="text-primary">{{ $flight->pnr_no }}</span></h3>
        <a href="{{ route('traveler.flights') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to Flights
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">

            {{-- Flash Messages --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                    <i class="fas fa-times-circle me-1"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Traveler</th>
                            <th>Flight No</th>
                            <th>Entry Date</th>
                            <th>Items</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 250px;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($inquiries as $inq)
                            <tr>
                                <td>{{ $inq->id }}</td>
                                <td>{{ $inq->client->full_name ?? '-' }}</td>
                                <td>{{ $inq->traveler->full_name ?? '-' }}</td>
                                <td>{{ $inq->travelFlight->pnr_no ?? '-' }}</td>
                                <td>{{ $inq->entry_date }}</td>
                                <td>{{ $inq->details->count() ?? 0 }}</td>
                                <td>
                                    <span class="badge 
                                        @if ($inq->status == 'Pending') bg-warning
                                        @elseif ($inq->status == 'Accepted') bg-success
                                        @elseif ($inq->status == 'Delivered') bg-success
                                        @else bg-danger @endif">
                                        {{ $inq->status }}
                                    </span>
                                </td>

                                <td class="text-center">

                                    {{-- Messages --}}
                                    <a href="{{ route('traveler.messages.thread', [$inq->id, $inq->travel_flight_id]) }}"
                                        class="btn btn-sm btn-info me-1" title="Message">
                                        <i class="fas fa-envelope"></i>
                                    </a>

                                    {{-- View Details --}}
                                    <a href="{{ route('traveler.inquiry.withdrawDetail', $inq->id) }}"
                                        class="btn btn-sm btn-secondary me-1" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    {{-- Conditional Actions --}}
                                    @if ($inq->status == 'Pending')
                                        <a href="{{ route('traveler.inquiry.accept', $inq->id) }}"
                                            class="btn btn-sm btn-success me-1" title="Accept">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="{{ route('traveler.inquiry.reject', $inq->id) }}"
                                            class="btn btn-sm btn-danger me-1" title="Reject">
                                            <i class="fas fa-times"></i>
                                        </a>

                                    @elseif ($inq->status == 'Deposit')
                                        <form method="POST" action="{{ route('traveler.inquiry.verify', $inq->id) }}" class="d-flex mb-1">
                                            @csrf
                                            <input type="text" name="code" class="form-control form-control-sm me-1" placeholder="Enter UCODE">
                                            <button class="btn btn-sm btn-success">Verify</button>
                                        </form>

                                    @elseif ($inq->status == 'Delivered')
                                        <a href="{{ route('traveler.inquiry.withdrawCreate', $inq->id) }}"
                                            class="btn btn-sm btn-success me-1" title="Withdraw Amount">
                                            ${{ $inq->details->sum('amount') }} <i class="fas fa-money-bill-wave"></i>
                                        </a>
                                    @else
                                        <span class="text-secondary">No Action</span>
                                    @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-3">No inquiries yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    // Auto fade flash messages
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => el.style.display = 'none');
    }, 4000);
</script>
@endpush
