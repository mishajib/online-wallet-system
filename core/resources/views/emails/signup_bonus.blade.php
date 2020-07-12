@component('mail::message')
# You have received Join Bonus {{ number_format($setting->join_bonus, 2) . " " . $setting->currency }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
