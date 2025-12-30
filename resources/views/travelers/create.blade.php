@extends('layouts.admin')

@section('title', 'Add Traveler')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 text-gray-800">Add Traveler</h1>
    <a href="{{ route('travelers.index') }}" class="btn btn-secondary">Back to Traveler List</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Traveler Details</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('travelers.store') }}" method="POST" enctype="multipart/form-data" id="travelerForm">
            @csrf

            <div class="row">
                <!-- Full Name -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>

                <!-- Country -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" required>
                </div>

                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <!-- Mobile -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control" required>
                </div>

                <!-- Mobile 2 -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Mobile Number 2</label>
                    <input type="text" name="mobile_number_2" class="form-control" required>
                </div>

                <!-- Address -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required>
                </div>

                <!-- City -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" required>
                </div>

                <!-- Password -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <!-- Passport Expiry -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Passport Expiry</label>
                    <input type="date" name="passport_expiry" class="form-control" required>
                </div>

                <!-- Passport Number -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Passport Number</label>
                    <input type="text" name="passport_no" class="form-control" required>
                </div>

                <!-- ID Number -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">ID Number</label>
                    <input type="text" name="ID_number" class="form-control" required>
                </div>

                <!-- Profession -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Profession</label>
                    <input type="text" name="profession" class="form-control" required>
                </div>

                <!-- Gender -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="active" class="form-control">
                        <option value="">Select</option>
                        <option value='1'>Active</option>
                        <option value='0'>Not Active</option>
                    </select>
                </div>

                <!-- Passport Picture -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Passport Picture</label>
                    <input type="file" name="passport_pic" class="form-control" id="passport_pic" required>
                    <img id="previewPassport" class="mt-2 d-none" width="100" alt="Preview">
                </div>

                <!-- Profile Image -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control" id="profile_image" required>
                    <img id="previewProfile" class="mt-2 d-none" width="100" alt="Preview">
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Save Traveler</button>
        </form>
    </div>
</div>
@endsection


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@push('scripts')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const profileInput = document.getElementById("profile_image");
    const profilePreview = document.getElementById("previewProfile");

    if(profileInput) {
        profileInput.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                profilePreview.classList.remove("d-none");
                profilePreview.src = URL.createObjectURL(file);
            }
        });
    }

    const passportInput = document.getElementById("passport_pic");
    const passportPreview = document.getElementById("previewPassport");

    if(passportInput) {
        passportInput.addEventListener("change", function () {
            const file = this.files[0];
            if (file) {
                passportPreview.classList.remove("d-none");
                passportPreview.src = URL.createObjectURL(file);
            }
        });
    }
});
</script>
@endpush
