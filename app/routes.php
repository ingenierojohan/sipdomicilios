<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//---------------------------------------------- LOGIN ----------------------------------------------
// Ruta defecto / redirige a pagina login
Route::get('/', function(){
	return Redirect::route('login');
});

// Ruta a Login , antes pasa por Filtro guest 
Route::get('login', array('as' => 'login', function () {
	return View::make('sipdomicilios.login');
}))->before('guest');


// Captura Datos enviados desde el Form Login Metodo Post y Valida credenciales
Route::post('login', function () {
	$user=array(
		'username' => Input::get('username'),
		'password' => Input::get('password')
	);
	if (Auth::attempt($user)){
		return Redirect::route('dashboard');
	}
	// Login Fallido--- Mensaje Error Login
	return Redirect::route('login')->with('flash_error','Nombre de Usuario o Clave,  Incorrecto')->withInput();
});

// Ruta para cerrar Session (Valida antes filtro auth)
Route::get('logout', array('as' => 'logout', function () {
	Auth::logout();
	return Redirect::route('login');//->with('flash_notice','Sesion Cerrada Correctamente');
}))->before('auth');

//////////////////////////////////////////////////////////////////////////////////////////////////////
//---------------------------------------------- RUTAS DASHBOARD ----------------------------------------------

Route::get('dashboard', array('as' => 'dashboard', function()
{
	View::share('infouser', Auth::user());  // Pasamos la Info al template infouser

	if (Auth::user()->rol == 1){  // ROL ADMIN
		//Obtenemos del Modelo User los Datos para pasarle a la Vista
		return View::make('sipdomicilios.dashboardAdmin');
	}
	else
		return View::make('sipdomicilios.dashboardUser');

}))->before('auth');


//////////////////////////////////////////////////////////////////////////////////////////////////////
//---------------------------------------------- RUTAS AJAX ----------------------------------------------
Route::get('getIncomingCallsFirstTime', 'IngresoDomiciliosController@getIncomingCallsFirstTime')->before('auth');
Route::get('getIncomingCalls', 'IngresoDomiciliosController@getIncomingCalls')->before('auth');  // Get Llamadas Nuevas cada 2 sg

Route::post('saveDataClient', 'SaveDataController@saveDataClient')->before('auth');  // Grabar Datos del Cliente
Route::post('saveDataDelivery', 'SaveDataController@saveDataDelivery')->before('auth');  // Grabar Datos del Servicio


//////////////////////////////////////////////////////////////////////////////////////////////////////
//---------------------------------------------- RUTAS PREUBAS ----------------------------------------------
Route::get('getCliente/{telefono}', function($telefono){
	return Cliente::findClienteByPhone($telefono);
});


Route::get('updateEstado', function(){
	$antes = Asteriskcid::whereEstadoId(102)->get();
	Asteriskcid::whereEstadoId(102)->update(array('estado_id' => 101));
	$despues = Asteriskcid::whereEstadoId(101)->get();
	return $despues;
});

Route::get('getClientes', function(){
	//return Cliente::all()->toJson();
	     $newRecord = new Cliente;
      $newRecord->telefono= "11111";
      $newRecord->nombre = "JOHAN";
      $newRecord->direccion = "johan";
      $newRecord->notas = "HOASS";
      $newRecord->estado_id = 0;
      $newRecord->save();
	//return Cliente::all()->toJson();
      return $newRecord;
});

Route::get('getAllDelivery', function(){
	$domicilios = Domicilio::with('cliente','user')->get();
	/*$respuesta =array(
		"id" => "",
		"nombre" =>"",
		"direccion" => "",
		"notasCliente" => "",
		"idDom" => "",
		"fecha" => "",
		"domicilio" => "",
		"valor" => "",
		"notasDom" =>"",
		"agente" =>"");
	foreach ($domicilios as $domicilio){
		$domicilio = array();
	}
return $domicilios;*/


return $domicilios;
});
