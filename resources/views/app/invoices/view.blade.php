@extends('app.main')
@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@stop
@section('subtitle', '/ Open')

@section('bar')
@include('app.invoices.nav-bar')
@stop
@section('sub-content')


<div class="row">
         

  <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-car"></i>
                  </div>
                  <div class="mr-5"><b>{{count( $cars->invoice())}}</b> Cars invoiced</div>
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
                  <div class="mr-5"><b> $ {{$invoices->sum('due')}} .00</b> Due!</div>
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
               <th>#</th>
                      <th>Customer</th> 
                      <th>Due Date</th>
                                         <th>cars</th>
   <th>Due</th>
   <th>Options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($invoices as $invoice)                       
                    <tr>
                                   <td>
                                        <a href="{{ route('invoice.show', $invoice)}}" >   {{$invoice->id}} </a>
                                            </td>                              

                                    <td> @if($invoice->dealer)
                                      <a href="{{ route('dealer.show', $invoice->dealer_id)}}" class="text-dark"> {{$invoice->dealer->name}}</a>@else
                                      <a href="{{ route('customer.show', $invoice->customer_id)}}" class="text-dark"> {{$invoice->customer->name}}</a>@endif

                                    </td> <td>{{$invoice->due_by}}</td>
                                    <td>{{$invoice->cars->count()}}</td>    <td>${{$invoice->due}}.00</td>
                                                                    

                                <td>



                               <a href="{{ route('invoice.show', $invoice)}}" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i> View     </a>

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

@stop

