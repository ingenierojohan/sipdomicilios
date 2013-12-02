@extends('layout.dashboardAdmin')

@section('titulo')
  @parent
    Admin
@stop

@section('contenido')

<!--  ########################## NAV BAR ###############################################  -->
@include('layout.navbarAdmin')

<!--  ########################## CUERPO PAGE ###############################################  -->
<div id="main"> <!-- BEGIN MAIN CONTAINER -->
  <div class="container-fluid"> <!-- BEGIN CONTENT CONTANER -->
  	<p></p>
		@include('sipdomicilios.moduleDespachos')
  </div> <!-- END CONTENT CONTANER -->
  <div class="container-fluid"> <!-- BEGIN CONTENT CONTANER -->
  	<p> </p>
		@include('sipdomicilios.moduleHistorial')
  </div> <!-- END CONTENT CONTANER -->

  <!-- ###################################################################################### -->
  </div> <!-- END CONTENT CONTANER -->
</div> <!-- END MAIN CONTAINER -->

@stop