@extends('main')
@section('head', '- Employees')



@section('content')




       <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users fa-sm fa-fw text-gray-400"></i>
Employees</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Options:</div>
                      <a class="dropdown-item" href="{{route('employee.create')}}">Add Employee</a>
                      <a class="dropdown-item" href="{{url('employee.export')}}">Export</a>
                      <div class="dropdown-divider"></div>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @yield('sub-content')

                </div>  <div class="card-footer small ">
      <font class="float-left text-muted" > Updated yesterday at 11:59 PM</font>

    </div>
              </div>



@endsection


