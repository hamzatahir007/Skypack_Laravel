  @extends('website/layouts.app') <!-- Use your admin layout -->

  @section('content')

  @section('title', 'Traveler Dashboard')

  @section('content')
      <div class="container py-4">
          <h4 class="mb-4">Traveler Dashboard</h4>

          <div class="dashboard-grid">

              <a href="{{ route('traveler.flights') }}" class="dashboard-card">
                  <div class="dashboard-icon">✈️</div>
                  <div class="dashboard-title">My Flights</div>
              </a>

              <a href="{{ route('traveler.flights.create') }}" class="dashboard-card">
                  <div class="dashboard-icon">➕</div>
                  <div class="dashboard-title">Add Flight</div>
              </a>

              <a href="{{ route('traveler.bank.index') }}" class="dashboard-card">
                  <div class="dashboard-icon">🏦</div>
                  <div class="dashboard-title">Bank Account</div>
              </a>

              <a href="{{ route('traveler.logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form-traveler').submit();"
                  class="dashboard-card">
                  <div class="dashboard-icon">🚪</div>
                  <div class="dashboard-title">Logout</div>
              </a>

              <form id="logout-form-traveler" action="{{ route('traveler.logout') }}" method="POST" class="d-none">
                  @csrf
              </form>

          </div>
      </div>
  @endsection
