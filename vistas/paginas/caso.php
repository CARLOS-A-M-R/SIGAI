
   

<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                  <?php if ($_SESSION["validarIngresoNivelUsuario"] == 3): ?>
                    <div class="box-header with-border">
                          <h1 class="box-title">Agregar nuevo caso <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <?php endif ?>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>No. Caso</th>
                            <th>Opciones</th>
                            <th>Fecha Origen</th>
                            <th>Fecha Limite</th>
                            <th>Correo origen</th>
                            <th>Area</th>
                            <th>Analista responsable</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>

                            <?php foreach ($casos as $key => $value):

                              $valor = ($value["tac_status"]);
                              $cod = ($value["tac_cod_alta"]);

                             ?>
                              
                            <tr>
                               <td align="center"><?php echo $value["tac_cod_alta"]; ?></td>
                               <td>
                                
                                <?php if ($valor == 0): ?>

                                  <button class="btn btn-warning" onclick="mostrar(<?php echo $cod; ?>)">
                                    <i class="fa fa-pencil"></i>
                                  </button>
                                  <button class="btn btn-danger" >
                                    <i class="fa fa-close" ></i>
                                  </button>

                                    <?php elseif($valor == 1): ?>

                                    <button class="btn btn-warning" onclick="mostrar(<?php echo $cod; ?>)">
                                      <i class="fa fa-pencil"></i>
                                    </button>
                                    <button class="btn btn-warning">
                                      <i class="fa fa-check"></i>
                                    </button>

                                      <?php else: ?>
                                        
                                         <button class="btn btn-warning" onclick="mostrar(<?php echo $cod; ?>)">
                                          <i class="fa fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-success">
                                          <i class="fa fa-check"></i>
                                        </button>    

                                  <?php endif ?>
                                 
                               </td>
                               <td><?php echo $value["tac_fecha_origen"]; ?></td>
                               <td><?php echo $value["tac_fecha_limite"]; ?></td>
                               <td><?php echo $value["tac_correo_origen"]; ?></td>
                               <td><?php echo $value["tac_area"]; ?></td>
                               <td><?php echo $value["ta_nombre_completo"]; ?></td>
                               <td><?php 

                                if($valor == 0){
                                  echo '<span class="label bg-red">En tramite</span>';
                                }else if($valor == 1){
                                  echo '<span class="label bg-orange">Pendiente</span>';
                                }else{
                                  echo '<span class="label bg-green">Concluido</span>';
                                }

                                ?>
                                 
                               </td> 

                            </tr>  
                             <?php endforeach ?>                       
                          </tbody>
                          <tfoot>
                            <th>No. Caso</th>
                            <th>Opciones</th>
                            <th>Fecha Origen</th>
                            <th>Fecha Limite</th>
                            <th>Correo origen</th>
                            <th>Area</th>
                            <th>Analista responsable</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>

              
                    <div class="panel-body" id="formularioregistros">

                      
                        <form name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                          <div class="panel panel-default">
                            <div class="panel-body">

                              <fieldset>
                                <legend align="center"><i class="fa fa-user" aria-hidden="true"></i> Datos del caso de investigacion</legend>
                                  <div class="form-group col-md-3 mb-1">
                                    <label for="tl_fecha">Fecha Origen(*):</label>
                                    <input type="hidden" name="cod" id="cod">
                                    <input class="form-control" type="date" id="fecha_origen" name="fecha_origen"  required>
                                  </div>
                                  
                                  <div class="form-group col-md-3 mb-1">
                                    <label for="">Fecha Limite(*):</label>
                                    <input class="form-control" type="date" id="fecha_limite" name="fecha_limite"  required>
                                  </div>

                                  <div class="form-group col-md-3 md-1">
                                    <label for="">Correo Origen(*)</label>
                                    <input type="mail" class="form-control" name="correo_origen" id="correo_origen" required>
                                  </div>

                                  <div class="form-group col-md-3 md-1">
                                    <label for="">Area(*)</label>
                                    <input type="text" class="form-control" name="area" id="area" >
                                  </div>

                                   <div class="form-group col-md-4 mb-1">
                                    <label for="">Analista Responsable(*):</label>
                                    <select id="analista" name="analista" class="form-control selectpicker" data-live-search="true" required>
                                      
                                      <?php 

                                      //Filtrar analista de la tabla analistas al select

                                      echo '<option value="0">Seleccione Analista</option>';
                                      foreach ($analista as $key => $value) {
                                        echo '<option value="'.$value["ta_cod_analista"].'">'.$value["ta_nombre_completo"].'</option>';        
                                      }
                                       ?>
                                    </select>
                                  </div>

                                  <div class="form-group col-md-3 md-1">
                                    <label for="">Asunto(*)</label>
                                    <input type="text" class="form-control" name="asunto" id="asunto" required>
                                  </div>

                                  <div class="form-group">
                                      <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Descripcion" required></textarea>
                                  </div>

                                 <div class="form-group col-md-4 mb-1">
                                      <input type="file" style="display: none;" id="fotoOpinion" name="fotoOpinion">
                                      <label for="fotoOpinion" class="d-none d-md-block col-md-4 col-lg-3">
                                        <img src="<?php echo $sigai["ts_dominio"]; ?>public/images/subirFoto.png" width="100" height="100" class="img-fluid mt-md-3 mt-xl-2 prevFotoOpinion">
                                      </label>
                                      
                                  </div>

                              </fieldset>

                          
                            

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                              <?php 

                              /*=============================* 
                              Actualizar caso
                              ===============================*/

                        if(isset($_POST["cod"]))
                        {

                          $codigo_alta = $_POST["cod"];

                              /*=============================* 
                              Alta caso
                              ===============================*/
                            if(empty($codigo_alta))
                            {  

                              $alta_caso = ControladorSigai::ctrAltaCaso();

                              if($alta_caso != "")
                              {
                                echo '<script>
                      
                                        if(window.history.replaceState)
                                        {
                                          window.history.replaceState(null,null,window.location.href);
                                        }

                                      </script>';

                                      if($alta_caso == "ok")
                                        {



                                          echo '<script>

                                          var alerta = bootbox.alert("Caso registrado"); 

                                            
                                            alerta.delay(2000).slideUp(200, function() {
                                              $(this).alert("close");
                                              window.location.reload();
                                          });


                                              
                                            
                                            </script>';

                                        }else{

                                          echo '¡Error! No se pudo registrar el caso';
                                        }

                              }

                            }else{

                              $actualizar_caso = ControladorSigai::ctrActualizarCaso($codigo_alta);

                                if($actualizar_caso != "")
                              {
                                echo '<script>
                      
                                        if(window.history.replaceState)
                                        {
                                          window.history.replaceState(null,null,window.location.href);
                                        }

                                      </script>';

                                      if($actualizar_caso == "ok")
                                        {



                                          echo '<script>

                                          var alerta = bootbox.alert("Caso actualizado"); 

                                            
                                            alerta.delay(2000).slideUp(200, function() {
                                              $(this).alert("close");
                                              window.location.reload();
                                          });


                                              
                                            
                                            </script>';

                                        }

                              }

                            }  
                        }  

                               ?>

                              <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                          
                        </div>
                      </div>
                      </form>    
                      </div>
                        
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

 

  <script type="text/javascript" src="<?php echo $sigai["ts_dominio"];?>vistas/scripts/caso.js"></script>
