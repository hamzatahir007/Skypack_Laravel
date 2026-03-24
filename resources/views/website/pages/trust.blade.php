{{-- resources/views/website/pages/trust.blade.php --}}
@extends('website.layouts.static')

@section('page-title', 'Trust & Safety')
@section('page-subtitle', 'Your safety and security are our top priorities')

@section('page-content')

<p>Learn about the measures we take to create a trusted community for travelers and shippers on LuggageLink.</p>

<h2>Building Trust Through Technology</h2>
<p>Advanced security measures protect every member of our community.</p>

<div class="value-grid">
    <div class="value-card">
        <h4>🪪 Identity Verification</h4>
        <p>All users undergo comprehensive identity verification including government ID, phone, and email confirmation.</p>
        <ul style="font-size: 0.85rem; color: #666; margin-top: 8px; padding-left: 16px;">
            <li>Government ID verification</li>
            <li>Phone number confirmation</li>
            <li>Email verification</li>
            <li>Address validation</li>
        </ul>
    </div>
    <div class="value-card">
        <h4>⭐ Review System</h4>
        <p>Transparent rating and review system helps build trust between travelers and customers.</p>
        <ul style="font-size: 0.85rem; color: #666; margin-top: 8px; padding-left: 16px;">
            <li>5-star rating system</li>
            <li>Detailed written reviews</li>
            <li>Response from rated users</li>
            <li>Review authenticity checks</li>
        </ul>
    </div>
    <div class="value-card">
        <h4>💳 Secure Payments</h4>
        <p>All payments are processed securely through Stripe with escrow-style protection.</p>
        <ul style="font-size: 0.85rem; color: #666; margin-top: 8px; padding-left: 16px;">
            <li>PCI-compliant processing</li>
            <li>Escrow payment holding</li>
            <li>Automatic dispute resolution</li>
            <li>Fraud protection</li>
        </ul>
    </div>
    <div class="value-card">
        <h4>🛡️ Content Moderation</h4>
        <p>24/7 monitoring and moderation to ensure platform safety and compliance.</p>
        <ul style="font-size: 0.85rem; color: #666; margin-top: 8px; padding-left: 16px;">
            <li>AI-powered content scanning</li>
            <li>Human moderation team</li>
            <li>Real-time monitoring</li>
            <li>Quick response to reports</li>
        </ul>
    </div>
</div>

<h2>Safety Measures</h2>
<p>Comprehensive protection at every step of the process.</p>

<div class="info-card">
    <h3 style="margin-top:0; color:#0d6efd;">📦 Package Screening</h3>
    <p style="margin:0;">Comprehensive guidelines and restrictions on acceptable items ensure only permitted goods are transported through the platform.</p>
</div>

<div class="info-card">
    <h3 style="margin-top:0; color:#0d6efd;">🔍 User Background Checks</h3>
    <p style="margin:0;">Enhanced verification for high-volume users and continuous suspicious activity monitoring keeps our community safe.</p>
</div>

<div class="info-card">
    <h3 style="margin-top:0; color:#0d6efd;">🏦 Insurance Coverage</h3>
    <p style="margin:0;">Comprehensive insurance protection covers all shipments and travelers throughout the delivery process.</p>
</div>

<h2>How Payments Are Protected</h2>
<p>Your money is held securely until delivery is confirmed:</p>
<ol>
    <li>Client pays at checkout — funds held in escrow by the platform</li>
    <li>Traveler picks up and transports the package</li>
    <li>Client verifies delivery using the unique delivery code</li>
    <li>Traveler earnings are released within 3–5 business days</li>
    <li>In disputes, the platform reviews evidence and makes a final determination</li>
</ol>

<div class="info-card warning">
    <strong>⚠️ Always use the platform.</strong> Never arrange payments or communication outside of LuggageLink. Off-platform transactions are not protected by our safety measures or insurance.
</div>

<h2>Report a Safety Concern</h2>
<p>If you encounter anything suspicious or feel unsafe, report it immediately through your dashboard or contact our support team. We take all reports seriously and respond promptly.</p>

<div class="info-card success">
    <strong>Need help?</strong> Our support team is available to assist with any safety concerns. Use the messaging system in your dashboard or contact us directly.
</div>

@endsection