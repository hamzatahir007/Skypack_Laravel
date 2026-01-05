@extends('website.layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveler Registration | Skypack</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .registration-card {
            /* border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.15); */
            padding: 2rem;
            /* background-color: #fff; */
        }

        .logo img {
            max-width: 100px;
        }

        h2 {
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            border-radius: 8px;
        }

        @media (min-width: 768px) {
            .bg-left {
                background: url('{{ asset('img/locations-3.jpg') }}') center center / cover no-repeat;
                min-height: 100vh;
            }
        }

        @media (max-width: 767px) {
            .bg-left {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid" style="margin-top: 100px">
    <div class="row min-vh-100">

        <!-- Left Image Column -->
        <div class="col-md-6 d-none d-md-block bg-left"></div>

        <!-- Registration Form Column -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="registration-card w-100" style="max-width: 600px;">

                <div class="text-center mb-4 logo">
                    <img src="{{ asset('img/logo.png') }}" alt="Skypack Logo">
                </div>

                <h2 class="text-center mb-4">Traveler Registration</h2>

                <form action="{{ route('traveler.register.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                    <div class="row g-3">

                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" name="mobile_number" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Mobile Number 2</label>
                            <input type="text" name="mobile_number_2" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Passport Expiry</label>
                            <input type="date" name="passport_expiry" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Passport Number</label>
                            <input type="text" name="passport_no" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">ID Number</label>
                            <input type="text" name="ID_number" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Profession</label>
                            <input type="text" name="profession" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select">
                                <option value="">Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                                            {{-- <input disabled display='none' value="1" type="text" name="active" class="form-control" required> --}}

                                            <!-- Passport Picture -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Passport Picture</label>
                    <input type="file" name="passport_pic" class="form-control" id="passport_pic" required>
                </div>

                <!-- Profile Image -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="profile_image" class="form-control" id="profile_image" required>
                </div>



                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100 btn-lg">Register</button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('traveler.login') }}" class="text-decoration-none small">Already have as acount? Login</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


     @if (session('success'))
         <script>
             Swal.fire({
                 icon: 'success',
                 title: 'Success',
                 text: "{{ session('success') }}",
                 timer: 3000,
                 showConfirmButton: false,
                 toast: true,
                 position: 'top-end'
             });
         </script>
     @endif

     @if (session('error'))
         <script>
             Swal.fire({
                 icon: 'error',
                 title: 'Error',
                 text: "{{ session('error') }}",
                 timer: 3000,
                 showConfirmButton: false,
                 toast: true,
                 position: 'top-end'
             });
         </script>
     @endif
     
</body>
</html>
