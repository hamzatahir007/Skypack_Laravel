<div class="header_navbar shadow-sm" style="background-color:white;">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0" style="height:80px">

            {{-- LOGO --}}
            <a class="navbar-brand font-weight-bold d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('img/bagspacelogo.png') }}" width="400" class="mr-2" alt="logo">
            </a>

            {{-- MOBILE TOGGLE --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu"
                aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- MENU --}}
            <div class="collapse navbar-collapse justify-content-center" id="mainMenu">
                <ul class="navbar-nav text-center">

                    <li class="nav-item mx-lg-3">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item mx-lg-3">
                        <a class="nav-link" href="{{ route('/listspace') }}">List Space</a>
                    </li>

                    <li class="nav-item mx-lg-3">
                        <a class="nav-link" href="{{ route('/browsespace') }}">Browse Space</a>
                    </li>

                    @if (session()->has('client_id'))
                        <li class="nav-item mx-lg-3">
                            <a class="nav-link {{ request()->is('client/inquiries*') ? 'active' : '' }}"
                                href="{{ route('client.inquiries') }}">
                                My Inquiries
                            </a>
                        </li>
                    @endif

                    @if (session()->has('traveler_id'))
                        <li class="nav-item mx-lg-3">
                            <a class="nav-link {{ request()->is('traveler/flights*') ? 'active' : '' }}"
                                href="{{ route('traveler.flights') }}">
                                My Flights
                            </a>
                        </li>
                    @endif



                    {{-- MOBILE AUTH (ONLY MOBILE) --}}
                    <li class="nav-item d-lg-none mt-3">

                        @if (session()->has('client_id') || session()->has('traveler_id'))
                            <div class="dropdown text-center">
                                <a style="color: black !important" href="#"
                                    class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                    {{ session('client_name') ?? session('traveler_name') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-center shadow">

                                    <a style="color: black !important" class="dropdown-item"
                                        href="{{ session()->has('client_id') ? route('client.dashboard') : route('traveler.dashboard') }}">
                                        Dashboard
                                    </a>

                                    @if (session()->has('traveler_id'))
                                        <a style="color: black !important" class="dropdown-item"
                                            href="{{ route('traveler.bank.index') }}">
                                            Bank Account
                                        </a>
                                    @endif

                                    <div class="dropdown-divider"></div>

                                    <a style="color: black !important" class="dropdown-item text-danger" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="dropdown text-center">
                                <a class="btn btn-primary dropdown-toggle btn-block" href="#"
                                    data-toggle="dropdown">
                                    Sign In
                                </a>

                                <div class="dropdown-menu dropdown-menu-center shadow text-center">
                                    <a class="dropdown-item"style="color: black !important"
                                        href="{{ route('client.login') }}">Login as Client</a>
                                    <a class="dropdown-item" style="color: black !important"
                                        href="{{ route('traveler.login') }}">Login as Traveler</a>
                                </div>
                            </div>
                        @endif

                    </li>

                </ul>
            </div>

            {{-- RIGHT SIDE USER --}}
            <div class="ml-auto d-none d-lg-flex align-items-center">

                @if (session()->has('client_id') || session()->has('traveler_id'))

                    <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://i.pravatar.cc/40" class="rounded-circle mr-2" width="36">
                            <span class="font-weight-semibold text-dark">
                                {{ collect(explode(' ', session('client_name') ?? session('traveler_name')))->take(2)->implode(' ') }}
                            </span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow">

                            <a style="color: black !important" class="dropdown-item"
                                href="{{ session()->has('client_id') ? route('client.dashboard') : route('traveler.dashboard') }}">
                                Dashboard
                            </a>

                            @if (session()->has('traveler_id'))
                                <a style="color: black !important" class="dropdown-item"
                                    href="{{ route('traveler.bank.index') }}">
                                    Bank Account
                                </a>
                            @endif

                            <div class="dropdown-divider"></div>

                            <a style="color: black !important" class="dropdown-item text-danger" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </div>
                    </div>

                    <form id="logout-form"
                        action="{{ session()->has('client_id') ? route('client.logout') : route('traveler.logout') }}"
                        method="POST" style="display:none;">
                        @csrf
                    </form>
                @else
                    <div class="dropdown">
                        <a class="btn btn-outline-primary dropdown-toggle" href="#" data-toggle="dropdown">
                            Sign In
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <a class="dropdown-item" href="{{ route('client.login') }}"
                                style="color: black !important">Login as Client</a>
                            <a class="dropdown-item" href="{{ route('traveler.login') }}"
                                style="color: black !important">Login as Traveler</a>
                        </div>
                    </div>
                @endif

            </div>

        </nav>
    </div>
</div>
