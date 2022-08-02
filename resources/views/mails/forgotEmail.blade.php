@component("mail::message")

Hi {{ $user->name }}

@component("mail::button", ['url'=> $url, 'token'=> $token])
Reset Password
@endcomponent

@component('mail::subcopy')

If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser: {{ $url }}
@endcomponent

@endcomponent
