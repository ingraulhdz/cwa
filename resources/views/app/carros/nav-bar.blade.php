 @section('module_name')
   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-building fa-sm fa-fw text-gray-400"></i>
<a href="{{route('carro.index')}}">Cars</a> </h6>

@endsection

@section('options')
 <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Options:</div>
                      <a class="dropdown-item"  href="{{route('carro.create')}}">  <i class="fas fa-plus fa-sm fa-fw text-gray-600"></i> Add</a>
                      <a class="dropdown-item"  href="{{url('carro.print')}}">  <i class="fas fa-file fa-sm fa-fw text-gray-600"></i> Export</a>
                      <div class="dropdown-divider"></div>
                    </div>

@endsection