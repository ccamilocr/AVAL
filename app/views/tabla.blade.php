@if(Auth::check())

@endif


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Monitoreo a Desarrollo Alternativo UNODC</title>
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
         <a href='logout'><button  type="button" class="btn btn-primary">Cerrar sesión</button></a>
        </div>
        <!--columna link y boton solo son visibles en sm md lg-->
        <div class="col-sm-3 col-sm-offset-3 visible-sm visible-md visible-lg col-md-3 col-md-offset-3 col-lg-3 col-lg-offset-3">
          <a href='logout'><button  type="button" class="btn btn-primary">Cerrar sesión</button></a>

        </div>        
    </div>
</div>
<!--Fin del contenedor-->