@component('mail::message')
<img src="http://alchilerestaurant.com/images/pdflogo.png" width="50%" height="30%"><br>
# NEW REQUEST:

We have recived an appointment.<br>


<h1>Appintment Information:</h1>


<li><b>Car: </b>{{$request->year}} {{$request->make}} {{$request->model}}</li>
<li><b>Appiment: </b>{{$request->date}} at {{$request->time}}</li>
<li><b>Pick-Up Address: </b>{{$request->address_pickup}}, {{$request->city_pickup}}</li>
<li><b>Delivery Address: </b>{{$request->address_delivery}}, {{$request->city_delivery}}</li>
<li> <b>Name: </b>{{$request->name}} </li>
<li><b>Email: </b>{{$request->email}} </li>
<li><b>Phone: </b>{{$request->phone}} </li>	


<br>Call Customer to confirm appointment .<br><br>


Magic Touch Auto Spa<br>
magitouchservie1@gmail.com<br>
630-256-5689<br>
8123 Cass ave., Westmont, IL 60506
@endcomponent
