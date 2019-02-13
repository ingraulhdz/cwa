@extends('app.main')
@include('app.dealers.nav-bar')
@section('css')

  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

 
@stop

@section('sub-content')
@include('app.dealers.top_info')


 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Dealer</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Contact</th>
                      <th>Status</th>
                      <th>Options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($dealers as $dealer)                       
                    <tr>
                      <td><a href="{{ route('dealer.show', $dealer)}}" class="text-dark">{{$dealer->name}}</a></td>
                      <td>{{$dealer->phone}}</td>
                      <td>{{$dealer->email}}</td>
                      <td>{{$dealer->address}}, {{$dealer->city}}, IL {{$dealer->zip_code}} </td>
                      <td>{{$dealer->contact}} <small>|{{$dealer->contact_phone}}</small></td>
                                            <td>
@if($dealer->status) <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Active</span>@else
  <span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> Inactive</span>

@endif
                      </td>
                  <td>
                   


 <form action="{{route('dealer.destroy', $dealer)}}" method="POST">
                  
     <input type="hidden" name="_method" value="DELETE">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
@if($dealer->status)   <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>@else
   <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i></button>

@endif

 <a href="{{ route('dealer.show', $dealer)}}" class="btn-sm btn-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('dealer.edit', $dealer)}}" class="btn-sm btn-warning"><i class="fa fa-edit"></i></a>

</form>






                  </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
   
@endsection

@section('js')
   <script src="vendor/datatables/jquery.dataTables.min.js"></script>

  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="js/demo/datatables-demo.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>

  <script src="js/demo/chart-bar-demo.js"></script>

@stop

