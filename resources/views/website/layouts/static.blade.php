@extends('website.layouts.app')

@section('content')
<style>
    .static-page {
        font-family: 'Segoe UI', sans-serif;
        color: #444;
    }

    /* Hero Banner */
    .static-hero {
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        color: #fff;
        padding: 60px 0 50px;
        text-align: center;
    }
    .static-hero h1 {
        font-size: 2.2rem;
        font-weight: 700;
        color: white;
        margin-bottom: 12px;
    }
    .static-hero p {
        font-size: 1.05rem;
        opacity: 0.88;
        max-width: 600px;
        margin: 0 auto;
        color: white;

    }

    /* Body */
    .static-body {
        max-width: 860px;
        margin: 50px auto 80px;
        padding: 0 20px;
    }

    /* Section headings */
    .static-body h2 {
        font-size: 1.35rem;
        font-weight: 700;
        color: #0d6efd;
        margin-top: 40px;
        margin-bottom: 12px;
        padding-bottom: 8px;
        border-bottom: 2px solid #e8f0fe;
    }
    .static-body h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #222;
        margin-top: 24px;
        margin-bottom: 8px;
    }
    .static-body p {
        line-height: 1.8;
        margin-bottom: 14px;
    }
    .static-body ul {
        padding-left: 20px;
        margin-bottom: 16px;
    }
    .static-body ul li {
        margin-bottom: 6px;
        line-height: 1.7;
    }
    .static-body ol {
        padding-left: 20px;
        margin-bottom: 16px;
    }
    .static-body ol li {
        margin-bottom: 6px;
        line-height: 1.7;
    }

    /* Info card */
    .info-card {
        background: #f8f9fa;
        border-left: 4px solid #0d6efd;
        border-radius: 8px;
        padding: 18px 22px;
        margin: 20px 0;
    }
    .info-card.warning {
        border-left-color: #f0a500;
        background: #fffbf0;
    }
    .info-card.danger {
        border-left-color: #dc3545;
        background: #fff5f5;
    }
    .info-card.success {
        border-left-color: #198754;
        background: #f0faf5;
    }

    /* Grid cards */
    .value-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 18px;
        margin: 24px 0;
    }
    .value-card {
        background: #fff;
        border: 1px solid #e8ecf0;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .value-card h4 {
        font-size: 1rem;
        font-weight: 700;
        color: #0d6efd;
        margin-bottom: 8px;
    }
    .value-card p {
        font-size: 0.9rem;
        margin: 0;
        color: #666;
    }

    /* Badge */
    .badge-forbidden {
        background: #dc3545;
        color: #fff;
        font-size: 0.75rem;
        padding: 3px 10px;
        border-radius: 20px;
        font-weight: 600;
    }
    .badge-restricted {
        background: #f0a500;
        color: #fff;
        font-size: 0.75rem;
        padding: 3px 10px;
        border-radius: 20px;
        font-weight: 600;
    }
    .badge-allowed {
        background: #198754;
        color: #fff;
        font-size: 0.75rem;
        padding: 3px 10px;
        border-radius: 20px;
        font-weight: 600;
    }
    .badge-severe {
        background: #dc3545;
        color: #fff;
        font-size: 0.75rem;
        padding: 3px 10px;
        border-radius: 20px;
    }
    .badge-moderate {
        background: #f0a500;
        color: #fff;
        font-size: 0.75rem;
        padding: 3px 10px;
        border-radius: 20px;
    }
    .badge-minor {
        background: #6c757d;
        color: #fff;
        font-size: 0.75rem;
        padding: 3px 10px;
        border-radius: 20px;
    }

    /* Item row for prohibited/allowed items */
    .item-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 14px 0;
        border-bottom: 1px solid #f0f0f0;
        gap: 12px;
    }
    .item-row:last-child { border-bottom: none; }
    .item-row .item-info h5 {
        font-size: 0.97rem;
        font-weight: 600;
        margin: 0 0 3px;
        color: #222;
    }
    .item-row .item-info p {
        font-size: 0.85rem;
        color: #888;
        margin: 0;
    }

    /* Step cards */
    .step-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 16px;
        margin: 24px 0;
    }
    .step-card {
        text-align: center;
        padding: 24px 16px;
        background: #fff;
        border: 1px solid #e8ecf0;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .step-number {
        width: 40px;
        height: 40px;
        background: #0d6efd;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        margin: 0 auto 12px;
    }
    .step-card h4 {
        font-size: 0.97rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: #222;
    }
    .step-card p {
        font-size: 0.85rem;
        color: #666;
        margin: 0;
    }

    /* FAQ accordion */
    .faq-item {
        border: 1px solid #e8ecf0;
        border-radius: 8px;
        margin-bottom: 10px;
        overflow: hidden;
    }
    .faq-question {
        padding: 16px 20px;
        font-weight: 600;
        cursor: pointer;
        background: #f8f9fa;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #222;
    }
    .faq-question:hover { background: #e8f0fe; }
    .faq-answer {
        padding: 16px 20px;
        display: none;
        color: #555;
        line-height: 1.7;
        border-top: 1px solid #e8ecf0;
    }
    .faq-answer.open { display: block; }

    /* Last updated tag */
    .last-updated {
        font-size: 0.85rem;
        color: #999;
        margin-bottom: 24px;
        display: block;
    }

    /* Violation table */
    .violation-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        padding: 14px 0;
        border-bottom: 1px solid #f0f0f0;
        gap: 12px;
    }
    .violation-row:last-child { border-bottom: none; }
    .violation-info h5 {
        font-size: 0.97rem;
        font-weight: 600;
        margin: 0 0 3px;
        color: #222;
    }
    .violation-info p {
        font-size: 0.85rem;
        color: #888;
        margin: 0;
    }
</style>

{{-- HERO --}}
<div class="static-hero">
    <div class="container">
        <h1>@yield('page-title')</h1>
        <p>@yield('page-subtitle')</p>
    </div>
</div>

{{-- CONTENT --}}
<div class="static-body static-page">
    @yield('page-content')
</div>

<script>
// FAQ toggle
document.querySelectorAll('.faq-question').forEach(q => {
    q.addEventListener('click', function() {
        const answer = this.nextElementSibling;
        const icon   = this.querySelector('.faq-icon');
        answer.classList.toggle('open');
        if (icon) icon.textContent = answer.classList.contains('open') ? '−' : '+';
    });
});
</script>
@endsection