$(document).on('click','.ready', function(e){
  //{{ route('car.ready', $car)}}
e.preventDefault();

var id = $(this).data('id');
var token = $('input[name=_token]').val();

ready(id);

	getCars();






function ready(id){



$.ajax({
	type:'POST',
	url:'/ready_car',
	data:{
		'_token' :token,
		'id': id
	},
	success: function(data){


if(data.employees){

console.log(data.employees);
		

setEmployee(data.employees, data.id);




}
else{
	
swal({
  position: 'top-end',
  type: 'success',
  title: 'the car '+ data.make +' has been set to ready',
  showConfirmButton: false,
  timer: 1500
});
		        $("."+id).hide(2500);



}


	}


})

}








});