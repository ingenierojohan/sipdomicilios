<?php 
	// Modelo ge Gestiona todo lo relacionado con el Cliente.
	class Asteriskcid extends Eloquent
	{
		protected $table = 'asteriskcids';
		public $timestamps = false;
		protected $fillable = array('estado_id');  // Campos que se puede rellenar con Asteriskcid::find($incomingCall->id)->update(array('estado_id' => 102));



		// ************  Funciones Personalizadas *****************

		// Funcion que busca si un cliente Existe por su Telefono
		//public static function findClienteByPhone($telefono) {
			//$cliente = Cliente::whereTelefono($telefono)->get();
			//$cliente = Cliente::where('telefono','=',$telefono)->get();
			//return $cliente;
		//}

	}
?>