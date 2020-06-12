<?php 

class InfectadosController{	

	/* Mostrar infectados */	

	static public function ctrMostrarInfectados(){

		$sql = "select * from infected;";
		$datos = InfectadosModel::query_array($sql);

		return $datos;
	}

	/* Insertar datos desde la API a la base de datos*/
	static public function ctrInsertarDatosDesdeAPI($table, $url){
		
		$query = InfectadosModel::mdlInsertarDatos($table, $url);

		

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
		
	}

	/* Generar archivo CSV */
	static public function ctrGenerarUrlCSV($url){
					
		InfectadosModel::generarCSV($url);				
		
	}

	/* Truncate table 'infected'*/
	static public function ctrTruncarDatos($table){
		$sql = "truncate table {$table}";
		$datos = InfectadosModel::query($sql);		

			echo '<script>

								swal({

									type: "success",
									title: "¡Los datos han sido eliminados!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"

								}).then(function(result){

									if(result.value){
									
										window.location = "infectados";

									}

								});				

							</script>';	
		
	}

}


	


