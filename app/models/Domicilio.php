<?php 
	// Modelo ge Gestiona todo lo relacionado con el Cliente.
	class Domicilio extends Eloquent
	{
		protected $table = 'domicilios';
		protected $fillable = array('user_id','cliente_id','notas','estado');


		// ************  Funciones Personalizadas *****************

		// Funcion que busca si un cliente Existe por su Telefono
		//public static function findClienteByPhone($telefono) {
			//$cliente = Cliente::whereTelefono($telefono)->get();
			//$cliente = Cliente::where('telefono','=',$telefono)->get();
			//return $cliente;
		//}

	}
?>