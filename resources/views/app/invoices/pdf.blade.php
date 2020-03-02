
   <!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title>Invoice</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
   
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

.header{
    border: 0px solid #dddddd;
      background-color: #fff;
}

}
tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

</head>

<body>
      <div class="col-md-9 col-md-offset-1">


    <div class="invoice-box">


<table class="header" border="0">
   <tr class="header">
     <td class="header" style="text-align: left;">         
          <img  src="/logo2.png" width="150px" height="80px" >    
          <img  src="/public/logo2.png" width="150px" height="80px" >    

    </td>
     
      <td class="header" cellspacing="20" cellpadding="20" > <h1>@if($invoice->dealer) {{$invoice->dealer->name}} @else {{$invoice->customer->name}} @endif</h1> </td>
      <td class="header" style="text-align: right;"> 
         Pro Touch Services<br>
         455 Ogden Ave, IL  85004, US<br>
        (602) 519-0450<br>
         customerservice@protouch.com
       </td>
    </tr>


             <tr class="header">
                <td class="header" style="text-align: left;">  <b>Bill to: </b><br>
                                                            @if($invoice->dealer) {{$invoice->dealer->name}} @else {{$invoice->customer->name}} @endif<br>
                                                            @if($invoice->dealer) {{$invoice->dealer->name}} @else {{$invoice->customer->address()}} @endif<br>
                                                      
</td>
                <td class="header" cellspacing="20" cellpadding="20" > </td>
        

                <td class="header" style="text-align: right;">
              <b>
Date: {{$invoice->created_at}}<br>
                             Invoice  #: {{$invoice->id}}<br>
                              Total due: $ {{$invoice->due}} .00 USD</b> <br>
                    </td>
            </tr>



           

        </table>

<br><br>




<table style="font-size: 12px" >
  <tr>
    <th>Car</th>     
        <th>VIN #</th>
        <th>Stock</th>
        <th>Extras</th>
        <th>Price</th>
  </tr>
  @foreach($cars as $car)
            <tr>
              <td>{{$car->name()}}</td>                             
                                <td>{{$car->vin}}</td>
                                <td>{{$car->stock}}</td>
  <td> 

@if(count($car->ex) > 0 ) 
<small>Total: ${{$car->totalExtras()}}.00 @foreach($car->ex as $extra)
  <li  style="font-size: 9px"><small>{{$extra->name}} + ${{$extra->price}}.00</small> </li>
@endforeach 
@else Nothing Extra @endif
                          </td>                                 <td>{{$car->price}}</td>
            </tr>
@endforeach
         <tr>
 <th></th>     
        <th></th>
        <th></th>
       
        <th>Total:</th>
        <th>$ {{$invoice->due}}.00 USD</th>
         </tr>
</table>







<br><br><br><br>
    </div>
    <div style="text-align: center" align="center">

</div>
</div>
</body>
</html>