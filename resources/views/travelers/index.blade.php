@extends('layouts.admin')

@section('title', 'Travelers List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800">Travelers List</h1>
    <a href="{{ route('travelers.create') }}" class="btn btn-primary">+ Add Traveler</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Travelers Table</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Profession</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($travelers as $traveler)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $traveler->full_name }}</td>
                        <td>{{ $traveler->mobile_number }}</td>
                        <td>{{ $traveler->email }}</td>
                        <td>{{ $traveler->profession }}</td>
                        <td>{{ $traveler->active== 1 ? 'Active' : 'Not Active'  }}</td>
                        <td>{{ $traveler->gender }}</td>
                        <td>
                            <a href="{{ route('travelers.edit', $traveler->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('travelers.destroy', $traveler->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this Traveler?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">No Travelers Found!</td>
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
