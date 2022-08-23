@component("mail::message")


Hi {{ $details['name'] }}

{{"You order is being processed at the moment but will be sent to you soon."}}
{{ "To see all transaction, go to your profile and click on transaction"}}
Transaction code: {{ $details['code'] }}


@component('mail::subcopy')
Davetrack Technologies is a leading enterprise at securing our clients/customers by providing them with substantial products that meet their needs. for more enquiries reach at to us at support@davetracktechnologies.com
@endcomponent

@endcomponent

