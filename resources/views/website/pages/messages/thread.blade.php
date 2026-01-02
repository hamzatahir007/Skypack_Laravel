@extends('website.layouts.app')


@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Messages</h3>

        @if (session()->has('client_id'))
            <a href="{{ route('client.messages.create', [$inquiryId, $flightId]) }}" class="btn btn-primary mb-3">
                New Message
            </a>
        @endif

        @if (session()->has('traveler_id'))
            <a href="{{ route('traveler.messages.create', [$inquiryId, $flightId]) }}" class="btn btn-primary mb-3">
                New Message
            </a>
        @endif
    </div>
    <div class="card shadow-sm">
        <div class="list-group list-group-flush" style="max-height: 400px; overflow-y: auto;">
            @forelse ($messages as $msg)
                <a href="@if (session()->has('client_id')) {{ route('client.messages.show', $msg->id) }} @else {{ route('traveler.messages.show', $msg->id) }} @endif"
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">

                    <div class="flex-grow-1">
                        <div class="fw-semibold">{{ $msg->title }}</div>
                        <small class="text-muted">{{ Str::limit($msg->description, 60) }}</small>
                    </div>

                    <div class="text-end ms-3">
                        @if (!$msg->read_at)
                            <span class="badge bg-primary">New</span>
                        @endif
                        <div class="text-muted small">{{ $msg->created_at->format('d M') }}</div>
                    </div>
                </a>
            @empty
                <div class="p-3 text-center text-muted">No messages yet.</div>
            @endforelse
        </div>
    </div>


    {{-- <ul class="list-group">
        @foreach ($messages as $msg)
            <li class="list-group-item">
                <a
                    href=" @if (session()->has('client_id')) {{ route('client.messages.show', $msg->id) }}
                    @else
                        {{ route('traveler.messages.show', $msg->id) }} @endif">
                    <strong>{{ $msg->title }}</strong> — {{ Str::limit($msg->description, 50) }}
                </a>
            </li>
        @endforeach
    </ul> --}}


@endsection
