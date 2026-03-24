{{-- resources/views/website/pages/terms.blade.php --}}
@extends('website.layouts.static')

@section('page-title', 'Terms & Conditions')
@section('page-subtitle', 'Please read these terms carefully before using LuggageLink')

@section('page-content')

<span class="last-updated">Effective Date: February 11, 2026 &nbsp;|&nbsp; Last Updated: February 11, 2026</span>

<div class="info-card warning">
    <strong>Important Notice:</strong> These Terms involve transportation of items across borders. Users must understand and comply with all customs, immigration, airline, and regulatory requirements. Consult legal counsel if you have questions about your obligations.
</div>

<h2>1. Introduction and Acceptance</h2>
<p>Welcome to LuggageLink ("LuggageLink," "we," "us," or "our"). These Terms and Conditions ("Terms") govern your access to and use of our peer-to-peer luggage space sharing marketplace that connects travelers ("Travelers") with customers who wish to ship items ("Customers" or "Shippers"). By accessing or using the Platform, you agree to be bound by these Terms.</p>
<p>If you do not agree to these Terms, you must not access or use the Platform.</p>

<h2>2. Definitions</h2>
<ol>
    <li><strong>Platform:</strong> The website, mobile application, and services provided by LuggageLink</li>
    <li><strong>User:</strong> Any person who accesses or uses the Platform, including both Travelers and Customers</li>
    <li><strong>Traveler:</strong> A User who offers available luggage space to transport items for Customers</li>
    <li><strong>Customer/Shipper:</strong> A User who requests transportation of permitted items via Travelers</li>
    <li><strong>Transaction:</strong> A completed arrangement where a Traveler agrees to transport items for a Customer</li>
    <li><strong>Service Fee:</strong> The fee of $3.99 charged to both the Customer and the Traveler for each Transaction</li>
    <li><strong>Permitted Items:</strong> Currently limited to clothing and documentation as defined in Section 6</li>
</ol>

<h2>3. Platform Service Description</h2>

<h3>3.1 Nature of Service</h3>
<p>LuggageLink operates as an intermediary marketplace that facilitates connections between Travelers and Customers. We do not provide transportation services directly; rather, we enable Users to arrange peer-to-peer transportation of Permitted Items.</p>

<h3>3.2 Service Model</h3>
<ol>
    <li>Customers pay $25.00 per kilogram for transportation of Permitted Items</li>
    <li>Maximum allocation per Transaction is 23 kilograms</li>
    <li>A Service Fee of $3.99 is charged to the Customer</li>
    <li>A Service Fee of $3.99 is charged to the Traveler</li>
    <li>Revenue from per-kilogram charges is split: 55% to Traveler, 45% to Platform</li>
    <li>All Service Fees are retained by the Platform</li>
</ol>

<h3>3.3 Platform Role and Limitations</h3>
<p>The Platform serves solely as a facilitator. We do not:</p>
<ol>
    <li>Control, verify, or guarantee the quality, safety, or legality of items transported</li>
    <li>Control the acts or omissions of Users</li>
    <li>Guarantee that Travelers will complete agreed-upon Transactions</li>
    <li>Guarantee that items will arrive undamaged or on time</li>
    <li>Assume liability for lost, damaged, stolen, or delayed items</li>
    <li>Provide insurance coverage for Transactions</li>
</ol>

<h2>4. User Eligibility and Registration</h2>

<h3>4.1 Age Requirement</h3>
<p>You must be at least 18 years of age to use the Platform.</p>

<h3>4.2 Account Registration</h3>
<ol>
    <li>You must create an account to use the Platform's services</li>
    <li>You must provide accurate, current, and complete information during registration</li>
    <li>You are responsible for maintaining the confidentiality of your account credentials</li>
    <li>You are responsible for all activities that occur under your account</li>
    <li>You must notify us immediately of any unauthorized use of your account</li>
</ol>

<h3>4.3 Account Verification</h3>
<p>We reserve the right to verify User identities through government-issued identification, email verification, phone verification, or other means. Failure to provide requested verification may result in account suspension or termination.</p>

<h3>4.4 Prohibited Users</h3>
<p>You may not use the Platform if you have been previously banned, are listed on government watch lists, have been convicted of fraud or smuggling offenses, or are prohibited by law from using the Platform.</p>

<h2>5. User Obligations</h2>

<h3>5.1 General Conduct</h3>
<p>All Users must comply with applicable laws, provide accurate information, act in good faith, respect others' rights, and communicate respectfully and professionally.</p>

<h3>5.2 Customer Obligations</h3>
<ul>
    <li>Accurately describe all items to be transported</li>
    <li>Ensure items are only Permitted Items as defined in Section 6</li>
    <li>Package items securely and appropriately for air travel</li>
    <li>Provide items to Travelers at agreed-upon times and locations</li>
    <li>Pay all fees promptly through the Platform</li>
    <li>Declare the full and accurate value of items</li>
    <li>Obtain and provide any required export/import documentation</li>
</ul>

<h3>5.3 Traveler Obligations</h3>
<ul>
    <li>Have valid travel documents and airline tickets for specified routes</li>
    <li>Inspect items received from Customers to ensure they are Permitted Items</li>
    <li>Refuse to transport any items that appear suspicious, improperly packaged, or prohibited</li>
    <li>Comply with all airline baggage policies and regulations</li>
    <li>Declare transported items to customs and immigration authorities as required by law</li>
    <li>Deliver items to Customers at agreed-upon times and locations</li>
    <li>Carry valid identification and travel documents</li>
</ul>

