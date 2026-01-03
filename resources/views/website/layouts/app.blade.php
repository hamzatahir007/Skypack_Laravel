 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


     <!--====== Title ======-->
     <title>Home | ClassiFied</title>

     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!--====== Favicon Icon ======-->
     <link rel="shortcut icon" href="#assets/images/favicon.png" type="image/png">



     {{-- <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> --}}
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



     <!-- Popper.js for dropdowns -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>

     <!-- Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

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
