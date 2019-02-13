@extends('main')
@section('head', '- Extras')



@section('content')

   <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                 <h6 class="m-0 font-weight-bold text-primary">
                                                    @yield('module_name')
                                                  </h6>

                  <div class="dropdown no-arrow">

                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    
                                    @yield('options')
  
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


