@extends('app.main')
@include('app.services.nav-bar')

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
                      <th>Vehicle types</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Options</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody>
          @foreach($services as $service)                       
                    <tr>
                      <td>{{$service->name}}</td>
                      <td>{{$service->description}}</td>
                      <td>@if($service->body_style) {{ $service->service->name}} @else All Types @endif</td>
                      <td>${{$service->price}}.00</td>
                                           <td>
@if($service->status) <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Active</span>@else
  <span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> Inactive</span>

@endif
                      </td>
                  <td>

<form action="{{route('service.destroy', $service)}}" method="POST">
     <input type="hidden" name="_method" value="DELETE">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
@if($service->status)   <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>@else
   <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i></button>

@endif

                    <a href="{{ route('service.edit', $service)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('service.show', $service)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
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

