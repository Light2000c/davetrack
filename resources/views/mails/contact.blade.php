@component("mail::message")


Sender Name: {{ $details['name'] }}

Sender Email: {{ $details['email'] }}

Sender Phone Number: {{ $details['phone'] }}


{{ $details['message'] }}



@component('mail::subcopy')
Davetrack Technologies is a leading enterprise at securing our clients/customers by providing them with substantial products that meet their needs. for more enquiries reach at to us at support@davetracktechnologies.com
@endcomponent

@endcomponent
