@extends('app.main')
@include('app.expenses.nav-bar')  

@section('css')
        
 
@stop

@section('sub-content')
    

@include('app.expenses.partials.expense_modal')
@include('app.expenses.partials.supply_modal')


            <div class="row">
            <div class="col-md-8">
              <canvas id="expensesChart" width="100%" height="50%"></canvas>
</div>
            <div class="col-md-4 card">
  
 <div class="row">
      <div class="col-xl-12 col-sm-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Expenses (total)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><b id="total_expenses"></b></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>

  
 <div class="row">
      <div class="col-xl-12 col-sm-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Income (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><b id="income"></b></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>

 
 <div class="row">
      <div class="col-xl-12 col-sm-12 mb-3">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Profit (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><b id="profit"></b></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>



</div>         



</div>



            </div>
<div class="table-responsive">
                <table class="table table-bordered" id="expensesTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Expense</th>
                      <th>Type</th>
                      <th>Price</th>
                 
                    </tr>
                  </thead>
                 
                  <tbody></tbody>
                </table>
      


          <p class="small text-center text-muted my-5">
            <em id="ago"></em>
          </p>
 		


@endsection


@section('js')
    <script src="vendor/chart.js/Chart.min.js"></script>
    

    <script>



      $( "#supply_id" ).change(function() {
$("#total_supply").val('');
$("#amount_supply").val('');
$.ajax({
  url: "/get_supply/"+$( "#supply_id" ).val(),
  type: "GET",
  success: function(data){
$("#measure").text("Price per "+ data.measure +"$ "+data.price + ".00").show();
$("#measure").removeClass("d-none");
$("#unit_price").val(data.price);
  }
});
});


function validacion(){
var amount = $("#amount_supply").val();
var total_supply = $("#total_supply").val( amount * $("#unit_price").val() );
if(amount == 0){
  $("#measure").addClass("d-none");
}else{
$("#measure").removeClass("d-none");
}
}


      $(document).ready(function(){

$("#btn-add-expense").show();
$("#btn-add-supply").show();
$("#date_expense").show();
$("#btn-add").hide();
$("#btn-export-expense").hide();

$("#create_expense").click(function () {
  $.ajax(
  {
    type:'POST',
    url:'/create_unique_expense',
    data:{
      '_token': $("#token").val(),
      'month_id': $("#month_id").val(),
      'name': $("#name_expense").val(),
      'description': $("#description_expense").val(),
      'price': $("#price_expense").val()
       },success: function(data){


toastr["success"]("Expense "+ data.name +" for  $"+ data.price +".00  was successfull added");


$("#add_expenses").modal("hide");       
}, error: function(data){
  console.log(data);
}
});
sendRequest();
  });



$("#create_supply").click(function () {
  alert('data');
  $.ajax(
  {
    type:'POST',
    url:'/create_supply',
    data:{
      '_token': $("#token").val(),
      'supply_id': $("#supply_id").val(),
      'amount': $("#amount_supply").val(),
      'total': $("#total_supply").val(),
      'unit_price': $("#unit_price").val()
       },success: function(data){
console.log(data);
toastr["success"]("Supply was successfull added");
$("#add_supplys").modal("hide");  
sendRequest();     
},
error: function(data){
  console.log(data.responseJSON);
  console.log(data.responseJSON.message);
}
});
sendRequest();
  });



Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

  sendRequest();


  function sendRequest(){
      $.ajax({
  url:'/getDataExpenses',
  type:'GET',
        success: 
          function(data){
         console.log(data);

$('#total_expenses').text("$" + data.total_expenses + ".00" );
$('#income').text("$" + data.total_income + ".00" );
$('#profit').text("$" + data.profit + ".00" );


if(data.profit< 0){

           $('#profit').addClass("text-warning");
}


carsPie(data);
console.log("data");
console.log(data);

data.expenses.forEach(element => {

$("#expensesTable").append("<tr><td>"+ element.name +"</td><td>"+ element.type +"</td><td>$"+ element.price +".00</td></tr>");
});


$("#expensesTable").dataTable();



        },error: function (data){       

          console.log(data.responseJSON);
        },

        complete: function() {
     }



    });
  };
});





function carsPie(data){
  var ctx = document.getElementById("expensesChart");
var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: data.array_expense_name,
      datasets: [{
        label: "Expenses",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850", "#3eABcd", "#AB5ea2","#3cbaAB","#CBc3b9","#AC5850","#6600cc", "#ff9500","#82dfe5","#ffb2a5","#154935", "#acc6bb", "#aa6h73","#390f2c","#356df0","#4accc2"],

        data: data.array_expense_cost
      }]
    },
    options: {
      title: {
        display: false,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});

}





    </script>




@stop

