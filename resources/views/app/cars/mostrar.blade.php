<div id="mostrar" class="container" style="display: none; text-align: center; font-size: 12px">



<div class="row">

<div class="col-md-6 offset-md-2" ">
    <b id="customer_name"></b><br>
    <font id="customer_address"></font>
    <font id="customer_email"></font>
    <font id="customer_phone"></font>
</div>

<div class="col-md-4 ">

		<img src="/img/logos/{{ is_null($car->dealer) ? 'logo' : $car->dealer->logo}}.jpg" width="150px" height="100px">
</div>

</div>
    

<hr>

<div class="row ">

    <div class="card col-md-12">
  


      <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Detailer: </b> <label id="show_employee"></label></li>

    <li class="list-group-item" ><b> Stock #: </b>   <label id="show_stock"> </label></li>
    <li class="list-group-item" ><b> Vin #: </b>   <label id="show_vin"></label>   </li>
    <li class="list-group-item" ><b> Color: </b> <label id="show_color"> </label> </li>
    <li class="list-group-item" ><b>  Price: </b> <label id="show_price"> </label> </li>
<li class="list-group-item" id="show_extras"><b> Extras:</b>    
<label style="font-size: 12px" id="show_extras_list" ></label>
       
</li>

      </ul>

    </div>








</div>

</div>