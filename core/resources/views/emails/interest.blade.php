@component('mail::message')
# You have received monthly interest {{ number_format($giveInterest, 2) . ' '
 . $setting->currency }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
