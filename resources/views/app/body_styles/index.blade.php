@extends('app.main')
@include('app.body_styles.nav-bar')

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
          @foreach($body_styles as $body_style)                       
                    <tr>
                      <td>{{$body_style->name}}</td>
                      <td>{{$body_style->description}}</td>
                                           <td>
@if($body_style->status) <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Active</span>@else
  <span class="badge badge-pill badge-danger"><i class="fa fa-times"></i> Inactive</span>

@endif
                      </td>
                  <td>

<form action="{{route('body_style.destroy', $body_style)}}" method="POST">
     <input type="hidden" name="_method" value="DELETE">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
@if($body_style->status)   <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>@else
   <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i></button>

@endif

     <a href="{{ route('body_style.edit', $body_style)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('body_style.show', $body_style)}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                
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

