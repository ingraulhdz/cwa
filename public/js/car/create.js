$(document).on('click', '#create-modal', function(e)
 { 

e.preventDefault();




	$('#mostrar').hide();
	$('#setEmployee').hide();
	$('#editar-blade').hide();
	$('#create-blade').show();

	$('#btn-modal').addClass( "btn-create" );
	$('#btn-modal').addClass( "btn-success" );
	$("#btn-modal").attr("data-dismiss","modal");
	$("#btn-modal").attr("onclick","verificar();");
	$('#btn-txt').text( "Add " );
	$('#fa-btn-modal').addClass( "fa-plus" );
	$('#modal').addClass( "bd-example-modal-lg" );
	$('#modal-title').text("Add car" );
	
	$('#modal').modal('show');
	$('#create_price').val(100);


clearCreateFormCar();


  });


$(document).on('click', '.btn-create', function(e) { 

	e.preventDefault();
	verificar();
	var token = $('input[name=_token]').val();
	var ex = $('#create_extras').val();
    var extras = JSON.stringify(ex);
console.log(extras);

var m = ($('#make').val());
	$.ajax(
	{
		type:'POST',
		url:'/create-car',
		            headers:{'X-CSRF-TOKEN':token},
		datatype: 'JSON',
		data:{
		  '_token': token,
		  'make': $('#create_make').val(),
		  'model': $('#create_model').val(),
		  'year': $('#create_year').val(),
		  'vin': $('#create_vin').val(),	
		  'dealer_id': $('#create_dealer_id').val(),
		  'color': $('#color').val(),
		  'employee_id':$('#create_employee_id').val(),
		  'service_id':$('#create_service_id').val(),
		  'body_style_id':$('#create_body_style_id').val(),
		  'color':$('#create_color').val(),
		  'stock':$('#create_stock').val(),
		  'note':$('#create_note').val(),
		  'price':$('#create_price').val(),
//'extras':extras
		  			},
		success: function(data){

			clearCreateFormCar();
$('#arrived_cars').text(data.newTotal);
		  swal(
		  {
			  position: 'top-end',
			  type: 'success',
			  title: 'the car '+ data.car.make +' '+ data.car.model +'  '+ data.car.year +' has been added',
			  showConfirmButton: false,
			  timer: 1500
		  });


//<span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-triangle"></i> Not Asigned!</span>
// <td class="td-options-{{$car->id}}">
//		  	"<a href='#' class='btn btn-sm btn-ready' id='show-modal' data-id='"+data.car.id+"'><i class='fa fa-check'></i></a></td>"+
if(data.employee){
	var employee = data.employee.name;
}else{
	var employee = '<span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-triangle"></i> Not Asigned!</span>';
}



		  $('#carsTable').append("<tr class="+data.car.id+">"+
		  	"<td td-name-"+data.car.id+">"+data.car.year+" "+data.car.make+"-"+data.car.model+" #"+data.car.vin+"</td>"+
		  	"<td td-employee-"+data.car.id+">"+ employee+"</td>"+
			"<td td-dealer-"+data.car.id+">"+data.dealer.name+"</td>"+
		  	"<td td-options-"+data.car.id+">"+
"<a href='#' data-id='"+data.car.id+"' class='btn btn-sm btn-info' id='show-modal'><i class='fa fa-eye'></i></a> "+
"<a href='#' data-id='"+data.car.id+"' class='btn btn-sm btn-warning text-white' id='edit-modal'><i class='fa fa-edit'></i></a>"+
"<a href='#' data-id='"+data.car.id+"' class='btn btn-sm btn-success ready' id=''><i class='fa fa-check'></i></a>"+
		  	"</tr>");

 $("#create_vin").val("");
 $('#create-blade').hide();
 $("#car_found").hide();
 $("#car_found_link").hide();
 $(".alert").hide();

$('#btn-modal').removeClass( "btn-create" );
$('#btn-modal').removeClass( "btn-success" );
$('#fa-btn-modal').removeClass( "fa-plus" );
$("#btn-modal").removeAttr("onclick","verificar();")


var popo = null;

	 
    $('#create_vin').val( popo );
   
                                   $("#car_found").hide();

                                   $('#glypcncreate_vin').remove();

                                   $('#create_vin').attr("class", "form-control form-control-sm");
                                   $('#create_vin').parent().parent().attr("class", "form-group");
                                   $('#create_vin').parent().children('small').text("").attr("class","text-dark").show();
                                   $('#create_vin').parent().append("<small id='glypcncreate_vin' class='fa fa-car form-control-feedback'></small>");
     $('#create_vin').parent().children('small').text("").attr("class","").hide();




	 $('#create_make').val('');
	 $('#create_make').attr("class", "form-control form-control-sm ");
     $('#create_make').parent().parent().attr("class", "form-group");
     $('#create_make').parent().children('small').text("").attr("class","").hide();
                     
	$('#create_model').val('');
    $('#create_model').attr("class", "form-control form-control-sm ");
    $('#create_model').parent().parent().attr("class", "form-group");
    $('#create_model').parent().children('small').text("").attr("class","").hide();

	$('#create_year').val('');
	$('#create_year').attr("class", "form-control form-control-sm ");
    $('#create_year').parent().parent().attr("class", "form-group");
    $('#create_year').parent().children('small').text("").attr("class","").hide();

	$('#create_dealer_id').val('');
    $('#create_dealer_id').attr("class", "form-control form-control-sm ");
    $('#create_dealer_id').parent().parent().attr("class", "form-group");
    $('#create_dealer_id').parent().children('small').text("").attr("class","").hide();

    $('#create_stock').val('');
	$('#create_stock').attr("class", "form-control form-control-sm ");
    $('#create_stock').parent().parent().attr("class", "form-group");
    $('#create_stock').parent().children('small').text("").attr("class","").hide();

	$('#color').val('');
    $('#create_employee_id').val('');
    $('#create_service_id').val('');
	$('#create_body_style_id').val('');
	$('#create_color').val('');
	$('#create_note').val('');
	$('#create_vin').val('');
                                                 
	$('#create-blade').hide();



								},

            error:function(data)
            {

                console.log("ERROR  car not saved...");
                console.log(data.responseJSON.message);
                console.log(data.dato);
    //              swal(
		  // {
			 //  position: 'top-end',
			 //  type: 'error',
			 //  title: 'someting is wrongzx...',
			 //  showConfirmButton: false,
			 //  timer: 1500
		  // });
                 	$('#modal').modal('show');

                }
	});




});



function clearCreateFormCar(){
 
 console.log( 'valor del vin antes');
 console.log( $('#create_vin').val());
 $('#create_vin').val(null);
  console.log( 'valor del vin despues');
 console.log( $('#create_vin').val());

 $('#price').val(110);
 $('#create_vin').attr("class", "form-control form-control-sm form-control-success ");
                            $('#create_vin').parent().parent().attr("class", "form-group");
                            $('#create_vin').parent().children('small').hide();                           


}