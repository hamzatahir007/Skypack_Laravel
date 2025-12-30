@extends('layouts.admin')

@section('title', 'Inquiry List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800">Inquiry List</h1>
    <a href="{{ route('inquiries.create') }}" class="btn btn-primary">+ Add Inquiry</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inquiry Table</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Client</th>
            <th>Traveler</th>
            <th>Flight No</th>
            <th>Entry Date</th>
            <th>Items</th>
            <th>Status</th>
            <th>Actions</th>
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
                <td>{{ $inq->status }}</td>
                <td>
                    <a href="{{ route('inquiries.edit', $inq->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form method="POST" action="{{ route('inquiries.destroy', $inq->id) }}" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                    <tr>
                        <td colspan="8" class="text-center">No Inquiry Found!</td>
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
@endpush
