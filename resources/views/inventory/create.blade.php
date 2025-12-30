@extends('layouts.admin')

@section('title', 'Add Inventory')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800">Add Inventory Item</h1>
    <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Back to Inventory List</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inventory Details</h6>
    </div>

    <div class="card-body">
    <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data" id="inventoryForm">
        @csrf

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label">Name *</label>
                    <input type="text" name="name" required class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Under</label>
                    <input type="number" name="under" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Is Group?</label>
                    <select name="isgroup" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Level</label>
                    <input type="number" name="level" class="form-control">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Rate</label>
                    <input type="number" step="0.01" name="rate" class="form-control">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Unit</label>
                    <select name="unit" class="form-control">
                        <option value="kg">KG</option>
                        <option value="grams">Grams</option>
                        {{-- <option value="pcs">Pieces</option> --}}
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" name="brand" class="form-control">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Size</label>
                    <input type="text" name="size" class="form-control">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Key Field</label>
                    <input type="text" name="keyfield" class="form-control">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Active?</label>
                    <select name="active" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                    <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="2" class="form-control"></textarea>
                </div>

            </div>
            <button class="btn btn-primary mt-3">Save Item</button>
        </form>
        </div>

</div>

@endsection
