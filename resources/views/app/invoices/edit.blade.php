
@extends('app.main')


@section('bar')
@include('app.invoices.nav-bar')
@stop
@section('sub-content')

<form action="{{route('invoice.update', $car)}}" method="POST" >
@include('app.cars.partials.form_edit')



</form>




   
@endsection

