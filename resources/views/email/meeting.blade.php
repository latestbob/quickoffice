@component('mail::message')


![alt text][logo]

[logo]: https://quickoffice.online/img/quickofficemain.png "Logo Title Text 2"
<br>
# New meeting was scheduled with you in {{$meetingschedule['office']}}



<br>
<br>
<b>Meeting  Details</b>

<p> Title : {{$meetingschedule['title']}}</p>
<p>Start: {{$meetingschedule['start']}}</p>
<p>End: {{$meetingschedule['end']}}</p>

<p>Created by : {{$meetingschedule['createdby']}}</p>
<hr>
<p> Description :{{$meetingschedule['description']}}</p>
<hr>






 <p>Enjoy, Office made easy with <a style="text-decoration:none;font-weight:bold;color:blue;" href="https://quickoffice.online">QuickOffice</a></p>
 












Thanks,<br>
{{ config('app.name') }}

<p style="text-align:center;color:blue;font-weight:bold;text-decoroation:none;"><a style="text-decoration:none;" href="https://quickoffice.online">Visit our website for more, quickoffice.online</a></p>
@endcomponent
