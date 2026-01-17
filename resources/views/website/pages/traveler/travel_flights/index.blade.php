@extends('website.layouts.app')

@section('title', 'Flights List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">Flights List</h1>
        <a href="{{ route('traveler.flights.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> Add Flight
        </a>
    </div>

    <div class="card shadow-sm border-0 text-muted">
        <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Flights</h6>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-bordered mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Traveler</th>
                            <th>PNR</th>
                            <th>Flight Date</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Total ($)</th>
                            <th>Status</th>
                            <th class="text-center" style="width: 180px;">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($flights as $flight)
                            <tr>
                                <td>{{ $flight->id }}</td>
                                <td>{{ $flight->traveler->full_name ?? '-' }}</td>
                                <td>{{ $flight->pnr_no ?? '-' }}</td>
                                <td>{{ $flight->flight_date ?? '-' }}</td>
                                <td>{{ $flight->cityOrigin->name ?? '-' }}</td>
                                <td>{{ $flight->cityDestination->name ?? '-' }}</td>
                                <td>${{ number_format($flight->total ?? 0, 2) }}</td>
                                <td>
                                    <span
                                        class="badge 
                                        @if ($flight->status == 'Pending') bg-warning 
                                        @elseif($flight->status == 'Completed') bg-success 
                                        @else bg-secondary @endif">
                                        {{ $flight->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('traveler.flights.edit', $flight->id) }}"
                                        class="btn btn-sm btn-info me-1" title="Edit Flight">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('traveler.flights.inquiries', $flight->id) }}"
                                        class="btn btn-sm btn-warning me-1" title="View Inquiries">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('traveler.flights.delete', $flight->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Are you sure you want to delete this Flight?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" title="Delete Flight">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-3">No Flights Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($flights->hasPages())
            <div class="card-footer bg-white border-top">
                {{ $flights->links() }}
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <!-- DataTables -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "ordering": true,
                "pageLength": 10,
                "lengthChange": false,
                "autoWidth": false
            });
        });
    </script>
@endpush
