<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>correo</title>
   <style>

   .titulo {
    color: #1e80b6;
    padding-top: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    }

    .body{
     background-color: #ECECEC;	
    }


    .div_contenido{
    color: #1e80b6;
    padding-top: 20px;
    padding-bottom: 10px;
    padding-left: 20px;
    padding-right: 20px;
    background-color: #ffffff !important;
   }

   </style>

</head> 

<body class="body">

<div class="titulo" > <h1>Información Plusis</h1></div>
<hr>
<div class=".div_contenido" > 

       <div class="row">
            
            <div class="col-md-12">
            <form  action="/postMail" method="post">
{{csrf_field()}}
             <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>"> 

                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Crear Nuevo Correo</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    
                      <div class="form-group">
                        <input class="form-control" placeholder="Para:" id="email" name="email">
                      </div>
                      <div class="form-group">
                        <input class="form-control" placeholder="Asunto:" id="subject" name="subject">
                      </div>
                      <div class="form-group">
                        <textarea id="message" name="message" class="form-control" style="height: 200px" placeholder="escriba aquí...">
                         
                        </textarea>
                      </div>
                   
                

                    </div><!-- /.box-body -->
                    <div class="box-footer">
                      <div class="pull-right">
                     
                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> ENVIAR</button>
                      </div>
                   <br/>
                    </div><!-- /.box-footer -->
                  </div><!-- /. box -->

              </form>
            </div><!-- /.col -->
          </div><!-- /.row -->
              

    <script>
     
      function activareditor(){   
        $("#contenido_mail").wysihtml5();
      };

      activareditor();
    </script>

</div>

<div class=".div_contenido" > Gracias por participar en el proyecto plusis <br/> NO OLVIDE VISITAR NUESTRO SISTIO WEB <b>http://plusis.net</b> </div>
	
</body>
</html>