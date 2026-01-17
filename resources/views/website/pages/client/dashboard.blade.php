@extends('website/layouts.app')

@section('title', 'Client Dashboard')

@section('content')
<div class="container py-4 client-dashboard-page">

    <h4 class="mb-4 font-weight-bold">Client Dashboard</h4>

    <div class="row">

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="{{ route('client.inquiries') }}" class="dashboard-card d-block text-center">
                <div class="dashboard-icon">📩</div>
                <div class="dashboard-title">My Inquiries</div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="{{ route('client.inquiries.create') }}" class="dashboard-card d-block text-center">
                <div class="dashboard-icon">➕</div>
                <div class="dashboard-title">Create Inquiry</div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="{{ route('client.messages.thread', [0,0]) }}" class="dashboard-card d-block text-center">
                <div class="dashboard-icon">💬</div>
                <div class="dashboard-title">Messages</div>
            </a>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
            <a href="{{ route('client.logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form-client').submit();"
               class="dashboard-card d-block text-center">
                <div class="dashboard-icon">🚪</div>
                <div class="dashboard-title">Logout</div>
            </a>
        </div>

        <form id="logout-form-client" action="{{ route('client.logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>
</div>
@endsection
