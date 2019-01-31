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
