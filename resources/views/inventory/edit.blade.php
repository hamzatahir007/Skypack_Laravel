@extends('layouts.admin')

@section('title', 'Edit Inventory Item')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1 class="h4 text-gray-800">Edit Inventory Item</h1>
    <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Back to Inventory List</a>
</div>

<div class="card shadow">
     <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Inventory Details</h6>
    </div>

    <div class="card-body">

        <form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Name -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Item Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $inventory->name }}" required>
                </div>

                <!-- Under -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Under</label>
                    <input type="number" name="under" class="form-control" value="{{ $inventory->under }}">
                </div>

                <!-- isGroup -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Is Group</label>
                    <select name="isgroup" class="form-control">
                        <option value="0" {{ $inventory->isgroup == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ $inventory->isgroup == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>

                <!-- Level -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Level</label>
                    <input type="number" name="level" class="form-control" value="{{ $inventory->level }}">
                </div>

                <!-- Active -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Active</label>
                    <select name="active" class="form-control">
                        <option value="1" {{ $inventory->active == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $inventory->active == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Rate -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Rate</label>
                    <input type="number" step="0.01" name="rate" class="form-control" value="{{ $inventory->rate }}">
                </div>

                <!-- Unit -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Unit</label>
                    <select name="unit" class="form-control">
                        <option value="kg" {{ $inventory->unit == 'kg' ? 'selected' : '' }}>KG</option>
                        <option value="grams" {{ $inventory->unit == 'grams' ? 'selected' : '' }}>Grams</option>
                    </select>
                </div>

                <!-- Keyfield -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Key Field</label>
                    <input type="text" name="keyfield" class="form-control" value="{{ $inventory->keyfield }}">
                </div>

                <!-- Brand -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Brand</label>
                    <input type="text" name="brand" class="form-control" value="{{ $inventory->brand }}">
                </div>

                <!-- Model -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Model</label>
                    <input type="text" name="model" class="form-control" value="{{ $inventory->model }}">
                </div>

                <!-- Size -->
                <div class="col-md-4 mb-3">
                    <label class="form-label fw-bold">Size</label>
                    <input type="text" name="size" class="form-control" value="{{ $inventory->size }}">
                </div>

                
                <!-- Description -->
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $inventory->description }}</textarea>
                </div>


            </div>

            <button class="btn btn-primary px-4">Update</button>
        </form>

    </div>
</div>

@endsection
