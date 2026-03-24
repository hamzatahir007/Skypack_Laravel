{{-- resources/views/website/pages/safety-guidelines.blade.php --}}
@extends('website.layouts.static')

@section('page-title', 'Safety Guidelines')
@section('page-subtitle', 'Your safety is our top priority — follow these guidelines for every transaction')

@section('page-content')

<h2>Essential Safety Rules</h2>

<h3>📦 Package Acceptance</h3>
<ul>
    <li>Only accept packages from verified users with good ratings</li>
    <li>Inspect packages before accepting — refuse if damaged or suspicious</li>
    <li>Verify package contents match the description provided</li>
    <li>Never accept packages containing prohibited items</li>
    <li>Take photos of packages before and after transport</li>
</ul>

<h3>💬 Communication</h3>
<ul>
    <li>Keep all communication within the LuggageLink platform</li>
    <li>Never share personal contact information before booking confirmation</li>
    <li>Report any inappropriate or suspicious messages immediately</li>
    <li>Be professional and respectful in all interactions</li>
    <li>Confirm pickup and delivery details through the platform</li>
</ul>

<h3>🧍 Personal Safety</h3>
<ul>
    <li>Meet in public places for package handovers</li>
    <li>Bring a friend or family member to pickup/delivery meetings</li>
    <li>Trust your instincts — decline if something feels wrong</li>
    <li>Verify the identity of the person you're meeting</li>
    <li>Keep packages secure during transport</li>
</ul>

<h3>⚖️ Legal Compliance</h3>
<ul>
    <li>Declare all carried items to customs when required</li>
    <li>Understand import/export regulations for your destinations</li>
    <li>Never carry items that violate airline or customs regulations</li>
    <li>Keep all documentation provided by the shipper</li>
    <li>Cooperate with authorities if questioned about packages</li>
</ul>

<div class="info-card warning">
    <strong>Prohibited Items:</strong> Never accept packages containing prohibited items including liquids over 100ml, batteries, flammable materials, weapons, illegal substances, and more. See our <a href="{{ url('/prohibited-items') }}">Prohibited Items page</a> for the full list.
</div>

<h2>⚠️ Warning Signs</h2>
<p>Be alert for these red flags and report them immediately:</p>
<ul>
    <li>Requests to meet in isolated locations</li>
    <li>Pressure to accept packages immediately</li>
    <li>Offers significantly above market rates</li>
    <li>Reluctance to provide package details</li>
    <li>Requests to bypass platform communication</li>
    <li>Packages that feel unusually heavy or light</li>
    <li>Strong chemical odors from packages</li>
    <li>Damaged or poorly sealed packages</li>
</ul>

<h2>🚨 Emergency Procedures</h2>

<div class="info-card danger">
    <h3 style="margin-top:0; color:#dc3545;">Suspicious Package</h3>
    <p style="margin:0;">If you receive a suspicious package, do not transport it. Contact LuggageLink support immediately and do not proceed with the transaction.</p>
</div>

<div class="info-card danger">
    <h3 style="margin-top:0; color:#dc3545;">Unsafe Meeting</h3>
    <p style="margin:0;">If you feel unsafe during a meeting, leave immediately and contact local authorities if necessary. Your safety always comes first.</p>
</div>

<div class="info-card warning">
    <h3 style="margin-top:0; color:#f0a500;">Lost Package</h3>
    <p style="margin:0;">If a package is lost or damaged during transport, report it through the platform within 24 hours to begin the claims process.</p>
</div>

<h2>Best Practices Summary</h2>
<ol>
    <li>Always verify the user's profile and rating before accepting a transaction</li>
    <li>Document everything — take photos before and after receiving packages</li>
    <li>Use only platform messaging — never communicate outside LuggageLink</li>
    <li>Meet in safe, public locations such as airports, malls, or hotels</li>
    <li>Declare all items honestly to customs and immigration officials</li>
    <li>Report any violations or suspicious behavior immediately</li>
</ol>

@endsection