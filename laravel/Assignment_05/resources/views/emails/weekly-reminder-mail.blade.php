@component('mail::message')
# Weekly Reminder

<h3>{{ $details['body'] }}</h3>

@component('mail::button', ['url' => 'http://localhost:8000/'])
View Tasks
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
