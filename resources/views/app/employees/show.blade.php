@extends('app.main')
@extends('app.employees.nav-bar')
@section('sub-content')


<div class="row">
<div class="col-md-2">
<img src="/img/employees/{{$employee->img()}}" class="rounded-circle float-left" width="100px" height="100px">

  </div>

  <div class="col-md-5">
<label class="float-center" style="font-size: 30px">{{$employee->fullName()}} </label >
<br><span class="text-muted">{{$employee->rol->name}}</span>

  </div>

<div class="col-md-3">
<img src="/img/logos/magictouch.jpg"  width="100%" height="100%">




</div>
</div>
 <hr>
 <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
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