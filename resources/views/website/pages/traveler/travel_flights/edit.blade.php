@extends('website.layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Edit Flight</h1>
        <a href="{{ route('traveler.flights') }}" class="btn btn-secondary">Back to Flight List</a>
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

            <form action="{{ route('traveler.flights.update', $travel_flight->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="traveler_id" value="{{ $travel_flight->traveler_id }}">


                <div class="row">

                    {{-- <div  class="col-md-6 mb-3">
                        <label class="form-label">Traveler</label>
                        <select name="traveler_id" class="form-control" required>
                            @foreach ($travelers as $c)
                                <option value="{{ $c->id }}" 
                                    {{ $travel_flight->traveler_id == $c->id ? 'selected' : '' }}>
                                    {{ $c->full_name }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="col-md-6 mb-3">
                        <label class="form-label">PNR No</label>
                        <input type="text" name="pnr_no" value="{{ $travel_flight->pnr_no }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Flight Date</label>
                        <input type="date" name="flight_date" value="{{ $travel_flight->flight_date }}"
                            class="form-control">
                    </div>

                    {{-- <div class="col-md-6 mb-3">
                        <label class="form-label">Origin</label>
                        <input type="text" name="origin" 
                               value="{{ $travel_flight->origin }}" class="form-control">
                    </div> --}}

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Origin</label>
                        <select name="origin" id="origin" class="form-control" required>
                            <option value="">Select City</option>
                            @foreach ($cities as $co)
                                <option value="{{ $co->id }}"
                                    {{ $travel_flight->origin == $co->id ? 'selected' : '' }}>
                                    {{ $co->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Origin Date & Time</label>
                        <input type="datetime-local" name="origin_date_time" value="{{ $travel_flight->origin_date_time }}"
                            class="form-control">
                    </div>

                    {{-- <div class="col-md-6 mb-3">
                        <label class="form-label">Destination</label>
                        <input type="text" name="destination" 
                               value="{{ $travel_flight->destination }}" class="form-control">
                    </div> --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Destination</label>
                        <select name="destination" id="destination" class="form-control" required>
                            <option value="">Select City</option>
                            @foreach ($cities as $co)
                                <option value="{{ $co->id }}"
                                    {{ $travel_flight->destination == $co->id ? 'selected' : '' }}>
                                    {{ $co->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Destination Date & Time</label>
                        <input type="datetime-local" name="destination_date_time"
                            value="{{ $travel_flight->destination_date_time }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Weight</label>
                        <input type="text" step="0.01" name="weight" value="{{ $travel_flight->weight }}"
                            class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Rate Per KG</label>
                        <input type="number" step="0.01" name="rate_per_unit"
                            value="{{ $travel_flight->rate_per_unit }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option {{ $travel_flight->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option {{ $travel_flight->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                            <option {{ $travel_flight->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Ticket Image</label>
                        <input type="file" name="ticket_pic" class="form-control">

                        @if ($travel_flight->ticket_pic)
                            <img src="{{ asset('storage/' . $travel_flight->ticket_pic) }}" width="120"
                                class="mt-2 rounded border">
                        @endif

                    </div>

                </div>

                <button class="btn btn-primary mt-3">Update</button>

            </form>

        </div>

        <script>
            const input = document.getElementById('ticket_pic_input');
            const preview = document.getElementById('ticket_pic_preview');

            input.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }
                    reader.readAsDataURL(file);
                } else {
                    preview.src = '';
                    preview.style.display = 'none';
                }
            });
        </script>


    </div>
@endsection
