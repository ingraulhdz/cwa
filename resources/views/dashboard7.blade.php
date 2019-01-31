@extends('main')

@section('content')


          <!-- Breadcrumbs-->
          <ol class="breadcrumb bg-dark text-danger">
            <li class="breadcrumb-item text-danger">
             <i class="fa fa-car"></i> Dashboard
            </li>
            <li class="breadcrumb-item active small text-muted" id="today">
              

              <!-- <?php
$today = date("D M j");               // Sat Mar 10 17:16:18 MST 2001
echo $today;
              ?> -->
            </li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-car"></i>
                  </div>
                  <div class="mr-5"><b id="total_cars"></b> Monthly Cars!</div>
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
                    <i class="fas fa-fw fa-check"></i>
                  </div>
                  <div class="mr-5"><b id="today_cars"></b> Today Cars!</div>
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
                    <i class="fas fa-fw fa-exclamation-triangle"></i>
                  </div>
                  <div class="mr-5"><b id="due"></b>  due!</div>
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
                    <i class="fas fa-fw fa-money-check-alt
"></i>
                  </div>
                  <div class="mr-5"><b id="income"></b> Total income!</div>
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

          <!-- Area Chart Example-->
    <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header bg-dark text-muted">
              <i class="fas fa-chart-area text-danger"></i>
              Cars in last 7 days</div>
            <div class="card-body">
              <canvas id="carsPerDay" width="100%" height="30"></canvas>
            </div>
<!--             <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
 -->          </div>

          <div class="row">
            <div class="col-lg-8">
              <div class="card mb-3">
                <div class="card-header bg-dark text-muted">
                  <i class="fas fa-chart-bar text-danger"></i>
                  Cars by Top deales</div>
                <div class="card-body">
                  <canvas id="myBarChart" width="100%" height="50"></canvas>
                </div>
<!--                 <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
 -->              </div>
            </div>
            <div class="col-lg-4">
              <div class="card mb-3">
                <div class="card-header bg-dark text-muted">
                  <i class="fas fa-chart-pie text-danger"></i>
                  Car Status  </div>
                <div class="card-body">
                  <canvas id="myPieChart" width="100%" height="100"></canvas>
                </div>
<!--                 <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
 -->              </div>
            </div>
          </div>

          <p class="small text-center text-muted my-5">
            <em id="ago"></em>
          </p>
 		


@endsection


@section('js')
    <script src="vendor/chart.js/Chart.min.js"></script>
    

    <script>
      $(document).ready(function(){
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

  sendRequest();
       setInterval(sendRequest, 10000); // The interval set to 5 seconds



  function sendRequest(){
      $.ajax({
  url:'/getDataDashboard',
  type:'GET',
        success: 
          function(data){

$('#due').text("$" + data.due + ".00" );
$('#today_cars').text(data.cars_today);
$('#income').text("$" + data.income + ".00" );
$('#total_cars').text(data.total_cars);
$('#ago').text("Last updated " + data.ago);
$('#today').text(data.today);


            // Cars Per Day bar chart

console.log(data.carsByDealer);
carsPerDay(data);
carsPie(data);
carsByDealer(data);






        },error: function (data){
          console.log(data.responseJSON);
        },

        complete: function() {
     }



    });
  };
});





function carsPie(data){
  var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Ready: " + data.cars_ready, "invoiced: "+ data.cars_invoice, "News: " + data.cars_news, "cars assigned: " + data.cars_not_assigned],
    datasets: [{
      data: [data.cars_ready, data.cars_invoice, data.cars_news, data.cars_not_assigned],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
    }],
  },
});


}


function carsPerDay(data){
  var ctx = document.getElementById("carsPerDay");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: data.lastDays,
    datasets: [{
      label: "Cars",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
    data: data.lastDaysTotal,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: true,
                    drawBorder: false

        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: data.maxDay + 1,
          maxTicksLimit: 10
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
}

function carsByDealer(data){
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
   data: {
      labels: data.dealersTop,
      datasets: [
        {
          label: "cars this month",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                borderColor: "rgba(2,117,216,1)",
          data: data.dealersTopTotal
        }
      ]
    },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: data.maxDealer,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});



}








    </script>




@stop