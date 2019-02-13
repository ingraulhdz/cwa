@extends('app.main')
@include('app.dealers.nav-bar')

@section('sub-content')

<div class="row">


<div class="col-md-6 offset-2" style="text-align: center;">
		<h1 class="display-4">{{$dealer->name}}</h1>
</div>

<div class="col-md-2 ">
    <img  src="/img/logos/{{ is_null($dealer->logo) ? 'logo' : $dealer->logo}}.jpg"  width="150px" height="100px">
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
                  <div class="mr-5">26 Cars in home!</div>
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
<b>{{$dealer->name}}</b>		  </div>
		  <ul class="list-group list-group-flush">
		   <li class="list-group-item"><b>Address: </b>{{$dealer->address}}, {{$dealer->city}}, IL, US {{$dealer->zip_code}}</li>
		<li class="list-group-item"><b>Phone: </b>{{$dealer->phone}}</li>
		<li class="list-group-item"><b>E-mail: </b>{{$dealer->email}}</li>
		<li class="list-group-item"><b>Manager: </b> Sim taylor</li>
		<li class="list-group-item"><b>Contact: </b> {{$dealer->contact}}</li>
		<li class="list-group-item"><b>Phone Contact: </b>{{$dealer->contact_phone}}</li>

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