@extends('website.layouts.app')

@section('content')
<div class="traveler-dashboard-page text-muted">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">💳 My Bank Account</h4>
    </div>

    {{-- Alerts --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if ($account)
        <div class="card bank-card shadow-sm border-0">
            <div class="card-body p-4">

                <div class="row mb-3">
                    <div class="col-12">
                        <span class="badge bg-primary-soft text-primary px-3 py-2">
                            Verified Bank Account
                        </span>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="bank-item">
                            <label>Bank Name</label>
                            <div>{{ $account->bank_name }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bank-item">
                            <label>Account Title</label>
                            <div>{{ $account->account_title }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bank-item">
                            <label>Account Number</label>
                            <div>{{ $account->account_number }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="bank-item">
                            <label>IBAN</label>
                            <div>{{ $account->iban ?? '—' }}</div>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <a href="{{ route('traveler.bank.edit', $account->id) }}"
                       class="btn btn-primary px-4">
                        ✏️ Edit Details
                    </a>
                </div>

            </div>
        </div>
    @else
        <div class="empty-state text-center p-5 bg-white shadow-sm rounded">
            <div class="mb-3" style="font-size:48px;">🏦</div>
            <h5 class="fw-bold mb-2">No Bank Account Added</h5>
            <p class="text-muted mb-4">
                Add your bank details to receive payments smoothly.
            </p>
            <a href="{{ route('traveler.bank.create') }}" class="btn btn-success px-4">
                + Add Bank Account
            </a>
        </div>
    @endif

</div>
@endsection
