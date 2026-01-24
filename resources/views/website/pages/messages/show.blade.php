{{-- @extends('website.layouts.app')

@section('title', 'Inquiry List')

@section('content')

    <h3>{{ $message->title }}</h3>

    <p><strong>From:</strong> {{ $message->sender->full_name }}</p>
    <p><strong>To:</strong> {{ $message->receiver->full_name }}</p>

    <hr>
    <p>{{ $message->description }}</p>

    @if ($message->image)
        <img src="{{ asset('storage/' . $message->image) }}" width="200">
    @endif

    <form method="POST"
        action="@if (session()->has('client_id')) {{ route('client.messages.delete', $message->id) }}
                    @else  {{ route('traveler.messages.delete', $message->id) }} @endif ">
        @csrf @method('DELETE')
        <button class="btn btn-danger mt-3">Delete</button>
    </form>


@endsection --}}


@extends('website.layouts.app')

@section('title','Message')

@section('content')
<div class="card shadow-sm client-dashboard-page">
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">{{ $message->title }}</h5>
            <small class="text-muted">
                From: {{ $message->sender->full_name ?? 'N/A' }} |
                {{ $message->created_at->format('d M Y, h:i A') }}
            </small>
        </div>
    </div>

    <div class="card-body">
        <p style="white-space: pre-line;">{{ $message->description }}</p>

        @if($message->image)
            <div class="mt-3">
                <a href="{{ asset('storage/'.$message->image) }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                    View Attachment
                </a>
            </div>
        @endif
    </div>

    <div class="card-footer d-flex justify-content-between">
        <a href="{{ url()->previous() }}" class="btn btn-light">← Back</a>

        <a href="@if(session()->has('client_id')) {{ route('client.messages.create', [$message->inquiry_id, $message->travel_flight_id]) }} @else {{ route('traveler.messages.create', [$message->inquiry_id, $message->travel_flight_id]) }} @endif"
           class="btn btn-primary">
            Reply
        </a>
    </div>
</div>
@endsection
