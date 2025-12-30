@extends('website.layouts.app')

@section('title', 'Flight Inquiries')

@section('content')

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-times-circle mr-1"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif


    <h4>Withdraw Request</h4>

    <form method="POST" action="{{ route('traveler.inquiry.storeWithdraw') }}">
        @csrf

        <input type="hidden" name="inquiry_master_id" value="{{ $inquiry->id }}">

        <div class="mb-3">
            <label>Inquiry ID</label>
            <input type="text" class="form-control" value="{{ $inquiry->id }}" disabled>
        </div>

        <div class="mb-3">
            <label>Amount</label>
            <input type="text" name="amount" class="form-control" value="{{ $inquiry->details->sum('amount') }}"
                readonly>
        </div>

        <button class="btn btn-primary">Send Withdraw Request</button>
    </form>


@endsection
