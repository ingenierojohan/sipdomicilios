<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <!-- Titulo Personalizado -->
  <title>
    @section('titulo')
      SIP-
    @show
  </title>

  <!-- BEGIN STYLE CODES -->
  {{ HTML::style('/assets/css/bootstrap.css') }}
  {{ HTML::style('/assets/css/social.css') }}
  {{ HTML::style('/assets/css/font-awesome.css') }}

  <style type="text/css">
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #e9eaed;
    }

    .wraper #main{
      margin-top: 40px;
    }
  </style>
</head>

<body>
 <!-- BEGIN FORMS CONTAINER -->
  <div class="container">
    @yield('contenido')

    <!-- BEGIN FOOTER -->
    <div class="form-footer-copyright">
      <p> Sistema de Registro de Domicilios</p>
      2014 © <small>Sip Telecomunicaciones LTDA</small>
    </div>
    <!-- END FOOTER -->
  </div>
  <!-- END FORMS CONTAINER -->
</body>

</html>