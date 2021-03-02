<?php 
/*
$notificacion ="tac_notificacion_usuario";
$actualizarNotificacion = 0;
$infoCasosRegistrados = ControladorSigai::ctrMostrarCasosRegistradosUsuario($notificacion,$actualizarNotificacion);

echo '<prev class="bg-white">'; print_r($infoCasosRegistrados); echo '</prev>';



/*

$infoCasosRegistrados = ControladorSigai::ctrMostrarCasosRegistradosUsuario(null,null);

echo '<prev class="bg-white">'; print_r($infoCasosRegistrados); echo '</prev>';

*/

?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content --> 
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Escritorio </h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    
                 	<div class="panel-body">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <div class="small-box bg-green">
                        <div class="inner">
                          <h4 style="font-size: 17px;">
                            <strong></strong>
                          </h4>
                          <p>En tramite</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="caso.php" class="small-box-footer">Casos <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <div class="small-box bg-yellow">
                        <div class="inner">
                          <h4 style="font-size: 17px;">
                            <strong></strong>
                          </h4>
                          <p>Pendiente</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="caso.php" class="small-box-footer">Casos <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                      <div class="small-box bg-red">
                        <div class="inner">
                          <h4 style="font-size: 17px;">
                            <strong></strong>
                          </h4>
                          <p>Concluido</p>
                        </div>
                        <div class="icon">
                          <i class="ion ion-bag"></i>
                        </div>
                        <a href="caso.php" class="small-box-footer">Casos <i class="fa fa-arrow-circle-right"></i></a>
                      </div>
                    </div>    
                  </div>


                  <div class="panel body" style="height: 400px;">
                    
                  </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->

