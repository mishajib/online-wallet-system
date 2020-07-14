@component('mail::message')
# You have received refer bonus for joining {{ $user->name }}

## Received Money : {{ number_format($refer_bonus, 2) }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
