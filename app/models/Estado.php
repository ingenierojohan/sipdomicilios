<?php 
	// Modelo ge Gestiona todo lo relacionado con el Cliente.
	class Estado extends Eloquent
	{
		protected $table = 'estados';


		// ************  Funciones Personalizadas *****************

		// Funcion que busca si un cliente Existe por su Telefono
		//public static function findClienteByPhone($telefono) {
			//$cliente = Cliente::whereTelefono($telefono)->get();
			//$cliente = Cliente::where('telefono','=',$telefono)->get();
			//return $cliente;
		//}

	}
?>