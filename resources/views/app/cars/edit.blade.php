@extends('app.cars.main')
@section('subtitle', '/ Edit')
@section('sub-content')



<form action="{{route('car.update', $car)}}" method="POST" >
@include('app.cars.partials.form_edit')



</form>


@stop

