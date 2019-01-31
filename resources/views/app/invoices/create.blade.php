

@extends('app.main')
@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@stop
@section('bar')
@include('app.invoices.nav-bar')
@stop
@section('sub-content')


@section('sub-content')
<form action="{{route('invoice.store')}}" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="due" id="due">
  <input type="hidden" name="dealer_id" id="dealer_invoice" value="{{$dealer->id}}">
  <input type="hidden" name="due_by" value="{{$dueDate}}">
  <input type="hidden" name="is_dealer" value="{{$dealer->manager}}">


<div class="row">
<div class="col-md-3">
      <small>
    <li class="lead list-group-item bg-dark text-danger text-center">Customer Information  </li>
    <li class="list-group-item"><b>Address:</b> {{$dealer->address()}}  </li>
    <li class="list-group-item"><b>Phone:</b> {{$dealer->phone}}  </li>
    <li class="list-group-item"><b>E-mail:</b> {{$dealer->email}}  </li>
    @if($dealer->manager)<li class="list-group-item"><b>Manager: </b> {{$dealer->manager}}  </li>@endif

</small>

</div>

<div class="col-md-6 text-center " >
    <h1 class="display-4">{{$dealer->name}}</h1>
    @if($dealer->logo)
        <img src="/img/logos/{{$dealer->logo}}.jpg" width="150px" height="100px">
@endif
</div>

<div class="col-md-3 ">
    <li class="lead list-group-item bg-dark text-danger text-center">Details invoice  </li>
       <li class="list-group-item">    Due Date: <b>{{$dueDate}}</b></li>
       <li class="list-group-item">    cars: <b id="count_cars"></b></li>
     <li class="list-group-item" >     Due: <b id="duetxt"></b>        </li>
   
     @if($dealer->manager)
     <!-- CHECK THIS  -->

    <button type="submit" class="btn btn-success btn-lg btn-block">
      <li class="list-group-item btn bg-success text-white">

      <i class="fa fa-car"></i> Create Invoice 
    </li>
  </button type="submit"> 
 @else 

<li class="list-group-item"> <select class="form-control form-control-sm" name="payment_id" required="true">
<option value="">Select a Payment method</option>
         @foreach(App\Models\Payment::get() as $pay)
        <option value='{{ $pay->id }}' >{{ $pay->name }}</option>
        @endforeach
        </select></li>
<button type="submit" class="btn btn-success btn-lg btn-block">
      <li class="list-group-item btn bg-success text-white">

     <i class="fa fa-money-check-alt"></i> Pay 
    </li>
  </button type="submit"> 
     @endif

</div>




</div>
</form>

<hr>

<div class="row ">

 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Car</th>
                      @if($dealer->stock) <th>Stock </th>@endif
                      <th>Extras</th>
                      <th>Price</th>
                      <th>Options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($cars as $car)                       
                    <tr class="item_{{$car->id}}">
                         <td class="invoice_carname_{{$car->id}}"><a href="{{ route('car.show', $car)}}" class="text-dark" ><small>{{$car->name() }}</small></a></td>
                         @if($dealer->stock)    <td>      {{$car->stock }}</td> @endif
                          <td class="invoice_carextras_{{$car->id}}"> 

@if(count($car->ex) > 0 )
 <small>Total: ${{$car->totalExtras()}}.00</small>
  @foreach($car->ex as $extra)
  <li><small>{{$extra->name}} + ${{$extra->price}}.00</small> </li>
  @endforeach @else<small>NO EXTRA</small>@endif

                          </td> 
                          <td class="invoice_carprice_{{$car->id}}">      {{$car->price }}</td> 


        <td>


 
    <a href="#" class="btn btn-sm btn-danger del " data-car="{{$car}}"><i class="fa fa-trash"></i></a>
    <a href="#" class=" btn btn-sm btn-warning" id="edit-car-invoice"  data-id="{{$car->id}}"  ><i class="fa fa-edit"></i></a>




                  </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>


