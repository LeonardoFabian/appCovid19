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