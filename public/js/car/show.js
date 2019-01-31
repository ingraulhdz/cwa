
  $(document).on('click', '#show-modal', function() { 

var id = $(this).data('id');
	console.log('show '+id);
$('#btn-modal').addClass( "btn-info" );
$("#btn-modal").attr("data-dismiss","modal");
$('#btn-txt').text( "Close" );
$('#fa-btn-modal').addClass( "fa-times" );
 

  $.ajax({
	type:'GET',
	url:'get-car',
	dataType:'JSON',
	data:{
		'id':id,
		'_token':$('#token').val(),
	},
	success: function (data){
if(data.employee){
	var employee = data.employee.name;
}else{
	var employee = '<span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-triangle"></i> Not Asigned!</span>';
}

$('.modal-title').text(data.car.year +" "+ data.car.make +" "+ data.car.model);


if(data.dealer){
	var customer_name= data.dealer.name;
		var customer_address= data.dealer.address + ", "+ data.dealer.city  + ", IL.  " + data.dealer.zip_code + ".";
		var customer_email= data.dealer.email;
		var customer_phone= data.dealer.phone;
	}else{

	var customer_name= data.customer.name;
		var customer_address= data.customer.address + ", "+ data.customer.city  + ", IL.  " + data.customer.zip_code + ".";
		var customer_email= data.customer.email;
		var customer_phone= data.customer.phone;

	}



	$(
'#customer_name').text(customer_name);
	$('#customer_address').text(customer_address);
	$('#customer_email').text(customer_email);
	$('#customer_phone').text(customer_phone);
	$('#show_vin').text(data.car.vin);
	$('#show_color').text(data.car.color);
	$('#show_price').text(data.car.price);
	$('#show_stock').text(data.car.stock);
	$('#show_year').text(data.car.year);
	$('#show_employee').html(employee);
	$('#show_extras_list').empty();

if(data.extras != null)
{
data.extras.forEach(element => {
          $("#show_extras_list").append("|"+element.name+"| ");

        });
}
$('#btn-modal').removeClass( "btn-info" );

$('#fa-btn-modal').removeClass( "fa-times" );


/*	$('#year').val(data.year);
	$('#vin').val(data.vin);

	*/

	}
});





$('#modal').modal('show');
  $('#mostrar').show();
  $('#setEmployee').hide();
  $('#editar-blade').hide();
  $('#create-blade').hide();








  });