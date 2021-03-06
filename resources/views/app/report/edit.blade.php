@extends('app.main')
@section('subtitle', '/ Edit')
@section('bar')
@include('app.extras.nav-bar')
@stop

@section('sub-content')



<form action="{{route('extra.update', $extra)}}" method="POST" >

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $extra->id }}">

<div class="row"> 



  <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="name" name="name" placeholder="Extra name" value="{{ $extra->name }}" required="true">
      </div>
  </div>


 
 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Description</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-clipboard-list" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="description" name="description" placeholder="Short description" value="{{ $extra->description }}" required="true">
      </div>
  </div>


 <div class="col-md-2 form-group">
      <small for="inlineFormInputGroup">Price</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-money-check-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="number" class="form-control" id="price" name="price" placeholder="$ Price " value="{{ $extra->price}}" required="true">
      
      </div>
</div>


</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop

