@extends('app.dealers.main')
@section('subtitle', '/ Edit')
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
        <input type="text" class="form-control" id="name" name="name" value="{{$dealer->name}}" placeholder="Dealer name">
      </div>
  </div>


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Phone</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-phone" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="10 digits" value="{{$dealer->phone}}">
      </div>

  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">E-mail</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="email" name="email" placeholder="Ex: dealer@mail.com" value="{{$dealer->email}}">
      </div>
  </div>



 <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Address</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-road" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="address" name="address" placeholder="Street number  and street name" value="{{$dealer->address}}">
      </div>
  </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">City</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-place-of-worship" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="city" name="city" value="{{$dealer->city}}" >
      </div>
  </div>


 <div class="col-md-2 form-group">
      <small for="inlineFormInputGroup">Zip code</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="number" class="form-control" id="zip_code" name="zip_code" placeholder="5 digits zip code" value="{{$dealer->zip_code}}">
      </div>
</div>


<div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Contact</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact name or manager" value="{{$dealer->contact}}">
      </div>
  </div>

 <div class="col-md-3 form-group">
     <small for="inlineFormInputGroup">Contact Phone</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-mobile-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="number" class="form-control" id="contact_phone" name="contact_phone" placeholder="10 digits phone" value="{{$dealer->contact_phone}}">
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

