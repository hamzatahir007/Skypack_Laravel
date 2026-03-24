{{-- resources/views/website/pages/about.blade.php --}}
@extends('website.layouts.static')

@section('page-title', 'About Us')
@section('page-subtitle', 'Connecting the World, One Journey at a Time')

@section('page-content')

<h2>Our Mission</h2>
<p>To make international shipping affordable, personal, and sustainable by leveraging the existing travel patterns of people worldwide. We're building a trusted community that transforms spare luggage space into economic opportunities and meaningful connections.</p>

<h2>Our Vision</h2>
<p>A world where borders don't limit what you can send or receive. Where every traveler can earn from their journey and every shipper has access to affordable, personal delivery. We're creating a sustainable sharing economy that benefits everyone.</p>

<h2>Who We Are</h2>
<p>We're reimagining international shipping by turning unused luggage space into opportunities for affordable, personal, and sustainable deliveries. LuggageLink connects verified travelers with clients who need packages delivered — creating value for both sides of every journey.</p>

<h2>Our Core Values</h2>
<p>These principles guide every decision we make and every feature we build.</p>

<div class="value-grid">
    <div class="value-card">
        <h4>🔒 Trust & Safety</h4>
        <p>We prioritize the security of our community with verified users, secure payments, and comprehensive insurance coverage.</p>
    </div>
    <div class="value-card">
        <h4>🌱 Sustainability</h4>
        <p>By utilizing existing travel routes, we reduce carbon emissions and promote eco-friendly shipping solutions.</p>
    </div>
    <div class="value-card">
        <h4>🤝 Community</h4>
        <p>We connect people across borders, fostering relationships and creating meaningful experiences through shared journeys.</p>
    </div>
    <div class="value-card">
        <h4>💡 Innovation</h4>
        <p>We continuously evolve our platform with cutting-edge technology to provide the best user experience.</p>
    </div>
    <div class="value-card">
        <h4>📋 Transparency</h4>
        <p>Clear pricing, honest communication, and open policies ensure you always know what to expect.</p>
    </div>
    <div class="value-card">
        <h4>💰 Affordability</h4>
        <p>We make international shipping accessible to everyone with competitive rates and no hidden fees.</p>
    </div>
</div>

<div class="info-card success">
    <strong>Ready to get started?</strong> Join thousands of travelers and clients already using LuggageLink to send packages across borders affordably and safely.
    <div style="margin-top: 12px;">
        <a href="{{ route('client.register') }}" class="btn btn-primary btn-sm btn-radius mr-2">Send a Package</a>
        <a href="{{ route('traveler.register') }}" class="btn btn-outline-primary btn-sm btn-radius">Earn as a Traveler</a>
    </div>
</div>

@endsection