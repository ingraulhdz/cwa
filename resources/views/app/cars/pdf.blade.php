
   <!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title>Cars</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
   
<body>
 
<div class="row">
  <div class="col-xs-4">   
          <img  src="http://alchilerestaurant.com/images/pdflogo.png" width="150px" height="80px" >    

  </div>

  <div class="col-xs-2">
          <h1  style="text-align: right;">Cars in Shop</h1>
            <br>Date: <?php echo date('m-d-y') ?>
            

  </div>

  

</div>


<table class="table table-striped table-bordered table-sm">
  <thead class="thead">
    <tr>
      <th scope="col">Car</th>
      <th scope="col">Customer</th>
      <th scope="col">Service</th>
      <th scope="col">Employee</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cars as $car)                       
                    <tr>
                         <td><<small>{{$car->name() }} {{$car->color}}</small></td>
    <td>
                        @if($car->dealer )      {{$car->dealer->name}}  <small> #{{$car->stock}}</small>
                         @else     {{$car->customer->name}}    <small>- customer -</small>    @endif
                      </td>
    <td><<small>
     @if($car->service) {{$car->service->name}} @endif
<!--      @foreach($car->ex as $ex)<li>{{$ex->name}} </li>@endforeach
 -->   </small></td>
                         <td>@if($car->employee)
                         {{$car->employee->name}} 
                          @else <span class="badge badge-pill badge-warning"><i class="fa fa-exclamation-triangle"></i> Not Asigned!</span>
                         @endif
                         </td>           

       
              
                    </tr>
                  @endforeach

  </tbody>
</table>




    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>