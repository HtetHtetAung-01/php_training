@component('mail::message')
# Congratulations!

<h3>{{ $details['title'] }}</h3>
<h3>{{ $details['body'] }}</h3>

@component('mail::button', ['url' => 'http://localhost:8000/report'])
Submit Report
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
