@extends('layouts.admin')

@section('title', 'Edit Client')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800">Edit Client</h1>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back to Client List</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Client Details</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data" id="clientForm">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Full Name -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" class="form-control" value="{{ old('full_name', $client->full_name) }}" required>
                </div>

                <!-- Country -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" value="{{ old('country', $client->country) }}" required>
                </div>

                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $client->email) }}" required>
                </div>

                <!-- Mobile -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control" value="{{ old('mobile_number', $client->mobile_number) }}" required>
                </div>

                <!-- Mobile 2 -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Mobile Number 2</label>
                    <input type="text" name="mobile_number_2" class="form-control" value="{{ old('mobile_number_2', $client->mobile_number_2) }}">
                </div>

                <!-- Address -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $client->address) }}" required>
                </div>

                <!-- City -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="{{ old('city', $client->city) }}" required>
                </div>

                <!-- Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password <small class="text-muted">(Leave blank to keep current)</small></label>
                    <input type="password" name="password" class="form-control">
                </div>

                <!-- Passport Expiry -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Passport Expiry</label>
                    <input type="text" name="passport_expiry" class="form-control" value="{{ old('passport_expiry', $client->passport_expiry) }}">
                </div>

                <!-- Passport Number -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Passport Number</label>
                    <input type="text" name="passport_no" class="form-control" value="{{ old('passport_no', $client->passport_no) }}">
                </div>

                <!-- ID Number -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">ID Number</label>
                    <input type="text" name="ID_number" class="form-control" value="{{ old('ID_number', $client->ID_number) }}">
                </div>

                <!-- Profession -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Profession</label>
                    <input type="text" name="profession" class="form-control" value="{{ old('profession', $client->profession) }}">
                </div>

                <!-- Gender -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">Select</option>
                        <option value="male" {{ old('gender', $client->gender) == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender', $client->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>


                 <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="active" class="form-control">
                        <option value="">Select</option>
                        <option value='1' {{ old('gender', $client->active) == '1' ? 'selected' : '' }}>Active</option>
                        <option value='0' {{ old('gender', $client->active) == '0' ? 'selected' : '' }}>Not Active</option>
                    </select>
                </div>


                <!-- Passport Picture -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Passport Picture</label>
                    <input type="file" name="passport_pic" class="form-control" id="passport_pic">
                    @if($client->passport_pic)
                        <img id="previewPassport" src="{{ asset('storage/'.$client->passport_pic) }}" class="mt-2" width="100" alt="Passport">
                    @else
                        <img id="previewPassport" class="mt-2 d-none" width="100" alt="Preview">
                    @endif
                </div>

                <!-- Profile Image -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control" id="profile_image">
                    @if($client->profile_image)
                        <img id="previewProfile" src="{{ asset('storage/'.$client->profile_image) }}" class="mt-2" width="100" alt="Profile">
                    @else
                        <img id="previewProfile" class="mt-2 d-none" width="100" alt="Preview">
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Client</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Profile image preview
    const profileInput = document.getElementById("profile_image");
    const profilePreview = document.getElementById("previewProfile");

    profileInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            profilePreview.classList.remove("d-none");
            profilePreview.src = URL.createObjectURL(file);
        }
    });

    // Passport picture preview
    const passportInput = document.getElementById("passport_pic");
    const passportPreview = document.getElementById("previewPassport");

    passportInput.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            passportPreview.classList.remove("d-none");
            passportPreview.src = URL.createObjectURL(file);
        }
    });
</script>
@endpush
