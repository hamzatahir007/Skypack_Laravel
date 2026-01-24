@extends('website.layouts.app')

@section('title', 'Inquiry List')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary mb-0">Inquiry List</h4>
        <a href="{{ route('client.inquiries.create') }}" class="btn btn-primary btn-sm btn-radius">
            <i class="fas fa-plus"></i> New Inquiry
        </a>
    </div>

    <div class="card shadow-sm border-0 text-muted client-dashboard-page">
        <div class="card-body p-0">

            {{-- Flash Messages --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show small" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Traveler</th>
                            <th>Flight</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Status</th>
                            <th>UCODE</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($inquiries as $inq)
                            <tr>
                                <td>{{ $inq->id }}</td>
                                <td>{{ $inq->client->full_name ?? '-' }}</td>
                                <td>{{ $inq->traveler->full_name ?? '-' }}</td>
                                <td>{{ $inq->travelFlight->pnr_no ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($inq->entry_date)->format('d M Y') }}</td>
                                <td>{{ $inq->details?->count() ?? 0 }}</td>
                                <td>
                                    <span
                                        class="badge 
                                    @if ($inq->status == 'Accepted') badge-success 
                                    @elseif($inq->status == 'Pending') badge-warning 
                                    @else badge-secondary @endif">
                                        {{ $inq->status }}
                                    </span>
                                </td>
                                <td>{{ $inq->ucode ?? '-' }}</td>

                                <td class="text-center">
                                    <a href="{{ route('client.messages.thread', [$inq->id, $inq->travel_flight_id]) }}"
                                        class="btn btn-outline-info btn-sm mb-1">
                                        <i class="fas fa-comment"></i>
                                    </a>

                                    <a href="{{ route('client.inquiries.edit', $inq->id) }}"
                                        class="btn btn-outline-primary btn-sm mb-1">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form method="POST" action="{{ route('client.inquiries.delete', $inq->id) }}"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-outline-danger btn-sm mb-1"
                                            onclick="return confirm('Delete this inquiry?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                    @if ($inq->status == 'Accepted')
                                        <a href="{{ route('client.inquiries.deposit', $inq->id) }}"
                                            class="btn btn-success btn-sm mb-1">
                                            <i class="fas fa-credit-card"></i> Pay
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">No inquiries found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection


@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

    <script>
        setTimeout(() => {
            $('.alert').fadeOut('slow');
        }, 3000);
    </script>
@endpush
