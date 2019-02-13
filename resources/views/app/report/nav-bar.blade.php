

@section('module_name')  <i class="fas fa-envelope fa-sm fa-fw text-gray-400"></i>

Reports</h6><h6>
     



  <div class=" no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages          <ul class="navbar-nav ml-auto">
 -->
              <div class="dropdown-menu dropdown-menu-right p-0 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search"  method="GET">
                  <div class="input-group">
                  <input type="date" id="date_from" class="form-control bg-light border-0 small" value="{{ old('dealer_id') }}" required="true" aria-label="Search" aria-describedby="basic-addon3">
                   <input type="date" id="date_to" class="form-control bg-light border-0 small" value="{{ old('dealer_id') }}" required="true" aria-label="Search" aria-describedby="basic-addon3">


                    <div class="input-group-append" id="refresh_btn">
                      <button class="btn btn-primary" type="submit">
                        <i class="fas fa-chart-bar fa-sm"></i> 
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>







@endsection

@section('options')

    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"  method="GET">

          






            <div class="input-group">
                   <input type="date" id="date_from" class="form-control bg-light border-0 small" value="{{ old('dealer_id') }}" required="true" aria-label="Search" aria-describedby="basic-addon3">
                   <input type="date" id="date_to" class="form-control bg-light border-0 small" value="{{ old('dealer_id') }}" required="true" aria-label="Search" aria-describedby="basic-addon3">

          

              <div class="input-group-append" id="refresh_btn">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-chart-bar fa-sm"></i> <small>Get Data</small>
                </button>
              </div>
            </div>
          </form>


@endsection
















  </div>
</nav>

