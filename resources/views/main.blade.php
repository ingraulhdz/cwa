<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Car Wash Admin @yield('head')</title>

      @include('layout.css')

  </head>

  <body id="page-top">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

       @include('layout.nav')

      <div id="wrapper">
      <!-- Sidebar -->
         @include('layout.side-menu')

          <div id="content-wrapper">

            <div class="container-fluid">

            <!-- Breadcrumbs-->
           <!--  <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Overview</li>
            </ol> -->
@if(Session::has('message'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    {{ Session::get('message') }}
  </div>
@endif
@if(Session::has('error'))
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    {{ Session::get('error') }}
  
  </div>
@endif

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif
 -->

              @yield('content')

          </div>
          <!-- /.container-fluid -->

          <!-- Sticky Footer -->
         
        @include('layout.footer')


      </div>
      <!-- /.content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    @include('layout.modal')

    @include('layout.js')

<script>
      $(document).ready(function(){
var i= 0;
    var ww = document.body.clientWidth;
    if (ww < 830) {
  $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");   
     }


  
$.ajax({
  url: '/getDataDashboard',
  type: 'GET',
  success: function(data){
var id=3;

data.cars3.forEach(element => {
          $("#nav_card_cars").append("<a class='dropdown-item' href='/car/"+element.id+"'> "+element.year+" "+element.make+" "+element.model+" <small><span class='text-muted'> "+element.ago+"  </span></small> </a><hr>");
        });


data.invoices3.forEach(element => {
          $("#nav_card_invoices").append("<a class='dropdown-item' href='/invoice/"+element.id+"'> Invoice #"+element.id+" $"+element.due+".00 <small><span class='text-muted'> "+element.created_at+"  </span></small> </a><hr>");
        });

$("#nav_cars").text(data.total_cars);
if(data.invoices_open > 0){
$("#nav_invoices").text(data.invoices_open); 

}else{
  $("#nav_invoices").hide(); 

}
 }
})



});
</script>

  </body>

</html>
