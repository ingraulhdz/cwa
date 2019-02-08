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



   <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup"> Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('name') ? 'is-invalid':'is-valid'}} @endif" id="name" name="name" placeholder="Fist Name" value="{{ $extra->name}}" required="true">
                   {!! $errors->first('name','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>

 
  <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup"> Description</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('description') ? 'is-invalid':'is-valid'}} @endif" id="description" name="description" placeholder="Short Description" value="{{ $extra->description}}" required="true">
                   {!! $errors->first('description','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>




   <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Price</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-money-check-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('price') ? 'is-invalid':'is-valid'}} @endif" id="price" name="price" placeholder="Supplie´s price" value="{{ $extra->price}}" required="true">
                   {!! $errors->first('price','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>


</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop

