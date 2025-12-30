@extends('layouts.admin')

@section('title', 'Inventory List')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3  text-gray-800">Inventory Items</h1>
    <a href="{{ route('inventory.create') }}" class="btn btn-primary">+ Add Item</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inventory Table</h6>
    </div>
    
    <div class="card-body">
                <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Under</th>
                    <th>Rate</th>
                    <th>Unit</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Size</th>
                    <th>Active</th>
                    <th width="150px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventory as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->under ?? '-' }}</td>
                        <td>{{ $item->rate }}</td>
                        <td>{{ $item->unit }}</td>
                        <td>{{ $item->brand }}</td>
                        <td>{{ $item->model }}</td>
                        <td>{{ $item->size }}</td>
                        <td>
                            @if($item->active)
                                <span class="badge bg-success text-white">Active</span>
                            @else
                                <span class="badge bg-secondary text-white">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>

                            <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($inventory->count() === 0)
                    <tr>
                        <td colspan="10" class="text-center py-3">No Inventory Items Found</td>
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
