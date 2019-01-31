@extends('app.cars.main')


@section('sub-content')

<div class="row">



<div class="col-md-6 offset-md-2" style="text-align: center;">
    <h1 class="display-4">{{ is_null($car->dealer) ? $car->customer->name : $car->dealer->name}}</h1>
    <h6>{{ is_null($car->dealer) ? $car->customer->address() : $car->dealer->address()}}</h6>
    <h6>{{ is_null($car->dealer) ? $car->customer->email : $car->dealer->email}}</h6>
    <h6>{{ is_null($car->dealer) ? $car->customer->phone : $car->dealer->phone}}</h6>
</div>

<div class="col-md-4 ">

		<img src="/img/logos/{{ is_null($car->dealer) ? 'logo' : $car->dealer->logo}}.jpg" width="150px" height="100px">
</div>

</div>
    

<hr>

<div class="row ">

    <div class="card col-md-6">
      <div class="card-header bg-dark text-danger">
{{$car->name()}} 
 </div>


      <ul class="list-group list-group-flush">
      
    <li class="list-group-item"><b>Stock #: </b>{{$car->stock}}</li>
    <li class="list-group-item"><b>Vin #: </b>{{$car->vin}}</li>
    <li class="list-group-item"><b>Color: </b> {{$car->color}}</li>
    <li class="list-group-item"><b>Price: </b> ${{$car->price}}</li>
<li class="list-group-item"><b> Extras:</b><br>   
          @foreach($car->ex as $extra)                       
        <small>* {{$extra->name}} <br></small>
      @endforeach

</li>

      </ul>

    </div>




    <div class="card col-md-6">
      <div class="card-header bg-dark text-danger">
{{$car->name()}} 
 </div>


      <ul class="list-group list-group-flush">
   
    <li class="list-group-item"><b>Detailer: </b>@if($car->employee) {{ $car->employee->id}} @endif</li>
 <li class="list-group-item"><b>Customers: </b>{{is_null($car->dealer) ? $car->customer->name : $car->dealer->name}}</li>
 <li class="list-group-item"><b>Address: </b>{{is_null($car->dealer) ? $car->customer->address() : $car->dealer->address()}}</li>
 <li class="list-group-item"><b>Phone: </b>{{is_null($car->dealer) ? $car->customer->phone : $car->dealer->phone}}</li>
 <li class="list-group-item"><b>Email: </b>{{is_null($car->dealer) ? $car->customer->email : $car->dealer->email}}</li>    
    <li class="list-group-item"><b>Status: </b> @if($car->is_paid) Paid @else Due @endif</li>

      </ul>

    </div>




</div>

















@endsection