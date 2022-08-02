@component("mail::message")





{{ "Thankyou for creating account with us, for you to complete your registration process click on the button below to verify your account." }}
{{ "If you didn't signup with us, ignore this message." }}



@component('mail::subcopy')
If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser:
@endcomponent

@endcomponent

 <!-- <div class="card">
        <h5 class="card-header">Organization name</h5>
        <div class="card-body">
            <h5 class="card-title">Hi {{ $details['name'] }}</h5>
            <p class="card-text">You have been added as a team member in our organization, you can login using this mail and the password below. <br>
                Password: {{ $details['password']}}
            </p>
            <a href="{{ route('admin-login') }}" class="btn btn-primary">Go somewhere</a>
            <p class="card-text">Please do not disclose this email or forward to anyone, it is against the company policy for security purpose.</p>
        </div>
    </div> -->
