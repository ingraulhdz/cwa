@extends('app.main')
@section('subtitle', '/ Edit Payment')
@section('bar')
@include('app.payments.nav-bar')
@stop

@section('sub-content')



<form action="{{route('payment.update', $payment)}}" method="POST" >

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $payment->id }}">

<div class="row"> 



   <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup"> Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('name') ? 'is-invalid':'is-valid'}} @endif" id="name" name="name" placeholder="Fist Name" value="{{ $body_style->name}}" required="true">
                   {!! $errors->first('name','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>

 
  <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup"> Description</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('description') ? 'is-invalid':'is-valid'}} @endif" id="description" name="description" placeholder="Short Description" value="{{ $body_style->description}}" required="true">
                   {!! $errors->first('description','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>



</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop

