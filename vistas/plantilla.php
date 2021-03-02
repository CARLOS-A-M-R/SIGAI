<?php
/*===========================================================* 
     Contenido del sistema y la tabla sigai
 =============================================================*/
$sigai = ControladorSigai::ctrMostrarSigai();

/*===========================================================* 
 Muestra a todos los analistas registrados 
 =============================================================*/
$analista = ControladorSigai::ctrMostrarAnalista();

/*===========================================================* 
 Muestra a todos los casos de investigacion dados por primera vez de alta
 =============================================================*/
$casos = ControladorSigai::ctrMostrarCasos(null, null);
//echo '<prev class="bg-white">'; print_r($casos); echo '</prev>';

/*===========================================================* 
 Paginas y rutas, esto se apoyara con las url amigables
 =============================================================*/
$paginas = ControladorSigai::ctrMostrarPaginas(null, null);



?>

<?php

// Variable que definira que tipo de ruta pagina se podra acceder
$validarRuta = "";

// Captura lo que venga del $_GET pagina, esto siguiendo una regla en el archivo "web.config" Url Amigable
if (isset($_GET['pagina'])) {

	// Variable que captura el contenido de la url pagina para convertirlo en una array y delimitar con una diagonal ejemplo; "192.168.1.72/pagina1/pagina2" => modulo[0] = pagina1, modulo[1] = pagina2... module[n]
	$modulo = explode('/', $_GET['pagina']);

	// Toma el objeto $paginas declarado al inicio y recorre las opciones disponibles de paginas en la base datos para indicar a que ruta va tener acceso
	foreach ($paginas as $key => $value) {

		$ruta_pagina = $value["tp_ruta_pagina"];

		if ($modulo[0] == $ruta_pagina) {

			$validarRuta = "ingreso";

			break;
		}
	}

	/*=======================================================================================================
	Validar Rutas; de acuerdo al tipo de modulo, estos seran admitidos en la url para su navegacion, si no se encuentra validadas en modilo[0] y en la base datos no permitira acceder
	=======================================================================================================*/
	if ($validarRuta == "ingreso" && $modulo[0] == "login") {

		include 'paginas/login.php';
	} else if ($validarRuta == "ingreso" && $modulo[0] == "salir") {

		include 'paginas/salir.php';
	} else if ($validarRuta == "ingreso" && $modulo[0] == "modulos") {

		//En caso de no solicitar nada en la navegacion modulo[0], a continuacion valida la plantilla general del sistema, lo anterior pertece al Login  

?>

		<?php

		// Es requerido iniciar sesion para que los modulos puedan trabajar con $_SESSIONES   
		ob_start();
		session_start();

		?>

		<!DOCTYPE html>
		<html lang="en">

		<head>

			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


			<?php

			/*===========================================================* 
     Capturamos el nombre de la pagina con variable $_GET
     =============================================================*/

			/*===========================================================* 
     	Capturamos la pagina ... pendiente
     	=============================================================*/

			/*===========	================================================* 
     	Validamos si existe la pagina para trabajar con los metadatos
     	=============================================================*/

			?>

			<link rel="icon" href="<?php echo $sigai["ts_dominio"] . $sigai["ts_icono"]; ?>">

			<!--=====================================
	PLUGINS DE CSS
	======================================-->
			<link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/bootstrap.min.css">
			<link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="<?php echo $sigai["ts_dominio"]; ?>public/css/animate.css">

			<!-- Font Awesome -->
			<link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/font-awesome.css">
			<!-- Theme style -->
			<link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/AdminLTE.min.css">
			<link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/AdminLTE.css">
			<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
			<link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/_all-skins.min.css">
			<link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/_all-skins.css">
			<!--<link rel="apple-touch-icon" href="<?php //echo $sigai["ts_dominio"]; 
													?>public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php //echo $sigai["ts_dominio"]; 
									?>public/img/favicon.ico">-->

			<!--DATA TABLES -->

			<link rel="stylesheet" type="text/css" href="<?php echo $sigai["ts_dominio"]; ?>public/datatables/jquery.dataTables.min.css">
			<link rel="stylesheet" type="text/css" href="<?php echo $sigai["ts_dominio"]; ?>public//datatables/buttons.dataTables.min.css">
			<link rel="stylesheet" type="text/css" href="<?php echo $sigai["ts_dominio"]; ?>public/datatables/responsive.dataTables.min.css">
			<link href="<?php echo $sigai["ts_dominio"]; ?>public/css/estilos.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="<?php echo $sigai["ts_dominio"]; ?>public/css/bootstrap-select.min.css">
			<link rel="stylesheet" href="<?php echo $sigai["ts_dominio"]; ?>public/css/jquery-ui.min.css">



			<script src="<?php echo $sigai["ts_dominio"]; ?>public/js/jquery-3.1.1.min.js"></script>


			<!-- jQuery 2.1.4 -->

			<script src="<?php echo $sigai["ts_dominio"]; ?>public/js/jquery-ui.min.js"></script>
			<!-- Bootstrap 3.3.5 -->
			<script src="<?php echo $sigai["ts_dominio"]; ?>public/js/bootstrap.min.js"></script>
			<!-- AdminLTE App -->
			<script src="<?php echo $sigai["ts_dominio"]; ?>public/js/app.min.js"></script>
			<!--DATA TABLES -->
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>public/datatables/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>public/datatables/dataTables.buttons.min.js"></script>
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>public/datatables/buttons.html5.min.js"></script>
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>public/datatables/buttons.colVis.min.js"></script>
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>public/datatables/jszip.min.js"></script>
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>public/datatables/pdfmake.min.js"></script>
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>public/datatables/vfs_fonts.js"></script>

			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>public/js/bootbox.min.js"></script>
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>public/js/bootstrap-select.min.js"></script>
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>vistas/scripts/reloj.js"></script>
			<script type="text/javascript" src="<?php echo $sigai["ts_dominio"]; ?>vistas/scripts/principal.js"></script>


		</head>

		<body onload="startTime()" class="hold-transition skin-blue sidebar-mini sidebar-collapse">
			<div class="wrapper">
				<header class="main-header">

					<a href="<?php echo $sigai["ts_dominio"]; ?>" class="logo">
						<span class="logo-mini"><b>SI</b>GAI</span>
						<span class="logo-lg"><b>..:SIGAI:..</b></span>
					</a>

					<nav class="navbar navbar-static-top" role="navigation">

						<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
							<span class="sr-only">Navegación</span>
						</a>

						<!-- USUARIO -->
						<a class="navbar-brand" href="#">

							<?php
							// Se comprueba que exista un sesion 
							if (empty($_SESSION['validarIngreso'])) {
								header("Location: ../login");
								return;
							} else {
								echo $_SESSION['validarIngreso'];
							}
							?>

						</a>

						<a href="<?php echo $sigai['ts_dominio']; ?>salir" class="navbar-brand"><i class="fa fa-power-off" aria-hidden="true"></i></a>

						<a id="date" class="navbar navbar-brand"></a>
						<a id="clock" class="navbar navbar-brand"></a>

						<div class="navbar-brand">
							<?php //Incluir conexion si que si
							?>
							<div class="demo-content">
								<div id="notification-header">
									<div style="position: relative;">
										<button id="notification-icon" name="button" class="dropbtn">
											<span id="notification-count">
												<?php //if($count>0) { echo $count; } 
												$notificacion = "tac_notificacion_usuario";
												$actualizarNotificacion = 0;
												$infoCasosRegistrados = ControladorSigai::ctrMostrarCasosRegistradosUsuario($notificacion, $actualizarNotificacion);
												$contarNotificacion = count($infoCasosRegistrados);
												if ($contarNotificacion > 0) {
													echo $contarNotificacion;
												}
												?>
											</span>
											<img style="border-color: red;" src="<?php echo $sigai["ts_dominio"] . $sigai["ts_imagen_notificacion"]; ?>" />
										</button>
										<div id="notification-latest">
											<?php foreach ($infoCasosRegistrados as $key => $value) : ?>
												<div class="notification-item">
													<div class="notification-subject">
														<?php echo '<elemento>' . $value["tac_asigna_caso"] . '</elemento>' . '<b>&nbsp Te asignó:   </b>'; ?>
													</div>
													<div class="notification-subject">
														<?php echo "<b>Número caso: &nbsp</b>" . $value["tac_cod_alta"] . "&nbsp &nbsp <b>Fecha:</b> &nbsp <span>" . $value["tac_fecha_alta"] . "</span>"; ?>
													</div>
												</div>
											<?php endforeach ?>
										</div>
									</div>
								</div>
							</div>
						</div>
			</div>


			</nav>
			</header>

			<aside class="main-sidebar">
				<section class="sidebar">
					<ul class="sidebar-menu">
						<li class="header"></li>
						<?php //pendiente contenido 
						?>
						<br>
						<?php
						foreach ($paginas as $key => $value) {
							$modulos = $value["tp_ruta_pagina"];

							if ($modulos == "modulos") {

								break;
							}
						}

						?>

						<li>
							<a href="<?php echo $sigai["ts_dominio"] . $modulos; ?>/escritorio">
								<i class="fa fa-tasks"></i> <span>Escritorio</span>
							</a>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-laptop"></i>
								<span> Casos</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<?php if ($_SESSION["validarIngresoNivelUsuario"] == 3) : ?>
									<li><a href="<?php echo $sigai["ts_dominio"] . $modulos; ?>/caso"><i class="fa fa-circle-o"></i> Agregar Casos</a></li>
								<?php endif ?>
								<li><a href="<?php echo $sigai["ts_dominio"] . $modulos; ?>/consultaCaso"><i class="fa fa-circle-o"></i> Consulta Casos</a></li>
							</ul>
						</li>

						<li class="treeview">
							<a href="#">
								<i class="fa fa-users"></i>
								<span> Usuarios</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="usuario.php"><i class="fa fa-circle-o"></i> Consulta Usuarios</a></li>
								<li><a href="analista.php"><i class="fa fa-circle-o"></i> Consulta Analistas</a></li>
							</ul>
						</li>


						<li>
							<a href="#">
								<i class="fa fa-plus-square"></i> <span>Ayuda</span>
								<small class="label pull-right bg-red">PDF</small>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-info-circle"></i> <span>Acerca De...</span>
								<small class="label pull-right bg-yellow">IT</small>
							</a>
						</li>
					</ul>
				</section>
			</aside>
			</div>

			<?php

			/*=============================================
	Módulos fijos superiores
	=============================================*/


			/*=============================================
	Navegar entre páginas
	=============================================*/
			$validarRuta = "";

			if (isset($modulo[1])) {
				foreach ($paginas as $key => $value) {

					$ruta_pagina = $value["tp_ruta_pagina"];

					if ($modulo[1] == $ruta_pagina) {

						$validarRuta = "modulos";

						break;
					}
				}
			}

			if ($validarRuta == "modulos" && $modulo[1] == "escritorio") {
				include "paginas/escritorio.php";
			} else if ($validarRuta == "modulos" && $modulo[1] == "caso") {

				include "paginas/caso.php";
			} else if ($validarRuta == "modulos" && $modulo[1] == "consultaCaso") {

				include "paginas/consulta_caso.php";
			} else {

				include "paginas/escritorio.php";
			}








			/*=============================================
	Validar Rutas
	=============================================*/


			?>

		</body>

<?php
	} else {

		include "paginas/404.php";
	}
} else {

	include 'paginas/login.php';
}

?>