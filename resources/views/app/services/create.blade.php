@extends('app.main')
@section('subtitle', '/ Create service')
@section('bar')
@include('app.services.nav-bar')
@stop


@section('sub-content')



<form action="{{route('service.store')}}" method="POST" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="row"> 


 <div class="col-md-6 form-group">
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



     <div class="col-md-6 form-group">
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


<div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Body_style</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-car" style="color: #dc3545"></i>
          </div>
        </div>
         <select class="form-control" name="body_style_id" value="{{ old('dealer_id') }}" required="true">
         <option>Select a Body Style</option>
         @foreach(App\Models\BodyStyle::get() as $body)
        <option value='{{ $body->id }}' >{{ $body->name }}</option>
        @endforeach
        </select>
  </div>
</div>


 <div class="col-md-6 form-group">
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

