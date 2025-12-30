@extends('website.layouts.app')

@section('title', 'Travelers List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Flights List</h1>
        <a href="{{ route('traveler.flights.create') }}" class="btn btn-primary">+ Add Flight</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Flights Table</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Traveler</th>
                            <th>PNR</th>
                            <th>Flight Date</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th width="150px">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($flights as $flight)
                            <tr>
                                <td>{{ $flight->id }}</td>
                                <td>{{ $flight->traveler->full_name ?? '-' }}</td>
                                <td>{{ $flight->pnr_no ?? '-' }}</td>
                                <td>{{ $flight->flight_date ?? '-' }}</td>
                                <td>{{ $flight->cityOrigin->name ?? '-' }}</td>
                                <td>{{ $flight->cityDestination->name ?? '-' }}</td>
                                <td>{{ $flight->total ?? 0 }}</td>
                                <td>
                                    <span
                                        class="badge 
                                    @if ($flight->status == 'Pending') bg-warning 
                                    @elseif($flight->status == 'Completed') bg-success 
                                    @else bg-secondary @endif">
                                        {{ $flight->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('traveler.flights.edit', $flight->id) }}"
                                        class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ route('traveler.flights.inquiries', $flight->id) }}"
                                        class="btn btn-sm btn-warning">View Inquiries</a>
                                    <form action="{{ route('traveler.flights.delete', $flight->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this Flight?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($flights->count() == 0)
                            <tr>
                                <td colspan="8" class="text-center py-3">No Flights Found</td>
                            </tr>
                        @endif
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
@endpush
