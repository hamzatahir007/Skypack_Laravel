@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 text-gray-800">Edit Withdraw Request #{{ $inquiry->id }}</h1>
        <a href="{{ route('withdrawRequest.index') }}" class="btn btn-secondary">Back </a>
    </div>

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


    <form method="POST" action="{{ route('withdrawRequest.update', $inquiry->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- MASTER --}}
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Inquiry Master</h6>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-3">
                        <label>Client</label>
                        {{-- <select name="client_id" class="form-control">
                            <option value="">-- Select Client --</option> --}}
                        <div class="form-control">
                            {{ optional($clients->firstWhere('id', $inquiry->client_id))->full_name ?? 'N/A' }}
                        </div>
                        {{-- </select> --}}
                    </div>

                    <div class="col-md-3">
                        <label>Traveler</label>
                        <div class="form-control">
                            {{ optional($travelers->firstWhere('id', $inquiry->traveler_id))->full_name ?? 'N/A' }}
                        </div>
                        {{-- <select name="traveler_id" class="form-control">
                            <option value="">-- Select Traveler --</option> --}}
                        {{-- @foreach ($travelers as $t)
                            <div class="form-control" value="{{ $t->id }}"
                                {{ $inquiry->traveler_id == $t->id ? 'selected' : '' }}>
                                {{ $t->full_name ?? ($t->name ?? $t->id) }}
                            </div>
                        @endforeach --}}
                        {{-- </select> --}}
                    </div>

                    <div class="col-md-3">
                        <label>Travel Flight</label>
                        <div class="form-control">
                            {{ optional($flights->firstWhere('id', $inquiry->travel_flight_id))->pnr_no ?? 'N/A' }}
                        </div>
                        {{-- <select name="travel_flight_id" class="form-control">
                            <option value="">-- Select Flight --</option> --}}
                        {{-- @foreach ($flights as $f)
                            <div class="form-control" value="{{ $f->id }}"
                                {{ $inquiry->travel_flight_id == $f->id ? 'selected' : '' }}>
                                {{ $f->pnr_no ?? 'Flight #' . $f->id }}
                            </div>
                        @endforeach --}}
                        {{-- </select> --}}
                    </div>

                    <div class="col-md-3">
                        <label>Entry Date</label>
                        <input type="date" disabled name="entry_date" class="form-control"
                            value="{{ $inquiry->entry_date }}">
                    </div>

                    <div class="col-md-3">
                        <label>Status</label>
                        <select name="inquirystatus" class="form-control">
                            <option {{ $inquiry->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option {{ $inquiry->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Contact Person</label>
                        <input type="text" disabled name="contact_person" class="form-control"
                            value="{{ $inquiry->contact_person }}">
                    </div>

                    <div class="col-md-3">
                        <label>Contact No</label>
                        <input type="text" disabled name="contact_no" class="form-control"
                            value="{{ $inquiry->contact_no }}">
                    </div>

                    <div class="col-md-3">
                        <label>Delivery Address</label>
                        <input type="text" disabled name="delivery_address" class="form-control"
                            value="{{ $inquiry->delivery_address }}">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label>Remarks</label>
                        <textarea disabled name="remarks" class="form-control">{{ $inquiry->remarks }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        {{-- DETAILS --}}
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Inquiry Details</h6>
            </div>
            <div class="card-body">
                <table class="table" id="detailsTable">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inquiry->details as $i => $d)
                            <tr>
                                <td>
                                    <div class="form-control">
                                        {{ optional($items->firstWhere('id', $d->item_id))->name ?? 'N/A' }}
                                    </div>
                                    {{-- @foreach ($items as $it)
                                        <div class="form-control" value="{{ $it->id }}"
                                            {{ $d->item_id == $it->id ? 'selected' : '' }}>
                                            {{ $it->name }}
                                        </div>
                                    @endforeach --}}
                                    {{-- <select name="details[{{ $i }}][item_id]" class="form-control">
                                        <option value="">-- select --</option>
                                        @foreach ($items as $it)
                                            <option value="{{ $it->id }}"
                                                {{ $d->item_id == $it->id ? 'selected' : '' }}>
                                                {{ $it->name }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                </td>
                                <td><input disabled name="details[{{ $i }}][description]" class="form-control"
                                        value="{{ $d->description }}"></td>
                                <td><input disabled type="number" name="details[{{ $i }}][qty]"
                                        class="form-control" value="{{ $d->qty }}"></td>
                                <td>
                                    <div class="form-control">
                                        {{ $d->unit }}
                                    </div>
                                    {{-- <select name="details[{{ $i }}][unit]" class="form-control">
                                        <option value="kg" {{ $d->unit == 'kg' ? 'selected' : '' }}>kg</option>
                                        <option value="grams" {{ $d->unit == 'grams' ? 'selected' : '' }}>grams</option>
                                    </select> --}}
                                </td>
                                <td><input disabled name="details[{{ $i }}][rate]" class="form-control"
                                        value="{{ $d->rate }}"></td>
                                <td><input disabled name="details[{{ $i }}][amount]" class="form-control"
                                        value="{{ $d->amount }}"></td>
                                {{-- <td><button type="button" class="btn btn-danger btn-sm"
                                        onclick="this.closest('tr').remove()">X</button></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- <button type="button" class="btn btn-secondary" onclick="addRow()">+ Add Row</button> --}}
            </div>
        </div>


          @if ($bankAccount)
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bank Details</h6>
                </div>

                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label>Bank Name</label>
                            <input disabled class="form-control mb-2" name="bank_name" placeholder="Bank Name"
                                value="{{ $bankAccount->bank_name ?? '' }}">
                        </div>
                        <div class="col-md-4">
                            <label>Account Title</label>
                            <input disabled class="form-control mb-2" name="account_title" placeholder="Bank Name"
                                value="{{ $bankAccount->account_title ?? '' }}">
                        </div>
                        <div class="col-md-4">
                            <label>Account Bank Number</label>
                            <input disabled class="form-control mb-2" name="account_number" placeholder="Bank Name"
                                value="{{ $bankAccount->account_number ?? '' }}">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label>Account Bank IBAN</label>
                            <input disabled class="form-control mb-2" name="iban" placeholder="Bank Name"
                                value="{{ $bankAccount->iban ?? '' }}">
                        </div>
                        <div class="col-md-4">
                            <label>Swift Code</label>
                            <input disabled class="form-control mb-2" name="swift_code" placeholder="Bank Name"
                                value="{{ $bankAccount->swift_code ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        @endif



        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Withdraw Request</h6>
            </div>

            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-3">
                        <label>Amount</label>
                        <input type="text" name="amount" disabled class="form-control" value="{{ $widthreq->amount }}">
                    </div>

                    <div class="col-md-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option {{ $widthreq->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option {{ $widthreq->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Transaction Image</label>
                        <input type="file" name="screenshot" class="form-control">

                        @if ($widthreq->screenshot)
                            <img src="{{ asset('storage/' . $widthreq->screenshot) }}" width="120"
                                class="mt-2 rounded border">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

    <script>
        let rowIndex = {{ $inquiry->details->count() ?? 0 }};

        function addRow(data = {}) {
            const itemsOptions =
                `@foreach ($items as $it)<option value="{{ $it->id }}">{{ $it->name }}</option>@endforeach`;
            const unitOptions = `<option value="kg">kg</option><option value="grams">grams</option>`;
            const html = `
        <tr>
            <td>
                <select name="details[${rowIndex}][item_id]" class="form-control">
                    <option value="">-- select --</option>
                    ${itemsOptions}
                </select>
            </td>
            <td><input name="details[${rowIndex}][description]" class="form-control" value="${data.description ?? ''}"></td>
            <td><input type="number" name="details[${rowIndex}][qty]" class="form-control" value="${data.qty ?? 1}"></td>
            <td><select name="details[${rowIndex}][unit]" class="form-control">${unitOptions}</select></td>
            <td><input type="number" step="0.01" name="details[${rowIndex}][rate]" class="form-control" value="${data.rate ?? 0}"></td>
            <td><input type="number" step="0.01" name="details[${rowIndex}][amount]" class="form-control" value="${data.amount ?? 0}"></td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">X</button></td>
        </tr>
    `;
            document.querySelector('#detailsTable tbody').insertAdjacentHTML('beforeend', html);
            rowIndex++;

        }


        document.querySelector('#detailsTable').addEventListener('input', function(e) {
            const tr = e.target.closest('tr');
            if (!tr) return;
            const qty = parseFloat(tr.querySelector('input[name*="[qty]"]').value) || 0;
            const rate = parseFloat(tr.querySelector('input[name*="[rate]"]').value) || 0;
            const amountInput = tr.querySelector('input[name*="[amount]"]');
            amountInput.value = (qty * rate).toFixed(2);
        });
    </script>
@endsection
