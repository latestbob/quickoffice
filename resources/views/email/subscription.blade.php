@component('mail::message')


![alt text][logo]

[logo]: https://quickoffice.online/img/quickofficemain.png "Logo Title Text 2"
<br>
# Welcome to QuickOffice

<p style="text-justify">Quick office is a digital virtual  workspace that  is dedicatged to  providing full fledged office space with top of the industry tools that combine client management, day to day administration activities and a video meetings, realtime chat system, tasks managements and Accounting,

helping you carryout office activities like you were in the office anytime, anywhere, with no limitations.</p>



<br>
<br>
<b>Your Office Information</b>

<p>Office Email Address : {{$subscriber['officemail']}}</p>
<p>Office  name: {{$subscriber['officename']}}</p>
<p>Office URL : <a class=""href="{{$subscriber['officeurl']}}">{{$subscriber['officeurl']}}</a></p>
<p>Plan Subscribed to : {{$subscriber['officeplan']}}</p>
<p>End Date of Subscription : {{$subscriber['enddate']}}</p>
<hr>

<b>Your Login Details as an Admin</b>

<p>Email Address : {{$subscriber['adminemail']}}</p>
<p>Password : {{$subscriber['adminpassword']}}</p>

<hr>

<b>How to login</b>
 <ul>
 <li>Input your office URL, i.e <b>"quickoffice.online/youroffice/login"</b></li>
 <li>Login in your personal credentials, email & password</li>
 <li>Enjoy, Office made easy with <a style="text-decoration:none;font-weight:bold;color:blue;" href="https://quickoffice.online">QuickOffice</a></li>
 </ul>













Thanks,<br>
{{ config('app.name') }}

<p style="text-align:center;color:blue;font-weight:bold;text-decoroation:none;"><a style="text-decoration:none;" href="https://quickoffice.online">Visit our website for more, quickoffice.online</a></p>
@endcomponent
