@section('options')
  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Customer Options:</div>
                      <a class="dropdown-item" href="{{route('customer.create')}}">Add</a>
                      <a class="dropdown-item" href="{{url('customer.export')}}">Export</a>
                      <div class="dropdown-divider"></div>
                    </div>

@endsection