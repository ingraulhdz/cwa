@component('mail::message')
<img src="http://alchilerestaurant.com/images/pdflogo.png" width="50%" height="30%">
# Dear {{$request->name}}:

We have recived a service request for your <b>{{$request->year}} {{$request->make}} {{$request->model}}</b>.<br>



<h1>Information</h1>
<li>Car: {{$request->year}} {{$request->make}} {{$request->model}}</li>
<li>Appointment: {{$request->date}} at {{$request->time}}</li>
<li>Pick-Up Address: {{$request->address_pickup}}, {{$request->city_pickup}}</li>
<li>Delivery Address: {{$request->address_delivery}}, {{$request->city_delivery}}</li>


<br>You will recive a call from Magic Touch Auto Spa to confirm your appoiment.<br><br>
If you want to cancel or modify your appoiment please give us a call <b>630-659-2659</b><br>



Thank you for your Appoiment.<br><br>
Magic Touch Auto Spa<br>
magitouchservie1@gmail.com<br>
630-256-5689<br>
8123 Cass ave., Westmont, IL 60506
@endcomponent
