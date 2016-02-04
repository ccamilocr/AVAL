
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>AVAL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

  <style>
      

      .modal-content {
        max-width: 340px;
        margin: 0 auto;
        background-color: #f5f5f5;
      }
  </style>
  <!-- librerias JavaScript que se utilizan en la pagina -->
  <script src="assets/js/jquery-1.11.2.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  

  @if ((Session::has('login_errors'))or(Session::has('usuario_inactivo')) ) 
    <script>
      
      $(document).ready(function(){
        $("#loginModal").modal('show');
      });

    </script>
  @endif


</head>
<body>
  
<!--Contenerdor logo y botón iniciar sesion-->  
<div class="container-fluid ">
    <div class="row">
      <!--Columna logo con imágen-->
    <div class="col-xs-3 col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-3">
      
        </div>
      <!--espaciado para que en xs queden separado logo y boton-->
    <div class="col-xs-4 visible-xs">
      
    </div>
    <div class="col-lg-6 visible-lg">
      
    </div>
        <!--columna botón crear cuenta solo es visible en xs-->
        <div class="col-xs-3 visible-xs">
          <button data-target="#loginModal"  data-toggle="modal" type="button" class="btn btn-primary">Iniciar sesión</button>
        </div>
        <!--columna link y boton solo son visibles en sm md lg-->
        <div class="col-sm-3 col-sm-offset-3 visible-sm visible-md visible-lg col-md-3 col-md-offset-3 col-lg-3 col-lg-offset-3">
          <button data-target="#loginModal"  data-toggle="modal" type="button" class="btn btn-primary">Iniciar sesión</button>
        </div>        
    </div>
</div>
<!--Fin del contenedor-->

<!--login modal-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content" id="loginbox">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><br>Ingreso</h2>
      </div>
      <div class="modal-body">
          <!--<form class="form center-block">-->
            <form class="form center-block" id="loginform" action="login" method="post">
              @if (Session::has('login_errors'))
                <p class="bg-danger">El nombre de usuario o la contraseña no son correctos.</p>             
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
    
  });
</script>
</body>
</html>