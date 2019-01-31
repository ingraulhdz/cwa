@extends('app.employees.main')
@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@stop

@section('sub-content')

 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Rol</th>
                      <th>Status</th>
                      <th>Options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($employees as $employee)                       
                    <tr>
                      <td><a href="{{ route('employee.show', $employee)}}">{{$employee->name}} {{$employee->last_name}}</a></td>
                      <td>{{$employee->phone}}</td>
                      <td>{{$employee->email}}</td>
                      <td>{{$employee->address}}, {{$employee->city}}, IL {{$employee->zip_code}} </td>
                      <td>{{$employee->rol->name}}</td>
                      <td>
@if($employee->status) <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Active</span>@else
  <span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> Inactive</span>

@endif
                      </td>
                  <td>
                   
<form action="{{route('employee.destroy', $employee)}}" method="POST">
     <input type="hidden" name="_method" value="DELETE">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
@if($employee->status)   <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>@else
   <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i></button>

@endif

 <a href="{{ route('employee.show', $employee)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
  <a href="{{ route('employee.edit', $employee)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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

