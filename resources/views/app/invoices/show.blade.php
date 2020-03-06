

@extends('app.main')
@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@stop
@section('bar')
@include('app.invoices.nav-bar')
@stop
@section('sub-content')


@section('sub-content')

<div class="row">
<div class="col-md-3">
      <small>
    <li class="lead list-group-item bg-dark text-danger text-center">Customer Information  </li>
    <li class="list-group-item"><b>Address:</b> @if($invoice->dealer) {{$invoice->dealer->address()}}  @else {{$invoice->customer->address()}} @endif</li>
    <li class="list-group-item"><b>Phone:</b> @if($invoice->dealer) {{$invoice->dealer->phone}}  @else {{$invoice->customer->phone}} @endif</li>
    <li class="list-group-item"><b>E-mail:</b> @if($invoice->dealer) {{$invoice->dealer->email}} @else {{$invoice->customer->email}} @endif </li>
    @if($invoice->dealer)<li class="list-group-item"><b>Manager: </b> @if($invoice->dealer) {{$invoice->dealer->manager}} @endif </li>@endif
 <li class="list-group-item">
  <a href="{{url('invoice.print', $invoice) }}" class=" btn btn-sm btn-info" target="_blank"><i class="fa fa-print"> </i> <small>Print</small></a> 
  @if($invoice->is_paid)
</li>
   <li class="list-group-item">  <label class="badge badge-pill badge-success"><i class="fa fa-check"></i> Paid</label> Method {{$invoice->payment->name}}<br>

</li>
@else

     <a href="{{url('invoice.send', $invoice) }}" class=" btn btn-sm btn-warning" ><i class="fa fa-envelope-open-text"> </i> <small>Send Again</small></a>
</li>

 <li class="list-group-item">

 <form class="form-inline my-2 my-lg-0" action="{{ url('invoice.pay') }}" method="POST">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{$invoice->id}}">
<input type="hidden" name="_method" value="POST">

   <div class="input-group">
    <select class="form-control border border-success" name="payment_id" value="{{ old('dealer_id') }}" required="true">
         <option value="">Select a Payment method</option>
         @foreach(App\Models\Payment::get() as $pay)
        <option value='{{ $pay->id }}' >{{ $pay->name }}</option>
        @endforeach
        </select>          <div class="input-group-append">
            <button class="btn btn-success" type="submit">
           <small>   <i class="fas fa-money-check-alt"></i> Pay</small>
            </button>
          </div>
        </div>

    </form>

</li>

@endif 



</small>

</div>

<div class="col-md-6 text-center " >
    <h1 class="display-4">@if($invoice->dealer) {{$invoice->dealer->name}} @else {{$invoice->customer->name}}@endif</h1>
    @if($invoice->dealer)    <img src="/img/logos/{{$invoice->dealer->logo}}.jpg" width="150px" height="100px">@endif

</div>

<div class="col-md-3 "><small>
  <li class="lead list-group-item bg-dark text-danger text-center">Details invoice  </li>
   <li class="list-group-item">Updated at: <b>{{$invoice->updated_at}}</b></li>
  <li class="list-group-item">    Due Date: <b>{{$invoice->due_by}}</b></li>
  <li class="list-group-item">    Send Times: <b>{{$invoice->send_times}}</b></li>
   <li class="list-group-item">   cars: <b>{{$invoice->cars->count()}}</b></li>
  <li class="list-group-item">     Amount: <b>$ {{$invoice->due}}.00</b>        </li>   
   
</small></div>




</div>

<hr>

<div class="row ">

 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Car</th>
                      <th>Stock</th>
                      <th>Extras</th>
                      <th>Price</th>
                 
                    </tr>
                  </thead>
                 
 <tbody>
          @foreach($invoice->cars as $car)                       
                    <tr>
                         <td><a href="{{ route('car.show', $car)}}" class="text-dark" ><small>{{$car->name() }}</small></a></td>
                          <td>      {{$car->stock }}</td> 
                          <td> 

@if(count($car->ex) > 0 ) <small>Total: ${{$car->totalExtras()}}.00 @foreach($car->ex as $extra)<li><small>{{$extra->name}} + ${{$extra->price}}.00</small> </li>@endforeach @else Nothing Extra @endif

                          </td> 
                          <td>      {{$car->price }}</td> 


                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>


</div>


@endsection

@section('js')
    <script src="/js/demo/datatables-demo.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>

@stop

