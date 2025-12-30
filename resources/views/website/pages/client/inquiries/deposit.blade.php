@extends('website.layouts.app')

@section('title', 'Add Inquiry')

@section('content')
    <h3>Inquiry Summary</h3>
    <p>Traveler: {{ $inq->traveler->full_name }}</p>
    <p>Items: {{ $inq->details->count() }}</p>
    <p>Amount: ${{ $totalAmount }}</p>

    <form method="POST" action="{{ route('client.inquiries.checkout', $inq->id) }}">
        @csrf
        <button class="btn btn-primary">Proceed to Checkout</button>
    </form>


@endsection
