@extends('website.layouts.app')

@section('title', 'Flight Inquiries')

@section('content')

    <h3 class="mb-3">Inquiries for PNR: {{ $flight->pnr_no }}</h3>

    <div class="card shadow mb-4">
        <div class="card-body">
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

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Traveler</th>
                        <th>Flight No</th>
                        <th>Entry Date</th>
                        <th>Items</th>
                        <th>Status</th>
                        <th width="180px">Actions</th>
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
                            <td>{{ $inq->details && $inq->details->count() ? $inq->details->count() : 0 }}</td>
                            <td>
                                <span
                                    class="badge 
                                @if ($inq->status == 'Pending') bg-warning
                                @elseif($inq->status == 'Accepted') bg-success
                                @elseif($inq->status == 'Delivered') bg-success
                                @else bg-danger @endif">
                                    {{ $inq->status }}
                                </span>
                            </td>

                            <td>
                                <a href="{{ route('traveler.messages.thread', [$inq->id, $inq->travel_flight_id]) }}"
                                    class="btn btn-info btn-sm">
                                    Message
                                </a>
                                    <a href="{{ route('traveler.inquiry.withdrawDetail', $inq->id) }}"
                                        class="btn btn-secondary btn-sm"> View
                                    </a>

                                @if ($inq->status == 'Pending')
                                    <a href="{{ route('traveler.inquiry.accept', $inq->id) }}"
                                        class="btn btn-success btn-sm">
                                        Accept
                                    </a>

                                    <a href="{{ route('traveler.inquiry.reject', $inq->id) }}"
                                        class="btn btn-danger btn-sm">
                                        Reject
                                    </a>
                                @elseif ($inq->status == 'Deposit')
                                    <form method="POST" action="{{ route('traveler.inquiry.verify', $inq->id) }}">
                                        @csrf
                                        <input type="text" name="code" class="form-control mb-2"
                                            placeholder="Enter UCODE">
                                        <button class="btn btn-success btn-sm">Verify</button>
                                    </form>
                                @elseif ($inq->status == 'Delivered')
                                    <a href="{{ route('traveler.inquiry.withdrawCreate', $inq->id) }}"
                                        class="btn btn-success btn-sm">
                                        ${{ $inq->details->sum('amount') }} Withdraw
                                    </a>
                                {{-- @elseif ($inq->status == 'Completed')
                                    <a href="{{ route('traveler.inquiry.withdrawDetail', $inq->id) }}"
                                        class="btn btn-secondary btn-sm"> View
                                    </a> --}}
                                @else
                                    <span class="text-secondary">No Action</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No inquiries yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection
