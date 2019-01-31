<div class="options-bar">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/payment">
   <i class="fa fa-building" style="color: #dc3545;"></i>
   {{$title or 'Payment'}} 
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
        <a class="nav-link" href="{{route('payment.create')}}">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-plus"></i> Add</button>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{url('payment.export')}}">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-print"></i> Export</button>
        </a>
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

