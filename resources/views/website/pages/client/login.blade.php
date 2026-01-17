@extends('website.layouts.app')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Login | Skypack</title>

    <!-- Custom Styles -->
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }

        .bg-left {
            /* background: url('img/locations-3.jpg') center center/cover no-repeat; */
            background: url('{{ asset('img/locations-3.jpg') }}') center center / cover no-repeat;
        }

        .login-card {
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .logo img {
            max-width: 80px;
        }

        @media (max-width: 767px) {
            .bg-left {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid h-100" style="margin-top: 80px">
        <div class="row h-100">

            <!-- Left Image Column -->
            <div class="col-md-6 d-none d-md-block bg-left">

            </div>

            <!-- Login Form Column -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="card login-card p-4 w-100" style="max-width: 400px;">
                    {{-- <div class="text-center mb-4 logo">
                    <img  src="{{ asset('img/logo.png') }}"  src="{{ asset('img/logo.png') }}" alt="ClassiFied Logo">
                </div> --}}

                    <h3 class="text-center mb-4 fw-bold">Client Login</h3>

                    <form action="{{ route('client.login.post') }}" method="POST" class=" text-muted">
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
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control form-control-lg"
                                placeholder="Enter your email or mobile" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg"
                                placeholder="Enter your password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">Login</button>

                        <div class="text-center">
                            <a href="{{ route('client.register') }}" class="text-decoration-none small">Don't have as
                                account? Register</a>
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
