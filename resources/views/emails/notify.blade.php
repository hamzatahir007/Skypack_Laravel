<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $heading }}</title>
    <style>
        body { margin: 0; padding: 0; background: #f4f6f9; font-family: 'Segoe UI', Arial, sans-serif; }
        .wrapper { max-width: 580px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 16px rgba(0,0,0,0.08); }
        .header  { padding: 28px 32px; text-align: center; }
        .header.primary { background: #0d6efd; }
        .header.success { background: #198754; }
        .header.warning { background: #f0a500; }
        .header.danger  { background: #dc3545; }
        .header h1 { color: #fff; margin: 0; font-size: 1.3rem; font-weight: 700; }
        .logo      { color: #fff; font-size: 1.05rem; opacity: 0.85; margin-bottom: 6px; }
        .body      { padding: 32px; color: #444; font-size: 0.97rem; line-height: 1.7; }
        .body p    { margin: 0 0 16px; }
        .btn       { display: inline-block; padding: 12px 28px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 0.95rem; margin-top: 8px; }
        .btn.primary { background: #0d6efd; color: #fff; }
        .btn.success { background: #198754; color: #fff; }
        .btn.warning { background: #f0a500; color: #fff; }
        .btn.danger  { background: #dc3545; color: #fff; }
        .footer    { background: #f8f9fa; padding: 20px 32px; text-align: center; color: #999; font-size: 0.82rem; border-top: 1px solid #eee; }
    </style>
</head>
<body>
<div class="wrapper">

    {{-- Header --}}
    <div class="header {{ $color }}">
        <div class="logo">✈ LuggageLink</div>
        <h1>{{ $heading }}</h1>
    </div>

    {{-- Body --}}
    <div class="body">
        {!! nl2br(e($body)) !!}

        @if($actionUrl && $actionLabel)
            <div style="margin-top: 24px; text-align: center;">
                <a href="{{ $actionUrl }}" class="btn {{ $color }}">{{ $actionLabel }}</a>
            </div>
        @endif
    </div>

    {{-- Footer --}}
    <div class="footer">
        This is an automated notification from LuggageLink.<br>
        Please do not reply to this email.
    </div>

</div>
</body>
</html>