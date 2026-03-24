{{-- resources/views/website/pages/how-it-works.blade.php --}}
@extends('website.layouts.static')

@section('page-title', 'How LuggageLink Works')
@section('page-subtitle', 'From search to delivery — we have streamlined the entire process')

@section('page-content')

<h2>Simple 4-Step Process</h2>
<p>Connecting businesses and individuals with traveler space has never been easier. Follow these simple steps to start shipping smarter.</p>

<div class="step-grid">
    <div class="step-card">
        <div class="step-number">1</div>
        <h4>Search & Discover</h4>
        <p>Browse available flight space by route, date, and cargo type. Use our advanced filters to find exactly what you need.</p>
    </div>
    <div class="step-card">
        <div class="step-number">2</div>
        <h4>Connect & Inquire</h4>
        <p>Contact travelers directly through our platform. Discuss terms, ask questions, and submit an inquiry.</p>
    </div>
    <div class="step-card">
        <div class="step-number">3</div>
        <h4>Book & Pay Securely</h4>
        <p>Complete your booking with secure payment processing. Your payment is protected until delivery confirmation.</p>
    </div>
    <div class="step-card">
        <div class="step-number">4</div>
        <h4>Ship & Track</h4>
        <p>Monitor your shipment with real-time updates. Receive status notifications at every milestone of your journey.</p>
    </div>
</div>

<h2>Why Choose LuggageLink?</h2>
<p>Experience the advantages of our modern shipping marketplace.</p>

<div class="value-grid">
    <div class="value-card">
        <h4>✅ Verified Partners</h4>
        <p>All travelers are verified and rated by our community for your peace of mind.</p>
    </div>
    <div class="value-card">
        <h4>⚡ Save Time</h4>
        <p>Find available space in minutes instead of days with our smart search.</p>
    </div>
    <div class="value-card">
        <h4>🔗 Direct Connection</h4>
        <p>Connect directly with travelers without any ambiguity or middlemen.</p>
    </div>
    <div class="value-card">
        <h4>🌍 Global Network</h4>
        <p>Access luggage space on shipping routes worldwide across hundreds of destinations.</p>
    </div>
</div>

<h2>Pricing</h2>
<div class="info-card">
    <strong>Flat rate of $25.00 per kilogram</strong> — no hidden fees, no surprises.<br>
    A platform fee of $3.99 is charged per transaction to both client and traveler.<br>
    Traveler earnings: 55% of the cargo amount after the platform fee deduction.
</div>

<h2>Frequently Asked Questions</h2>

<div class="faq-item">
    <div class="faq-question">How do I know if a traveler is reliable? <span class="faq-icon">+</span></div>
    <div class="faq-answer">All travelers on our platform are verified through our comprehensive screening process. You can also check their ratings and reviews from previous customers before submitting an inquiry.</div>
</div>

<div class="faq-item">
    <div class="faq-question">What happens if my shipment is damaged during transit? <span class="faq-icon">+</span></div>
    <div class="faq-answer">All shipments are covered by our insurance policy. In the rare event of damage, our claims team will work with you to resolve the issue quickly and fairly. Report any issues within 24 hours of delivery.</div>
</div>

<div class="faq-item">
    <div class="faq-question">Can I track my shipment in real-time? <span class="faq-icon">+</span></div>
    <div class="faq-answer">Yes! All travelers are advised to update statuses during their travel journey. You will receive notifications on your shipment's location and status at every milestone.</div>
</div>

<div class="faq-item">
    <div class="faq-question">How much can I save compared to traditional shipping? <span class="faq-icon">+</span></div>
    <div class="faq-answer">Customers typically save 30–60% compared to traditional courier services. Our flat rate of $25/kg is significantly cheaper than most international courier options, especially for heavier packages.</div>
</div>

<div class="faq-item">
    <div class="faq-question">What items can I send? <span class="faq-icon">+</span></div>
    <div class="faq-answer">Currently, the platform permits clothing (new or used apparel, footwear, accessories) and documentation (non-confidential papers, books, printed materials). See our Prohibited Items page for a full list of restrictions.</div>
</div>

<div class="faq-item">
    <div class="faq-question">How do travelers get paid? <span class="faq-icon">+</span></div>
    <div class="faq-answer">Traveler earnings are released within 3–5 business days after successful delivery confirmation. Travelers submit a withdrawal request and payment is processed to their registered bank account.</div>
</div>

@endsection