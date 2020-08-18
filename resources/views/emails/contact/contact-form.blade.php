@component('mail::message')
# Salut

Vous avez reçu un email de la part de {{ $data['name'] }} ({{ $data['email'] }})

Message:

{{ $data['message'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
