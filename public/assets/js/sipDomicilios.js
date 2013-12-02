
// Funcion Consulta Llamadas Nuevas cada 20sg
function autoGetIncomingsCalls() {
	setInterval( function () {
		getIncomingCalls(responseIncomingCalls);
	}, 2000); // refresh every 10000 milliseconds
}

// FUNCIONES AJAX --------
function getIncomingCallsFirstTime(callback) {
//debugger;
  $.ajax({
    url: "getIncomingCallsFirstTime",
    format: 'json',
    success: function(resp){console.log(resp);},
  })
  .done(callback);
}

function getIncomingCalls(callback) {
	//debugger;
  $.ajax({
    url: "getIncomingCalls",
    format: 'json',
  })
  .done(callback);
}


// RESPUESTAS DEL SERVER  -----------------
function responseIncomingCalls(jsonData) {
	var responseServer = jsonData;
	console.log(responseServer);

	if(responseServer.hangup){
		removeTab(responseServer.idTab);
	}

	if(responseServer.hayLlamada){
		//console.log('SI HAY LLAMADAS');
		printTabClient(responseServer);
	}
}

// Templates Tabs ------------
function printTabClient(info){
	//var identificador = Math.floor((Math.random()*1000)+1);
	console.log("este el data para la template", info);
	var theme = {badge:"important",label:"important",alert:"error", text:"error"};
	var optionClient = {status:"Cliente Nuevo", historial: "disabled"};
	var clientId = 0;
	if(info.isCliente){ // Varifica si es Cliente
		theme = {badge:"success",label:"success",alert:"success", text:"success"};
		optionClient = {status:info.nombre, historial: ""};
		clientId = info.clienteId;
	}

	var idTab = info.tabId;
	var toolTipClient = 'data-toggle="tooltip" data-placement="bottom" data-original-title="';

	var titulo ='';
			titulo +='<span class="badge badge-'+theme.badge+'">'+info.linea+'</span> <span class="label label-'+theme.label+'">'+ info.telefono +'</span>';
			titulo +='<p><strong><span class="text-'+theme.text+'">'+ optionClient.status +'</span></strong></p>';

	var formCliente = '';
			formCliente +=	'<div class="row-fluid">';
			formCliente +=		'<form class="alert alert-'+theme.alert+'">';
			formCliente +=			'<div class="span 12">';
			formCliente +=				'<span class="span3"><span class="badge badge-'+theme.badge+'">'+info.linea+'</span> <strong>Teléfono:&nbsp;'+info.telefono+'</strong></span>';
			formCliente +=			'</div>';
			formCliente +=			'<div class="controls controls-row">';
			formCliente +=				'<input class="span3" type="text" value="'+info.nombre+'" id="clientNombre-'+idTab+'">';
			formCliente +=				'<input class="span4" type="text" value="'+info.direccion+'" id="clientDireccion-'+idTab+'">';
			formCliente +=				'<input class="span3" type="text" value="'+info.notas+'" id="clientNotas-'+idTab+'">';
			formCliente +=				'<div class="span2">';
			formCliente +=					'<button class="btn btn-mini btn-info" id="domicilioBton-'+idTab+'">Domicilio</button>';
			formCliente +=					'<button class="btn btn-mini btn-warning" id="historialBton-'+idTab+'" '+optionClient.historial+'>Historial</button>';
			formCliente +=				'</div>';
			formCliente +=			'</div>';
			formCliente +=			'<div class="controls controls-row"><strong>';
			formCliente +=				'<span class="span3 help-block infoClient" '+toolTipClient+info.nombre+'">Nombre</span>';
			formCliente +=				'<span class="span4 help-block infoClient" '+toolTipClient+info.direccion+'">Dirección</span>';
			formCliente +=				'<span class="span3 help-block infoClient" '+toolTipClient+info.notas+'">Notas</span></strong>';
			formCliente +=			'</div>';
			formCliente +=		'</form>';
			formCliente +=	'</div>';

	var formDomicilio = '';
			formDomicilio +=	'<div class="row-fluid">'; // Linea Principal
			formDomicilio +=		'<div class="span12">';		// Bloque Principal
			formDomicilio +=			'<div class="row-fluid">'; // Linea Secciones
			formDomicilio +=				'<div class="span8">';		// Bloque Domicilios
			formDomicilio +=					'<div id="contentDomicilio-'+idTab+'" class="well well-small hide">';	//Div Content Domicilios
			formDomicilio +=						'<form>';
			formDomicilio +=							'<div class="span6">Información del Domicilio</div> <div class="span6" id="horaDomicilio-'+idTab+'"></div>';
			formDomicilio +=							'<div class="textarea">';
			formDomicilio +=								'<textarea id="descricionDomicilio-'+idTab+'" rows="1" class="input-block-level" placeholder="Ingrese la descripción de los Productos que componen el domicilio..."></textarea>';
			formDomicilio +=							'</div>';
			formDomicilio +=							'<p>';
			formDomicilio +=								'<div class="controls controls-row">';
			formDomicilio +=									'<input class="span4" id="valorDomicilio-'+idTab+'" placeholder="Valor Domicilio..." type="text">';
  		formDomicilio +=									'<input class="span8" id="infoDomicilio-'+idTab+'" type="text" placeholder="Información Adicional del Domicilio...">';
			formDomicilio +=								'</div>';
			formDomicilio +=							'</p>';
			formDomicilio +=							'<div class="controls controls-row">';
			formDomicilio +=  							'<button class="btn btn-primary" type="button" id="asiganarDomicilio-'+idTab+'">Asignar Domicilio</button>';
			formDomicilio +=							'</div>';
			formDomicilio +=						'</form>';
			formDomicilio +=					'</div>';		// Fin Div Content Domicilios
			formDomicilio +=				'</div>';  // Fin Bloque Domicilios

	var historial = '';
			historial +=						'<div class="span4">';	// Bloque Historial
			historial +=							'<div id="contentHistorial-'+idTab+'" class="well well-small hide">';	//Div Content Historial
			historial +=								'<strong>Historial</strong>';
			historial +=							'</div>'; 	// Fin Div Content Historial
			historial +=						'</div>'; // Fin Bloque Historial


			historial +=			'</div>';  // Fin Linea Secciones
			historial +=		'</div>';  // Fin Bloque Principal
			historial +=	'</div>';  // Fin Linea Principal


	var scriptTemplate = '';
			scriptTemplate +=	'<script type="text/javascript">';
			scriptTemplate +=		'$(".infoClient").tooltip();';	// toolTIP
			scriptTemplate +=		'$("#descricionDomicilio-'+idTab+'").autogrow();';	// TEXTAREA

			scriptTemplate +=		'$("#domicilioBton-'+idTab+'").on("click", function(evt){';	// BOTON save and show Domicilios
			scriptTemplate +=			'evt.preventDefault();';
			scriptTemplate +=			'$("#domicilioBton-'+idTab+'").prop("disabled", true);';
			scriptTemplate +=			'var dataFormClient = {';
			scriptTemplate +=					'idTab : '+idTab+',';
			scriptTemplate +=					'telefono : '+info.telefono+',';
			scriptTemplate +=					'nombre: $("#clientNombre-'+idTab+'").val(),';
			scriptTemplate +=					'direccion: $("#clientDireccion-'+idTab+'").val(),';
			scriptTemplate +=					'notas: $("#clientNotas-'+idTab+'").val(),';
			scriptTemplate +=					'isClient: '+info.isCliente+',';
			scriptTemplate +=					'clientId: '+clientId+'';
			scriptTemplate +=					'};';
			scriptTemplate +=			'saveClient(dataFormClient, showFormDelivery);';	//Llama a la Funcion SaveCliente, le pasa dataForm y el callback(que se ejecuta cuando termina la consulta)
			scriptTemplate +=		'});';

			scriptTemplate +=		'$("#historialBton-'+idTab+'").on("click", function(evt){';	// BOTON Show HISTORIAL
			scriptTemplate +=			'evt.preventDefault();';
			scriptTemplate +=			'$("#contentHistorial-'+idTab+'").show();';
			scriptTemplate +=		'});';

			scriptTemplate +=		'$("#asiganarDomicilio-'+idTab+'").on("click", function(evt){';	// BOTON save Asignar Domicilio
			scriptTemplate +=			'evt.preventDefault();';
			scriptTemplate +=			'var dataFormDelivey = {';
			scriptTemplate +=					'idTab : '+idTab+',';
			scriptTemplate +=					'telefono : '+info.telefono+',';
			scriptTemplate +=					'nombre: $("#clientNombre-'+idTab+'").val(),';
			scriptTemplate +=					'direccion: $("#clientDireccion-'+idTab+'").val(),';
			scriptTemplate +=					'notas: $("#clientNotas-'+idTab+'").val(),';
			scriptTemplate +=					'descripcionDomicilio: $("#descricionDomicilio-'+idTab+'").val(),';
			scriptTemplate +=					'valorDomicilio: $("#valorDomicilio-'+idTab+'").val(),';
			scriptTemplate +=					'infoDomicilio: $("#infoDomicilio-'+idTab+'").val(),';
			scriptTemplate +=					'};';
			scriptTemplate +=			'saveDelivery(dataFormDelivey, closeTab);';	//Llama a la Funcion SaveCliente, le pasa dataForm y el callback(que se ejecuta cuando termina la consulta)
			scriptTemplate +=		'});';
			scriptTemplate +=	'</script>';
	var contenido = (formCliente + formDomicilio + historial + scriptTemplate);
	tabs = $("ul.nav-tabs");
	tabs.addBSTab( idTab, titulo , contenido );
}

