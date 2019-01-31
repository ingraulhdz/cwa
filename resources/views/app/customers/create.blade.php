@extends('app.main')
@section('subtitle', '/ Create customer')
@section('bar')
@include('app.customers.nav-bar')
@stop


@section('sub-content')



<form action="{{route('customer.store')}}" method="POST" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="row"> 



  <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="name" name="name" placeholder="Csustomer name" value="{{ old('name') }}" required="true">
      </div>
  </div>


 
 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Address</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-road" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="address" name="address" placeholder="Street number and street name" value="{{ old('address') }}" required="true">
      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">City</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-place-of-worship" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{ old('city') }}" required="true">
      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Zip Code</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-mail-bulk" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="5 digits zip code" value="{{ old('zip_code') }}" required="true">
      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Phone</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-mobile-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="10 digits phone number" value="{{ old('phone') }}" required="true">
      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Email</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="email" name="email" placeholder="example@mai.com" value="{{ old('email') }}" required="true">
      </div>
  </div>





</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-success form-control" type="submit"><i class="fa fa-save"></i> Save</button>
</div>



</form>


@stop

