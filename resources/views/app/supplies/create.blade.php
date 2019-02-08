@extends('app.main')
@section('subtitle', '/ Create supply')
@section('bar')
@include('app.supplies.nav-bar')
@stop


@section('sub-content')



<form action="{{route('supply.store')}}" method="POST" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="row"> 


 <div class="col-md-4form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('name') ? 'is-invalid':'is-valid'}} @endif" id="name" name="name" placeholder="Fist Name" value="{{ old('name') }}" required="true">
                   {!! $errors->first('name','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>



     <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Description</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-clipboard-list" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('description') ? 'is-invalid':'is-valid'}} @endif" id="description" name="description" placeholder="Short " value="{{ old('description') }}" required="true">
                   {!! $errors->first('description','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>


  <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Price </small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-money-check-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('price') ? 'is-invalid':'is-valid'}} @endif" id="price" name="price" placeholder="Short price " value="{{ old('price') }}" required="true">
                   {!! $errors->first('price','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>




</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-success form-control" type="submit"><i class="fa fa-save"></i> Save</button>
</div>



</form>


@stop

