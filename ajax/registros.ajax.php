<?php 

require_once "../controladores/sigai.controlador.php";
require_once "../modelos/sigai.modelo.php";

/**
 * 
 */
class RegistrosAJAX
{

	
	/*=============================================
	Obtener caso de acuerdo a su id para mostrarlo en el formulario. Tambien mostrar informacion de los casos que
	pertecen a cada usuario
	=============================================*/
	public function ajaxMostrarCaso($codigo)
	{
			
		$respuesta = ControladorSigai::ctrMostrarCasosAJAX($codigo);

		echo json_encode($respuesta);

	}

	/*=============================================
	Verificar inicio de sesion 
	=============================================*/
	public function ajaxVerificarUsuario($valor,$valor2)
	{

		$respuesta = ControladorSigai::ctrMostrarCuentasUsuarios($valor,$valor2);

		echo json_encode($respuesta);
	}

	public function ajaxAltaCasoSeguimiento()
	{
		$respuesta = ControladorSigai::ctrAltaCasoSeguimiento();

		echo json_encode($respuesta);
	}
	

}

	/*=============================================
	Switch elige la opcion y ejecuta la accion para AJAX
	=============================================*/
	switch ($_GET["op"]) {

	/*=============================================
	Objeto de AJAX que recibe la variable POST, muestra la informacion en un formularios
	=============================================*/
	case 'mostrar':

		if(isset($_POST["cod"]))
		{

			$ajaxCaso = new RegistrosAJAX();

			$codigo = $_POST["cod"];
			
			$ajaxCaso -> ajaxMostrarCaso($codigo);

		}

		break;	


	/*=============================================
	Objeto de AJAX para verificar si existe un usuario
	=============================================*/
	case 'verificar':
		
			if(isset($_POST["logina"]) && isset($_POST["clavea"]))
			{

				$logina = $_POST["logina"];
				$clavea = $_POST["clavea"];

				$ajaxVerificar = new RegistrosAJAX();
				$ajaxVerificar->ajaxVerificarUsuario($logina,$clavea);

		
			}
		break;

	case 'guardaryeditarSeguimiento':

		$respuesta = ControladorSigai::ctrAltaCasoSeguimiento();

		if($respuesta != ""){

			echo "es correcto";
		}

		break;
		
	}
		
	

 ?>