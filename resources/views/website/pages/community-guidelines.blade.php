{{-- resources/views/website/pages/community-guidelines.blade.php --}}
@extends('website.layouts.static')

@section('page-title', 'Community Guidelines')
@section('page-subtitle', 'Creating a safe, respectful, and trustworthy environment for all LuggageLink users')

@section('page-content')

<p>Our community guidelines help create a safe, respectful, and trustworthy environment for all LuggageLink users. Please read and follow these guidelines carefully.</p>

<h2>Our Core Values</h2>

<h3>🤝 Be Respectful</h3>
<p>Treat all community members with kindness and respect.</p>
<ul>
    <li>Use polite and professional language in all communications</li>
    <li>Respect cultural differences and personal boundaries</li>
    <li>Be patient with new users learning the platform</li>
    <li>Avoid discriminatory language or behavior</li>
    <li>Give constructive feedback when leaving reviews</li>
</ul>

<h3>🔒 Stay Safe</h3>
<p>Follow safety protocols to protect yourself and others.</p>
<ul>
    <li>Meet in public places for package handovers</li>
    <li>Verify the identity of people you're meeting</li>
    <li>Never transport prohibited or suspicious items</li>
    <li>Report any safety concerns immediately</li>
    <li>Trust your instincts — decline if something feels wrong</li>
</ul>

<h3>✅ Be Honest</h3>
<p>Provide accurate information and honor your commitments.</p>
<ul>
    <li>Use real photos and accurate descriptions in listings</li>
    <li>Provide truthful information about package contents</li>
    <li>Honor agreed-upon prices and delivery dates</li>
    <li>Communicate any changes or delays promptly</li>
    <li>Leave honest and fair reviews for other users</li>
</ul>

<h3>💬 Communicate Well</h3>
<p>Maintain clear and timely communication throughout every transaction.</p>
<ul>
    <li>Respond to messages within 24 hours</li>
    <li>Keep all communication within the LuggageLink platform</li>
    <li>Be clear about expectations and requirements</li>
    <li>Ask questions if anything is unclear</li>
    <li>Provide updates on delivery status</li>
</ul>

<h2>Policy Violations</h2>
<p>The following actions violate our community standards and will result in consequences.</p>

<div class="violation-row">
    <div class="violation-info">
        <h5>Harassment or Discrimination</h5>
        <p>Offensive language, threats, or discriminatory behavior — Immediate account suspension</p>
    </div>
    <span class="badge-severe">Severe</span>
</div>
<div class="violation-row">
    <div class="violation-info">
        <h5>Fraudulent Activity</h5>
        <p>Fake listings, payment fraud, or identity theft — Permanent account ban</p>
    </div>
    <span class="badge-severe">Severe</span>
</div>
<div class="violation-row">
    <div class="violation-info">
        <h5>Prohibited Items</h5>
        <p>Attempting to transport dangerous or illegal items — Account suspension and legal action</p>
    </div>
    <span class="badge-severe">Severe</span>
</div>
<div class="violation-row">
    <div class="violation-info">
        <h5>Spam or Solicitation</h5>
        <p>Unsolicited promotional messages or external links — Warning, then account restriction</p>
    </div>
    <span class="badge-moderate">Moderate</span>
</div>
<div class="violation-row">
    <div class="violation-info">
        <h5>No-Show or Cancellation</h5>
        <p>Repeatedly failing to honor commitments — Account restriction and rating impact</p>
    </div>
    <span class="badge-moderate">Moderate</span>
</div>
<div class="violation-row">
    <div class="violation-info">
        <h5>Inappropriate Content</h5>
        <p>Offensive images, inappropriate language in profiles — Content removal and warning</p>
    </div>
    <span class="badge-minor">Minor</span>
</div>

<h2>How We Enforce Guidelines</h2>

<div class="step-grid">
    <div class="step-card">
        <div class="step-number">1</div>
        <h4>Report Received</h4>
        <p>Community member or automated system flags a potential violation.</p>
    </div>
    <div class="step-card">
        <div class="step-number">2</div>
        <h4>Investigation</h4>
        <p>Our team reviews the report and gathers all relevant information.</p>
    </div>
    <div class="step-card">
        <div class="step-number">3</div>
        <h4>Decision</h4>
        <p>Appropriate action is taken based on severity and user history.</p>
    </div>
    <div class="step-card">
        <div class="step-number">4</div>
        <h4>Communication</h4>
        <p>User is notified of the decision and can appeal if appropriate.</p>
    </div>
</div>

<h2>Best Practices</h2>

<h3>Build Your Reputation</h3>
<ul>
    <li>Complete your profile with accurate information</li>
    <li>Upload a clear profile photo</li>
    <li>Verify your identity and contact information</li>
    <li>Maintain a high rating through excellent service</li>
</ul>

<h3>Communicate Effectively</h3>
<ul>
    <li>Respond to messages promptly</li>
    <li>Be clear about your requirements and limitations</li>
    <li>Ask questions if anything is unclear</li>
    <li>Keep communication professional and friendly</li>
</ul>

<h3>Support the Community</h3>
<ul>
    <li>Leave honest and helpful reviews</li>
    <li>Report violations when you see them</li>
    <li>Help new users understand the platform</li>
    <li>Share positive experiences and feedback</li>
</ul>

@endsection