@component('mail::message')


![alt text][logo]

[logo]: https://quickoffice.online/img/quickofficemain.png "Logo Title Text 2"
<br>
# New Task was created for you in {{$taskforstaff['office']}} Office.




<br>
<br>
<b>Task Details</b>

<p>Task Title : {{$taskforstaff['title']}}</p>
<p>Created At: {{$taskforstaff['created']}}</p>
<p>Should Delivered At : {{$taskforstaff['shouldend']}}</p>
<p>Supervised by :{{$taskforstaff['supervised']}}</p>
<hr>
<p>Task Description : {{$taskforstaff['description']}}</p>
<hr>






 <p>Enjoy, Office made easy with <a style="text-decoration:none;font-weight:bold;color:blue;" href="https://quickoffice.online">QuickOffice</a></p>
 












Thanks,<br>
{{ config('app.name') }}

<p style="text-align:center;color:blue;font-weight:bold;text-decoroation:none;"><a style="text-decoration:none;" href="https://quickoffice.online">Visit our website for more, quickoffice.online</a></p>
@endcomponent
