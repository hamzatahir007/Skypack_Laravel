@extends('website.layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">

        <h4>My Bank Account</h4>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    </div>

    @if ($account)
        <div class="card shadow-sm">
            <div class="card-body">
                <p><strong>Bank:</strong> {{ $account->bank_name }}</p>
                <p><strong>Title:</strong> {{ $account->account_title }}</p>
                <p><strong>Account #:</strong> {{ $account->account_number }}</p>
                <p><strong>IBAN:</strong> {{ $account->iban ?? '-' }}</p>

                <a href="{{ route('traveler.bank.edit', $account->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    @else
        <a href="{{ route('traveler.bank.create') }}" class="btn btn-success">+ Add Bank Account</a>
    @endif
@endsection
