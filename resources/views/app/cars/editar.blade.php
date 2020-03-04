<div id="editar-blade" style="display: none;">


<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">


<input type="hidden" class="form-control" id="fid" disabled>



        <h5 id="text_customer"></h5>
          

    <div id="dealer" class="col-md-12" style="display: none;">
     <div class="row">






<div class="col-md-8">
 <div class="form-group">
        <label for="email" class="control-label col-xs-4">Dealer:</label>
        <div class="col-xs-5">
            <select id="edit_dealer_id" name="edit_dealer_id" class="form-control form-control-sm" onchange="validacion('create_dealer_id');">
                        <option value=""  >Select a Dealer</option>

 @foreach(App\Models\Dealer::get() as $dealer)
        <option value="{{$dealer->id}}">{{ $dealer->name }}</option>
        @endforeach
          </select>
            <small class="help-block"></small>
        </div>
    </div>
    </div>




   <div class=" col-md-4">
   <div class="form-group ">
                        <label for="create_stock" class="control-label col-xs-4">Stock #:--</label>
                        <div class="col-xs-5">
                            <input id="edit_stock" name="edit_stock" type="text" class="form-control form-control-sm" placeholder="Delaer Stock#" onkeyup="validacion('create_stock');" required="true">
                            <small class="help-block"></small>
                        </div>
                    </div>
                    </div>



</div>

    </div>

         


        <div id="ctm" style="display: none">
          <div class="row col-md-12" style="font-size: 12px"> 




  <div class="col-md-6">
     <b >Name: </b>
              <label  id="ctm_name"></label>



  <BR><b>Address: </b>
              <label  id="ctm_address"></label>

  </div>


 <div class="col-md-6">
  <b >Email: </b>
              <label  id="ctm_email"></label>



      <BR><b>Phone: </b>
              <label  id="ctm_phone"></label>

  </div>


        </div>
</div>










<hr>


<h5>Car</h5>

<div class="row"> 

  <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Make</small>
      <input type="name" class="form-control form-control-sm" id="make_edit" name="edit_make"  placeholder="Make"  required="true">

  </div>


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Model</small>
      <input type="text" class="form-control form-control-sm" id="model_edit" name="model" placeholder="Car's Model" value="" required="true">
  </div>


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Year</small>
      <input type="text" class="form-control form-control-sm" id="year_edit" name="year" placeholder="4 digits year" value="" required="true">
  </div>


<div class="col-md-3 form-group">
     <small for="inlineFormInputGroup">Vin #</small>
     <input type="text" class="form-control form-control-sm" id="vin_edit" name="vin_edit" placeholder="last 6 digits of vin_edit Number" value="" required="true">
</div>


</div>




<div id="car_details">
<div class="row">




  </div>
  </div>



<hr>

<h5>Service</h5>

<div class="row">


   

   <div class="col-md-3 form-group ">
      <small for="inlineFormInputGroup">Service</small>
      <div class="input-group mb-2">
       
        </div>
    <select id="edit_service_id" class="selectpicker show-tick form-control form-control-sm" data-live-search="true" name="edit_service_id" required="true">
  <option value=''>Select service</option>
 

@foreach(App\Models\Service::get() as $service)
<option value='{{ $service->id }}'> {{ $service->name }}</option>
@endforeach
</select>
      </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Body Style</small>
      <div class="input-group mb-2">
       
   <select id="edit_body_style_id" class="selectpicker  form-control form-control-sm" data-live-search="true"  name="edit_body_style_id" value="{{ old('body_style_id') }}" required="true">
  <option value=''>Select Body Style</option>
 

 @foreach(App\Models\BodyStyle::get() as $body)

<option value='{{ $body->id }}'>  {{ $body->name }}</option>

 @endforeach


</select>
      </div>
  </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Color</small>
      <div class="input-group mb-2">
      
        <input type="text" class="form-control form-control-sm" id="edit_color" name="edit_color" placeholder="Car Color" >
      </div>
</div>







</div>




<div class="row">

 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Price</small>
      <div class="input-group mb-2">
       
        <input type="text" class="form-control form-control-sm" id="edit_price" name="edit_price" placeholder="Price">
      </div>
</div>

 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Extras</small>
      <div class="input-group mb-2">
        
  
   <select id="edit_extras"  name="extras[]" class="form-control form-control-sm selectpicker extr"  multiple>
  @foreach(App\Models\Extra::get() as $extra)
          <option value="{{$extra->id}}" class="ex_{{$extra->id}}">{{$extra->name}}</option>
  @endforeach

   </select>

      </div>
  </div>
  
 <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Note:</small>
      <div class="input-group mb-2">
       
        <textarea type="text" class="form-control form-control-sm" id="edit_note" name="edit_note" ></textarea>
      </div>
</div>
</div>
























</div>