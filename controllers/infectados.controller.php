<?php 

class InfectadosController{	

	/* Mostrar infectados */	

	static public function ctrMostrarInfectados(){

		$sql = "select * from infected;";
		$datos = InfectadosModel::query_array($sql);

		//var_dump($datos);
		return $datos;
	}


	static public function ctrInsertarDatosDesdeAPI($table, $url){
		
		$query = InfectadosModel::mdlInsertarDatos($table, $url);
/*
		if($query == "success"){

			echo '<script>

								swal({

									type: "success",
									title: "¡Los datos han sido generados correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){

									if(result.value){
									
										window.location = "infectados";

									}

								});				

							</script>';	
		} else {
			echo '<script>

					swal({

						type: "error",
						title: "¡Los datos no se han podido cargar correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "infectados";

						}

					});				

				</script>';
		}*/
	}


	static public function ctrGenerarUrlCSV($url){
					
		InfectadosModel::generarCSV($url);				
		
	}
}


	


