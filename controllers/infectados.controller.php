<?php 

class InfectadosController{	

	/* Mostrar infectados */	

	static public function ctrMostrarInfectados(){

		$sql = "select * from infected;";
		$datos = InfectadosModel::query_array($sql);

		//var_dump($datos);
		return $datos;
	}



	static public function ctrInsertarNuevosInfectados(){

		$url = "https://randomuser.me/api/?results=2";
		//$table = "infected";
		
		$result = InfectadosModel::generarCSV($url);
/*
		if($result == "success"){

			$dir = "../views/images/infectados";

			if(!is_dir($dir)){
				mkdir($dir);
			}

			$contenido = json_encode($_POST);
			file_put_contents("{$dir}/{$_POST['id']}.json", $contenido);

			header("location:infectados.php");
		}


*/


/*
		echo '<script>

		swal({

			type: "error",
			title: "¡Estoy funcionando!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar"

		}).then(function(result){

			if(result.value){
			
				window.location = "infectados";

			}

		});				

	</script>';


	*/
		/*

		$table = "infected";

				//$encryptedPwd = crypt($_POST["new-pwd"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$data = array(
					"cedula" => $_POST["new-cedula"],
					"nombre" => $_POST["new-nombre"],
					"apellido" => $_POST["new-apellido"],										
					"ciudad" => $_POST["new-ciudad"],
					"curso" => $_POST["new-curso"],
					"comentario" => $_POST["new-comentario"],
					"foto" => $route
				);
				$result = InfectadosModel::mdlInsertarDatos($table, $data);

				if($result == "success"){

						echo '<script>

								swal({

									type: "success",
									title: "¡La solicitud ha sido guardada correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){

									if(result.value){
									
										window.location = "solicitudes";

									}

								});				

							</script>';									

			} else {

				echo '<script>

					swal({

						type: "error",
						title: "¡La cédula no puede estar vacía ni contener caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "solicitudes";

						}

					});				

				</script>';
			}
			*/
	}


	


}