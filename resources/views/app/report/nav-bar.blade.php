<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/invoice">Reports  @yield('subtitle')</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item">
      <a class="nav-link" href="{{ url()->previous() }}">
        <button class="lead btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-arrow-left"></i> Back</button>
        </a>
      </li>
 
  <li class="nav-item">
        <a class="nav-link" href="{{route('invoice.index')}}">
                <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-home"></i> Main </button></a>
      </li>


    

    </ul>     

    <form class="form-inline my-2 my-lg-0" action="" method="GET">


   <div class="input-group">
   <input type="date" id="date_from" class="form-control form-control-sm">
   <input type="date" id="date_to" class="form-control form-control-sm">

                <div class="input-group-append">
            <button class="btn btn-outline-danger" id="refresh_btn">
              <i class="fas fa-chart-bar"></i> Get Data
            </button>
          </div>
        </div>







    </form>














  </div>
</nav>

