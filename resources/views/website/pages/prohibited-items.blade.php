{{-- resources/views/website/pages/prohibited-items.blade.php --}}
@extends('website.layouts.static')

@section('page-title', 'Prohibited Items')
@section('page-subtitle', 'Complete guide to items that cannot be transported through our platform')

@section('page-content')

<div class="info-card warning">
    <strong>Safety and legal compliance are our top priorities.</strong> Please review this list carefully before submitting or accepting any package. When in doubt, contact our support team before proceeding.
</div>

<h2>✅ Allowed Items</h2>

<div class="item-row">
    <div class="item-info">
        <h5>📄 Documents</h5>
        <p>Papers, contracts, certificates in protective sleeves. Keep in waterproof folder.</p>
    </div>
    <span class="badge-allowed">Allowed</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>👕 Clothing</h5>
        <p>New or clean clothing items, shoes, accessories. Pack in sealed bags to prevent odors.</p>
    </div>
    <span class="badge-allowed">Allowed</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>📚 Books & Magazines</h5>
        <p>Printed materials, educational content. Wrap to prevent damage.</p>
    </div>
    <span class="badge-allowed">Allowed</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>📱 Small Electronics (Packaged)</h5>
        <p>Phones, tablets, headphones in original packaging. Must be new and properly packaged.</p>
    </div>
    <span class="badge-allowed">Allowed</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>💄 Cosmetics (Small)</h5>
        <p>Makeup, skincare in containers under 100ml. Follow liquid restrictions.</p>
    </div>
    <span class="badge-allowed">Allowed</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>🎁 Souvenirs</h5>
        <p>Non-fragile gifts, postcards, small crafts. Avoid breakable items.</p>
    </div>
    <span class="badge-allowed">Allowed</span>
</div>

<h2>🚫 Prohibited Items</h2>

<div class="item-row">
    <div class="item-info">
        <h5>🔥 Flammable Liquids</h5>
        <p>Gasoline, lighter fluid, paint thinner, alcohol over 70% — Fire hazard during flight</p>
    </div>
    <span class="badge-forbidden">Strictly Forbidden</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>💣 Explosives & Fireworks</h5>
        <p>Any explosive materials, fireworks, ammunition — Explosion risk</p>
    </div>
    <span class="badge-forbidden">Strictly Forbidden</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>🪣 Compressed Gases</h5>
        <p>Oxygen tanks, propane, CO2 cartridges — Pressure changes during flight</p>
    </div>
    <span class="badge-forbidden">Strictly Forbidden</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>💧 Liquids Over 100ml</h5>
        <p>Any liquid container larger than 100ml — TSA security regulations</p>
    </div>
    <span class="badge-restricted">Restricted</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>🧴 Aerosols</h5>
        <p>Spray cans, deodorants, hair spray — Pressure and flammability concerns</p>
    </div>
    <span class="badge-restricted">Restricted</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>🔋 Lithium Batteries (Loose)</h5>
        <p>Spare lithium batteries not in devices — Fire hazard if damaged</p>
    </div>
    <span class="badge-forbidden">Strictly Forbidden</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>📵 Damaged Electronics</h5>
        <p>Cracked screens, exposed batteries, water damage — Potential fire or chemical hazard</p>
    </div>
    <span class="badge-forbidden">Strictly Forbidden</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>💵 Cash Over $1,000</h5>
        <p>Large amounts of currency — Customs declaration requirements</p>
    </div>
    <span class="badge-restricted">Restricted</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>💍 Jewelry Over $500</h5>
        <p>Expensive jewelry, watches, precious metals — High theft risk and insurance limitations</p>
    </div>
    <span class="badge-restricted">Restricted</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>🍎 Fresh Food</h5>
        <p>Fruits, vegetables, meat, dairy products — Spoilage and customs restrictions</p>
    </div>
    <span class="badge-restricted">Restricted</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>🌱 Live Plants</h5>
        <p>Seeds, plants, soil, organic materials — Agricultural restrictions</p>
    </div>
    <span class="badge-restricted">Restricted</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>💊 Controlled Substances</h5>
        <p>Prescription drugs not in original containers — Legal and customs issues</p>
    </div>
    <span class="badge-forbidden">Strictly Forbidden</span>
</div>
<div class="item-row">
    <div class="item-info">
        <h5>🔪 Weapons</h5>
        <p>Knives, tools, sharp objects, replica weapons — Security threat</p>
    </div>
    <span class="badge-forbidden">Strictly Forbidden</span>
</div>

<h2>Quick Reference</h2>
<div class="value-grid">
    <div class="value-card">
        <h4>❓ Never Accept If Unsure</h4>
        <p>If you have any doubt about a package's contents, decline it. No transaction is worth legal risk.</p>
    </div>
    <div class="value-card">
        <h4>📞 Check With Support</h4>
        <p>Contact our support team if you need clarification on whether a specific item is permitted.</p>
    </div>
    <div class="value-card">
        <h4>📸 Document Everything</h4>
        <p>Take photos of all packages before and after accepting them to protect yourself.</p>
    </div>
</div>

<div class="info-card danger">
    <strong>Legal Notice:</strong> This list is not exhaustive, and regulations may vary by country and airline. Travelers are responsible for knowing and complying with all applicable laws, regulations, and airline policies. LuggageLink reserves the right to refuse any shipment that violates our terms of service or poses a safety risk.
</div>

@endsection