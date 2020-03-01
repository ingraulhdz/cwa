$(document).on('click', '#edit-modal', function(e)
 { 
e.preventDefault();


document.clear()

var id = $(this).data('id');

 getCar(id);

	$('#fid').val(id);

	$('#mostrar').hide();
	$('#setEmployee').hide();
	$('#create-blade').hide();
	$('#editar-blade').show();
	$('#btn-modal').addClass( "btn-update" );

	$('#btn-modal').addClass( "btn-success" );
	$("#btn-modal").attr("data-dismiss","modal");
	$('#btn-txt').text( "Update" );
	$('#fa-btn-modal').addClass( "fa-forward" );
	$('#modal').addClass( "bd-example-modal-lg" );
	$('#modal').modal('show');

  });


$(document).on('click', '.btn-update', function(e) { 

	e.preventDefault();
	var id = $("#fid").val();
	var token = $('input[name=_token]').val();
	var ex = $('#extras_edit').val();
    var extras = JSON.stringify(ex);

	$.ajax(
	{
		type:'POST',
		url:'/update-car',
		data:{
		  '_token': token,
		  'id': id,
		  'make': $('#make_edit').val(),
		  'model': $('#model_edit').val(),
		  'year': $('#year_edit').val(),
		  'vin': $('#vin_edit').val(),
		  'color': $('#color').val(),
		  'employee_id':$('#edit_employee_id').val(),
		  'dealer_id':$('#edit_dealer_id').val(),
		  'service_id':$('#edit_service_id').val(),
		  'body_style_id':$('#edit_body_style_id').val(),
		  'color':$('#edit_color').val(),
		  'stock':$('#edit_stock').val(),
		  'note':$('#edit_note').val(),
		  'price':$('#edit_price').val(),
		  'extras':extras

	  			},
		success: function(data){
		  swal(
		  {
			  position: 'top-end',
			  type: 'success',
			  title: 'the car '+ data.carName +' has been updated',
			  showConfirmButton: false,
			  timer: 1500
		  });
		

if(data.employee){
	var employee = data.employee.name;
}else{
	var employee = '<span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-triangle"></i> Not Asigned!</span>';
}



 $('.td-name-' + id).replaceWith("<td class='td-name-"+ id + "' >" + data.carName + "</td>");
 $('.td-employee-' + id).replaceWith( "<td class='td-employee-"+ id + "'>" + employee + "</td>");
 $('.td-dealer-' + id).replaceWith("<td class='td-dealer-"+ id + "'>" + data.dealer.name + "</td>");
								}
	});

	$('#btn-modal').removeClass( "btn-success" );
	$('#fa-btn-modal').removeClass( "fa-forward" );
	$('#btn-modal').removeClass( "btn-update" );




});



function getCar(id){

 $.ajax({
	type:'GET',
	url:'/get-car',
	dataType:'JSON',
	data:{
		'id':id,
		'_token':$('#token').val(),
	},
	success: function (data){
		$('#modal-title').text("Edit Car: "+data.car.year +" "+ data.car.make +" "+ data.car.model);
console.log(data.car);
				$('#make_edit').val(data.car.make);
		$('#model_edit').val(data.car.model);
		$('#year_edit').val(data.car.year);
		$('#vin_edit').val(data.car.vin);
		$('#edit_price').val(data.car.price);
		$('#edit_stock').val(data.car.stock);
		$('#edit_color').val(data.car.color);
		$('#edit_note').val(data.car.note);
		$('#edit_body_style_id').val(data.car.body_style_id);
		$('#edit_service_id').val(data.car.service_id);
		$('#edit_dealer_id').val(data.car.dealer_id);

	$("#extras_edit option:selected").removeAttr("selected");



if(data.extras.length > 0){
data.extras.forEach(element => {
var valor = $(".ex_"+element.id).val();
if(data.extras.id = valor){
						$('.ex_'+element.id).attr("selected","true");

}else{

							$('.ex_'+element.id).removeAttr("selected","true");

}

				});
}else{	

	$("#extras_edit option:selected").removeAttr("selected");

}


		
			if(data.dealer){
				$('#text_customer').text("DEALER");
				$("#ctm").hide();
				$("#dealer").show();
				$("#edit_dealer_id").empty();
				$("#edit_dealer_id").append(`<option value=${data.car.dealer_id} selected> ${data.dealer.name} </option>`);

				data.dealers.forEach(element => {
					$("#edit_dealer_id").append(`<option value=${element.id}> ${element.name} </option>`);
				});

		}else{		
			$("#dealer").hide();
			$('#ctm').show();
			$("#edit_dealer_id").empty();
			$('#text_customer').text("CUSTOMER");
			
			$('#ctm_name').text( data.customer.name );
			$('#ctm_phone').text( data.customer.phone );
			$('#ctm_email').text( data.customer.email );
			$('#ctm_address').text( data.customer.address+", "+ data.customer.city +", Il "+ data.customer.zip_code );

		}


	

	},error: function(data){
		console.log('la and');
	}
});

return '';


}
