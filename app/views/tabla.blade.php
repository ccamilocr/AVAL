@if(Auth::check())

@endif

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>AVAL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">

  <!-- librerias JavaScript que se utilizan en la pagina -->
  <script src="assets/js/jquery-1.11.3.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.bootstrap.min.js"></script>
  <script src="assets/js/dataTables.responsive.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.js"></script>
  <script src="assets/js/locales/bootstrap-datepicker.es.min.js" charset="UTF-8"></script>

</head>
<body>
  
<!--Contenerdor logo y botón iniciar sesion-->  
<div class="container">
  <br>
  <div class="row">
    <div class="col-xs-9">
      <h3 class="text-muted">TABLA FINAL</h3>
    </div>
    <div class="col-xs-3 text-right">
      <a href='logout'><button  type="button" class="btn btn-primary">Cerrar sesión</button></a>
    </div>
  </div>

  <div class="row">
    <!--Listado -->
    </br>
    <div class="col-sm-1"></div>
    <div class="col-xs-12 col-sm-10" >
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>  
            <tr class="well text-primary ">
              <th class="text-center">Nombre</th>
              <th class="text-center">Cedula</th>
              <th class="text-center">Correo</th>              
              <th class="text-center">Telefono fijo</th>
              <th class="text-center">Celular</th>
              <th class="text-center">Departamento</th>              
              <th class="text-center">Municipio</th>
              <th class="text-center">Ingresos</th>
              <th class="text-center">Prestamo</th>
              <th class="text-center">habeas data</th>
              <th class="text-center">llamar</th>
              

            </tr>
          </thead>
          <tbody>

          @foreach($datosarray[0] as $formulario)
              <tr id="{{$formulario->id_formulario}}"> 
                <td>{{$formulario->nombre}}</td>
                <td>{{$formulario->cedula}}</td>
                <td>{{$formulario->correo}}</td>
                <td>{{$formulario->telfijo}}</td>
                <td>{{$formulario->celular}}</td>
                <td>{{$formulario->departamento}}</td>
                <td>{{$formulario->municipio}}</td>
                <td>{{$formulario->ingresos}}</td>
                <td>{{$formulario->prestamo}}</td>
                <td>{{$formulario->habeasdata}}</td>
                <td>{{$formulario->llamar}}</td>
                
              </tr>
             
          @endforeach
            
          </tbody>
        </table>
     
      </div>
      <div class="col-sm-1"></div>
      </br>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      var table = $('#example').DataTable();

    });//termina document ready
  </script>
</body>
</html>


