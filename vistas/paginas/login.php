<?php 

  ob_start();
  session_start(); 

 $sigai = ControladorSigai::ctrMostrarSigai();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>..:SIGAI:..</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIGAI | LOGIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/font-awesome.css">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/blue.css">
</head>
<body onload="startTime()" oncopy="return false" oncut="return false" onpaste="return false" style="background-image: url('<?php $sigai["ts_dominio"]; ?>public/images/sigai.gif'); background-repeat: no-repeat; background-position: center; background-size: 100%; background-color: #02040e"
>
<div class="wrapper">

  <header class="main-header">

     <!-- Logo -->
        <a href="<?php echo $sigai["ts_dominio"]; ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span style="color:white; font-size: 25px;" class="logo-mini"><b>SI</b>GAI</span>
          <!-- logo for regular state and mobile devices -->
          <span style="color:white; font-size: 25px;" class="logo-lg"><b>..:SIGAI:..</b></span>
        </a>

         <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">


          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->

         
             

                  <li class="dropdown">

          <span style="color:white; font-size: 25px;" id="date" class="hidden-xs" align="">FECHA:</span>
          <span style="color:white; font-size: 25px;" id="" class="hidden-xs" align="">|:::|</span>
          <span style="color:white; font-size: 25px;" id="clock" class="hidden-xs" align="">HORA: </span>
                 
                
                
              </li>
              
            </ul>
          </div>
      
        </nav>

  </header>

  </div>
    <div class="login-box">
    <nav class="navbar navbar-static-top" role="navigation">
     
      <div class="login-logo">
        
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p style="color: white;" class="login-box-msg">Ingrese sus datos de Acceso</p>
        <form method="post" id="frmAcceso" >
          <div class="form-group has-feedback">
            <input type="text"  name="logina" id="cuenta" class="form-control" placeholder="Usuario" >
            <span class="fa fa-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password"  name="clavea" id="pass" class="form-control" placeholder="Password" value="12345">
            <span class="fa fa-key form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">

        
               <input type="submit" class="btn btn-primary btn-block btn-flat" value="Ingreso">



            </div><!-- /.col -->
          </div>
        </form>

        
        <a href="#">Olvidé mi Contraseña</a><br>
        

      </div><!-- /.login-box-body -->
          <?php 

          $ingreso = ControladorSigai::ctrIngreso();
          

          ?>
    </div><!-- /.login-box -->


    <!-- jQuery -->
    <script src="<?php echo $sigai["ts_dominio"]; ?>public/js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo $sigai["ts_dominio"]; ?>public/js/bootstrap.min.js"></script>
     <!-- Bootbox -->
    <script src="<?php echo $sigai["ts_dominio"]; ?>public/js/bootbox.min.js"></script>

    
    <script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>vistas/scripts/reloj.js"></script>

    <script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>vistas/scripts/login.js"></script>


  </body>
</html>