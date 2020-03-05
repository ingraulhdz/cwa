@extends('app.main')
@include('app.invoices.nav-bar')

@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

@stop


@section('sub-content')
{{$cars->dealer}}
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Due </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><b id='due'></b></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Cars </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><b id='cars'></b></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dealers</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><b id='dealers'></b></div>
                        </div>
                      <!--   <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div> -->
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Invoiced Car</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><b id='invoiced'></b></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

 <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Car</th>
                      <th>Detailer</th>
                      <th>Customer</th>
                      <th>Options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($cars->where('level_id',2)->orWhere('level_id',3)->get() as $car)                       
                    <tr class="item_{{$car->id}}" >
                         <td><a href="{{ route('car.show', $car)}}" class="text-dark" ><small>{{$car->name() }}</small> </a></td>

                         <td>@if($car->employee)
                         <a href="{{ route('employee.show', $car->employee)}}" class="text-dark" > {{$car->employee->name}} </a>
                          @else <span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-triangle"></i> Not Asigned!</span>
                         @endif
                         </td>           

           <td>
                        @if($car->dealer ) <a href="{{ route('dealer.show', $car->dealer)}}" class="text-dark" >      {{$car->dealer->name}} </a>
                         @else     <a href="{{ route('customer.show', $car->customer)}}" class="text-dark" >    {{$car->customer->name}}  </a> 
                           @endif
                      </td>
             <td>

                @if($car->customer )
 <a href="{{url('customer.invoice', $car) }}" class="btn btn-sm btn-info"><i class="fa fa-money-check-alt"></i> <small>Pay</small></a>

@else
                          @if($car->level_id == 2 )
                               <a href="#" class="btn-sm btn-warning to_invoice item_status_{{$car->id}}" data-id="{{$car->id}}" ><i class="fa fa-envelope-open"></i> </a>
                                                          @endif

                                                        @if($car->level_id == 4 )

                              <span class="badge badge-pill badge-warning"><i class="fa fa-warning"></i> </span>
                           @endif


                                                        @if($car->level_id == 3 )

                              <span class="badge badge-pill badge-success"><i class="fa fa-envelope"></i> </span>
                           @endif



@endif 
             </td>



                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
   
@endsection

@section('js')
   <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script >
      
      $(document).ready( function (){
        $("#dataTable").dataTable();

      });
      $(document).on('click','.to_invoice', function(e){
e.preventDefault();
var id = $(this).data('id');
var token = $('input[name=_token]').val();





$.ajax({
  type:'POST',
  url:'/to_invoice',
  data:{
    '_token' :token,
    'id': id
  },
  success: function(data){
  
swal({
  position: 'top-end',
  type: 'success',
  title: 'the car '+ data.make +' has redy to invoice',
  showConfirmButton: false,
  timer: 1500
});

$(".item_status_"+id).replaceWith("<span class='badge badge-pill badge-success'><i class='fa fa-check'></i> Done</span>");

getDataInvoice();




  }
});


function getDataInvoice(){


$.ajax({
  type:'GET',
  url:'/getDataInvoiceIndex',
  data:{
    '_token' :token,
    'id': id
  },success: function (data){
    $("#cars").text(data.cars);
    $("#dealers").text(data.dealers);
    $("#invoiced").text(data.invoiced);
    $("#due").text(data.due);
  }
});


}


});
    </script>

@stop

