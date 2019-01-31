@extends('app.cars.main')
@section('css')



@stop

@section('sub-content')





<div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-home"></i>
                  </div>
                  <div class="mr-5"><b id="inshop_cars"></b> New Cars</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-check"></i>
                  </div>
                  <div class="mr-5"><b id="ready_cars"></b> Ready Cars</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('invoice')}}">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-envelope"></i>
                  </div>
                  <div class="mr-5"><b id="done_cars"></b> Done Cars </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('invoice.view')}}">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                  </div>
                  <div class="mr-5"><b id="due_cars"></b> Due cars</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('invoice.paid')}}">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>                        
  </div>



 <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Car</th>
                      <th>Detailer</th>
                      <th>Customer</th>
                      <th>Options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($cars->inShop() as $car)                       
                    <tr class="{{$car->id}}">

  <td class="td-name-{{$car->id}}"><a href="{{ route('car.show', $car)}}" class="text-dark" >  {{$car->name() }}
@if($car->customer) <span class="badge badge-pill badge-success" style="font-size: 8px"><i class="fa fa-user"></i> Customer</span> @endif
</a>    
</td>

            <td class="td-employee-{{$car->id}}">@if($car->employee)
                         <a href="{{ route('employee.show', $car->employee)}}" class="text-dark" > {{$car->employee->name}} </a>
                          @else <a href="#" id="no_empoyee" data-employees="{{App\Models\Employee::get()}}" data-id="{{$car->id}}"><span class="badge badge-pill badge-warning" ><i class="fa fa-exclamation-triangle"></i> Not Asigned!</span></a>
                         @endif
                         </td>           

           <td class="td-dealer-{{$car->id}}">
                        @if($car->dealer ) <a href="{{ route('dealer.show', $car->dealer)}}" class="text-dark" >      {{$car->dealer->name}} </a>
                         @else     <a href="{{ route('customer.show', $car->customer)}}" class="text-dark" >    {{$car->customer->name}}  </a>      @endif
                      </td>
                 

           <td class="td-options-{{$car->id}}">
                    <a href="#" class="btn btn-sm btn-info" id="show-modal" data-car="{{$car}}" data-id="{{$car->id}}" ><i class="fa fa-eye"></i></a>

                    <a href="#" class="btn btn-sm btn-warning" id="edit-modal"  data-id="{{$car->id}}" >
                      <i class="fa fa-edit text-white"></i></a>



                    <a href="#" class="btn btn-sm btn-success ready" data-car="{{$car}}" data-id="{{$car->id}}"><i class="fa fa-check"></i></a>

            <!--     @if($car->customer )
                    <a href="{{url('customer.invoice', $car) }}" class="btn btn-sm btn-success"><i class="fa fa-money-check-alt"></i> <small>Pay</small></a>
                @else -->
                <!-- @endif  -->
                  </td>
               </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>



                     @include('app.cars.partials.modal')





@endsection

@section('js')
    
<script>

$(document).ready(function (){

getCars();
});



$(document).on('click', '#no_empoyee', function(e)
{
var id = $(this).data('id');
var employees = $(this).data('employees');



setEmployee(employees,id);
});


function setEmployee(employees, id){
  var token = $('#token').val();
 var options = {};
        $.map(employees,
            function(o) {
                options[o.id] = o.name;
            });

swal({
  title: 'Who make the car?',
  type: 'question',
  input: 'select',
  inputOptions:  options,
  inputPlaceholder: 'required',
  showCancelButton: true,
  inputValidator: function (value) {

     return new Promise((resolve) => {
      if (value ) {
        resolve()
      } else {
        resolve('You need to select a detailer')
      }
    });

  }
}).then(function (result) {
var emp = result.value;
  if (result.value) {

$.ajax({
  type:'POST',
  url:'update-car',
  data:{
    '_token' :token,
    'id': id,
    'employee_id': emp
  },
success: function(data){
    swal({
      type: 'success',
      html: 'The '+ data.carName + ' was asigned to ' +data.employee.name
    });


     $('.td-employee-' + id).replaceWith( "<td class='td-employee-"+ id + "'>" + data.employee.name + "</td>");



},error: function(data){
  swal({
    title: ' Something was wrong',
    type: 'error'
  });
}});
  

  }
});


}



function getCars(){
$.ajax(
  {
    type:'GET',
    url:'getCars',
    data:{
    '_token':$('#token').val(),
  },
      success: function(data){
$('#inshop_cars').text(data.inshop_cars);
$('#ready_cars').text(data.ready_cars);
$('#done_cars').text(data.done_cars);
$('#due_cars').text(data.due_cars);
      }
    });

}



</script>

    <script src="/js/car/ready.js"></script>
    <script src="/js/car/edit.js"></script>
    <script src="/js/car/show.js"></script>
    <script src="/js/car/create.js"></script>

@stop

