var tabla;

function init(){

	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});

}

	function limpiar(){


		$('#fecha_origen').val("");
		$("#fecha_limite").val("");
		$("#correo_origen").val("");
		$("#area").val("");
		$("#analista").val("");
		$("#asunto").val("");
		$("#descripcion").val("");
		$("#fotoOpinion").val("");
		$(".prevFotoOpinion").val("");
		

	}

	function mostrarform(flag){

		limpiar();
		if (flag)
		{
			$("#listadoregistros").hide();
			$("#formularioregistros").show();
			$("#btnGuardar").prop("disabled",false);
			$("#btnagregar").hide();
		}
		else
			{
				$("#listadoregistros").show();
				$("#formularioregistros").hide();
				$("#btnagregar").show();
			}
	}

	function cancelarform()
	{
		limpiar();
		mostrarform(false);
	}

	//Función Listar
	function listar()
	{
		tabla=$('#tbllistado').dataTable(
		{
			"aProcessing": true,//Activamos el procesamiento del datatables
		    "aServerSide": true,//Paginación y filtrado realizados por el servidor
		    dom: 'Bfrtip',//Definimos los elementos del control de tabla
		    buttons: [		          
			            'copyHtml5',
			            'excelHtml5',
			            'csvHtml5',
			            'pdf'
			        ],
		
			"bDestroy": true,
			"iDisplayLength": 20,//Paginación
		    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
		}).DataTable();
	}

	function mostrar(cod)
	{
		$.post("../ajax/registros.ajax.php?op=mostrar",{cod : cod}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#fecha_origen").val(data.tac_fecha_origen);
		$("#fecha_limite").val(data.tac_fecha_limite);
		$("#correo_origen").val(data.tac_correo_origen);
		$("#area").val(data.tac_area);
		$("#analista").val(data.tac_analista);
		$("#analista").selectpicker('refresh');
		$("#asunto").val(data.tac_asunto);
		$("#descripcion").val(data.tac_descripcion);
		$("#cod").val(data.tac_cod_alta);
		

 		});
	}
		
init();

		/*=============================================
		Subir foto temporal opinion
		=============================================*/

		$('#fotoOpinion').change(function(){

			$(".alert").remove();

			var imagen = this.files[0];
			
			/*Para imprimir y probar propiedades de la imagen
			console.log("imagen",imagen);*/

		/*=============================================
		Validar el formato de la imagen sea JPG o PNG
		=============================================*/

		if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png")
		{
			$('#fotoOpinion').val("");
			$('#fotoOpinion').after(`
		      <div class="alert alert-danger">¡La imagen debe de estar en formato JPG o PNG!</div>
				`);

			return;

		/*=============================================
		Validar el peso de la imagen 
		=============================================*/	

		}else if(imagen["size"] > 2000000){

			$('#fotoOpinion').val("");
			$('#fotoOpinion').after(`
		      <div class="alert alert-danger">¡La imagen no debe exceder los 2MB!</div>
				`);

			return;

		}else{

		/*=============================================
		Visualizar la imagen 
		=============================================*/	

			var datosImagen = new  FileReader;
			
			datosImagen.readAsDataURL(imagen);
			
			$(datosImagen).on("load", function(event){
				var rutaImagen = event.target.result;

				$('.prevFotoOpinion').attr("src",rutaImagen);
			});

		}

		});