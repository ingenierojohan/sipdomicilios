<?php

class SaveDataController extends BaseController {

	public function saveDataClient() {
    // Capturamos todos los Datos enviados
    $dataClient = array(
      'idTab' => Input::get('idTab'),
      'telefono' => Input::get("telefono"),
      'nombre' => Input::get("nombre"),
      'direccion' => Input::get("direccion"),
      'notas' => Input::get("notas"),
      'isClient' => Input::get("isClient"),
      'clientId' => Input::get("clientId") );
    // Reglas de Validacion
    $reglas = array(
      'nombre' => 'required|min:2',
      'direccion' =>' required|min:2');

    $validation=Validator::make(Input::all(), $reglas);

    if ($validation->fails()){
      $respuesta = array(
        'idTab' => Input::get('idTab'),
        'error' => true,
        'msg' => "-- Nombre o Dirección Deben de Tener al menos 2 Caracteres -- ");
      return $respuesta;
    }

    else{
      $horaDomicilio = New dateTime();
      // Update IsClient = Yes
      if (Input::get("isClient")=="true"){
        Cliente::whereTelefono(Input::get("telefono"))->update(array(
          'nombre' => Input::get("nombre"),
          'direccion' => Input::get("direccion"),
          'notas' => Input::get("notas")));
      }
      else{
        $newRecord = new Cliente;
        $newRecord->telefono= Input::get("telefono");
        $newRecord->nombre = Input::get("nombre");
        $newRecord->direccion = Input::get("direccion");
        $newRecord->notas = Input::get("notas");
        $newRecord->estado_id = 0;
        $newRecord->save();
      }

      $respuesta = array(
      'idTab' => Input::get('idTab'),
      'horaDomicilio' => $horaDomicilio,
      'error' => false,
      'msg' => "Cliente Guardado"); 
      return $respuesta;
    }
	}


  public function saveDataDelivery() {

    // Capturamos todos los Datos enviados
    $dataDelivery = array(
      'idTab' => Input::get('idTab'),
      'telefono' => Input::get("telefono"),
      'nombre' => Input::get("nombre"),
      'direccion' => Input::get("direccion"),
      'notas' => Input::get("notas"),
      'descripcionDomicilio' => Input::get("descripcionDomicilio"),
      'valorDomicilio' => Input::get("valorDomicilio"),
      'infoDomicilio' => Input::get("infoDomicilio")
      );

    $reglas = array(
      'nombre' => 'required|min:2',
      'direccion' =>' required|min:2',
      'descripcionDomicilio' =>' required|min:2');

    $validation=Validator::make(Input::all(), $reglas);

    if ($validation->fails()){
      $respuesta = array(
        'idTab' => Input::get('idTab'),
        'error' => true,
        'msg' => "-- Descripción del Domicilio Deben de Tener al menos 2 Caracteres -- ");
      return $respuesta;
    }
    else{
      $client=Cliente::whereTelefono(Input::get("telefono"))->first();
      Cliente::find($client->id)->update(array(
        'nombre' => Input::get("nombre"),
        'direccion' => Input::get("direccion"),
        'notas' => Input::get("notas")));

      $newRecord = new Domicilio;
      $newRecord->user_id = Auth::user()->id;
      $newRecord->cliente_id = $client->id;
      $newRecord->sipdomicilioscid_id = Input::get('idTab');
      $newRecord->descripcion_domicilio = Input::get("descripcionDomicilio");
      $newRecord->valor = Input::get("valorDomicilio");
      $newRecord->notas_domicilio = Input::get("infoDomicilio");
      $newRecord->estado_id = 301;
      $newRecord->save();

      $respuesta = array(
        'idTab' => Input::get('idTab'),
        'error' => false,
        'msg' => "--- DOMICILIO GUARDADO ---");
      return $respuesta;
    }
  }

} // Fin del Controller