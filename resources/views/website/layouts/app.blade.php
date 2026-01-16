 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <!--====== Title ======-->
     <title>BagSpace</title>

     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!--====== Favicon Icon ======-->
     <link rel="shortcut icon" href="#assets/images/favicon.png" type="image/png">
     <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('css/default.css') }}">
     <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
     <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
     <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

     <!-- Bootstrap -->
     {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

     <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
     <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css"
         rel="stylesheet" />


     <!-- Flatpickr CSS -->
     <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">


     <style>
         body {
             /* background: linear-gradient(135deg, #0d6efd 0%, #1158d6 100%); */
             color: #fff;
             background: #F4F5F7
         }

         .navbar {
             background: #ffffff;
             padding: 15px 0;
         }

         .navbar-nav .nav-link {
             font-weight: 500;
             color: #333 !important;
         }

         .navbar-nav .nav-link.active {
             color: #0d6efd !important;
             font-weight: 700;
         }

         .search-box {
             background: #fff;
             border-radius: 15px;
             padding: 20px;
             box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
         }

         .select2-container .select2-selection--single {
             background-color: #f3f3f3 !important;
             height: 45px !important;
             width: 150px;
             /* full width of parent column */
             border-radius: 8px !important;
             border: none !important;
             padding-top: 6px;
         }

         .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
             color: #333 !important;
             /* dark text color */
             line-height: 45px;
             /* match your height */
             font-size: 14px;
         }

         .select2-container--default .select2-results__group {
             color: #333 !important;
         }

         .select2-container--default .select2-results__option .select2-results__option {
             color: #888 !important;

         }

         .form-control {
             background: #f3f3f3;
             border: none;
             height: 45px;
             border-radius: 8px;
         }

         .stats-number {
             font-size: 32px;
             font-weight: 700;
         }

         .stats-label {
             font-size: 14px;
             opacity: 0.8;
         }

         .feature-card {
             transition: transform 0.3s ease, box-shadow 0.3s ease;
             padding-left: 100px;
             padding-right: 100px;
         }

         .feature-title {
             color: #333
         }

         .feature-card:hover {
             transform: translateY(-5px);
             box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
         }

         .journey-box {
             background: #f7faff;
             border-radius: 12px;
             padding: 25px;
             box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
         }

         .journey-box.customer {
             background: #fff8e8;
         }

         .step-item {
             margin-bottom: 25px;
             padding-left: 40px;
             position: relative;
         }

         .step-item:before {
             content: "";
             position: absolute;
             left: 10px;
             top: 5px;
             width: 2px;
             height: 100%;
             background: #d7d7d7;
         }

         .step-icon {
             width: 26px;
             height: 26px;
             background: #dfeaff;
             border-radius: 50%;
             display: flex;
             justify-content: center;
             align-items: center;
             font-size: 14px;
             position: absolute;
             left: 0;
             top: 0;
         }

         .step-title {
             font-weight: 600;
             color: #23395d;
         }

         .journey-title {
             font-size: 22px;
             font-weight: 700;
             margin-bottom: 20px;
         }

         .step-days {
             font-size: 14px;
             color: #888;
         }

         
     </style>


 </head>

 @stack('scripts')


 <body id="page-top">
     @include('website.layouts.partials.header')

     <!-- Begin Page Content -->
     <div class="container-fluid main-content-wrapper" style="margin-top: 150px">
         @yield('content')
     </div>
     <!-- /.container-fluid -->

     @include('website.layouts.partials.footer')


     <!-- Bootstrap JS -->
     {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script> --}}

     <!--====== Jquery js ======-->
     <script src="{{ asset('Home _ ClassiFied_files/jquery-1.12.4.min.js') }}"></script>
     <script src="{{ asset('Home _ ClassiFied_files/modernizr-3.7.1.min.js') }}"></script>

     <!--====== Bootstrap js ======-->
     <script src="{{ asset('Home _ ClassiFied_files/popper.min.js') }}"></script>
     <script src="{{ asset('Home _ ClassiFied_files/bootstrap.min.js') }}"></script>

     <!--====== Slick js ======-->
     <script src="{{ asset('Home _ ClassiFied_files/slick.min.js') }}"></script>

     <!--====== Magnific Popup js ======-->
     <script src="{{ asset('Home _ ClassiFied_files/jquery.magnific-popup.min.js') }}"></script>

     <!--====== Nice Select js ======-->
     <script src="{{ asset('Home _ ClassiFied_files/jquery.nice-select.min.js') }}"></script>

     <!--====== Counter Up js ======-->
     <script ssrc="{{ asset('Home _ ClassiFied_files/waypoints.min.js') }}"></script>
     <script src="{{ asset('Home _ ClassiFied_files/jquery.counterup.min.js') }}"></script>

     <!--====== Price Range js ======-->
     <script src="{{ asset('Home _ ClassiFied_files/ion.rangeSlider.min.js') }}"></script>

     <!--====== Ajax Contact js ======-->
     <script src="{{ asset('Home _ ClassiFied_files/ajax-contact.js') }}"></script>

     <!--====== Main js ======-->
     <script src="{{ asset('Home _ ClassiFied_files/main.js') }}"></script>

     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}

     <!-- Select2 JS -->
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

     <!-- Flatpickr JS -->
     <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
     <!-- Bootstrap JS Bundle -->

     <script>
         // Autocomplete Select2
         $('#fromCity').select2({
             placeholder: "From City",
             allowClear: true,

         });
         $('#toCity').select2({
             placeholder: "To City",
             allowClear: true
         });

         // Datepicker
         flatpickr("#travelDate", {
             minDate: "today",
             dateFormat: "Y-m-d"
         });


         // Update price range value display
         document.getElementById('maxPrice').addEventListener('input', function() {
             document.getElementById('priceValue').textContent = '$' + this.value;
         });

         // Contact button functionality
         document.querySelectorAll('.contact-btn').forEach(button => {
             button.addEventListener('click', function() {
                 const flightCard = this.closest('.flight-card');
                 const airline = flightCard.querySelector('.airline-badge').textContent.split('•')[0].trim();
                 const traveler = flightCard.querySelector('.traveler-name').textContent;
                 alert(
                     `Contacting ${traveler} for ${airline}. In a real application, this would connect you with the traveler.`
                 );
             });
         });
     </script>

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
