@extends('website.layouts.app')

@section('title', 'Add Flight')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Add Flight</h1>
        <a href="{{ route('traveler.flights') }}" class="btn btn-secondary">Back to Flight List</a>
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

            <form action="{{ route('traveler.flights.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="traveler_id" value="{{ session('traveler_id') }}">


                <div class="row">
                    {{-- <div class="col-md-6 mb-3">
                        <label class="form-label">Traveler</label>
                        <select name="traveler_id" class="form-control" required>
                            <option value="">Select Traveler</option>
                            @foreach ($travelers as $c)
                                <option value="{{ $c->id }}">{{ $c->full_name }}</option>
                            @endforeach
                        </select>
                    </div> --}}

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
                        <select  name="origin" id="origin" class="form-control" required>
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
                        <select  name="destination" id="destination" class="form-control" required>
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
                        <input type="text" step="0.01" name="weight" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Rate Per KG (USD)</label>
                        <input type="number" step="0.01" name="rate_per_unit" class="form-control">
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control">
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>


                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ticket Image</label>
                        <input type="file" name="ticket_pic" class="form-control">
                    </div>



                </div>

                <button class="btn btn-primary mt-3">Save Flight</button>

            </form>

        </div>
    </div>

@endsection
