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

     <script>
      
      $(document).ready(function(){
        $("#loginModal").modal('show');
      });

    </script>

</head>
<body>
<div class="container">
  <br>
  <div class="row">

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
  <footer class="footer text-right">
    <p>&copy; 2016 symetrix soft.</p>
  </footer>

</div>