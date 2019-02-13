@extends('app.main')
@include('app.users.nav-bar')

@section('css')
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
@stop


@section('sub-content')
 <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Name</th>
                      <th>type of employee</th>
                      <th>Status</th>
                      <th>options</th>
                     
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($users as $user)                       
                    <tr>
                      <td>{{$user->email}}</td>
                      <td>{{$user->employee->name}} {{$user->employee->last_name}}</td>
                      <td>{{$user->employee->rol->name}} </td>
                     
                              <td>
@if($user->status) <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Active</span>@else
  <span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> Inactive</span>

@endif
                      </td>
                  <td>  
                   
<form action="{{route('user.destroy', $user)}}" method="POST">
     <input type="hidden" name="_method" value="DELETE">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
@if($user->status)   <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>@else
   <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i></button>

@endif

  

<a href="{{ route('user.edit', $user)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('user.show', $user)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>

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

