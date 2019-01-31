@extends('app.main')
@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@stop
@section('subtitle', '/ Close')

@section('bar')
@include('app.invoices.nav-bar')
@stop
@section('sub-content')

<div class="row">
   
   <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-car"></i>
                  </div>
                  <div class="mr-5"><b>{{count($cars->paid())}}</b> Paid Cars!</div>
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
              <div class="card text-white bg-dark o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-envelope"></i>
                  </div>
                  <div class="mr-5"><b>{{$invoices->count()}}</b> Close Invoices</div>
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
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-building"></i>
                  </div>
                  <div class="mr-5"><b> {{count($cars->paid()->groupBy('dealer_id'))}}</b> Dealers</div>
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
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                  </div>
                  <div class="mr-5"><b> $ {{$invoices->where('is_paid',1)->sum('due')}} .00</b> Sales</div>
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
                      <th>Updated at</th>
                                         <th>cars</th>
   <th>Due</th>
   <th>Status</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($invoices->get() as $invoice)                       
                    <tr>
                                   <td>     <a href="{{ route('invoice.show', $invoice)}}" >   {{$invoice->id}} </a>    </td>                              

                                    <td>@if($invoice->dealer) {{$invoice->dealer->name}} @else {{$invoice->customer->name }}@endif</td> <td>{{$invoice->updated_at}}</td>
                                    <td>{{$invoice->cars->count()}}</td>    <td>${{$invoice->due}}.<small>00</small></td>
                                                                    

                                <td>


   <a href="{{ route('invoice.show', $invoice)}}" class="btn btn-primary     btn-sm"> <i class="fa fa-eye"></i> </a>
   <a href="{{ url('invoice.print', $invoice)}}" class="btn btn-dark btn-sm" target="_blank"> <i class="fa fa-print text-danger"></i> </a>

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

