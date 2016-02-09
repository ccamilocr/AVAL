
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>AVAL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

  <style>
      
      .modal-content {
        
        margin: 0 auto;        
      }
  </style>
  <!-- librerias JavaScript que se utilizan en la pagina -->
  <script src="assets/js/jquery-1.11.3.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  

  @if (Session::has('login_errors')) 
    <script>
      
      $(document).ready(function(){
        $("#loginModal").modal('show');
      });

    </script>
  @endif


</head>
<body>
<div class="container">
  <br>
  <div class="row">
    <?php $status=Session::get('status'); ?>
      
    @if($status=='ok_estatus')
      <br>
      <div class="col-sm-1"></div>    
      <div id = "mensajeestatus" class="alert alert-success col-sm-10"><button class="close" data-dismiss="alert" type="button">×</button>
      <i class="bg-success"></i>El formulario fue cargado con éxito</div>
      <div class="col-sm-1"></div>
    @endif
  </div>
  <div class="row">
    <div class="col-xs-9">
      <h3 class="text-muted">FORMULARIO DE ENCUESTA</h3>
    </div>
    <div class="col-xs-3 text-right">
      <button data-target="#loginModal"  data-toggle="modal" type="button" class="btn btn-primary">Iniciar sesión</button>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-body">
        <form role="form" action="formulario/carga-info" method="post" id="formEdit">
          <div class="form-group">
            <label for="formulario" class="control-label">Nombre completo:</label>
            <input  id = "nombre" name="nombre" class="form-control" type="text" required="true" placeholder="Escriba su nombre completo"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Cedula:</label>
            <input  id = "cedula" name="cedula" class="form-control" type="number" required="true" placeholder="Cedula de maximo 13 digitos"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Correo:</label>
            <input  id = "correo" name="correo" class="form-control" type="email" required="true" placeholder="recuerde la @ en su correo"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Telefono fijo:</label>
            <input  id = "telfijo" name="telfijo" class="form-control" type="number" required="true" placeholder="maximo 7 digitos"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Celular:</label>
            <input  id = "celular" name="celular" class="form-control" type="number" required="true" placeholder="(operador)+ 7 digitos del numero"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Departamento:</label>
            <select id="selectdepto" class="form-control" name="selectdepto" required="true">
              <option value="" selected="selected">Seleccione</option>
              @foreach($arrayiniciales[0] as $depto)
              <option value="{{$depto->COD_DEPTO}}">{{$depto->DEPTO}}</option> 
              @endforeach
            </select>              
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Municipio:</label>
            <select id="selectmpio" class="form-control" name="selectmpio" required="true">
              <option value="" selected="selected">Seleccione</option>
            </select>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Ingresos mensuales:</label>
            <input  id = "ingresos" name="ingresos" class="form-control" type="number" required="true" placeholder="sin decimales"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Prestamo solicitado:</label>
            <input  id = "prestamo" name="prestamo" class="form-control" type="number" required="true" placeholder="sin decimales"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Banco donde quiere el credito:</label><br>            
            @foreach($arrayiniciales[1] as $banco)
            <label class="checkbox-inline">
              <input id="selectmpios" type="checkbox" name="banco[]" value="{{$banco->id_banco}}">{{$banco->nombre_banco}}<br>
            </label>
            @endforeach             
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">habeas data:</label><br>
            <label class="radio-inline">
              <input type="radio" name="habeas" id="habeas1" value="1"> SI              
            </label>
            <label class="radio-inline">
              <input type="radio" name="habeas" id="habeas2" value="2"> NO
            </label> 
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Desea que lo llamen?</label><br>
            <label class="radio-inline">
              <input type="radio" name="llamada" id="llamada1" value="1"> SI
            </label>
            <label class="radio-inline">
              <input type="radio" name="llamada" id="llamada2" value="2"> NO
            </label> 
          </div>
          <div class="text-right">
          <button type="submit" class="btn btn-success">Enviar encuesta</button>
          </div>
        </form>
    </div>
  </div>
      

  <footer class="footer text-right">
    <p>&copy; 2016 symetrix soft.</p>
  </footer>

</div> <!-- /container -->
<!--login modal-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content" id="loginbox">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>Ingreso personal del banco</h2>
      </div>
      <div class="modal-body">
          <!--<form class="form center-block">-->
            <form class="form center-block" id="loginform" action="login" method="post">
              @if (Session::has('login_errors'))
                <p class="bg-danger">El usuario o la contraseña no son correctos.</p>             
              @else
                <p>Introduzca usuario y contraseña.</p>
              @endif


            <div class="form-group">
              <input class="form-control input-lg" id="username" placeholder="Usuario" type="text" name="username">
            </div>
            <div class="form-group">
              <input class="form-control input-lg" id="password" placeholder="Contraseña" type="password" name="password">
            </div>
            <div class="form-group">
              <input class="btn btn-primary btn-lg btn-block" value="Acceder" type="submit">              
            </div>
            
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>  
      </div>
  </div>
  </div>
</div>  

<script src="assets/js/login.js"></script>
<script>
  $(document).ready(function() {
    $( "#mensajeestatus" ).fadeOut(2000);

    $("#selectdepto").change(function(){
            
            $.ajax({url:"formulario/submpio",type:"POST",data:{depto:$('#selectdepto').val()},dataType:'json',
              success:function(data){
                  //console.log(data);
                  $("#selectmpio").empty();                                
                  $("#selectmpio").append('<option value="" selected="selected">Seleccione</option>');
                    [].forEach.call(data,function(datos){                      
                      $('#selectmpio').append('<option value='+datos.CODANE+'> '+datos.MUNICIPIO+'</option>');
                    });                  
                     
              },
              error:function(){alert('error');}
            });//Termina Ajax
    });//termina funcion change

  });//termina document ready
</script>
</body>
</html>