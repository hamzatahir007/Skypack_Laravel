@extends('website.layouts.app')

@section('title', 'Messages')

@section('content')
<div class="container py-4 traveler-dashboard-page text-muted">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0 font-weight-bold">
            💬 Messages
            @if($threads->sum('unread_count') > 0)
                <span class="badge badge-danger ml-2" style="font-size: 0.75rem;">
                    {{ $threads->sum('unread_count') }} unread
                </span>
            @endif
        </h4>
        @if($me['type'] === 'traveler')
            <a href="{{ route('traveler.dashboard') }}" class="btn btn-sm btn-outline-secondary btn-radius">
                ← Back to Dashboard
            </a>
        @else
            <a href="{{ route('client.dashboard') }}" class="btn btn-sm btn-outline-secondary btn-radius">
                ← Back to Dashboard
            </a>
        @endif
    </div>

    @if($threads->isEmpty())
        <div class="card shadow-sm border-1 text-center py-5">
            <div style="font-size: 3rem;">📭</div>
            <h5 class="mt-3 text-muted">No messages yet</h5>
            <p class="text-muted small">Messages from your inquiries will appear here.</p>
        </div>
    @else
        <div class="card shadow-sm border-1">
            @foreach($threads as $thread)
                @php
                    // Determine the redirect URL based on user type
                    if ($me['type'] === 'traveler') {
                        $threadUrl = route('traveler.messages.thread', [
                            $thread->inquiry_id,
                            $thread->travel_flight_id
                        ]);
                    } else {
                        $threadUrl = route('client.messages.thread', [
                            $thread->inquiry_id,
                            $thread->travel_flight_id
                        ]);
                    }

                    $otherParty = $me['type'] === 'traveler'
                        ? $thread->inquiry?->client
                        : $thread->inquiry?->traveler;

                    $hasUnread = $thread->unread_count > 0;
                @endphp

                <a href="{{ $threadUrl }}"
                   class="d-flex align-items-center px-4 py-3 text-decoration-none {{ !$loop->last ? 'border-bottom' : '' }}"
                   style="color: inherit; background: {{ $hasUnread ? '#f0f7ff' : 'transparent' }}; transition: background 0.2s;"
                   onmouseover="this.style.background='#f8f9fa'"
                   onmouseout="this.style.background='{{ $hasUnread ? '#f0f7ff' : 'transparent' }}'">

                    {{-- Avatar --}}
                    <div class="mr-3 flex-shrink-0" style="width: 46px; height: 46px; background: #0d6efd22; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.2rem;">
                        {{ $me['type'] === 'traveler' ? '👤' : '✈️' }}
                    </div>

                    {{-- Content --}}
                    <div class="flex-grow-1 min-width-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <span class="font-weight-{{ $hasUnread ? 'bold' : 'normal' }} text-dark" style="font-size: 0.97rem;">
                                    Inquiry #{{ $thread->inquiry_id }}
                                </span>
                                @if($otherParty)
                                    <span class="text-muted small ml-2">
                                        — {{ $otherParty->full_name }}
                                    </span>
                                @endif
                            </div>
                            <span class="text-muted small flex-shrink-0 ml-2">
                                {{ \Carbon\Carbon::parse($thread->last_message_at)->diffForHumans() }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <span class="text-muted small">
                                @if($thread->travelFlight)
                                    ✈ Flight PNR: {{ $thread->travelFlight->pnr_no ?? 'N/A' }}
                                @endif
                            </span>
                            <div class="d-flex align-items-center gap-2">
                                <span class="text-muted small mr-2">
                                    {{ $thread->total_messages }} {{ Str::plural('message', $thread->total_messages) }}
                                </span>
                                @if($hasUnread)
                                    <span class="badge badge-primary" style="font-size: 0.7rem; border-radius: 20px;">
                                        {{ $thread->unread_count }} new
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Arrow --}}
                    <div class="ml-3 text-muted flex-shrink-0">›</div>

                </a>
            @endforeach
        </div>
    @endif

</div>
@endsection