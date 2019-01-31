@extends('app.employees.main')


@section('sub-content')

<div class="row">


<div class="col-md-6 offset-md-2" style="text-align: center;">
        <h1 class="display-4">{{$employee->name}} {{$employee->last_name}}</h1>
</div>

<div class="col-md-4 ">
        <img src="/img/pdflogo.png" width="250px" height="100px">
</div>

</div>

<hr>



<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-car"></i>
                  </div>
                  <div class="mr-5">26 Total Cars!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>

              <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-th"></i>
                  </div>
                  <div class="mr-5">26 Cars  today!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


              <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-money-check"></i>
                  </div>
                  <div class="mr-5">$2600.00 Due</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>


              <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                  </div>
                  <div class="mr-5">$1234 Paid</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>




</div>




<div class="row">



<div class="col-md-4">


		<div class="card">
		  <div class="card-header bg-dark text-danger">
<b>Information:</b>		  </div>
		  <ul class="list-group list-group-flush">    <li class="list-group-item"><b>Name: </b>{{$employee->name}} {{$employee->last_name}}</li>

		<li class="list-group-item"><b>Address: </b>{{$employee->address}}, {{$employee->city}}, IL, US {{$employee->zip_code}}</li>
		<li class="list-group-item"><b>Phone: </b>{{$employee->phone}}</li>
    <li class="list-group-item"><b>E-mail: </b>{{$employee->email}}</li>
    <li class="list-group-item"><b>Rol: </b>{{$employee->rol->name}}</li>
		<li class="list-group-item"><b>Status: </b>
                                @if($employee->status)
                                 <span class="badge badge-pill badge-success"><i class="fa fa-check"></i> Active</span>
                                 @else 
                                <span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-triangle"></i> Inactive</span>
                              @endif
    </li>

		  </ul>
		</div>


</div>


<div class="col-md-8" style="text-align: center;">


		<div class="card">
		  <div class="card-header bg-dark text-danger">
Sales	  </div>

<div class="card-body" >

           
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>



</div>

		</div>

</div>


</div>


@endsection


@section('js')

    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/js/demo/chart-area-demo.js"></script>

@stop