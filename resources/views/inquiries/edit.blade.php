@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800">Edit Inquiry #{{ $inquiry->id }}</h1>
    <a href="{{ route('inquiries.index') }}" class="btn btn-secondary">Back to Inquiry List</a>
</div>


    <form method="POST" action="{{ route('inquiries.update', $inquiry->id) }}">
        @csrf
        @method('PUT')

        {{-- MASTER --}}
        <div class="card mb-4">
            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Inquiry Master</h6></div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-md-3">
                        <label>Client</label>
                        <select name="client_id" class="form-control">
                            <option value="">-- Select Client --</option>
                            @foreach($clients as $c)
                                <option value="{{ $c->id }}" {{ $inquiry->client_id == $c->id ? 'selected' : '' }}>
                                    {{ $c->full_name ?? $c->name ?? $c->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Traveler</label>
                        <select name="traveler_id" class="form-control">
                            <option value="">-- Select Traveler --</option>
                            @foreach($travelers as $t)
                                <option value="{{ $t->id }}" {{ $inquiry->traveler_id == $t->id ? 'selected' : '' }}>
                                    {{ $t->full_name ?? $t->name ?? $t->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Travel Flight</label>
                        <select name="travel_flight_id" class="form-control">
                            <option value="">-- Select Flight --</option>
                            @foreach($flights as $f)
                                <option value="{{ $f->id }}" {{ $inquiry->travel_flight_id == $f->id ? 'selected' : '' }}>
                                    {{ $f->pnr_no ?? 'Flight #'.$f->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Entry Date</label>
                        <input type="date" name="entry_date" class="form-control" value="{{ $inquiry->entry_date }}">
                    </div>

                    <div class="col-md-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option {{ $inquiry->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option {{ $inquiry->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label>Contact Person</label>
                        <input type="text" name="contact_person" class="form-control" value="{{ $inquiry->contact_person }}">
                    </div>

                    <div class="col-md-3">
                        <label>Contact No</label>
                        <input type="text" name="contact_no" class="form-control" value="{{ $inquiry->contact_no }}">
                    </div>

                    <div class="col-md-3">
                        <label>Delivery Address</label>
                        <input type="text" name="delivery_address" class="form-control" value="{{ $inquiry->delivery_address }}">
                    </div>

                    <div class="col-md-12 mt-2">
                        <label>Remarks</label>
                        <textarea name="remarks" class="form-control">{{ $inquiry->remarks }}</textarea>
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
                        @foreach($inquiry->details as $i => $d)
                        <tr>
                            <td>
                                <select name="details[{{ $i }}][item_id]" class="form-control">
                                    <option value="">-- select --</option>
                                    @foreach($items as $it)
                                        <option value="{{ $it->id }}" {{ $d->item_id == $it->id ? 'selected' : '' }}>
                                            {{ $it->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input name="details[{{ $i }}][description]" class="form-control" value="{{ $d->description }}"></td>
                            <td><input type="number" name="details[{{ $i }}][qty]" class="form-control" value="{{ $d->qty }}"></td>
                            <td>
                                <select name="details[{{ $i }}][unit]" class="form-control">
                                    <option value="kg" {{ $d->unit == 'kg' ? 'selected' : '' }}>kg</option>
                                    <option value="grams" {{ $d->unit == 'grams' ? 'selected' : '' }}>grams</option>
                                </select>
                            </td>
                            <td><input name="details[{{ $i }}][rate]" class="form-control" value="{{ $d->rate }}"></td>
                            <td><input name="details[{{ $i }}][amount]" class="form-control" value="{{ $d->amount }}"></td>
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">X</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="button" class="btn btn-secondary" onclick="addRow()">+ Add Row</button>
            </div>
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

<script>

        let rowIndex = {{ $inquiry->details->count() ?? 0 }};

function addRow(data = {}) {
    const itemsOptions = `@foreach($items as $it)<option value="{{ $it->id }}">{{ $it->name }}</option>@endforeach`;
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


document.querySelector('#detailsTable').addEventListener('input', function(e){
    const tr = e.target.closest('tr');
    if (!tr) return;
    const qty = parseFloat(tr.querySelector('input[name*="[qty]"]').value) || 0;
    const rate = parseFloat(tr.querySelector('input[name*="[rate]"]').value) || 0;
    const amountInput = tr.querySelector('input[name*="[amount]"]');
    amountInput.value = (qty * rate).toFixed(2);
});
</script>
@endsection
