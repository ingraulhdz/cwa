@extends('app.main')
@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@stop

@section('bar')
@include('app.invoices.nav-bar')
@stop
@section('sub-content')
{{$cars->dealer}}
<div class="row">

  <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-car"></i>
                  </div>
                  <div class="mr-5"><b>{{count( $cars->where('level',1)->orWhere('level',2)->get())}}</b> Cars!</div>
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
                    <i class="fas fa-fw fa-envelope-open"></i>
                  </div>
                  <div class="mr-5"><b>{{$invoice->due()->count()}}</b> Open Invoices!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('invoice.open')}}">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>



            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-envelope"></i>
                  </div>
                                    <div class="mr-5"><b>{{$invoice->where('is_paid',1)->count()}}</b> Paid Invoices!</div>

                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{url('invoice.paid')}}">
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
                  <div class="mr-5"><b> $ {{$cars->ready()->sum('price')}} .00</b> Due!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
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
                      <th>options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($cars->where('level',1)->orWhere('level',2)->get() as $car)                       
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
                          @if($car->level == 1 )
 <a href="#" class="btn-sm btn-warning to_invoice item_status_{{$car->id}}" data-id="{{$car->id}}" ><i class="fa fa-envelope"></i></a>
@else
<span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Done</span>
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
    <script src="/js/demo/datatables-demo.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script >
      
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






  }
});


});
    </script>

@stop

