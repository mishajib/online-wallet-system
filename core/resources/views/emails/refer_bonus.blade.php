@component('mail::message')
# You have received refer bonus for joining {{ $user->name }}

## Received Money : {{ $refer_bonus }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
