<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

  <title>CWA - Dashboard H0306 </title>

      @include('layout.css')

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->       @include('layout.sidebar')

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
         @include('layout.topbar')
   
        <!-- End of Topbar -->
<div class="container-fluid">

  
        <!-- Begin Page Content -->
        @yield('content')
        <!-- /.container-fluid -->
     </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
 @include('layout.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @include('layout.modal')


  <!-- Bootstrap core JavaScript-->
  @include('layout.js')
 

@if(Session::has('message'))
    <script >



// swal({
//   position: 'top-end',
//   type: 'success',
//   title:'{{ Session::get('message') }} ',
//   showConfirmButton: false,
//   timer: 2000
// });


 toastr["success"]('  {{ session('message') }}');

   </script>
@endif
@if(Session::has('error'))
  
   <script >
 toastr["error"](' {{ Session::get('error') }} ');

    </script>

@endif

@if ($errors->any())
   <script >
    var message = '<small>';


    </script>
   
            @foreach ($errors->all() as $error)
             <script >
              var err= '{{ $error }}';
              // toastr["error"](err);
toastr.options = {
  "closeButton": true,   "timeOut": "15000",
}

               message = message+"<li>"+err+"</li>";

             </script>   
            @endforeach
     

        <script >
          toastr["error"](message+"</small> ", "check the follows errors")
/*Swal.fire({
  type: 'error',
  title: 'Oops... Please check the errors',
  html: message
})

*/
    </script>


@endif




 @if (session('status'))
                      

   <script >
 toastr["info"](' {{ Session::get('status') }} ');
 toastr["info"]('  {{ session('status') }}');

    </script>

                    @endif


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
  $("#nav_card_cars").append("<a class='dropdown-item d-flex align-items-center' href='/car/"+element.id+"'><div class='mr-3'><div class='icon-circle bg-primary'><i class='fas fa-car text-white'></i></div></div><div><div class='small text-gray-500'>"+element.ago+"</div><span class='font-weight-bold'>"+element.year+" "+element.make+" "+element.model+"</span></div></a> ");
        });


data.invoices3.forEach(element => {
          $("#nav_card_invoices").append("<a class='dropdown-item d-flex align-items-center'href='/invoice/"+element.id+"'><div class='dropdown-list-image mr-3'><img class='rounded-circle' src='https://source.unsplash.com/AU4VPcFN4LE/60x60' alt=''><div class='status-indicator'></div></div><div><div class='text-truncate'>Invoice #"+element.id+" $"+element.due+".00 </div><div class='small text-gray-500'>"+element.created_at+" · 1d</div></div></a>");
        });

/*<a class='dropdown-item' href='/invoice/"+element.id+"'> Invoice #"+element.id+" $"+element.due+".00 <small><span class='text-muted'> "+element.created_at+"  </span></small> </a><hr>

                
*/

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
