<?php

require_once "conexion.php";

class ModeloSigai{

     /*===========================================================* 
     Mostrar contenido de la tabla sigai
     =============================================================*/
     static public function mdlMostrarSigai($tabla)
     {

          $sql = "SELECT * FROM $tabla";

          $stmt = Conexion::conectar()->prepare($sql);
          $stmt->execute();

          return $stmt->fetch();

          $stmt->close();
          $stmt = null;

     }

	/*===========================================================* 
     Mostrar paginas
     =============================================================*/
     static public function mdlMostrarPaginas($tabla,$item,$valor)
     {

          if($item == null && $valor == null)
          {

          	$sql = "SELECT * FROM $tabla";

          	$stmt = Conexion::conectar()->prepare($sql);
          	$stmt->execute();

          	return $stmt->fetchAll();
          }     

     	$stmt->close();
     	$stmt = null;
     }

     /*===========================================================* 
     Mostrar Analistas
     =============================================================*/
     static public function mdlMostrarAnalista($tabla)
     {

          $sql = "SELECT * FROM $tabla";

          $stmt = Conexion::conectar()->prepare($sql);
          $stmt->execute();

          return $stmt->fetchAll();

          $stmt->close();
          $stmt = null;
     }

     /*===========================================================* 
     Mostrar Casos
     =============================================================*/
     static public function mdlMostrarCasos($tabla,$tabla2, $item, $valor)
     {

          if($item != null && $valor != null)
          {

               $sql = "SELECT $tabla.*,$tabla2.* FROM $tabla INNER JOIN $tabla2 
                      ON $tabla.tac_analista = $tabla2.ta_cod_analista WHERE $item = :$item";

               $stmt = Conexion::conectar()->prepare($sql);

               $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);

               $stmt->execute();

               return $stmt->fetchAll();

          }else{

               $sql2 = "SELECT $tabla.*,$tabla2.* FROM $tabla INNER JOIN $tabla2 
                      ON $tabla.tac_analista = $tabla2.ta_cod_analista";

               $stmt = Conexion::conectar()->prepare($sql2);

               $stmt->execute();

               return $stmt->fetchAll();


          }

