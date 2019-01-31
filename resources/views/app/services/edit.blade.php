@extends('app.main')
@section('subtitle', '/ Edit')
@section('bar')
@include('app.services.nav-bar')
@stop

@section('sub-content')



<form action="{{route('service.update', $service)}}" method="POST" >

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $service->id }}">

<div class="row"> 



  <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="name" name="name" placeholder="service name" value="{{ $service->name }}" required="true">
      </div>
  </div>


 
 <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Description</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="description" name="description" placeholder="Short description" value="{{ $service->description }}" required="true">
      </div>
  </div>




 <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Price</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="number" class="form-control" id="price" name="price" placeholder="$ Price " value="{{ $service->price}}" required="true">
      
      </div>
</div>


<div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Body_style</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-building" style="color: #dc3545"></i>
          </div>
        </div>
         <select class="form-control" name="body_style_id" value="{{ old('dealer_id') }}" required="true">
         <option>Select a Body Style</option>
         @foreach(App\Models\BodyStyle::get() as $body)
        <option value='{{ $body->id }}' @if($body->id == $service->body_style_id) selected @endif>{{ $body->name }}</option>
        @endforeach
        </select>
  </div>
</div>






</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop

