@component('mail::message')
# Welcome {{ $user->name }} to {{ config('app.name') }}
## Thank you for registered to our site.

@component('mail::button', ['url' => route('welcome')])
Let's Begin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