               $stmt->close();
               $stmt = null;
     }


     /*===========================================================* 
     Mostrar Casos de Investigacion con AJAX
     =============================================================*/
     static public function mdlMostrarCasosAJAX($tabla,$tabla2, $item,$valor)
     {

          $sql = "SELECT $tabla.*,$tabla2.* FROM $tabla INNER JOIN $tabla2 
                      ON $tabla.tac_analista = $tabla2.ta_cod_analista WHERE $item = :$item";

          $stmt = Conexion::conectar()->prepare($sql);

          $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);

          $stmt->execute();

          return $stmt->fetch();

          $stmt->close();
          $stmt = null;

     }

      /*===========================================================* 
     Mostrar Cuentas de Usuarios
     =============================================================*/
     static public function mdlMostrarCuentasUsuarios($tabla,$tabla2,$item,$valor)
     {

          $stmt = Conexion::conectar()->prepare("SELECT $tabla.*,$tabla2.* FROM $tabla INNER JOIN $tabla2 ON $tabla.tcu_cod_analista = $tabla2.ta_cod_analista
               WHERE $item = :$item AND tcu_status_cuenta = '1' ORDER BY tcu_cod_cuenta DESC");

               $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
               $stmt->execute();

               return $stmt->fetch();

          $stmt->close();
          $stmt = null;

     }


     /*===========================================================* 
     Alta caso de investigacion declarando un objeto de la fuente PDO
     
     static public function mdlAltaCaso($tabla,$datos,$tabla2)
     {
          $respuesta = new Conexion();

          $sql = "INSERT INTO $tabla(tac_fecha_origen,tac_fecha_limite,tac_correo_origen,tac_area,tac_analista,tac_asunto,
          tac_descripcion,tac_evidencia,tac_asigna_caso)VALUES(:tac_fecha_origen,:tac_fecha_limite,:tac_correo_origen,:tac_area,:tac_analista,:tac_asunto,:tac_descripcion,
                :tac_evidencia,:tac_asigna_caso)";

          $stmt = $respuesta->pdo->prepare($sql);

          $stmt->bindParam(":tac_fecha_origen", $datos["tac_fecha_origen"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_fecha_limite",$datos["tac_fecha_limite"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_correo_origen",$datos["tac_correo_origen"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_area", $datos["tac_area"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_analista",$datos["tac_analista"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_asunto", $datos["tac_asunto"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_descripcion", $datos["tac_descripcion"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_evidencia", $datos["tac_evidencia"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_asigna_caso", $datos["tac_asigna_caso"], PDO::PARAM_STR);

          $stmt->execute();

          $cod_caso = $respuesta->pdo->lastInsertId();

          $stmt2 = Conexion::conectar()->prepare("INSERT INTO $tabla2(tcc_cod_caso)VALUES($cod_caso)");

          if($stmt2->execute())
          {
               
               return "ok";
          }else{

               print_r(Conexion::conectar()->errorInfo());
          }

          $stmt->close();
          $stmt=null;
     }
     =============================================================*/
      /*===========================================================* 
     Alta caso de investigacion
     =============================================================*/
     static public function mdlAltaCaso($tabla,$datos)
     {

          $sql = "INSERT INTO $tabla(tac_fecha_origen,tac_fecha_limite,tac_correo_origen,tac_area,tac_analista,tac_asunto,
          tac_descripcion,tac_evidencia,tac_asigna_caso)VALUES(:tac_fecha_origen,:tac_fecha_limite,:tac_correo_origen,:tac_area,:tac_analista,:tac_asunto,:tac_descripcion,
                :tac_evidencia,:tac_asigna_caso)";

          $stmt = Conexion::conectar()->prepare($sql);

          $stmt->bindParam(":tac_fecha_origen", $datos["tac_fecha_origen"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_fecha_limite",$datos["tac_fecha_limite"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_correo_origen",$datos["tac_correo_origen"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_area", $datos["tac_area"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_analista",$datos["tac_analista"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_asunto", $datos["tac_asunto"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_descripcion", $datos["tac_descripcion"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_evidencia", $datos["tac_evidencia"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_asigna_caso", $datos["tac_asigna_caso"], PDO::PARAM_STR);


          if($stmt->execute())
          {
               return "ok";
          }else{

               print_r(Conexion::conectar()->errorInfo());
          }

          $stmt->close();
          $stmt=null;
     }

       /*===========================================================* 
     Alta caso de investigacion en el proceso de Seguimiento
     =============================================================*/
     static public function mdlAltaCasoSeguimiento($tabla,$datos)
     {

          $sql = "INSERT INTO $tabla(tci_cod_caso,tci_rfc,tci_nombre_razon_social,tci_id_persona,tci_numero_cuenta,tci_situacion_actual,
                                     tci_seguimiento,tci_observaciones)VALUES(:tci_cod_caso,tci_rfc,:tci_nombre_razon_social,:tci_id_persona,
                                     :tci_numero_cuenta,:tci_situacion_actual,:tci_seguimiento,:tci_observaciones)";

          $stmt = Conexion::conectar()->prepare($sql);

          $stmt->bindParam(":tci_cod_caso", $datos["tci_cod_caso"], PDO::PARAM_STR);
          $stmt->bindParam(":tci_rfc",$datos["tci_rfc"], PDO::PARAM_STR);
          $stmt->bindParam(":tci_nombre_razon_social",$datos["tci_nombre_razon_social"], PDO::PARAM_STR);
          $stmt->bindParam(":tci_id_persona", $datos["tci_id_persona"], PDO::PARAM_STR);
          $stmt->bindParam(":tci_numero_cuenta",$datos["tci_numero_cuenta"], PDO::PARAM_STR);
          $stmt->bindParam(":tci_situacion_actual", $datos["tci_situacion_actual"], PDO::PARAM_STR);
          $stmt->bindParam(":tci_seguimiento", $datos["tci_seguimiento"], PDO::PARAM_STR);
          $stmt->bindParam(":tci_observaciones", $datos["tci_observaciones"], PDO::PARAM_STR);
          
          if($stmt->execute())
          {
               return "ok";
          }else{

               print_r(Conexion::conectar()->errorInfo());
          }

          $stmt->close();
          $stmt=null;
     }


     /*===========================================================* 
     Mostrar casos de investigacion registrados de acuerdo al usuario logueado
     =============================================================*/
     static public function mdlMostrarCasosRegistradosUsuario($tabla,$tabla2, $tabla3, $sesion_actual, $item,$valor)
     {
          if($item == NULL && $valor == NULL )
          {
               $sql = "SELECT $tabla.*,$tabla2.*,$tabla3.* FROM $tabla 
                              INNER JOIN $tabla2 ON tac_analista = ta_cod_analista
                              INNER JOIN $tabla3 ON tcu_cod_analista = ta_cod_analista
                              WHERE ta_nombre_completo =  '$sesion_actual'" ;

               $stmt = Conexion::conectar()->prepare($sql);
               $stmt->execute();

               return $stmt->fetchAll();

               $stmt->close();
               $stmt = null;

          }else{

               $sql2 = "SELECT $tabla.*,$tabla2.*,$tabla3.* FROM $tabla 
                         INNER JOIN $tabla2 ON tac_analista = ta_cod_analista
                         INNER JOIN $tabla3 ON tcu_cod_analista = ta_cod_analista
                          WHERE ta_nombre_completo =  '$sesion_actual' AND $item = :$item " ;

               $stmt2 = Conexion::conectar()->prepare($sql2);

               $stmt2->bindParam(":".$item,$valor,PDO::PARAM_STR);

               $stmt2->execute();

               return $stmt2->fetchAll();

               $stmt2->close();
               $stmt2 = null;          
          }     
     }


     /*===========================================================* 
     Actualizar un caso de investigacion
     =============================================================*/
     static public function mdlActualizarCaso($tabla,$datos,$item,$valor)
     {

          $sql = "UPDATE $tabla SET tac_fecha_origen = :tac_fecha_origen, tac_fecha_limite = :tac_fecha_limite,tac_correo_origen = :tac_correo_origen,tac_area = :tac_area,tac_analista =:tac_analista,tac_asunto = :tac_asunto,
          tac_descripcion = :tac_descripcion WHERE $item = :$item";

          $stmt = Conexion::conectar()->prepare($sql);

          $stmt->bindParam(":tac_fecha_origen", $datos["tac_fecha_origen"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_fecha_limite",$datos["tac_fecha_limite"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_correo_origen",$datos["tac_correo_origen"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_area", $datos["tac_area"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_analista",$datos["tac_analista"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_asunto", $datos["tac_asunto"], PDO::PARAM_STR);
          $stmt->bindParam(":tac_descripcion", $datos["tac_descripcion"], PDO::PARAM_STR);
          $stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);

          if($stmt->execute())
          {
               return "ok";
          }else{

               print_r(Conexion::conectar()->errorInfo());
          }

          $stmt->close();
          $stmt=null;
     }


}

 ?>