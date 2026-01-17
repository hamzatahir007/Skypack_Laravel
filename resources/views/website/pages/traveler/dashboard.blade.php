@extends('website/layouts.app')

@section('title', 'Traveler Dashboard')

@section('content')
<div class="container py-4 traveler-dashboard-page text-muted">

    <h4 class="mb-4 font-weight-bold">Traveler Dashboard</h4>

    <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="{{ route('traveler.flights') }}" class="dashboard-card d-block text-center">
                <div class="dashboard-icon">✈️</div>
                <div class="dashboard-title">My Flights</div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="{{ route('traveler.flights.create') }}" class="dashboard-card d-block text-center">
                <div class="dashboard-icon">➕</div>
                <div class="dashboard-title">Add Flight</div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="{{ route('traveler.bank.index') }}" class="dashboard-card d-block text-center">
                <div class="dashboard-icon">🏦</div>
                <div class="dashboard-title">Bank Account</div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="{{ route('traveler.logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form-traveler').submit();"
               class="dashboard-card d-block text-center">
                <div class="dashboard-icon">🚪</div>
                <div class="dashboard-title">Logout</div>
            </a>
        </div>

        <form id="logout-form-traveler"
              action="{{ route('traveler.logout') }}"
              method="POST"
              class="d-none">
            @csrf
        </form>

    </div>
</div>
@endsection
