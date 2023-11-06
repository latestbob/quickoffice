@component('mail::message')


![alt text][logo]

[logo]: https://quickoffice.online/img/quickofficemain.png "Logo Title Text 2"
<br>
# A meeting schedule by you was in {{$declinedmeetingss['office']}}



<br>
<br>
<b>Meeting  Details</b>

<p> Title : {{$declinedmeetingss['title']}}</p>
<p>Start: {{$declinedmeetingss['start']}}</p>


<p>Declined by : {{$declinedmeetingss['participant']}}</p>
<hr>







 <p>Enjoy, Office made easy with <a style="text-decoration:none;font-weight:bold;color:blue;" href="https://quickoffice.online">QuickOffice</a></p>
 












Thanks,<br>
{{ config('app.name') }}

<p style="text-align:center;color:blue;font-weight:bold;text-decoroation:none;"><a style="text-decoration:none;" href="https://quickoffice.online">Visit our website for more, quickoffice.online</a></p>
@endcomponent
