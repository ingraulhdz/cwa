@extends('app.main')



@section('bar')
@include('app.expenses.nav-bar')
@stop
@section('sub-content')

<div class="row">

<div class="col-md-6 offset-md-2" style="text-align: center;">
        <h1 class="display-4">Magic Touch Services</h1>
</div>

<div class="col-md-4 ">
        <img src="/img/pdflogo.png" width="250px" height="100px">
</div>

</div>

<hr>






<div class="row ">





        <div class="card col-md-12">
		  <div class="card-header bg-dark text-danger">
<b>Information</b>		  </div>
		<ul class="list-group list-group-flush">
    <li class="list-group-item"><b>Name: </b>{{$expense->name}}</li>
    <li class="list-group-item"><b>Description: </b>{{$expense->description}}</li>
		<li class="list-group-item"><b>Price: </b>$ {{$expense->price}}.00</li>
    <li class="list-group-item"><b>Status: </b>
                                @if($expense->status)
                                 <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Active</span>
                                 @else 
                                <span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-triangle"></i> Inactive</span>
                              @endif
    </li>
		  </ul>
		</div>



</div>












@endsection