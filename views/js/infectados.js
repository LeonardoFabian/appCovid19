/* Upload Profile Picture */

$(".new-profilePicThumb").change(function() {
	var img = this.files[0];
	/*console.log("imagen", img);*/
	if (img["type"] != "image/png" && img["type"] != "image/jpeg" && img["type"] != "image/jpg") {

		$(".new-profilePicThumb").val("");

		swal({

			type: "error",
			title: "Error al subir la imagen",
			text: "¡Debes seleccionar una imagen en formato JPG o PNG!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar"

		});

	} else if (img["size"] > 2000000) {

		$(".new-profilePicThumb").val("");

		swal({

			type: "error",
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			showConfirmButton: true,
			confirmButtonText: "Cerrar"

		});

	} else {

		var imgData = new FileReader;

		imgData.readAsDataURL(img);

		$(imgData).on("load", function(e) {

			var imgRoute = e.target.result;

			$(".img-thumb-preview").attr("src", imgRoute);

		})

	}
});

/* Editar Solicitud */

$(document).on("click", ".btnEditarSolicitud", function() {

	var idSolicitud = $(this).attr("idSolicitud");
	//console.log("idSolicitud", idSolicitud);

	var fdata = new FormData();
	fdata.append("idSolicitud", idSolicitud);

	$.ajax({

		url: "ajax/solicitudes.ajax.php",
		method: "POST",
		data: fdata,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(result){

			//console.log("result", result);
			$("#edit-cedula").val(result["cedula"]);
			$("#edit-nombre").val(result["nombre"]);
			$("#edit-apellido").val(result["apellido"]);
			$("#edit-ciudad").val(result["ciudad"]);
			$("#edit-curso").val(result["curso"]);
			$("#edit-comentario").val(result["comentario"]);

			$("#active-cedula").val(result["cedula"]);
			
			//$("#showActiveProfileOnEdit").html(result["cedula"]);	
			//$("#showActiveProfileOnEdit").val(result["cedula"]);					
			$("#active-profilePicture").val(result["foto"]);

			if(result["foto"] != ""){
				$(".img-thumb-preview").attr("src", result["foto"]);
			}

		}

	});
});

/* Aprobar solicitud */

$(document).on("click", ".btnAprobarSolicitud", function(){

	var idSolicitud = $(this).attr("idSolicitud");
	var estadoSolicitud = $(this).attr("estadoSolicitud");

	var fdata = new FormData();
	fdata.append("activarId", idSolicitud);
	fdata.append("activarSolicitud", estadoSolicitud);

	$.ajax({
		url: "ajax/solicitudes.ajax.php",
		method: "POST",
		data: fdata,
		cache: false,
		contentType: false,
		processData: false,		
		success: function(result){

			if(window.matchMedia("(max-width:767px)").matches){

				// Reload window when enabling or disabling user
				swal({

					title: "La solicitud ha sido actualizada",
					type: "success",
					confirmButtonText: "Cerrar",

				}).then((result)=>{

					if(result.value){

						window.location = "solicitudes";
						
					}

				});
			}

		}
	});

	if(estadoSolicitud == 0){

		$(this).removeClass('btn-success');
		$(this).addClass('btn-danger');
		$(this).html('Rechazada');
		$(this).attr('estadoSolicitud',1);

	} else {

		$(this).addClass('btn-success');
		$(this).removeClass('btn-danger');		
		$(this).html('Aprobada');
		$(this).attr('estadoSolicitud',0);
	}

});

/* Confirm existing solicitud on create new solicitud */

$("#new-cedula").change(function(){

	$(".alert").remove();

	var cedula = $(this).val();

	var fdata = new FormData();
	fdata.append("validateCedula", cedula);

	$.ajax({

		url: "ajax/solicitudes.ajax.php",
		method: "POST",
		data: fdata,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(result){

			//console.log("result", result);
			
			if(result){

				$("#new-cedula").parent().after('<div class="alert alert-warning">Esta cedula ya existe en la base de datos</div>');

				$("#new-cedula").val("");

			}

		}
	});

});

/* Mostrar Detalles Infectado */

$(document).on("click", ".btnMostrarDetalles", function(){

	var idInfectado = $(this).attr("id");
	var nombre = $(this).attr("dataNombre");
	var apellido = $(this).attr("dataApellido");
	var telefono = $(this).attr("dataTelefono");
	var correo = $(this).attr("dataCorreo");
	var calle = $(this).attr("dataCalle");
	var numero = $(this).attr("dataCasaNumero");
	var genero = $(this).attr("dataGenero");
	var nacionalidad = $(this).attr("dataNacionalidad");
	var foto = $(this).attr("dataFoto");
	var latitud = $(this).attr("dataLatitud");
	var longitud = $(this).attr("dataLongitud");
	
	window.location = "index.php?route=single&id="+idInfectado+"&nombre="+nombre+"&apellido="+apellido+"&telefono="+telefono+"&correo="+correo+"&calle="+calle+"&numero="+numero+"&genero="+genero+"&nacionalidad="+nacionalidad+"&foto="+foto+"&latitud="+latitud+"&longitud="+longitud;
	
	});

	/* Generar Lista de Infectados */
/*
$(document).on("click", ".btnGenerarCSV", function(){

	alert('<?php echo InfectadosController::ctrInsertarNuevosInfectados(); ?>');
	alert('Datos generados exitosamente');
	
	window.location = "index.php?route=infectados";
	
	});

*/
