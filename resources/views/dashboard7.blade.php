@extends('main')

@section('content')


          <!-- Breadcrumbs-->
          <ol class="breadcrumb bg-dark text-danger">
            <li class="breadcrumb-item text-danger">
             <i class="fa fa-car"></i> Expenses
            </li>
            <li class="breadcrumb-item active small text-muted" id="today">
              

              <!-- <?php
$today = date("D M j");               // Sat Mar 10 17:16:18 MST 2001
echo $today;
              ?> -->
            </li>            <li class="breadcrumb-item active small text-muted" ><a href="#" id="add_expense" data-toggle="modal" data-target="#add_expenses">ADD </a>
</li>
          </ol>


<!-- Modal -->
<div class="modal fade" id="add_expenses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form>
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
 <select id="expense_id" name="expense_id" class="form-control form-control-sm" ">
                        <option value=""  >Select an expense</option>

 @foreach(App\Models\Expense::get() as $dealer)
        <option value="{{$dealer->id}}">{{ $dealer->name }}</option>
        @endforeach
          </select>    </div>
  </div>


 <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name_expense" placeholder="Name" required="true">
    </div>
  </div>




  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="description_expense" placeholder="Short Description">
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price_expense" placeholder="Cost of the expense" required="true">
    </div>
  </div>


<div class="form-check">
  <input class="form-check-input" type="checkbox" name="exampleRadios" id="is_monthly" value="option1">
  <label class="form-check-label" for="exampleRadios1">
Is Montly?  </label>
</div>
</form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="create_expense" >Save changes</button>
      </div>
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
            <div class="row">
            <div class="col-md-8">
              <canvas id="expensesChart" width="100%" height="40%"></canvas>
</div>
            <div class="col-md-4 card">
  
 <div class="row">
      <div class="col-xl-12 col-sm-12 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-car"></i>
                  </div>
                  <div class="mr-5"><b id="total_expenses"></b> Total Expenses</div>
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
      <div class="col-xl-12 col-sm-12 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-car"></i>
                  </div>
                  <div class="mr-5"><b id="income"></b> Income!</div>
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
      <div class="col-xl-12 col-sm-12 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-car"></i>
                  </div>
                  <div class="mr-5"><b id="profit"></b> Profit!</div>
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




</div>         



</div>



            </div>
<!--             <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
 -->          </div>



          <p class="small text-center text-muted my-5">
            <em id="ago"></em>
          </p>
 		


@endsection


@section('js')
    <script src="vendor/chart.js/Chart.min.js"></script>
    

    <script>
      $(document).ready(function(){

$("#create_expense").click(function () {

  $.ajax(
  {
    type:'POST',
    url:'expense',
    data:{
      '_token': $("#token").val(),
      'name': $("#name_expense").val(),
      'description': $("#description_expense").val(),
      'is_montly': $("#is_montly").val(),
      'price': $("#price_expense").val()
       },success: function(data){
console.log(data);
toastr["success"]("Expense was successfull added");
$("#add_expenses").modal("hide");       }
});




  });




Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

  sendRequest();
      // setInterval(sendRequest, 10000); // The interval set to 5 seconds



  function sendRequest(){
      $.ajax({
  url:'/getDataExpenses',
  type:'GET',
        success: 
          function(data){

$('#total_expenses').text("$" + data.total_expenses + ".00" );
$('#total_income').text("$" + data.total_income + ".00" );
$('#profit').text("$" + data.profit + ".00" );



           

carsPie(data);






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
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
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