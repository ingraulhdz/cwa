@extends('app.main')
@include('app.payments.nav-bar')

@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@stop


@section('sub-content')
 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($payments as $payment)                       
                    <tr>
                      <td>{{$payment->name}}</td>
                      <td>{{$payment->description}}</td>
                         <td>
@if($payment->status) <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Active</span>@else
  <span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> Inactive</span>

@endif
                      </td>
                  <td>

<form action="{{route('payment.destroy', $payment)}}" method="POST">
     <input type="hidden" name="_method" value="DELETE">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
@if($payment->status)   <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>@else
   <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i></button>

@endif

                    <a href="{{ route('payment.edit', $payment)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('payment.show', $payment)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
</form>
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

