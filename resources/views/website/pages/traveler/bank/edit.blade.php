@extends('website.layouts.app')
@section('content')
<div class="traveler-dashboard-page">

    <h4 style="margin-bottom: 20px">{{ isset($account) ? 'Edit' : 'Add' }} Bank Account</h4>

    <form method="POST"
        action="{{ isset($account) ? route('traveler.bank.update', $account->id) : route('traveler.bank.store') }}">
        @csrf
        @if (isset($account))
            @method('PUT')
        @endif

        <div class="card shadow-sm p-4">
            <input class="form-control mb-2" name="bank_name" placeholder="Bank Name" value="{{ $account->bank_name ?? '' }}">
            <input class="form-control mb-2" name="account_title" placeholder="Account Title"
                value="{{ $account->account_title ?? '' }}">
            <input class="form-control mb-2" name="account_number" placeholder="Account Number"
                value="{{ $account->account_number ?? '' }}">
            <input class="form-control mb-2" name="iban" placeholder="IBAN (optional)"
                value="{{ $account->iban ?? '' }}">
            <input class="form-control mb-3" name="swift_code" placeholder="Swift Code (optional)"
                value="{{ $account->swift_code ?? '' }}">

            <button class="btn btn-success w-100">Save</button>
        </div>
    </form>
</div>
@endsection
