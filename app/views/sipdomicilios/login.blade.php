@extends('layout.login')
<!--con layout plantilla hacemos uso de nuestra plantilla base, no podemos escribir nada anter o no renderizará la pantilla-->

<!--establecemos un título en la sección título que hemos definido en nuestra plantilla base-->
@section('titulo')
  @parent
    REGISTRO
@stop

<!--establecemos el contenido de la sección contenido de nuestra plantilla base-->
@section('contenido')
  <!-- BEGIN LOGIN FORM -->
  {{ Form::open(array('login', 'POST', 'class' => 'form-register')) }}
  <div class="row-fluid">
    <span class="label label-warning pull-right span12 form-heading">
      <h1 class="form-heading">SIP-DOMICILIOS</h1>
    </span>
  </div>
  
  <!-- check for login error flash var -->
  @if (Session::has('flash_error'))
    <div id="flash_error" class="alert alert-error text-center">{{ Session::get('flash_error') }}</div>
  @endif
  
  <!-- Campo Usuario (codigo Bootstrap) -->
  <div class="input-prepend input-fullwidth">
    <span class="add-on"><i class="fa fa-user "></i></span>
    <div class="input-wrapper">
      {{ Form::text('username', Input::old('username'), array('class' => 'input-block-level','placeholder' => 'Usuario', 'autofocus') ) }}
    </div>
  </div>

  <!-- Campo Clave (codigo Bootstrap) -->
  <div class="input-prepend input-fullwidth">
    <span class="add-on"><i class="fa fa-lock"></i></span>
    <div class="input-wrapper">
      {{ Form::password('password', array('class' => 'input-block-level', 'placeholder' => 'Clave') ) }}
    </div>
  </div>

  <!-- Boton Inicio Sesion (codigo Bootstrap) -->
  <div class="row-fluid">
    {{ Form::submit('Iniciar Sesión',array('class'=>'btn btn-success pull-right span12')) }}
  </div>
  {{ Form::close() }}
  <!-- END LOGIN FORM -->
@stop