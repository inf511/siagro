// Cuando haya un cambio del tamaño de la ventana 
// enviar al servidor el nuevo tamaño
$(document).ready(function(){
    $(window).resize(function(){
        enviarScreenToServer();
    });
});

function enviarScreenToServer(){
	var alto = window.innerHeight;
	var ancho = window.innerWidth;
	$.get('index.php?r=spvisor/windowsize', { 'alto' :  alto, 'ancho' : ancho}, function(data){
		console.log("alto : " + alto + '; ancho : ' + ancho);
		console.log("respuesta : " + data);
	})
}


$(function(){
	// cuando hace click en el boton salta esto
	// esto es para el dialogo modal 
	$("#btnEqTipo").click(function(){
		$("#modal-eqtipo").modal('show').find('#modalContent').load($(this).attr('value'));
	})
		
})

// funcion para listar los modelos del equipo 
function listarModelos(){

	var id = $(this).val();

	// buscamos los modelos
    $.get('index.php?r=speqmodelo/lists', {'id' : id }, function(data){
            $("select#spequipo-fkmodelo").html( data );
    });

	// obtenemos el codigo del de tipo de equipo
	
	$.get('index.php?r=speqtipo/getcodigo', { 'id' : id }, function(data){

		var response = $.parseJSON(data).codigo;

		response = response.replace("A", "\\A");
		response = response.replace("9", "\\9");

		$("#spequipo-codigo").inputmask({ mask: response});
		console.log("cambio de tipo");
	})
}

function getCodModelo(){

	// obtenemos el codigo del de tipo de equipo
	var id = $(this).val();
	$.get('index.php?r=speqmodelo/getcodigo', { 'id' : id }, function(data){

		var response = $.parseJSON(data);		

		if(response == null){
			response = "";
		}else{
			response = response.codigo;
		}
		
		var mask = $("#spequipo-codigo").inputmask("getmetadata");
		mask = mask.replace("\\", "");

		console.log("mask : " + mask);
		console.log("response : " + response);
		
		if(mask != null){
			mask = mask.substr( 0, 2) + "-" + response + "-***";
			mask = mask.replace("A", "\\A");
			mask = mask.replace("9", "\\9");
			$("#spequipo-codigo").inputmask("remove");
			$("#spequipo-codigo").inputmask(mask);
			console.log("sss: "+$("#spequipo-codigo").inputmask("getmetadata"));
		}
		
	})
}

// ---------------------------------------------------------------------------------------
// funciones de items obras


// funcion para obtener el codigo de la poligono
function getCodPoligono(){
	
	var id = $(this).val();
	
	$.get('index.php?r=sppoligono/getcodigo', { 'id' : id }, function(data){

		var response = $.parseJSON(data).codigo;

		$("#spitemobra-codigo").val(response);
		
	})
}

// funcion para obtener el codigo de la actividad
function getCodActividad(){
	// obtenemos el codigo del de tipo de equipo
	var id = $(this).val();
	
	$.get('index.php?r=spactividad/getcodigo', { 'id' : id }, function(data){

		var response = $.parseJSON(data);

		if(response == null){
			response = "";
		}else{
			response = response.codigo;
		}
		
		var valAnt = $("#spitemobra-codigo").val();
		
		if(valAnt != null){
			valAnt = valAnt.substr(0, 3) + "-" + response;
			$("#spitemobra-codigo").val(valAnt);
			
		}
	})
	
}

