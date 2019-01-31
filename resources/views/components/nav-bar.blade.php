<div class="options-bar">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/dealer"> <i class="fa fa-building" style="color: #dc3545;"></i>{{$title}} </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
        <a class="nav-link" href="{{$href}}.create">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-plus"></i> Add</button>
        </a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{$href}}.export">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-print"></i> Export</button>
        </a>
      </li>


       <li class="nav-item">
        <a class="nav-link" href="{{$href}}">
        <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-forward"></i> Refresh</button>
        </a>
      </li>

<!--
        <li class="nav-item">
        <a class="nav-link" href="{{$href}}.delete">
        <button class="btn btn-md btn-outline-danger" type="button"><i class="fa fa-trash"></i> Delete</button>
        </a>
      </li>

    -->

    </ul>
  

  </div>
</nav>


</div>