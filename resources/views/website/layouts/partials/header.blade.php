<!-- Responsive header code will be added here. Please paste your original header code again so I can restructure it into a fully responsive version. -->
<!-- Responsive Updated Header -->
<div class="header_navbar" style="background-color:#3167ff;">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <a class="navbar-brand" href="#index.html">
                <img src="{{ asset('img/logo.png') }}" width="180" alt="logo" class="img-fluid">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('/') }}">Home</a>
                    </li>

                    @if (session()->has('client_id'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.inquiries') }}">My Inquiries</a>
                        </li>
                    @elseif (session()->has('traveler_id'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('traveler.flights') }}">My Flights</a>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About Us
                        </a>
                        <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <a class="dropdown-item" href="#about.html">About</a>
                            <a class="dropdown-item" href="#product.html">Listing</a>
                            <a class="dropdown-item" href="#product-details.html">Lead Details</a>
                            <a class="dropdown-item" href="#faq.html">FAQ</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contact.html">Contact Us</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item dropdown">
                        @if (session()->has('client_id') || session()->has('traveler_id'))
                            <a class="nav-link dropdown-toggle" href="#" id="accountMenu" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">My Account</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                    href="{{ session()->has('client_id') ? route('client.dashboard') : route('traveler.dashboard') }}">
                                    <i class="fa fa-user"></i>
                                    {{ session()->has('client_id') ? session('client_name') : session('traveler_name') }}
                                </a>

                                <a class="dropdown-item"
                                    href="{{ session()->has('client_id') ? route('client.dashboard') : route('traveler.dashboard') }}">
                                    <i class="fa fa-tachometer-alt"></i> Dashboard
                                </a>

                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Sign Out
                                </a>
                                <form id="logout-form"
                                    action="{{ session()->has('client_id') ? route('client.logout') : route('traveler.logout') }}"
                                    method="POST" style="display:none;">@csrf</form>
                            </div>
                        @else
                            <a class="nav-link dropdown-toggle" href="#" id="signinMenu" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Sign In</a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('client.login') }}">
                                    <i class="fa fa-user"></i> Login as Client
                                </a>
                                <a class="dropdown-item" href="{{ route('traveler.login') }}">
                                    <i class="fa fa-plane"></i> Login as Traveler
                                </a>
                            </div>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<style>
    /* Responsive Tweaks */
    .navbar-brand img {
        max-width: 160px;
    }

    @media (max-width: 768px) {
        .navbar-collapse {
        background-color: #3167ff;
        }
        .navbar-brand img {
            max-width: 140px;
        }

        .navbar-nav>li>a {
            color: #ffffff !important;
        }

        .navbar-nav .nav-link {
            padding: 10px 0;
            color: #000 !important;
        }

        .dropdown-menu {
            width: 100%;
            text-align: center;
        }

        .navbar-nav {
            margin-top: 10px;
        }

        .navbar-toggler {
            border: none;
        }

        .dropdown-menu .dropdown-item:hover {
            background: #FF4367 !important;
            /* Pink background */
            color: #000 !important;
            /* White text */
        }
    }
</style>
<style>
    /* ============================
   MAIN MENU
============================ */

    /* Main menu default text */
    .navbar-nav .nav-link,
    .navbar-nav>li>a {
        color: #ffffff !important;
        /* White */
        font-weight: 500;
        transition: 0.3s ease;
    }

    /* Main menu hover text */
    .navbar-nav .nav-link:hover,
    .navbar-nav>li>a:hover {
        color: #FF4367 !important;
        /* Pink */
    }

    /* Active menu item */
    .navbar-nav .nav-link.active {
        color: #FF4367 !important;
        /* Pink */
    }


    /* ============================
   SUBMENU (Dropdown)
============================ */

    /* Submenu default text */
    .dropdown-menu .dropdown-item {
        color: #000 !important;
        /* Black */
        padding: 10px 15px;
        transition: 0.3s ease;
    }

    /* Submenu hover state */
    .dropdown-menu .dropdown-item:hover {
        background: #FF4367 !important;
        /* Pink background */
        color: #ffffff !important;
        /* White text */
    }
</style>
