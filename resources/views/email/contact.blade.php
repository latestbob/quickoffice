@component('mail::message')
# New Contact message


![alt text][logo]

[logo]: https://quickoffice.online/img/quickofficemain.png "Logo Title Text 2"

New contact message was sent by {{$details['name']}} <br>
Email address:  {{$details['email']}} <br>
Phone Number:  {{$details['phone']}} <br>

<br>
<hr>
Message 
# {{$details['message']}}.
<hr>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
