@extends('app.main')
@include('app.cars.nav-bar')
@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('sub-content')

<div class="row">

       <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><b id=""></b> New arrived</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><label id="inshop_cars"></label></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                 <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><b id=""></b>Ready</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><label id="ready_cars"></label></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                 <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Done</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><label id="done_cars"></label></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

                 <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><b id=""></b>Due</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><label id="due_cars"></label></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


     
                     
  </div>



 <div class="table-responsive">
                <table class="table table-bordered table-striped" id="carsTable" width="100%" cellspacing="0">
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

  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script>

$(document).ready(function (){
$("#carsTable").dataTable();
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
    url:'/getCars',
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

