
<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $car->id }}">



@if($car->dealer)

<h3>Dealer</h3>

<div class="row"> 


 <div class="col-md-8 form-group">
      <small for="inlineFormInputGroup">Dealer</small>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-building" style="color: #dc3545"></i>
          </div>
        </div>

   <select id="basic" name="dealer_id" class="selectpicker show-tick form-control form-control-sm" data-live-search="true">    
      @foreach(App\Models\Dealer::get() as $dealer)
        <option  value='{{ $dealer->id }}' @if($car->dealer->id == $dealer->id) selected @endif >{{ $dealer->name }}</option>
        @endforeach
       </select>
  </div>
</div>





 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Stock #</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-cubes" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="stock" name="stock" placeholder="Dealer stock number" value="{{$car->stock}}" required="true">
      </div>
  </div>

</div>

@else
<h3>Customer</h3>
<div class="row"> 

 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-cubes" style="color: #dc3545"></i>
          </div>
        </div>
       <input type="text" class="form-control form-control-sm" id="name" name="name"  placeholder="Make" value="{{$car->customer->name}}" disabled="true">
     </div>
  </div>

   <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Address</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-cubes" style="color: #dc3545"></i>
          </div>
        </div>
               <input type="text" class="form-control form-control-sm" id="address" name="address"  placeholder="Make" value="{{$car->customer->address}}" disabled="true">

     </div>
  </div>

 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">E-mail</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-cubes" style="color: #dc3545"></i>
          </div>
        </div>
               <input type="text" class="form-control form-control-sm" id="phone" name="phone"  placeholder="Make" value="{{$car->customer->phone}}" disabled="true">

     </div>
  </div>

   <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Phone #</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-cubes" style="color: #dc3545"></i>
          </div>
        </div>
               <input type="text" class="form-control form-control-sm" id="email" name="email"  placeholder="Make" value="{{$car->customer->email}}" disabled="true">

  </div>
  </div>




</div>

@endif


<hr>

<h3>Car</h3>

<div class="row"> 

  



  <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Make</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-certificate" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="make" name="make"  placeholder="Make" value="{{$car->make}}" required="true">
      </div>
  </div>


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Model</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-sitemap" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="model" name="model" placeholder="Car's Model" value="{{$car->model}}" required="true">
      </div>

  </div>


 <div class="col-md-2 form-group">
      <small for="inlineFormInputGroup">Year</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-hourglass" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="year" name="year" placeholder="4 digits year" value="{{ $car->year}}" required="true">
      </div>
  </div>





<div class="col-md-2 form-group">
      <small for="inlineFormInputGroup">Vin #</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-key" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="vin" name="vin" placeholder="last 6 digits of Vin Number" value="{{ $car->vin }}" required="true">
      </div>
  </div>



</div>
<h6>Car details</h6>
<div class="row">

 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Body Style</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-truck-pickup" style="color: #dc3545"></i>
          </div>
        </div>
   <select id="basic" class="selectpicker show-tick form-control form-control-sm" data-live-search="true"  name="body_style_id" value="{{ old('body_style_id') }}" required="true">
  <option value=''>Select Body Style</option>
 

 @foreach(App\Models\BodyStyle::get() as $body)

<option value='{{ $body->id }}' @if($car->body_style) @if($car->body_style->id == $body->id) selected @endif @endif >  {{ $body->name }}</option>

 @endforeach


</select>
      </div>
  </div>



 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Color</small>
      <div class="input-group mb-2">
      
        <input type="text" class="form-control form-control-sm" id="color" name="color" placeholder="Car Color" value="{{ $car->color }}">
      </div>
</div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Service</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-american-sign-language-interpreting" style="color: #dc3545"></i>
          </div>
        </div>
   <select id="basic" class="selectpicker show-tick form-control form-control-sm" data-live-search="true" name="service_id" required="true">
  <option value=''>Select service</option>
 

@foreach(App\Models\Service::get() as $service)
<option value='{{ $service->id }}' @if($car->service) @if($car->service->id == $service->id) selected @endif @endif > {{ $service->name }}</option>
@endforeach
</select>
      </div>
  </div>

   <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Detailer</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-american-sign-language-interpreting" style="color: #dc3545"></i>
          </div>
        </div>
   <select id="basic" class="selectpicker show-tick form-control form-control-sm" data-live-search="true" name="employee_id" required="true">
  <option value=''>Select employee</option>
 

@foreach(App\Models\Employee::get() as $employee)
<option value='{{ $employee->id }}' @if($car->employee) @if($car->employee->id == $employee->id ) selected @endif @endif > {{ $employee->name }}</option>
@endforeach
</select>
      </div>
  </div>



</div>

<div class="row">




 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Color</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-palette" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="color" name="color" placeholder="Car Color" value="{{ $car->color }}">
      </div>
</div>

 <div class="col-md-2 form-group">
      <small for="inlineFormInputGroup">Price</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-palette" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm" id="color" name="price" placeholder="Price" value="{{ $car->price }}">
      </div>
</div>

 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Extras</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-american-sign-language-interpreting" style="color: #dc3545"></i>
          </div>
        </div>
  
   <select id="basic" data-live-search="true"  name="extras[]" class="form-control form-control-sm selectpicker "  multiple>

  @foreach(App\Models\Extra::get() as $extra)
          <option value="{{$extra->id}}" @foreach($car->ex as $ex)  @if($ex->id == $extra->id) selected @endif @endforeach>{{$extra->name}}</option>
  @endforeach

   </select>

      </div>
  </div>
  
 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Note:</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-edit" style="color: #dc3545"></i>
          </div>
        </div>
        <textarea type="text" class="form-control form-control-sm" id="color" name="note" placeholder="{{ $car->note }}" ></textarea>
      </div>
</div>


</div>

<div class="form-group float-right">
    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
</div>
