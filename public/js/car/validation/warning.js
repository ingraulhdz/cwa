
$.ajax({
	type:'GET',
	url:'/get-year',
	dataType:'JSON',
	data:{
		'year':year,
		'_token':$('#token').val(),
	},
	success: function (data){
	$('#make').val(data.car.make);
	$('#model').val(data.car.model);
	$('#year').val(data.car.year);
	$('#vin_edit').val(data.car.vin);
	

	if(data.dealer){
		$('#text_customer').text("DEALER");
		$("#ctm").hide();
		$("#dealer").show();
		$("#dealer_id").empty();
		$("#dealer_id").append(`<option value=${data.car.dealer_id} selected> ${data.dealer.name} </option>`);

		data.dealers.forEach(element => {
			$("#dealer_id").append(`<option value=${element.id}> ${element.name} </option>`);
		});

}else{		
	$("#dealer").hide();
	$('#ctm').show();
	$("#dealer_id").empty();
	$('#text_customer').text("CUSTOMER");
	
	$('#ctm_name').text( data.customer.name );
	$('#ctm_phone').text( data.customer.phone );
	$('#ctm_email').text( data.customer.email );
	$('#ctm_address').text( data.customer.address+", "+ data.customer.city +", Il "+ data.customer.zip_code );

}


	

	}
});

return '';



