@extends('layouts.admin')

@section('title', 'Add Flight')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Add Flight</h1>
        <a href="{{ route('travel_flights.index') }}" class="btn btn-secondary">Back to Flight List</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error:</strong> Please check the form again.
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Flights Details</h6>
        </div>

        <div class="card-body">

            <form action="{{ route('travel_flights.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Traveler</label>
                        <select id="selectOp" name="traveler_id" class="form-control" required>
                            <option value="">Select Traveler</option>
                            @foreach ($travelers as $c)
                                <option value="{{ $c->id }}">{{ $c->full_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">PNR No</label>
                        <input type="text" name="pnr_no" class="form-control" value="{{ old('pnr_no') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flight Date</label>
                        <input type="date" name="flight_date" class="form-control" value="{{ old('flight_date') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Origin</label>
                        <select id="selectOp" name="origin" id="origin" class="form-control" required>
                            <option value="">Select City</option>
                            @foreach ($cities as $co)
                                <option value="{{ $co->id }}">{{ $co->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="col-md-6 mb-3">
                        <label class="form-label">Origin</label>
                        <input type="text" name="origin" class="form-control" value="{{ old('origin') }}">
                    </div> --}}

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Origin Date & Time</label>
                        <input type="datetime-local" name="origin_date_time" class="form-control">
                    </div>

                    {{-- <div class="col-md-6 mb-3">
                        <label class="form-label">Destination</label>
                        <input type="text" name="destination" class="form-control" value="{{ old('destination') }}">
                    </div> --}}

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Destination</label>
                        <select id="selectOp" name="destination" id="destination" class="form-control" required>
                            <option value="">Select City</option>
                            @foreach ($cities as $co)
                                <option value="{{ $co->id }}">{{ $co->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Destination Date & Time</label>
                        <input type="datetime-local" name="destination_date_time" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Weight (kg)</label>
                        <input type="number" step="0.01" name="weight" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Rate Per Unit (USD)</label>
                        <input type="number" step="0.01" name="rate_per_unit" class="form-control">
                    </div>




                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select id="selectOp" name="status" class="form-control">
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ticket Image</label>
                        <input type="file" name="ticket_pic" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flight Description</label>
                        <textarea name="description" rows="3" class="form-control"
                            placeholder="e.g. Traveling light with extra baggage allowance">
                           {{ old('description') }}
                          </textarea>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Restrictions</label>

                        <div id="restrictions-wrapper">
                            <div class="input-group mb-2">
                                <input type="text" name="restrictions[]" class="form-control"
                                    placeholder="e.g. No liquids">
                                <button type="button" class="btn btn-outline-secondary add-restriction">
                                    +
                                </button>
                            </div>
                        </div>

                        <small class="text-muted">
                            Add all restrictions that apply to this flight
                        </small>
                    </div>





                </div>

                <button class="btn btn-primary mt-3">Save Flight</button>

            </form>

        </div>
    </div>

@endsection




@push('scripts')
    <script>
        document.addEventListener('click', function(e) {

            // Add new restriction
            if (e.target.classList.contains('add-restriction')) {
                const wrapper = document.getElementById('restrictions-wrapper');

                const row = document.createElement('div');
                row.className = 'input-group mb-2';

                row.innerHTML = `
            <input type="text"
                   name="restrictions[]"
                   class="form-control"
                   placeholder="e.g. No electronics">
            <button type="button"
                    class="btn btn-outline-danger remove-restriction">
                ×
            </button>
        `;

                wrapper.appendChild(row);
            }

            // Remove restriction
            if (e.target.classList.contains('remove-restriction')) {
                e.target.closest('.input-group').remove();
            }
        });
    </script>
@endpush
