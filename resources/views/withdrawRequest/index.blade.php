@extends('layouts.admin')

@section('title', 'Inquiry List')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Requests List</h1>
        {{-- <a href="{{ route('inquiries.create') }}" class="btn btn-primary">+ Add Inquiry</a> --}}
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Withdraw Request Table</h6>
        </div>

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


            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Inquiry ID</th>
                            <th>Traveler</th>
                            <th>Flight No</th>
                            {{-- <th>Entry Date</th> --}}
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($withdrawrequest as $inq)
                            <tr>
                                <td>{{ $inq->id }}</td>
                                <td>{{ $inq->inquiry_master_id ?? '-' }}</td>
                                <td>{{ $inq->traveler->full_name ?? '-' }}</td>
                                <td>{{ $inq->inquiry_master->travelFlight->pnr_no ?? '-' }}</td>
                                {{-- <td>{{ $inq->entry_date }}</td> --}}
                                <td>{{ $inq->amount ?? '-' }}</td>
                                <td>{{ $inq->status }}</td>
                                <td>
                                    <a href="{{ route('withdrawRequest.edit', $inq->inquiry_master_id) }}"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('withdrawRequest.destroy', $inq->id) }}"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this Request?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No Request Found!</td>
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
