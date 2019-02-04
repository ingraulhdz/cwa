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




<table class="header" border="0">
    
              <tr class="header">
                  <td class="header">      <img  src="img/pdflogo.png" width="150px" height="100px" >
 </td>
                <td class="header" cellspacing="20" cellpadding="20" > <h1>DEALERS</h1> Date: {{$date}}</td>
                <td class="header" style="text-align: right;">    Magic Touch Service<br>
                                    455 Ogden Ave, IL  85004, US<br>
                                    (602) 519-0450<br>
                                    magictouchservice1@gmail.com</td>
             </tr>


           

        </table>

<br><br>


<table>
  <tr>
   <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>E-mail</th>
        <th>Contact</th>


  </tr>
     @foreach($dealers as $dealer)
            <tr>
            
              <td>{{$dealer->name}} </td>                             
              <td>{{$dealer->address}}, {{$dealer->city}} {{$dealer->zip_code}}</td>
                                <td>{{$dealer->phone}}</td>
                                <td>{{$dealer->email}}</td>
                      <td>{{$dealer->contact}} <small>|{{$dealer->contact_phone}}</small></td>
                        

            </tr>
         @endforeach
    
</table>


</div>
</body>
</html>