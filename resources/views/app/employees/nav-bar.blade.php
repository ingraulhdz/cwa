 @section('module_name')
  <i class="fas fa-users fa-sm fa-fw text-gray-400"></i>
Employees 

@endsection

@section('options')
 <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Options:</div>
                      <a class="dropdown-item"  href="{{route('employee.create')}}">  <i class="fas fa-plus fa-sm fa-fw text-gray-600"></i> Add</a>
                      <a class="dropdown-item"  href="{{url('employee.print')}}">  <i class="fas fa-file fa-sm fa-fw text-gray-600"></i> Export</a>
                      <div class="dropdown-divider"></div>
                    </div>

@endsection