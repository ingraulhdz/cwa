@extends('app.main')

@include('app.carros.nav-bar')

@section('sub-content')



<form action="{{route('carro.update', $carro)}}" method="POST" >

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $carro->id }}">

<div class="row"> 



   <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup"> Year </small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('year') ? 'is-invalid':'is-valid'}} @endif" id="year" name="year" placeholder="Year" value="{{ $carro->year}}" required="true">
                   {!! $errors->first('year','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>

 
  <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup"> Make</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('make') ? 'is-invalid':'is-valid'}} @endif" id="make" name="make" placeholder="Make" value="{{ $carro->make}}" required="true">
                   {!! $errors->first('make','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>




   <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Model</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-money-check-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('model') ? 'is-invalid':'is-valid'}} @endif" id="model" name="model" placeholder="Model" value="{{ $carro->model}}" required="true">
                   {!! $errors->first('model','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>


</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop

