@extends('website/layouts.app')

@section('title', 'Client Dashboard')

@section('content')
<div class="container py-4">
    <h4 class="mb-4">Client Dashboard</h4>

   <div class="dashboard-grid">

        <a href="{{ route('client.inquiries') }}" class="dashboard-card">
            <div class="dashboard-icon">📩</div>
            <div class="dashboard-title">My Inquiries</div>
        </a>

        <a href="{{ route('client.inquiries.create') }}" class="dashboard-card">
            <div class="dashboard-icon">➕</div>
            <div class="dashboard-title">Create Inquiry</div>
        </a>

        <a href="{{ route('client.messages.thread', [0,0]) }}" class="dashboard-card">
            <div class="dashboard-icon">💬</div>
            <div class="dashboard-title">Messages</div>
        </a>

        <a href="{{ route('client.logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form-client').submit();"
           class="dashboard-card">
            <div class="dashboard-icon">🚪</div>
            <div class="dashboard-title">Logout</div>
        </a>

        <form id="logout-form-client" action="{{ route('client.logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </div>
</div>
@endsection