
   <!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title>Cars</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
   
<body>

 



           <img  src="http://alchilerestaurant.com/images/pdflogo.png" width="150px" height="80px" >    

      <h1  style="text-align: right;">Dealers</h1>            



<table class="table table-striped table-bordered table-sm">
  <thead class="thead">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      <th scope="col">E-mail</th>
      <th scope="col">Contact</th>
    </tr>
  </thead>
  <tbody>
     @foreach($dealers as $dealer)
            <tr>
            
              <td>{{$dealer->name}} </td>                             
              <td>{{$dealer->address}}, {{$dealer->city}} {{$dealer->zip_code}}</td>
                                <td>{{$dealer->phone}}</td>
                                <td>{{$dealer->email}}</td>
                      <td>{{$dealer->contact}} <small>|{{$dealer->contact_phone}}</small></td>
                        

            </tr>
         @endforeach
  </tbody>
</table>




    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
