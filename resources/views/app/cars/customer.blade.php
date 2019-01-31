@extends('app.cars.main')
@section('subtitle', '/ Create')
@section('sub-content')



<form action="{{route('car.store')}}" method="POST" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<h3>Customer Information</h3>

<div class="row"> 

 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="Customer name" value="{{ old('name') }}" required="true">
      </div>
  </div>

 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">E-mail</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="example@mail.com" value="{{ old('email') }}" required="true">
      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Phone</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-phone" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="phone" name="phone" placeholder="10 digits phone number" value="{{ old('phone') }}" required="true">
      </div>
  </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Address</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-road" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="address" name="address" placeholder="Street number and name" value="{{ old('address') }}" >
      </div>
  </div>

 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">City</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-place-of-worship" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="city" name="city" placeholder="City" value="{{ old('city') }}" >
      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Zip Code</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-mail-bulk" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="zip_code" name="zip_code" placeholder="5 digits zip code" value="{{ old('zip_code') }}" >
      </div>
  </div>










</div><hr>

<h3>Car</h3>

<div class="row"> 

  



  <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Make</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-certificate" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="make" name="make"  placeholder="Make" value="{{ old('make') }}" required="true">
      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Model</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-sitemap" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="model" name="model" placeholder="Car's Model" value="{{ old('model') }}" required="true">
      </div>

  </div>


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Year</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-hourglass" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="year" name="year" placeholder="4 digits year" value="{{ old('year') }}" required="true">
      </div>
  </div>



</div>

<div class="row">



<div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Vin #</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-key" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="vin" name="vin" placeholder="last 6 digits of Vin Number" value="{{ old('vin') }}" required="true">
      </div>
  </div>





 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Color</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-palette" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="zip_code" name="zip_code" placeholder="Car Color" value="{{ old('zip_code') }}" >
      </div>
</div>




 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Service</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-american-sign-language-interpreting" style="color: #dc3545"></i>
          </div>
        </div>
  <select class="form-control form-control-sm" name="service_id" value="{{ old('service_id') }}" required="true">
  <option>Select a service</option>
 

@foreach(App\Models\Service::get() as $service)
<option value='{{ $service->id }}' >{{ $service->name }}</option>
@endforeach
</select>
      </div>
  </div>




 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Body Style</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-truck-pickup" style="color: #dc3545"></i>
          </div>
        </div>
  <select class="form-control form-control-sm" name="body_style_id" value="{{ old('body_style_id') }}" >
  <option>Select a Body Style</option>
 

@foreach(App\Models\BodyStyle::get() as $body)
<option value='{{ $body->id }}' >{{ $body->name }}</option>
@endforeach
</select>
      </div>
  </div>








</div>
<hr>
<h3>Paymentent</h3>


<div class="row">


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Type of payment</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-credit-card" style="color: #dc3545"></i>
          </div>
        </div>
<select class="form-control form-control-sm" name="body_style_id" value="{{ old('body_style_id') }}" required="true">
  <option>Select a payment</option>
 

@foreach(App\Models\Payment::get() as $pay)
<option value='{{ $pay->id }}' >{{ $pay->name }}</option>
@endforeach
</select>

      </div>
</div>


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Price</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-money-check-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="double" class="form-control form-control-sm" id="zip_code" name="zip_code" placeholder="$ amount" value="{{ old('zip_code') }}" required="true">
      </div>
</div>


 <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Note</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-sticky-note" style="color: #dc3545"></i>
          </div>
        </div>
        <textarea name="note" class="form-control form-control-sm" placeholder="Short message " value="{{ old('note') }}"></textarea>

      </div>
</div>



	</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-success form-control form-control-sm" type="submit"><i class="fa fa-save"></i> Save</button>
</div>



</form>


@stop

