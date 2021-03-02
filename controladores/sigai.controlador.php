<?php 

class ControladorSigai
{

     /*===========================================================* 
     MIngresar al sistema desde la vista login
     =============================================================*/
     public static function ctrIngreso()
     {

          if(isset($_POST['logina']))
          {

               $tabla = "tbl_cuentas_usuarios";
               $tabla2 = "tbl_analistas";
               $item = "tcu_nombre_cuenta";
               $valor = $_POST["logina"];


               $respuesta = ModeloSigai::mdlMostrarCuentasUsuarios($tabla, $tabla2, $item, $valor);

               if($respuesta["tcu_nombre_cuenta"] == $_POST["logina"] && $respuesta["tcu_pass_cuenta"] == $_POST["clavea"])
               {

                    $_SESSION["validarIngreso"] = $respuesta["ta_nombre_completo"];
                    $_SESSION["validarIngresoID"] = $respuesta["ta_cod_analista"];
                    $_SESSION["validarIngresoNivelUsuario"] = $respuesta["tcu_nivel_cuenta"];

                    echo '<script>
                    
                              if(window.history.replaceState)
                              {
                                   window.history.replaceState(null,null,window.location.href);
                              }
                              window.location = "modulos/escritorio";

                    </script>';

                    

               }else{

                     echo '<script>
                              if(window.history.replaceState)
                              {
                                   window.history.replaceState(null,null,window.location.href);
                              }
                              </script>';  

                    echo '<div class="alert bg-danger text-center mensajes">
                              Error al ingresar al sistema, el nombre o la contraseña no coinciden
                         </div>';  

               }



          }

          
     }

	/*===========================================================* 
     Mostrar contenido de la tabla sigai
     =============================================================*/
     static public function ctrMostrarSigai()
     {

     	$tabla = "tbl_sigai";

     	$respuesta = ModeloSigai::mdlMostrarSigai($tabla);

     	return $respuesta;
     }

	/*===========================================================* 
     Mostrar Paginas
     =============================================================*/
     static public function ctrMostrarPaginas($item,$valor)
     {

     	$tabla = "tbl_paginas";

     	$respuesta = ModeloSigai::mdlMostrarPaginas($tabla,$item,$valor);

     	return $respuesta;
     }

     /*===========================================================* 
     Mostrar Analistas
     =============================================================*/
     static public function ctrMostrarAnalista()
     {

          $tabla = "tbl_analistas";

          $respuesta = ModeloSigai::mdlMostrarAnalista($tabla);

          return $respuesta;
     }

     /*===========================================================* 
     Mostrar Casos de Investigacion
     =============================================================*/
     static public function ctrMostrarCasos($item,$valor)
     {

               $tabla = "tbl_alta_caso";

               $tabla2 = "tbl_analistas";

               $respuesta = ModeloSigai::mdlMostrarCasos($tabla,$tabla2,$item,$valor);

               return $respuesta;

         
     }

     /*===========================================================* 
     Mostrar Casos de Investigacion con AJAX
     =============================================================*/
     static public function ctrMostrarCasosAJAX($valor)
     {
          $tabla = "tbl_alta_caso";

          $tabla2 = "tbl_analistas";

          $item = "tac_cod_alta";

          $respuesta = ModeloSigai::mdlMostrarCasosAJAX($tabla, $tabla2, $item,$valor);

          return $respuesta;

     }

       /*===========================================================* 
     Mostrar Casos de Investigacion de cada usuario con AJAX
     
     static public function ctrMostrarCasosRegistradosUsuarioAJAX($valor)
     {
          $tabla = "tbl_alta_caso";
          $tabla2 = "tbl_analistas";
          $tabla3 = "tbl_cuentas_usuarios";

          $item = "tac_cod_alta";

          $respuesta = ModeloSigai::mdlMostrarCasosRegistradosUsuarioAJAX($tabla, $tabla2,$tabla3, $item,$valor);

          return $respuesta;

     }
     =============================================================*/

     /*===========================================================* 
     Mostrar Cuentas de Usuarios
     =============================================================*/
     static public function ctrMostrarCuentasUsuarios($valor,$valor2)
     {
          $tabla = "tbl_cuentas_usuarios";

          $tabla2 = "tbl_analistas";

          $item = "tcu_nombre_cuenta";

          $item2 = "tcu_pass_cuenta";

          $respuesta = ModeloSigai::mdlMostrarCuentasUsuarios($tabla, $tabla2, $item,$item2,$valor,$valor2);

          return $respuesta;

     }

