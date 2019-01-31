@extends('app.main')
@section('subtitle', '/ Edit')
@section('bar')
@include('app.body_styles.nav-bar')
@stop

@section('sub-content')



<form action="{{route('body_style.update', $body_style)}}" method="POST" >

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $body_style->id }}">

<div class="row"> 



  <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="name" name="name" placeholder="body_style name" value="{{ $body_style->name }}" required="true">
      </div>
  </div>


 
 <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Description</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-clipboard-list" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="description" name="description" placeholder="Short description" value="{{ $body_style->description }}" required="true">
      </div>
  </div>


 


</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop

