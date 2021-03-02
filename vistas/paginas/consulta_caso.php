<?php
$infoCasosRegistrados = ControladorSigai::ctrMostrarCasosRegistradosUsuario(null, null);

?>
<!--Contenido-->
<link rel="stylesheet" type="text/css" href="../public/css/modal.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h1 class="box-title">Casos de investigación Seguimiento </h1>
            <div class="box-tools pull-right">
            </div>
          </div>
          <!-- /.box-header -->
          <!-- centro -->
          <div class="panel-body table-responsive" id="listadoregistros">
            <table id="tbllistadoc" class="table table-striped table-bordered table-condensed table-hover">
              <thead>

                <th>Opciones</th>
                <th>No. Caso</th>
                <th>Fecha Origen</th>
                <th>Fecha Limite</th>
                <th>Asunto</th>
                <th>Area</th>
                <!--<th>Categoria Producto</th>-->
                <!--<th>Clasificación Producto</th>-->
                <th>Asigna Caso</th>


              </thead>
              <tbody>

                <?php foreach ($infoCasosRegistrados as $key => $value) :
                  $cod = ($value["tac_cod_alta"]);
                ?>

                  <tr>
                    <td>

                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" aria-label="Skip to main navigation"  onclick="MostrarCasosRegistradosUsuario(<?php echo $cod; ?>)">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                      </button>

                    </td>
                    <td><?php echo $value["tac_cod_alta"]; ?></td>
                    <td><?php echo $value["tac_fecha_origen"]; ?></td>
                    <td><?php echo $value["tac_fecha_limite"]; ?></td>
                    <td><?php echo $value["tac_asunto"]; ?></td>
                    <td><?php echo $value["tac_area"]; ?></td>
                    <td><?php echo $value["tac_asigna_caso"]; ?></td>
                  </tr>

                <?php endforeach ?>

              </tbody>
              <tfoot>

                <th>Opciones</th>
                <th>No. Caso</th>
                <th>Fecha Origen</th>
                <th>Fecha Limite</th>
                <th>Asunto</th>
                <th>Area</th>
                <!--<th>Producto</th>-->
                <!--<th></th>-->
                <th>Asigna Caso</th>


              </tfoot>
            </table>
          </div>



        </div>
        <!--Fin centro -->
      </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<!--Iniciamos un modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="informacion-caso">
          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <span class="help-block text-muted small-font" id="texto-span"> Fecha Alta Caso</span>
                  <input type="text" class="form-control" id="fecha-alta" name="fecha-alta" style="background-color: #20603d; color: white;" disabled />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <span class="help-block text-muted small-font" id="texto-span"> Fecha Origen Caso</span>
                  <input type="text" class="form-control" id="fecha-origen" name="fecha-origen" style="background-color: #fcf75e;" disabled />
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                  <span class="help-block text-muted small-font" id="texto-span"> Fecha Límite Caso</span>
                  <input type="text" class="form-control" id="fecha-limite" name="fecha-limite" style="background-color: #cb3234; color: white;" disabled />
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <span class="help-block text-muted small-font" id="texto-span"> Asunto Caso</span>
                  <input type="text" class="form-control" id="caso-asunto" name="caso-asunto" style="color: black;" disabled />
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <span class="help-block text-muted small-font" id="texto-span"> Correo origen</span>
                  <input type="text" class="form-control" id="correo-origen" name="correo-origen" style="color: black;" disabled />
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <span class="help-block text-muted small-font" id="texto-span"> Área</span>
                  <input type="text" class="form-control" id="area" name="area" style="color: black;" disabled />
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                  <span class="help-block text-muted small-font" id="texto-span"> Asignó Caso</span>
                  <input type="text" class="form-control" id="asigno-caso" name="asigno-caso" style="color: black;" disabled />
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <span class="help-block text-muted small-font" id="texto-span" style="text-align: center;"> Descripción</span>
                  <textarea class='autoExpand' rows='4' data-min-rows='3' id="descripcion-caso" name="descripcion-caso" disabled></textarea>
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 pad-adjust">
                  <span class="help-block text-muted small-font" id="texto-span"> No. Caso</span>
                  <input type="text" class="form-control" id="cod" name="cod" style="color: black;" disabled />
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 pad-adjust" style="text-align: center;">
                  <input type="submit" class="btn btn-success" id="btn-seguimiento" onclick="mostrarSeguimiento(true)" value="Iniciar Seguimiento">
                </div>
                
                

                <br>


                <!--<div class="row">
                <div class="col-md-12">
                  <input type="text" class="form-control" placeholder="Ingresa Tarjeta de Credito">
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font"> Expiry Month</span>
                  <input type="text" class="form-control" placeholder="MM" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font"> Expiry Year</span>
                  <input type="text" class="form-control" placeholder="YY" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                  <span class="help-block text-muted small-font"> CCV</span>
                  <input type="text" class="form-control" placeholder="CCV" />
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3">
                  <img src="assets/img/1.png" class="img-rounded" />
                </div>
              </div>
              <div class="row ">
                <div class="col-md-12 pad-adjust">

                  <input type="text" class="form-control" placeholder="Name On The Card" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 pad-adjust">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" checked class="text-muted"> Save details for fast payments <a href="#"> learn how ?</a>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                  <input type="submit" class="btn btn-danger" value="CANCEL" />
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                  <input type="submit" class="btn btn-warning btn-block" value="PAY NOW" />
                </div>
              </div>!-->
              </div>
            </div>
        </form>
        <br>
        <div class="panel-body" id="formularioSeguimiento">
          <form method="POST" class="seguimiento-caso" id="seguimiento-caso"  enctype="multipart/form-data" >
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="row">

                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <span class="help-block text-muted small-font" id="texto-span"> RFC</span>
                    <input type="text" class="form-control" id="rfc-cliente" name="rfc-cliente" required>
                      <div class="hide" id="validation-message1">
                          Ingrese un RFC
                      </div>
                  </div>
                  <div class="col-md-5 col-sm-5 col-xs-5">
                    <span class="help-block text-muted small-font" id="texto-span"> Nombre/Razón Social</span>
                    <input type="text" class="form-control" id="nombreRS-cliente" name="nombreRS-cliente" required>
                      <div class="hide" id="validation-message2">
                          Ingrese un nombre
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <span class="help-block text-muted small-font" id="texto-span"> ID Persona</span>
                    <input type="text" class="form-control" id="id-cliente" name="id-cliente" />
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <span class="help-block text-muted small-font" id="texto-span"> Número cuenta</span>
                    <input type="text" class="form-control" id="numeroCuenta-cliente" name="numeroCuenta-cliente" />
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <span class="help-block text-muted small-font" id="texto-span" style="text-align: center;"> Situación actual</span>
                    <textarea class='autoExpand' rows='4' data-min-rows='3' id="situacion-cliente" name="situacion-cliente"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <span class="help-block text-muted small-font" id="texto-span" style="text-align: center;"> Seguimiento</span>
                    <textarea class='autoExpand' rows='4' data-min-rows='3' id="seguimiento-cliente" name="seguimiento-cliente"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <span class="help-block text-muted small-font" id="texto-span" style="text-align: center;"> Observaciones</span>
                    <textarea class='autoExpand' rows='4' data-min-rows='3' id="observaciones-cliente" name="observaciones-cliente"></textarea>
                  </div>
                </div>
                
                <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 pad-adjust">
                    <span class="help-block text-muted small-font" id="texto-span"> No. Caso</span>
                    <input type="text" class="form-control" id="codCaso" name="codCaso" style="color: black;" disabled />
                  </div>
                </div>

                <br>
              </div>
            </div>
          </form>
        </div>  
      </div>
      <div class="modal-footer">
                  
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-primary" name="btnGuardarCambios" onclick="validarCamposFrmSeguimiento()"> Guardar Cambios </button>

        <?php
   
  
 /* if (isset($_POST["codCaso"])) 
{
  $codigo_caso = $_POST["codCaso"];
  if(empty($codigo_alta))
  {
    $alta_seguimiento = ControladorSigai::ctrAltaCasoSeguimiento();
    if($alta_seguimiento != "")
                      {
                        echo '<script>
              
                                if(window.history.replaceState)
                                {
                                  window.history.replaceState(null,null,window.location.href);
                                }

                              </>';

                              if($alta_seguimiento == "ok")
                                {



                                  echo '<script>

                                  var alerta = bootbox.alert("Caso con Seguimiento registrado"); 

                                    
                                    alerta.delay(2000).slideUp(200, function() {
                                      $(this).alert("close");
                                      window.location.reload();
                                  });


                                      
                                    
                                    </script>';

                                }else{

                                  echo '¡Error! No se pudo registrar el caso';
                                }

                      }
  }
}else{

  echo '<script>
          alert("MAL"); 
            </script>';


} */
?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>vistas/scripts/consulta_caso.js"></script>
<style>
  #texto-span {
    color: black;
  }

  textarea {
    display: block;
    box-sizing: padding-box;
    overflow: hidden;

    padding: 10px;
    /*width:250px;*/
    font-size: 14px;
    /*margin:50px auto;*/
    border-radius: 6px;
    box-shadow: 2px 2px 8px rgba(0, 0, 0, .3);
    border: 0;
  }

  .spinner {
    margin: 100px auto 0;
    width: 70px;
    text-align: center;
  }

  .spinner>div {
    width: 18px;
    height: 18px;
    background-color: #333;

    border-radius: 100%;
    display: inline-block;
    -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  }

  .spinner .bounce1 {
    -webkit-animation-delay: -0.32s;
    animation-delay: -0.32s;
  }

  .spinner .bounce2 {
    -webkit-animation-delay: -0.16s;
    animation-delay: -0.16s;
  }

  @-webkit-keyframes sk-bouncedelay {

    0%,
    80%,
    100% {
      -webkit-transform: scale(0)
    }

    40% {
      -webkit-transform: scale(1.0)
    }
  }

  @keyframes sk-bouncedelay {

    0%,
    80%,
    100% {
      -webkit-transform: scale(0);
      transform: scale(0);
    }

    40% {
      -webkit-transform: scale(1.0);
      transform: scale(1.0);
    }
  }

#rfc-cliente {
    display: block;
}

#nombreRS-cliente {
    display: block;
    bottom: 0px;
}

.invalid{
    border-color: #f55 !important;
}

.invalid-message {
    display: block;
    color: red;
    font-size: 14px;
}

.hide{
    display: none;
}
</style>