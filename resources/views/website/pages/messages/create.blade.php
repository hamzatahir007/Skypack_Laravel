{{-- @extends('website.layouts.app')

@section('title', 'Inquiry List')

@section('content')


    <h3>New Message</h3>

    <form method="POST"
        action="  @if (session()->has('client_id')) {{ route('client.messages.store') }}
                    @else  {{ route('traveler.messages.store') }} @endif "
        enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="inquiry_id" value="{{ $inquiry->id }}">
        <input type="hidden" name="travel_flight_id" value="{{ $inquiry->travel_flight_id }}">

        @if (session()->has('client_id'))
            <input type="hidden" name="receiver_id" value="{{ $inquiry->traveler_id }}">
            <input type="hidden" name="receiver_type" value="traveler">
        @else
            <input type="hidden" name="receiver_id" value="{{ $inquiry->client_id }}">
            <input type="hidden" name="receiver_type" value="client">
        @endif


        <input name="title" class="form-control mb-2" placeholder="Subject">
        <textarea name="description" class="form-control mb-2" rows="5"></textarea>
        <input type="file" name="image" class="form-control mb-2">

        <button class="btn btn-success">Send</button>
    </form>

@endsection --}}


@extends('website.layouts.app')

@section('title', 'New Message')

@section('content')

<div class="card shadow-sm mx-auto client-dashboard-page text-muted" style="max-width: 720px;">
    <div class="card-header fw-semibold">
        New Message
    </div>

    <div class="card-body">
        <form method="POST"
              action="@if (session()->has('client_id')) {{ route('client.messages.store') }} @else {{ route('traveler.messages.store') }} @endif"
              enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="inquiry_id" value="{{ $inquiry->id }}">
            <input type="hidden" name="travel_flight_id" value="{{ $inquiry->travel_flight_id }}">

            @if (session()->has('client_id'))
                <input type="hidden" name="receiver_id" value="{{ $inquiry->traveler_id }}">
                <input type="hidden" name="receiver_type" value="traveler">
                <div class="mb-3">
                    <label class="form-label">To</label>
                    <input type="text" class="form-control" value="{{ $inquiry->traveler->full_name ?? 'Traveler' }}" readonly>
                </div>
            @else
                <input type="hidden" name="receiver_id" value="{{ $inquiry->client_id }}">
                <input type="hidden" name="receiver_type" value="client">
                <div class="mb-3">
                    <label class="form-label">To</label>
                    <input type="text" class="form-control" value="{{ $inquiry->client->full_name ?? 'Client' }}" readonly>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Subject</label>
                <input name="title" class="form-control" placeholder="Subject..." required>
            </div>

            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea name="description" class="form-control" rows="6" placeholder="Write your message..." required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Attachment</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
                <button class="btn btn-primary px-4">Send</button>
            </div>
        </form>
    </div>
</div>

@endsection
