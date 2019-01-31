function carsPerDay(data){
  var ctx = document.getElementById("carsPerDay");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [ data.dayN[6].day, data.dayN[5].day, data.dayN[4].day, data.dayN[3].day, data.dayN[2].day, data.dayN[1].day, data.dayN[0].day ],
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
    data: [data.dayN[6].total, data.dayN[5].total, data.dayN[4].total, data.dayN[3].total, data.dayN[2].total, data.dayN[1].total, data.dayN[0].total ],
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
          max: data.max[0].total + 1,
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