     /*===========================================================* 
     Alta de caso de investigacion
     =============================================================*/
     static public function ctrAltaCaso()
     {

          if(isset($_POST["fecha_origen"]))
          {

               /*===========================================================* 
               Validar foto del lado del Servidor
               =============================================================*/
               if(isset($_FILES["fotoOpinion"]["tmp_name"]) && !empty($_FILES["fotoOpinion"]["tmp_name"]))
               {

                    /*===========================================================* 
                    Capturar ancho y alto original de la imagen y definir los nuevos valores
                    =============================================================*/
                    list($ancho,$alto) = getimagesize($_FILES["fotoOpinion"]["tmp_name"]);

                    $nuevoAncho = 128;
                    $nuevoAlto = 128;

                    /*===========================================================* 
                    Creamos el directorio donde se guardara la foto del usuario
                    =============================================================*/
                    $directorio = "public/images/evidencias/";

                    if($_FILES["fotoOpinion"]["type"] == "image/jpeg")
                    {

                         $aleatorio = mt_rand(100,9999);
                         
                         $ruta = $directorio.$aleatorio.".jpg";
                         
                         $origen = imagecreatefromjpeg($_FILES["fotoOpinion"]["tmp_name"]);
                         
                         $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                         
                         imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                         
                         imagejpeg($destino,$ruta);

                    }else if($_FILES["fotoOpinion"]["type"] == "image/png"){

                         $aleatorio = mt_rand(100,9999);
                         
                         $ruta = $directorio.$aleatorio.".png";
                         
                         $origen = imagecreatefrompng($_FILES["fotoOpinion"]["tmp_name"]);
                         
                         $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                         imagealphablending($destino, FALSE);

                         imagesavealpha($destino, TRUE);
                         
                         imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                         
                         imagepng($destino,$ruta);
                    }else{

                         return "error-formato";
                    }

               }else{

                   $ruta = "vistas/img/usuarios/usuario_defecto.png"; 
               }

                    $tabla = "tbl_alta_caso";

                    $datos = array(

                         "tac_fecha_origen" => $_POST["fecha_origen"],
                         "tac_fecha_limite" => $_POST["fecha_limite"],
                         "tac_correo_origen" => $_POST["correo_origen"],
                         "tac_area" => $_POST["area"],
                         "tac_analista" => $_POST["analista"],
                         "tac_asunto" => $_POST["asunto"],
                         "tac_descripcion" => $_POST["descripcion"],
                         "tac_evidencia" => $ruta,
                         "tac_asigna_caso" => $_SESSION['validarIngreso']
                    );

                    $tabla2 = "tbl_consulta_caso";

                    $respuesta = ModeloSigai::mdlAltaCaso($tabla,$datos,$tabla2);

                    return $respuesta;

          }     
     }

     /* Metodo para almacenar un caso cuanto este se encuentra en el proceso de seguimiento  */
     static public function ctrAltaCasoSeguimiento()
     {
          if(isset($_POST["rfc-cliente"]) && isset($_POST["nombreRS-cliente"]) )
          {
               $tabla = "tbl_clientes_inbursa";

                    $datos = array(

                         "tci_cod_caso" => $_POST["codCaso"],
                         "tci_rfc" => $_POST["rfc-cliente"],
                         "tci_nombre_razon_social" => $_POST["nombreRS-cliente"],
                         "tci_id_persona" => $_POST["id-cliente"],
                         "tci_numero_cuenta" => $_POST["numeroCuenta-cliente"],
                         "tci_situacion_actual" => $_POST["situacion-cliente"],
                         "tci_seguimiento" => $_POST["seguimiento-cliente"],
                         "tci_observaciones" => $_POST["observaciones-cliente"]
                    );

                    $respuesta = ModeloSigai::mdlAltaCasoSeguimiento($tabla,$datos);

                    return $respuesta;
          }

     }

     static public function ctrActualizarCaso($valor)
     {

          if(isset($_POST["fecha_origen"]))
          {

                    $tabla = "tbl_alta_caso";

                    $datos = array(

                         "tac_cod_alta" => $_POST["cod"],
                         "tac_fecha_origen" => $_POST["fecha_origen"],
                         "tac_fecha_limite" => $_POST["fecha_limite"],
                         "tac_correo_origen" => $_POST["correo_origen"],
                         "tac_area" => $_POST["area"],
                         "tac_analista" => $_POST["analista"],
                         "tac_asunto" => $_POST["asunto"],
                         "tac_descripcion" => $_POST["descripcion"]
                         
                    );

                    $item = "tac_cod_alta";

                    $respuesta = ModeloSigai::mdlActualizarCaso($tabla,$datos,$item,$valor);

                    return $respuesta;

          }     
     }

     /*===========================================================* 
     Mostrar casos de investigacion registrados de acuerdo al usuario logueado
     =============================================================*/
     static public function ctrMostrarCasosRegistradosUsuario($item,$valor)
     {
          $tabla = "tbl_alta_caso";
          $tabla2 = "tbl_analistas";
          $tabla3 = "tbl_cuentas_usuarios";
        
          $sesion_actual=  $_SESSION['validarIngreso'];

          $respuesta = ModeloSigai::mdlMostrarCasosRegistradosUsuario($tabla,$tabla2,$tabla3,$sesion_actual, $item,$valor);

          return $respuesta;

     }
}

 ?>