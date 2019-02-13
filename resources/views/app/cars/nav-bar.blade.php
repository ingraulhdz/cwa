@section('module_name')
   <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-car fa-sm fa-fw text-gray-400"></i>
Cars </h6>

@endsection

@section('options')
  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Options:</div>
                      <a class="dropdown-item" href="#" id="create-modal">Add Car</a>
                      <a class="dropdown-item"  href="{{url('car.print')}} ">Export</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{route('car.customer')}}">Customer Car</a>
                    </div>
@endsection