function showFormDelivery(jsonData){
	var responseServer = jsonData;
	console.log("----- Response before Click Domicilio ------",responseServer);
	var contentFormDelivery =	'<p class="text-right">'+responseServer.horaDomicilio.date+'</p>';
	$("#horaDomicilio-"+responseServer.idTab).html( contentFormDelivery );
	$("#contentDomicilio-"+responseServer.idTab).show();
}


//------------------------ Acciones ---------------------
function removeTab(idTab){
	tab = tabs.getBSTabByID(idTab);
	tab.removeBSTab();
};

function saveClient(dataForm, callback){
	console.log("----- Save Client------", dataForm);
	$.ajax({
		type: "POST",
		url: "saveDataClient",
		format: "json",
		data: dataForm,
		//beforeSend: function(){
		//	$("#status").html('<span class="label label-info">Validando información ... </span>'); },
	})
	.done(callback);
}

function saveDelivery(dataDelivery, callback){
	console.log("----- Save Delivery------", dataDelivery);
	$.ajax({
		type: "POST",
		url: "saveDataDelivery",
		format: "json",
		data: dataDelivery,
		//beforeSend: function(){
		//	$("#status").html('<span class="label label-info">Validando información ... </span>'); },
	})
	.done(callback);
}

function closeTab(jsonData){
	var responseServer = jsonData;
	console.log("----- Response before Click Asignar Domicilio ------",responseServer);
	removeTab(responseServer.idTab);
}

function mensajes(msg){
	console.log(msg);
}