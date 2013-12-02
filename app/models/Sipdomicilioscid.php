<?php 
	// Modelo ge Gestiona todo lo relacionado con el Cliente.
	class Sipdomicilioscid extends Eloquent
	{
		protected $table = 'sipdomicilioscids';
		protected $fillable = array('estado_id');


		// ************  Funciones Personalizadas *****************

		// Inserta un Nuevo Registro
		public static function newCall($incomingCall) {
			$newRecord = new Sipdomicilioscid;
			$newRecord->unique_id = $incomingCall->unique_id;
			$newRecord->cid = $incomingCall->cid;
			$newRecord->linea = $incomingCall->linea;
			$newRecord->estado_id = 201;
			$newRecord->save();
			return $newRecord;
		}

	}
?>