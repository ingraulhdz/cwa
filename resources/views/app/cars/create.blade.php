<div id="create-blade" style="display: none;">

<input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="alert alert-danger alert-dismissible fade show" style="display:none;" role="alert" id="car_found">
  <strong>Warning!</strong><br><font id="car_found_link"></font>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>



<h3>Dealer</h3>

<div class="row">



<div class="col-md-8">
 <div class="form-group">
        <label for="email" class="control-label col-xs-4">Dealer:</label>
        <div class="col-xs-5">
            <select id="create_dealer_id" name="dealer_id" class="form-control form-control-sm" onchange="validacion('create_dealer_id');">
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
                            <input id="create_stock" name="stock" type="text" class="form-control form-control-sm" placeholder="Delaer Stock#" onkeyup="validacion('create_stock');" required="true">
                            <small class="help-block"></small>
                        </div>
                    </div>
                    </div>



</div>
<hr>

<h3>Car</h3>

<div class="row"> 
<div class="col-md-3">

    <div class="form-group ">
                        <label for="make" class="control-label col-xs-4">Make:</label>
                        <div class="col-xs-5">
                            <input id="create_make" name="make" type="text" class="form-control form-control-sm" placeholder="Make" onkeyup="validacion('create_make');" required="true">
                            <small class="help-block"></small>
                        </div>
                    </div>
                    </div>

<div class="col-md-3">

    <div class="form-group ">
                        <label for="model" class="control-label col-xs-4">Model:</label>
                        <div class="col-xs-5">
                            <input id="create_model" name="model" type="text" class="form-control form-control-sm" placeholder="Model" onkeyup="validacion('create_model');" required="true">
                            <small class="help-block"></small>
                        </div>
                    </div>
  </div>

<div class="col-md-3">
    <div class="form-group ">
                        <label for="year" class="control-label col-xs-4">Year:</label>
                        <div class="col-xs-5">
                            <input id="create_year" name="year" type="text" class="form-control form-control-sm" placeholder="Year" onkeyup="validacion('create_year');" required="true">
                            <small class="help-block"></small>
                        </div>
                    </div>
  </div>






<div class="col-md-3">

  <div class="form-group ">
                        <label for="vin" class="control-label col-xs-4">Vin#:</label>
                        <div class="col-xs-5">
                            <input id="create_vin" name="vin" type="text" class="form-control form-control-sm" placeholder="Vin #" onkeyup="validacion('create_vin');" required="true">
                            <small class="help-block"></small>
                        </div>
                    </div>
                    </div>



</div>
<hr >
<h6>Car details</h6>

<div class="row">


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Body Style</small>
      <div class="input-group mb-2">
       
             <select id="create_body_style_id" name="create_body_style_id" class="form-control form-control-sm">

          <option value="">Select Boy Style</option>
      @foreach(App\Models\BodyStyle::get() as $item)
        <option value="{{$item->id}}" >{{ $item->name }}</option>
        @endforeach
       </select>


      </div>
  </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Service</small>
      <div class="input-group mb-2">
                   <select id="create_service_id" name="create_service_id" class="form-control form-control-sm">

      <option value="">Select a service</option>
     @foreach(App\Models\Service::get() as $service)
    <option value='{{ $service->id }}' >{{ $service->name }}</option>
    @endforeach
</select>
      </div>
  </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Detailer</small>
      <div class="input-group mb-2">
       <!-- data-live-search="true" -->
                   <select id="create_employee_id" name="create_employee_id" class="form-control form-control-sm">
  <option value="">Select detailer</option>
 

@foreach(App\Models\Employee::get() as $employee)
<option value='{{ $employee->id }}' >{{ $employee->name }}</option>
@endforeach
</select>
      </div>
  </div>

