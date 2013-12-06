<?php

class IngresoDomiciliosController extends BaseController {

  // ************************ Ejecuta cuando el Documento esta Listo despues de un reload o Inicio
	public function getIncomingCallsFirstTime() {
    // Cambio de los Estados que estan en 102 a 101 en la tabla asteriskcids
    Asteriskcid::whereEstadoId(102)->update(array('estado_id' => 101));
    return $repuesta = array('msg' => 'Se han Cambiado los Estados a 101 si hubiesen');
	}


  // -*********************** Se verifica que estados estan en 101 cada x sgs segun settime en fortend
	public function getIncomingCalls() {

    $respHangupCalls = array('hangup'=>false);
    $incomingCallHangup = Asteriskcid::whereEstadoId(103)->first(); // Obtenemos el asteriskcids estado 103 -- Colgado
    if (!empty($incomingCallHangup) ){
      $respHangupCalls = $this->hangupCalls($incomingCallHangup);  // Llamamos a la Funcion Privada para que realize el trabajo de Colgar.
    }

    $incomingCallNew = Asteriskcid::whereEstadoId(101)->first();   // Obtenemos el astriskcids estado 101 cada vez

    if (!empty($incomingCallNew)){  //Hay Llmadas Nuevas?
      $respSetIncomingCalls=$this->setIncomingCalls($incomingCallNew);
      return array_merge($respSetIncomingCalls,$respHangupCalls );
    } // Fin if incominCall

    $respuesta = array( // NO HAY LLAMADAS
      'hayLlamada' => false,
      'isCliente'=> false,
      'msg' => 'NO HAY LLAMADAS'
      );
    return array_merge($respuesta, $respHangupCalls );
	}

//**************************************** Funciones Privadas ***************
  // Funcion cuando una llamada es Colgada
  private function hangupCalls($incomingCallHangup){
    $sipdomicilio = Sipdomicilioscid::where('unique_id', '=', $incomingCallHangup->unique_id)->first();
    Sipdomicilioscid::find($sipdomicilio->id)->update(array('estado_id' => 203)); // Actualizamos Registro

    Asteriskcid::destroy($incomingCallHangup->id);  // Borramos Registro
    return array('hangup'=>true,
     'idTab'=> $sipdomicilio->id,
     'msg' => 'LLAMADA COLGADA');
  } // Fin del Metodo


  private function setIncomingCalls($incomingCallNew){
    $sipdomicilioscid = Sipdomicilioscid::whereUniqueId($incomingCallNew->unique_id)->first();
    if (empty($sipdomicilioscid)){ // sipdomicilioscids ya Existe?
      $sipdomicilioscid = Sipdomicilioscid::newCall($incomingCallNew); // Creamos el Nuevo Registro y obtenemos el el ultimo registro
    }// Fin del Metodo

    Asteriskcid::find($incomingCallNew->id)->update(array('estado_id' => 102));
    $cliente = Cliente::findClienteByPhone($incomingCallNew->cid);   // Consultamos si existe el cid en la Tabla Clientes

    if (!empty($cliente)) { // Cliente Existe?
    // Si Cliente Existe se envian los Datos
      return $repuesta = array(  // EXISTE
        'hayLlamada' => true,
        'isCliente' => true,
        'tabId'=> $sipdomicilioscid->id,
        'linea'   => $incomingCallNew->linea,
        'clienteId'=> $cliente->id,
        'telefono'=> $cliente->telefono,
        'nombre'=> $cliente->nombre,
        'direccion'=> $cliente->direccion,
        'notas'=> $cliente->notas,
        'msg'=>'CLIENTE EXISTE'
        );
    } // Fin if cliente
    return $respuesta = array(  // NO EXISTE
      'hayLlamada' => true,
      'isCliente'=> false,
      'tabId'=> $sipdomicilioscid->id,
      'linea'   => $incomingCallNew->linea,
      'telefono'=> $incomingCallNew->cid,
      'nombre'=> "",
      'direccion'=> "",
      'notas'=> "",
      'msg' => 'CLIENTE NUEVO'
      );
  } // Fin del Metodo

} // Fin del Controller