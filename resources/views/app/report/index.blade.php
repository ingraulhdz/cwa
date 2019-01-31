@extends('app.main')

@section('css')



@stop

@section('bar')
@include('app.report.nav-bar')
@stop


@section('sub-content')


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
              <canvas id="firstGraph" width="100%" height="30"></canvas>
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
                  <canvas id="secondgraph" width="100%" height="50"></canvas>
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
                  <canvas id="thirdGraph" width="100%" height="100"></canvas>
                </div>
<!--                 <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
 -->              </div>
            </div>
          </div>

          <p class="small text-center text-muted my-5">
            <em id="ago"></em>
          </p>
    


@include('app.report.table')
@endsection


@section('js')
    <script src="vendor/chart.js/Chart.min.js"></script>
    

    <script>



      $(document).ready(function(){


Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';



$(document).on('click', '#refresh_btn', function(e)
 { 
e.preventDefault();


 $.ajax({
  url:'/refreshData',
  type:'GET',
  datatype: 'JSON',
  data:{
      'date_from': $('#date_from').val(),
      'date_to': $('#date_to').val(),
    },
  success:  function(data){

firstGraph(data);
secondgraph(data);
thirdGraph(data);

data.cars.forEach(element => {
 $('#reportTable').append("<tr>"+
        "<td>"+element.name +"</td>"+
        "<td>"+element.employee+"</td>"+
        "<td>"+element.dealer+"</td>"+
        "<td>"+element.service+"</td>"+
        "<td>"+element.date+"</td>"+
        "<td>"+element.price+"</td>"+
        "</tr>");
        });


  $('#reportTable').DataTable();



          },
  error: function(data){
console.log(data.responseJSON);
  }
        });




});







  sendRequest();



  function sendRequest(){
      $.ajax({
  url:'/getDataReport',
  type:'GET',
        success: 
          function(data){
console.log(data.to);
secondgraph(data);
thirdGraph(data);
firstGraph(data);






        },error: function (data){
          console.log(data.responseJSON.message);
        },

        complete: function() {
     }



    });
  };
});



function firstGraph(data){
var ctx = document.getElementById("firstGraph");

var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: data.arrayDates,
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
    data: data.arrayDatesTotals,
    }],
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





function thirdGraph(data){
  var ctx = document.getElementById("thirdGraph");
  console.log(data);
var myPieChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: data.employees,
      datasets: [
        {
          label: "Cars",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: data.employeesTotal
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: false,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});

}



function secondgraph(data){

  var ctx = document.getElementById("secondgraph");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: data.dealersTop,
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
    data: data.dealersTopTotal,
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






    </script>




@stop