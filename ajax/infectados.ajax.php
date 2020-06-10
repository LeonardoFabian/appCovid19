<?php 

require_once "../controllers/solicitudes.controller.php";
require_once "../models/infectados.model.php";

class AjaxSolicitudes {

	//Edit Solicitud
	public $idSolicitud;

	public function ajaxEditSolicitud(){

		$item = "id";
		$value = $this->idSolicitud;
		$result = InfectadosController::ctrMostrarListaSolicitudes($item, $value);

		echo json_encode($result);

	}

	// Actibst Solicitud

	public $activarSolicitud;
	public $activarId;

	public function ajaxActivarSolicitud(){

		$table = "solicitudes";
		$item1 = "estado";
		$value1 = $this->activarSolicitud;
		$item2 = "id"; 
		$value2 = $this->activarId;

		$result = InfectadosModel::mdlUpdateSolicitud($table, $item1, $value1, $item2, $value2);

		//echo json_encode($result);

	}

	// Validate if cedula exists on create

	public $validateCedula;

	public function ajaxvalidateCedula(){
		
		$item = "cedula";
		$value = $this->validateCedula;
		$result = InfectadosController::ctrMostrarListaSolicitudes($item, $value);

		echo json_encode($result);

	}
}

// Execute Edit Solicitud
if(isset($_POST["idSolicitud"])){

	$edit = new AjaxSolicitudes();
	$edit -> idSolicitud = $_POST["idSolicitud"];
	$edit -> ajaxEditSolicitud();

}

// Execute Activar Solicitud
if(isset($_POST["activarSolicitud"])){

	$activateUser = new AjaxSolicitudes();
	$activateUser -> activarSolicitud = $_POST["activarSolicitud"];
	$activateUser -> activarId = $_POST["activarId"];
	$activateUser -> ajaxActivarSolicitud();

}

// Execute Validate Username if Exists

if(isset($_POST["validateCedula"])){

	$validateCedula = new AjaxSolicitudes();
	$validateCedula -> validateCedula = $_POST["validateCedula"];
	$validateCedula -> ajaxvalidateCedula();
}

