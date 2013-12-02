<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    @section('titulo')
        SIP -
    @show
  </title>


  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="SIP DOMICILIOS">
  <meta name="author" content="JOHAN RAMIREZ">

  <!-- ESTILOS -->
  {{ HTML::style('/assets/css/bootstrap.css') }}
  {{ HTML::style('/assets/css/social.css') }}
  {{ HTML::style('/assets/css/font-awesome.css') }}
  {{ HTML::style('/assets/css/social-theme-blue.css') }}
  <style>
  .wraper #main{
    margin-top: 40px;
  }
  #main {
    margin-left: 0;
  }
  .social-navbar {
    left: 0;
  }
  </style>

</head>
<body>

  <div class="wraper">   <!-- BEGIN WRAPER -->

    @yield('contenido')

  </div> <!-- END WRAPER -->



  <!-- JS -->
  {{ HTML::script('/assets/js/jquery-1.10.2.min.js') }}
  {{ HTML::script('/assets/js/bootstrap.js') }}
  {{ HTML::script('/assets/js/hora.js') }}
  <!-- {{ HTML::script('/assets/js/confAdmin.js') }} -->

</body>
</html>