</div>
<div class="row">
<!-- 
   <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Extras</small>
      <div class="input-group mb-2">
      <select id="create_extras"   name="extras[]" class="selectpicker form-control form-control-sm" multiple>
  @foreach(App\Models\Extra::get() as $extra)
          <option value="{{$extra->id}}">{{$extra->name}}</option>
  @endforeach
   </select>
      </div>
  </div>

 -->

   <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Price </small>
      <div class="input-group mb-2">
        <input type="text" class="form-control form-control-sm" id="create_price" name="price" placeholder="Price"  >
      </div>
  </div>



 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Color</small>
      <div class="input-group mb-2">
        
        <input type="text" class="form-control form-control-sm" id="create_color" name="color" placeholder="Car Color" value="{{ old('color') }}" >
      </div>
</div>



 <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Note:</small>
      <div class="input-group mb-2">
        
        <textarea type="text" class="form-control form-control-sm" id="create_note" name="note" placeholder="Small note about car" ></textarea>
      </div>
</div>



</div>
</div>




    <script type="text/javascript">

        var v=true;
       // $("span.help-block").hide();

        function verificar(){
console.log("verigicando");
            var v1=0,v2=0,v3=0,v4=0,v5=0,v6=0;
            v1=validacion('create_stock');
            v2=validacion('create_dealer_id');
            v3=validacion('create_vin');
            v4=validacion('create_make');
            v5=validacion('create_year');
            v6=validacion('create_model');
            if (v1===false || v2===false || v3===false || v4===false || v5===false || v6===false ) {
                 $("#exito").hide();
                 $("#error").show();
            }else{
                $("#error").hide();
                $("#exito").show();
            }
      

        } 
        
function noLetter(campo){
  $("#glypcn"+campo).remove();
                        $('#'+campo).attr("class", "form-control form-control-danger");
                        $('#'+campo).parent().parent().attr("class", "form-group text-danger has-danger has-feedback");
                        $('#'+campo).parent().children('small').text("This field does not accept letters").attr("class","text-danger").show();
                      //  $('#'+campo).parent().append("<small id='glypcn"+campo+"' class='fa fa-times form-control-feedback'></small>");
                        return false;
}

function empty(campo){
 $("#glypcn"+campo).remove();
                    $('#'+campo).attr("class", "form-control form-control-sm form-control-danger");
                    $('#'+campo).parent().parent().attr("class", "form-group has-danger has-feedback");
                    $('#'+campo).parent().children('small').text("This input can not be null").addClass("text-danger").show();
                   // $('#'+campo).parent().append("<small id='glypcn"+campo+"' class='fa fa-times form-control-feedback'></small>");
                    return false;
}

function success(campo){
   $("#glypcn"+campo).remove();
                            $('#'+campo).attr("class", "form-control form-control-sm form-control-success text-success");
                            $('#'+campo).parent().parent().attr("class", "form-group has-success text-success has-feedback");
                            $('#'+campo).parent().children('small').hide();
                    return true;
}
     





