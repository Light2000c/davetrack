@component("mail::message")

Hi {{ $user->name }}

@component("mail::button", ['url'=> $url, 'token'=> $token])
Reset Password
@endcomponent

@component('mail::subcopy')
Davetrack Technologies is a leading enterprise at securing our clients/customers by providing them with substantial products that meet their needs. for more enquiries reach at to us at support@davetracktechnologies.com
@endcomponent

@endcomponent
