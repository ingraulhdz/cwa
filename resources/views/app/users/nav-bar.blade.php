 @section('module_name')  <i class="fas fa-users fa-sm fa-fw text-gray-400"></i>

Users</h6><h6>

         <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="{{ route('invoice.create') }}" method="GET">
            <div class="input-group">
                 <select class="form-control bg-light border-0 small @if ($errors->any()) {{$errors->has('emp') ? 'is-invalid':'is-valid'}} @endif" name="employee" id="employee" value="{{ old('dealer_id') }}" required="true" aria-label="Search" aria-describedby="basic-addon3">
 <option value="">Select Employee</option>

         @foreach(App\Models\Employee::get() as $dealer)
       
        <option value='{{ $dealer->id }}' >{{ $dealer->name }} {{ $dealer->last_name }}</option>
        @endforeach



        </select> 
                   {!! $errors->first('emp','<div class="invalid-feedback">:message        </div>') !!}

              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-eye fa-sm"></i>
                </button>
              </div>
            </div>
          </div>



















  <div class="dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages          <ul class="navbar-nav ml-auto">
 -->
              <div class="dropdown-menu dropdown-menu-right p-0 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search" action="{{ route('invoice.create') }}" method="GET">
                  <div class="input-group">
                    <select class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" name="id" value="{{ old('dealer_id') }}" required="true" aria-describedby="basic-addon3" >
                       @foreach(App\Models\Dealer::hasInvoice()->get() as $dealer)
       
        <option value='{{ $dealer->id }}' >{{ $dealer->name }}</option>
        @endforeach



        </select> 

                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">
                        <i class="fas fa-eye fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>



@endsection
@section('options')
 <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Options:</div>
                      <a class="dropdown-item"  href="{{route('user.create')}}">  <i class="fas fa-plus fa-sm fa-fw text-gray-600"></i> Add</a>
                      <a class="dropdown-item"  href="{{url('user.print')}}">  <i class="fas fa-file fa-sm fa-fw text-gray-600"></i> Export</a>
                      <div class="dropdown-divider"></div>
                    </div>

@endsection