</div>
   
                     @include('app.cars.partials.modal')

 
@endsection

@section('js')
    <script src="/js/demo/datatables-demo.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
<script>
$(document).on('click', '#edit-car-invoice', function(e)
 { 
e.preventDefault();

document.clear()

var id = $(this).data('id');

 getCar(id);

  $('#fid').val(id);
$("#dealer_id").attr("disabled","true");

  $('#mostrar').hide();
  $('#setEmployee').hide();
  $('#create-blade').hide();
  $('#editar-blade').show();
  $('#btn-modal').addClass( "btn-update-car-invoice" );

  $('#btn-modal').addClass( "btn-success" );
  $("#btn-modal").attr("data-dismiss","modal");
  $('#btn-txt').text( "Update" );
  $('#fa-btn-modal').addClass( "fa-forward" );
  $('#modal').addClass( "bd-example-modal-lg" );
  $('#modal').modal('show');
  $('.modal-title').text("Edit car" );

  });


$(document).on('click', '.btn-update-car-invoice', function(e) { 

  e.preventDefault();
  var id = $("#fid").val();
  var token = $('input[name=_token]').val();
  var ex = $('#extras').val();
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
      'color': $('#color_edit').val(),
      'employee_id':$('#employee_id_edit').val(),
      'dealer_id':$('#dealer_id_edit').val(),
      'service_id':$('#service_id_edit').val(),
      'body_style_id':$('#body_style_id_edit').val(),
      'color':$('#color_edit').val(),
      'stock':$('#stock_edit').val(),
      'note':$('#note_edit').val(),
      'price':$('#price_edit').val(),
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
    


 $('.invoice_carname_' + id).replaceWith("<td class='invoice_carname_"+ id + "' ><small>" + data.carName + "</small></td>");
 $('.invoice_carprice_' + id).replaceWith("<td class='invoice_carprice_"+ id + "' >" + data.car.price + "</td>");


  if(data.car_total_extras > 0){
$('.invoice_carextras_' + id).replaceWith("<td class='invoice_carextras_"+ id + "' >" +
 "<small>Total: $ "+ data.car_total_extras+".00</small>"+
 "</td>");
}else{
  $('.invoice_carextras_' + id).replaceWith("<td class='invoice_carextras_"+ id + "' ><small>NO EXTRA</small></td>"); 

}

data.car_extras.forEach(element => {
          $(".invoice_carextras_"+id).append(`<li > <small>${element.name} + $ ${element.price}.00 </small></li>`);
        });
console.log(data.car_extras);
                },error: function(data){
                  console.log(data.responseJSON.message);
                }
  });

  $('#btn-modal').removeClass( "btn-success" );
  $('#fa-btn-modal').removeClass( "fa-forward" );
  $('#btn-modal').removeClass( "btn-update-car-invoice" );


getDataInvoice();


});



$(document).ready(function (){

getDataInvoice();

});



$(document).on('click','.del', function(e){
  //{{ route('car.ready', $car)}}
e.preventDefault();

var car = $(this).data('car');
var id = (car.id);
var token = $('input[name=_token]').val();



$.ajax({
  type:'POST',
  url:'/delete_car_invoice',
  data:{
    '_token' :token,
    'id': id
  },
  success: function(data){

swal({
  position: 'top-end',
  type: 'success',
  title: 'the car '+ data.make +' has been deleted from invoice',
  showConfirmButton: false,
  timer: 1500
});


getDataInvoice();

            $(".item_"+id).hide(2500);


  }


})









});

function getDataInvoice(){

 $.ajax({
  type:'get',
  url:'/getDataInvoice',
  data:{
    '_token' :$('#token').val(),
    dealer : $("#dealer_invoice").val()
  },
  success: function(data){
console.log(data);
 $("#count_cars").text(data.count_cars);
 $("#duetxt").text('$ '+data.price+'.00 USD');
 $("#due").val(data.price);

  }


});
}

</script>

    <script src="/js/car/edit.js"></script>

@stop

