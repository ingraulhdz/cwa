@extends('app.main')
@include('app.carros.nav-bar')

@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@stop


@section('sub-content')
 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Car</th>
                      <th>Dealer</th>
                      <th>Detailer</th>
                      <th>Status</th>
                      <th>Options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($carros as $carro)                       
                    <tr>
                      <td>{{$carro->year}} {{$carro->make}} {{$carro->model}} #{{$carro->vin}}</td>
                      <td>{{$carro->dealer->name}} </td>
                      <td>{{$carro->employee->name}} </td>
                 
                              <td>
@if($carro->status) <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Active</span>@else
  <span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> Inactive</span>

@endif
                      </td>
                  <td>  
                   
<form action="{{route('carro.destroy', $carro)}}" method="POST">
     <input type="hidden" name="_method" value="DELETE">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
@if($carro->status)   <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>@else
   <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i></button>

@endif

  

<a href="{{ route('carro.edit', $carro)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('carro.show', $carro)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>

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