function validacion(campo){
 var a=0;
            

 if (campo==='create_dealer_id'){
             indice = document.getElementById(campo).selectedIndex;
                if( indice == null || indice == 0 ) {
                    empty(campo);
                }
               else{
                    
                    success(campo);

                }
            }


               if (campo==='create_stock'){
                input = document.getElementById(campo).value;
                if( input == null || input.length == 0 || /^\s+$/.test(input) ) {
                    
                   empty(campo);
                    
                }
                else{
                           
                    success(campo);
                } 
            }



               if (campo==='create_make'){
                input = document.getElementById(campo).value;
                if( input == null || input.length == 0 || /^\s+$/.test(input) ) {
                    
                   empty(campo);
                    
                }
                else{
                           
                    success(campo);
                } 
            }


               if (campo==='create_model'){
                input = document.getElementById(campo).value;
                if( input == null || input.length == 0 || /^\s+$/.test(input) ) {
                    
                   empty(campo);
                    
                }
                else{
                           
                    success(campo);
                } 
            }

  if (campo==='create_vin'){
                vin = document.getElementById(campo).value;
                if( vin == null || vin.length == 0 || /^\s+$/.test(vin) ) {
                                                       $("#car_found").hide();
                    empty(campo);                
                }
                else
                {
                    if( isNaN(vin) ) 
                    {
                        noLetter(campo);
                    }
                    else{
                                    if (!(/^\d{6}$/.test(vin))) 
                                    {
                                                       $("#car_found").hide();
                                    $("#glypcn"+campo).remove();
                                    $('#'+campo).attr("class", "form-control form-control-warning");
                                    $('#'+campo).parent().parent().attr("class", "form-group has-warning text-warning has-feedback");
                                    $('#'+campo).parent().children('small').text("Vin# must be last 6 digist only").attr("class","text-warning").show();
                                    $('#'+campo).parent().append("<small id='glypcn"+campo+"' class='fa fa-exclamation-triangle form-control-feedback'></small>");
                                        return false;


                                    }

                                   else{

                                      $.ajax({
                                        type:'GET',
                                        url:'/get-year',
                                        dataType:'JSON',
                                        data:{
                                          'vin':vin,
                                          '_token':$('#token').val(),
                                        },
                                        success: function (data){
old_vin = $("#create_vin").val();
if(data.vin == old_vin){
                                   $("#glypcn"+campo).remove();
                                   $('#'+campo).attr("class", "form-control form-control-warning");
                                   $('#'+campo).parent().parent().attr("class", "form-group has-warning text-danger has-feedback");
                                   $('#'+campo).parent().children('small').text("This Vin#  exist in our data base").attr("class","text-danger").show();
                                   $('#'+campo).parent().append("<small id='glypcn"+campo+"' class='fa fa-exclamation-triangle form-control-feedback'></small>");
                                      // $('#make').val(data.car.make).attr("disabled","true");
                               
 console.log( 'lanzar repetido');

                                  Swal.fire({
                                    type: 'error',
                                    title: 'This car exists in our database...',
                                    html: data.car.make +" "+data.car.model +" "+data.car.year +" Vin #" +data.car.vin +"<br><small> Last service:  "+ data.car.updated_at +"</small ",
                                    footer: "<a href='/car/"+data.car.id+"'>See more abour this car</a>"
                                  });
vin = 0;
$("#create_vin").val("");
 return false; 

}


else
{
                                  success(campo);

}
                                        }
                                      });



                                    }
                        
                    }  
                } 
            }






  if (campo==='create_year'){
                year = document.getElementById(campo).value;
                if( year == null || year.length == 0 || /^\s+$/.test(year) ) {
                    empty(campo);
                    
                }
                else
                {
                    if( isNaN(year) ) 
                    {
                        noLetter(campo);
                    }
                    else{
                        var dt = new Date();
                        var currentYear =  (dt.getFullYear()) +1 ;



                                    if (  !(/^\d{4}$/.test(year)) || year < 1920 || year > currentYear  ) 
                                    {









                                    $("#glypcn"+campo).remove();
                                    $('#'+campo).attr("class", "form-control form-control-warning");
                                    $('#'+campo).parent().parent().attr("class", "form-group has-warning text-warning has-feedback");

if(year<1920){
                                      $('#'+campo).parent().children('small').text("Year Can not be less than 1920").attr("class","text-warning").show();

}
if(year>currentYear){
                                      $('#'+campo).parent().children('small').text("Year Can not be mayor than "+currentYear).attr("class","text-warning").show();

}else{
                                    $('#'+campo).parent().children('small').text("4 digits year Example 2015").attr("class","text-warning").show();
}


                                    $('#'+campo).parent().append("<small id='glypcn"+campo+"' class='fa fa-exclamation-triangle form-control-feedback'></small>");
                                        return false;


                                    }
                                    else{
                                                            success(campo);

                                    }
                        
                    }  
                } 
            }





 



            
           
        }
    </script>