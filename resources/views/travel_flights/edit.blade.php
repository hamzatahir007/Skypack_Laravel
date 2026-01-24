@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Edit Flight</h1>
        <a href="{{ route('travel_flights.index') }}" class="btn btn-secondary">Back to Flight List</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error:</strong> Please check the form again.
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Traveler Details</h6>
        </div>

        <div class="card-body">

            <form action="{{ route('travel_flights.update', $travel_flight->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Traveler</label>
                        <select id="selectOp" name="traveler_id" class="form-control" required>
                            @foreach ($travelers as $c)
                                <option value="{{ $c->id }}"
                                    {{ $travel_flight->traveler_id == $c->id ? 'selected' : '' }}>
                                    {{ $c->full_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">PNR No</label>
                        <input type="text" name="pnr_no" value="{{ $travel_flight->pnr_no }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flight Date</label>
                        <input type="date" name="flight_date"
                            value="{{ optional($travel_flight->flight_date)->format('Y-m-d') }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Origin</label>
                        <select id="selectOp" name="origin" id="origin" class="form-control" required>
                            <option value="">Select City</option>
                            @foreach ($cities as $co)
                                <option value="{{ $co->id }}"
                                    {{ $travel_flight->origin == $co->id ? 'selected' : '' }}>
                                    {{ $co->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- 
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Origin</label>
                        <input type="text" name="origin" value="{{ $travel_flight->origin }}" class="form-control">
                    </div> --}}

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Origin Date & Time</label>
                        <input type="datetime-local" name="origin_date_time" value="{{ $travel_flight->origin_date_time }}"
                            class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Destination</label>
                        <select id="selectOp" name="destination" id="destination" class="form-control" required>
                            <option value="">Select City</option>
                            @foreach ($cities as $co)
                                <option value="{{ $co->id }}"
                                    {{ $travel_flight->destination == $co->id ? 'selected' : '' }}>
                                    {{ $co->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-md-6 mb-3">
                        <label class="form-label">Destination</label>
                        <input type="text" name="destination" 
                               value="{{ $travel_flight->destination }}" class="form-control">
                    </div> --}}

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Destination Date & Time</label>
                        <input type="datetime-local" name="destination_date_time"
                            value="{{ $travel_flight->destination_date_time }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Weight</label>
                        <input type="number" step="0.01" name="weight" value="{{ $travel_flight->weight }}"
                            class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Rate Per Unit</label>
                        <input type="number" step="0.01" name="rate_per_unit"
                            value="{{ $travel_flight->rate_per_unit }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select id="selectOp" name="status" class="form-control">
                            <option {{ $travel_flight->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option {{ $travel_flight->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option {{ $travel_flight->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ticket Image</label>
                        <input type="file" name="ticket_pic" class="form-control">

                        @if ($travel_flight->ticket_pic)
                            <img src="{{ asset('storage/' . $travel_flight->ticket_pic) }}" width="120"
                                class="mt-2 rounded border">
                        @endif
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flight Description</label>
                        <textarea name="description" rows="3" class="form-control"
                            placeholder="e.g. Traveling light with extra baggage allowance">
                           {{ old('description', $travel_flight->description) }}
                          </textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Restrictions</label>

                        <div id="restrictions-wrapper">

                            @forelse(old('restrictions', $travel_flight->restrictions ?? []) as $index => $restriction)
                                <div class="input-group mb-2">
                                    <input type="text" name="restrictions[]" class="form-control"
                                        value="{{ $restriction }}" placeholder="e.g. No liquids">

                                    @if ($index === 0)
                                        <button type="button"
                                            class="btn btn-outline-secondary add-restriction">+</button>
                                    @else
                                        <button type="button"
                                            class="btn btn-outline-danger remove-restriction">×</button>
                                    @endif
                                </div>
                            @empty
                                {{-- If no restrictions exist --}}
                                <div class="input-group mb-2">
                                    <input type="text" name="restrictions[]" class="form-control"
                                        placeholder="e.g. No liquids">
                                    <button type="button" class="btn btn-outline-secondary add-restriction">+</button>
                                </div>
                            @endforelse

                        </div>

                        <small class="text-muted">
                            Add all restrictions that apply to this flight
                        </small>
                    </div>


                </div>

                <button class="btn btn-primary mt-3">Update</button>

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

