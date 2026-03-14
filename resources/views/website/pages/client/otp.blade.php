@extends('website.layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP - LuggageLink</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
        }
        .bg-left {
            background: url('{{ asset('img/locations-3.jpg') }}') center center / cover no-repeat;
        }
        @media (max-width: 767px) {
            .bg-left { display: none; }
        }

        /* OTP input boxes */
        .otp-input {
            width: 50px;
            height: 55px;
            font-size: 1.5rem;
            text-align: center;
            border: 2px solid #dee2e6;
            border-radius: 10px;
            transition: border-color 0.2s;
        }
        .otp-input:focus {
            border-color: #0d6efd;
            outline: none;
            box-shadow: 0 0 0 3px rgba(13,110,253,.15);
        }

        /* Countdown timer */
        #countdown {
            font-size: 1.1rem;
            font-weight: 600;
            color: #0d6efd;
        }
        #countdown.expired {
            color: #dc3545;
        }
    </style>
</head>
<body>

<div class="container-fluid h-100" style="margin-top: 80px">
    <div class="row h-100">

        <!-- Left Image -->
        <div class="col-md-6 d-none d-md-block bg-left" style="min-height: 100vh;"></div>

        <!-- OTP Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="card p-4 w-100" style="max-width: 420px; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.12);">

                <!-- Icon -->
                <div class="text-center mb-3">
                    <div style="width:64px; height:64px; background:#e8f0fe; border-radius:50%; display:inline-flex; align-items:center; justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#0d6efd" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.708 2.825L15 11.105V5.383zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741zM1 11.105l4.708-2.897L1 5.383v5.722z"/>
                        </svg>
                    </div>
                </div>

                <h4 class="text-center fw-bold mb-1">Check your email</h4>
                <p class="text-center text-muted small mb-4">
                    We sent a 6-digit code to your registered email.<br>Enter it below to continue.
                </p>

                {{-- Alerts --}}
                @if (session('error'))
                    <div class="alert alert-danger py-2">{{ session('error') }}</div>
                @endif
                @if (session('info'))
                    <div class="alert alert-info py-2">{{ session('info') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                {{-- OTP Form --}}
                <form action="{{ route('client.otp.verify') }}" method="POST" id="otpForm">
                    @csrf

                    {{-- 6 individual digit boxes --}}
                    <div class="d-flex justify-content-center gap-2 mb-4">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" id="otp1" autofocus>
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" id="otp2">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" id="otp3">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" id="otp4">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" id="otp5">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" id="otp6">
                    </div>

                    {{-- Hidden combined OTP field submitted to server --}}
                    <input type="hidden" name="otp" id="otpHidden">

                    {{-- Countdown --}}
                    <div class="text-center mb-3">
                        <span class="text-muted small">Code expires in </span>
                        <span id="countdown">10:00</span>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-lg" id="submitBtn">
                        Verify Code
                    </button>
                </form>

                {{-- Resend --}}
                <form action="{{ route('client.otp.resend') }}" method="POST" class="mt-3 text-center">
                    @csrf
                    <span class="text-muted small">Didn't receive it? </span>
                    <button type="submit" class="btn btn-link btn-sm p-0" id="resendBtn">Resend OTP</button>
                </form>

                <div class="text-center mt-3">
                    <a href="{{ route('client.login') }}" class="text-decoration-none small text-muted">
                        ← Back to Login
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // ── Auto-advance between OTP boxes ──────────────────────────────
    const inputs = document.querySelectorAll('.otp-input');

    inputs.forEach((input, index) => {
        input.addEventListener('input', function () {
            // Only allow digits
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value && index < inputs.length - 1) {
                inputs[index + 1].focus();
            }
        });

        input.addEventListener('keydown', function (e) {
            // Backspace goes back to previous box
            if (e.key === 'Backspace' && !this.value && index > 0) {
                inputs[index - 1].focus();
            }
        });

        // Handle paste — spread digits across boxes
        input.addEventListener('paste', function (e) {
            e.preventDefault();
            const pasted = e.clipboardData.getData('text').replace(/[^0-9]/g, '').slice(0, 6);
            pasted.split('').forEach((digit, i) => {
                if (inputs[i]) inputs[i].value = digit;
            });
            const last = Math.min(pasted.length, inputs.length - 1);
            inputs[last].focus();
        });
    });

    // ── Combine digits into hidden field on submit ───────────────────
    document.getElementById('otpForm').addEventListener('submit', function (e) {
        const combined = Array.from(inputs).map(i => i.value).join('');
        if (combined.length < 6) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Incomplete',
                text: 'Please enter all 6 digits.',
                confirmButtonText: 'OK'
            });
            return;
        }
        document.getElementById('otpHidden').value = combined;
    });

    // ── 10-minute countdown ──────────────────────────────────────────
    let totalSeconds = 10 * 60;
    const countdownEl = document.getElementById('countdown');
    const submitBtn   = document.getElementById('submitBtn');
    const resendBtn   = document.getElementById('resendBtn');

    const timer = setInterval(() => {
        totalSeconds--;
        const mins = String(Math.floor(totalSeconds / 60)).padStart(2, '0');
        const secs = String(totalSeconds % 60).padStart(2, '0');
        countdownEl.textContent = `${mins}:${secs}`;

        if (totalSeconds <= 0) {
            clearInterval(timer);
            countdownEl.textContent = 'Expired';
            countdownEl.classList.add('expired');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Code Expired';
        }
    }, 1000);
</script>

@if (session('success'))
<script>
    Swal.fire({ icon: 'success', title: 'Success', text: "{{ session('success') }}", timer: 3000, showConfirmButton: false, toast: true, position: 'top-end' });
</script>
@endif
@if (session('error'))
<script>
    Swal.fire({ icon: 'error', title: 'Error', text: "{{ session('error') }}", timer: 3000, showConfirmButton: false, toast: true, position: 'top-end' });
</script>
@endif

</body>
</html>