<h3>5.4 Prohibited Conduct</h3>
<ul>
    <li>Attempting to transport Prohibited Items</li>
    <li>Engaging in fraudulent, deceptive, or misleading conduct</li>
    <li>Harassing, threatening, or abusing other Users</li>
    <li>Bypassing or circumventing Platform payment systems</li>
    <li>Using the Platform for any illegal purpose</li>
    <li>Violating any airline, airport, customs, or immigration regulations</li>
    <li>Misrepresenting items, weight, value, or contents</li>
    <li>Sharing or selling Platform accounts</li>
</ul>

<h2>6. Permitted and Prohibited Items</h2>

<h3>6.1 Currently Permitted Items</h3>
<ol>
    <li><strong>Clothing:</strong> New or used apparel, footwear, textiles, and fabric accessories including traditional garments, everyday wear, formal wear, and children's clothing</li>
    <li><strong>Documentation:</strong> Non-confidential papers, printed materials, books, photographs, and similar non-electronic documents</li>
</ol>

<h3>6.2 Prohibited Items</h3>
<p>The following are strictly prohibited: illegal drugs, weapons, hazardous materials, live animals, perishable food, cash over $100 CAD, jewelry/precious metals, electronics with lithium batteries, tobacco/alcohol/cannabis, counterfeit goods, pornographic materials, prescription medications, and any items prohibited by airline or customs authorities.</p>

<div class="info-card danger">
    See our full <a href="{{ url('/prohibited-items') }}">Prohibited Items page</a> for the complete list with detailed explanations.
</div>

<h2>7. Transactions and Payments</h2>

<h3>7.2 Pricing and Fees</h3>
<ul>
    <li>Transportation rate: $25.00 per kilogram</li>
    <li>Customer Service Fee: $3.99 per Transaction</li>
    <li>Traveler Service Fee: $3.99 per Transaction</li>
    <li>Total Customer payment: ($25.00 × kilograms) + $3.99</li>
    <li>Traveler earnings: ($25.00 × kilograms × 55%) − $3.99</li>
    <li>All fees are in United States Dollar (USD)</li>
</ul>

<h3>7.3 Payment Processing</h3>
<ul>
    <li>All payments must be processed through the Platform</li>
    <li>Funds are held in escrow until delivery is confirmed</li>
    <li>Traveler earnings are released within 3–5 business days after successful delivery confirmation</li>
</ul>

<h3>7.4 Refunds and Cancellations</h3>
<ul>
    <li>If a Traveler cancels before receiving items: full refund to Customer minus processing fees</li>
    <li>If a Customer cancels before handing items to Traveler: full refund minus processing fees</li>
    <li>If items are not delivered due to Traveler fault: full refund to Customer; Traveler forfeits payment</li>
    <li>Service Fees are non-refundable once a Transaction is confirmed by both parties</li>
    <li>Refund processing takes 5–10 business days</li>
</ul>

<h2>8. Liability and Risk Allocation</h2>

<h3>8.1 Assumption of Risk</h3>
<p>By using the Platform, you acknowledge that peer-to-peer transactions involve inherent risks including loss, damage, delay, theft, or confiscation, and you assume all such risks.</p>

<h3>8.2 Limitation of Liability</h3>
<div class="info-card warning">
    TO THE MAXIMUM EXTENT PERMITTED BY LAW, THE PLATFORM SHALL NOT BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, OR CONSEQUENTIAL DAMAGES. THE PLATFORM'S TOTAL LIABILITY SHALL NOT EXCEED THE AMOUNT OF SERVICE FEES PAID BY YOU IN THE SIX (6) MONTHS PRECEDING THE CLAIM.
</div>

<h2>9. Legal Compliance</h2>
<p>You are solely responsible for complying with all applicable laws, regulations of origin and destination jurisdictions, airline and airport requirements, customs and immigration requirements, and paying all applicable taxes, duties, and fees.</p>

<h2>10. Intellectual Property</h2>
<p>All content, features, functionality, trademarks, and intellectual property on the Platform are owned by LuggageLink or its licensors. You are granted a limited, non-exclusive, revocable license to access and use the Platform for personal, non-commercial purposes only.</p>

<h2>11. Privacy and Data Protection</h2>
<p>Your use of the Platform is also governed by our <a href="{{ url('/privacy-policy') }}">Privacy Policy</a>, which is incorporated into these Terms by reference.</p>

<h2>12. Dispute Resolution</h2>
<p>These Terms are governed by the laws of the Province of Ontario and the federal laws of Canada. Any legal proceedings shall be brought exclusively in the courts located in Toronto, Ontario, Canada. Parties agree to attempt good-faith negotiations before initiating formal proceedings.</p>

<h2>13. Term and Termination</h2>
<p>We reserve the right to suspend or terminate your account immediately, without notice, for violation of these Terms, fraudulent or harmful conduct, non-payment of fees, or regulatory requirements. Payment obligations and liabilities survive termination.</p>

<h2>14. Modifications to Terms</h2>
<p>We reserve the right to modify these Terms at any time. Changes will be effective upon posting with an updated "Last Updated" date. We will notify Users of material changes via email or Platform notification. Continued use constitutes acceptance of modified Terms.</p>

<h2>15. Contact Information</h2>
<div class="info-card">
    For questions, concerns, or notices regarding these Terms, please contact us at:<br><br>
    <strong>LuggageLink</strong><br>
    Email: <a href="mailto:support@luggagelink.org">support@luggagelink.org</a><br>
    Website: <a href="https://luggagelink.org">luggagelink.org</a>
</div>

<div class="info-card success" style="margin-top: 30px;">
    BY CREATING AN ACCOUNT OR USING THE PLATFORM, YOU ACKNOWLEDGE THAT YOU HAVE READ AND UNDERSTOOD THESE TERMS, YOU AGREE TO BE BOUND BY THEM, AND YOU ARE AT LEAST 18 YEARS OF AGE.
</div>

@endsection