<div class="options-bar">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/extra">
   <i class="fa fa-chart-bar" style="color: #dc3545;"></i>
   {{$title or 'Reports'}} 
  <small>@yield('subtitle')</small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="{{ url()->previous() }}">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-arrow-left"></i> Back</button>
        </a>
      </li>

       

       <li class="nav-item">
        <a class="nav-link" href="{{url('extra.export')}}">
<div class="form-group row">
  <label for="example-date-input" class="col-6 col-form-label"> <i class="fa fa-plus"></i> </label>
  <div class="col-10">
    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
  </div>
</div>        </a>
      </li>

        <li class="nav-item">
        <a class="nav-link" href="{{url('extra.export')}}">
<div class="form-group row">
  <label for="example-date-input" class="col-6 col-form-label"> <i class="fa fa-plus"></i> </label>
  <div class="col-10">
    <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
  </div>
</div>        </a>
      </li>

    

          </ul>

 
<!--
        <li class="nav-item">
        <a class="nav-link" href="#">
        <button class="btn btn-md btn-outline-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
        </a>
      </li>

    -->

  </div>

  </div>
</nav>

