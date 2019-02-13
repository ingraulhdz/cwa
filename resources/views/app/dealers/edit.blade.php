@extends('app.main')
@include('app.dealers.nav-bar')

@section('sub-content')



<form action="{{route('dealer.update', $dealer)}}" method="POST" >

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $dealer->id }}">

<div class="row"> 



  <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Dealer</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-building" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('name') ? 'is-invalid':'is-valid'}} @endif" id="name" name="name" placeholder="Dealer name" value="{{ $dealer->name}}" required="true">
                   {!! $errors->first('name','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Phone</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-phone" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('phone') ? 'is-invalid':'is-valid'}} @endif " id="phone" name="phone" placeholder="10 digits" value="{{ $dealer->phone }}" required="true">
                   {!! $errors->first('phone','<div class="invalid-feedback">:message        </div>') !!}

      </div>

  </div>


 <div class="col-md-4 form-group {{ $errors->has('email') ? 'has-error' :' ' }}">
      <small for="inlineFormInputGroup">E-mail</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{ $errors->has('email') ? 'is-invalid' :'is-valid ' }} @endif " id="email" name="email" placeholder="Ex: dealer@mail.com" value="{{$dealer->email}}" required="true">
           {!! $errors->first('email','<div class="invalid-feedback">:message        </div>') !!}
      </div>
  </div>

      



 <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Address</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-road" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('address') ? 'is-invalid':'is-valid'}} @endif" id="address" name="address" placeholder="Street number  and street name" value="{{ $dealer->address }}" required="true">
       
                   {!! $errors->first('address','<div class="invalid-feedback">:message        </div>') !!}

      </div>
      </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">City</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-place-of-worship" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('coty') ? 'is-invalid':'is-valid'}} @endif" id="city" name="city" placeholder="Location City" value="{{ $dealer->city}}" required="true">
       
                   {!! $errors->first('coty','<div class="invalid-feedback">:message        </div>') !!}

      </div>
      
  </div>


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Zip code</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="number" class="form-control @if ($errors->any()) {{$errors->has('zip_code') ? 'is-invalid':'is-valid'}} @endif" id="zip_code" name="zip_code" placeholder="5 digits zip code" value="{{ $dealer->zip_code }}" required="true">
                       {!! $errors->first('zip_code','<div class="invalid-feedback">:message        </div>') !!}

      
      </div>
</div>


<div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Contact</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('contact') ? 'is-invalid':'is-valid'}} @endif" id="contact" name="contact" placeholder="Contact name or manager" value="{{ $dealer->contact }}" required="true">
       
                   {!! $errors->first('contact','<div class="invalid-feedback">:message        </div>') !!}

      
      </div>
  </div>

 <div class="col-md-3 form-group">
     <small for="inlineFormInputGroup">Contact Phone</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-mobile-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('contact_phone') ? 'is-invalid':'is-valid'}} @endif" id="contact_phone" name="contact_phone" placeholder="10 digits phone" value="{{ $dealer->contact_phone}}" required="true">
       
                   {!! $errors->first('contact_phone','<div class="invalid-feedback">:message        </div>') !!}

      
      </div>
  </div>

 <div class="col-md-4 form-group">
     <small for="inlineFormInputGroup">Logo</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-car" style="color: #dc3545"></i>
          </div>
        </div>
        <select class="form-control" name="logo">
  <option>Select a brand</option>
  <option value="ford">Ford</option>
  <option value="chevy">Chevy</option>
  <option value="nissan">Nissan</option>
</select>
      </div>
  </div>



</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop

