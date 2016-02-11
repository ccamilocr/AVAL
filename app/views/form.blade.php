
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
      .loader,
      .loader:before,
      .loader:after {
        background: #d8d8d8;
        -webkit-animation: load1 1s infinite ease-in-out;
        animation: load1 1s infinite ease-in-out;
        width: 1em;
        height: 4em;
      }
      .loader:before,
      .loader:after {
        position: absolute;
        top: 0;
        content: '';
      }
      .loader:before {
        left: -1.5em;
      }
      .loader {
        text-indent: -9999em;
        margin: 5% auto;
        position: relative;
        font-size: 11px;
        -webkit-animation-delay: 0.16s;
        animation-delay: 0.16s;
      }
      .loader:after {
        left: 1.5em;
        -webkit-animation-delay: 0.32s;
        animation-delay: 0.32s;
      }
      @-webkit-keyframes load1 {
        0%,
        80%,
        100% {
          box-shadow: 0 0 #d8d8d8;
          height: 4em;
        }
        40% {
          box-shadow: 0 -2em #d8d8d8;
          height: 5em;
        }
      }
      @keyframes load1 {
        0%,
        80%,
        100% {
          box-shadow: 0 0 #d8d8d8;
          height: 4em;
        }
        40% {
          box-shadow: 0 -2em #d8d8d8;
          height: 5em;
        }
}
  </style>
  <!-- librerias JavaScript que se utilizan en la pagina -->
  <script src="assets/js/jquery-1.11.3.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery-ui.js"></script>

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
            <input  id = "cedula" name="cedula" class="form-control" type="number" required="true" placeholder="Cedula de maximo 10 digitos" min="0" max="2999999999"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Correo:</label>
            <input  id = "correo" name="correo" class="form-control" type="email" required="true" placeholder="recuerde la @ en su correo"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Telefono fijo:</label>
            <input  id = "telfijo" name="telfijo" class="form-control" type="number" required="true" placeholder="maximo 7 digitos" min="1000000" max="9999999"></input>
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Celular:</label>
            <input  id = "celular" name="celular" class="form-control" type="number" required="true" placeholder="(operador)+ 7 digitos del numero" min="3000000000" max="3999999999"></input>
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
            <div class="input-group">
              <div class="input-group-addon">$</div>
              <input id = "ingresos" name="ingresos" class="form-control" type="text" required="true" placeholder="En Pesos Colombianos">
              <div class="input-group-addon">.00</div>
            </div>           
          </div>
          <div class="form-group">
            <label for="formulario" class="control-label">Prestamo solicitado:</label>
            <div class="input-group">
              <div class="input-group-addon">$</div>
              <input id = "prestamo" name="prestamo" class="form-control" type="text" required="true" placeholder="En Pesos Colombianos">
              <div class="input-group-addon">.00</div>
            </div>
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

<!--cargue modal-->
<div id="cargueModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="loginbox">
        
        <div class="modal-body">
            <div id="contenedor">
              <div class="loader" id="loader">Loading...</div>
            </div>
        </div>
         
    </div>
  </div>
</div>


<script src="assets/js/jquery.maskMoney.js"></script>

<script>

  $(function() {
    $('#ingresos').maskMoney({precision:0});
  });
  $(function() {
    $('#prestamo').maskMoney({precision:0});
  });  

  $(document).ready(function() {
    $( "#mensajeestatus" ).fadeOut(2000);

    $("#selectdepto").change(function(){
            $("#cargueModal").modal('show');
            $.ajax({url:"formulario/submpio",type:"POST",data:{depto:$('#selectdepto').val()},dataType:'json',
              success:function(data){
                  //console.log(data);
                  $("#selectmpio").empty();                                
                  $("#selectmpio").append('<option value="" selected="selected">Seleccione</option>');
                    [].forEach.call(data,function(datos){                      
                      $('#selectmpio').append('<option value='+datos.CODANE+'> '+datos.MUNICIPIO+'</option>');
                    });                  
              $("#cargueModal").modal('hide');      
              },
              error:function(){alert('error');}
            });//Termina Ajax
    });//termina funcion change

  });//termina document ready
</script>
</body>
</html>