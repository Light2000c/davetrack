@component("mail::message")



Hi {{ $user->name }}

{{ "Thankyou for creating account with us, for you to complete your registration process click on the button below to verify your account." }}
{{ "If you didn't signup with us, ignore this message." }}


@component("mail::button", ['url'=> $url])
Verify Email
@endcomponent

@component('mail::subcopy')
If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: {{ $url }}
@endcomponent

@endcomponent
