@component('mail::message')
# Inquiry Status Updated

Hello {{ $inquiry->client->name }},

Your inquiry status has been updated.

**Inquiry ID:** {{ $inquiry->id }}  
**Status:** {{ ucfirst($inquiry->status) }}

@component('mail::button', ['url' => url('/client/inquiries/'.$inquiry->id)])
View Inquiry
@endcomponent

Thanks,  
{{ 'Skypack' }}
{{-- {{ config('app.name') }} --}}
@endcomponent
