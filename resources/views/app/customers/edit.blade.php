@extends('app.main')
@section('subtitle', '/ Edit')
@section('bar')
@include('app.customers.nav-bar')
@stop

@section('sub-content')



<form action="{{route('customer.update', $customer)}}" method="POST" >

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $customer->id }}">

<div class="row"> 



  <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="name" name="name" placeholder="customer name" value="{{ $customer->name }}" required="true">
      </div>
  </div>


 
 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Address</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-road" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="address" name="address" placeholder="Street name and street number" value="{{ $customer->address }}" required="true">
      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">City</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-place-of-worship" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ $customer->city }}" required="true">
      </div>
  </div>

 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Phone</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-mobile-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Street name and street number" value="{{ $customer->phone }}" required="true">
      </div>
  </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">E-mail</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="email" name="email" placeholder="Street name and street number" value="{{ $customer->email }}" required="true">
      </div>
  </div>



</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop

