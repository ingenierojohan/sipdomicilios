<?php 
	// Modelo ge Gestiona todo lo relacionado con el Cliente.
	class Cliente extends Eloquent
	{
		protected $table = 'clientes';
		protected $fillable = array('nombre','direccion','notas','estado');
		//protected $guarded = array('id','create_at','update_at');


		// ************  Funciones Personalizadas *****************

		// Funcion que busca si un cliente Existe por su Telefono
		public static function findClienteByPhone($telefono) {
			$cliente = Cliente::whereTelefono($telefono)->first();  // ojo first devuelve objeto
			//$cliente = Cliente::where('telefono','=',$telefono)->get();
			return $cliente;
		}

	}




?>

