@extends('app.main')
@section('subtitle', '/ Create Payment')
@section('bar')
@include('app.payments.nav-bar')
@stop


@section('sub-content')



<form action="{{route('payment.store')}}" method="POST" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="row"> 



  <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="name" name="name" placeholder="payment name" value="{{ old('name') }}" required="true">
      </div>
  </div>


 
 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Description</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-clipboard-list" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="description" name="description" placeholder="Short description" value="{{ old('description') }}" required="true">
      </div>
  </div>






</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-success form-control" type="submit"><i class="fa fa-save"></i> Save</button>
</div>

@section('foot')


@stop


</form>


@stop

