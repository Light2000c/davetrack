
@component("mail::message")



Hi {{ $details['name'] }}

{{ "You have been added as a team member in our organization, you can login by clicking on the link. using your email and password provided below" }}
Password: {{ $details['password'] }}

<a href="{{ route('admin-login') }}">Login</a>


@component('mail::subcopy')
Davetrack Technologies is a leading enterprise at securing our clients/customers by providing them with substantial products that meet their needs. for more enquiries reach at to us at support@davetracktechnologies.com
@endcomponent

@endcomponent

