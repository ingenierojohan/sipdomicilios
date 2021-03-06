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
  {{ HTML::style('/assets/css/sipdomicilio.css') }}

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
  {{ HTML::script('/assets/js/sipDomicilios.js') }}
  {{ HTML::script('/assets/js/jquery-ui-1.10.1.custom.js') }}
  {{ HTML::script('/assets/js/jquery.dataTables.js') }} <!-- Text Area -->
  {{ HTML::script('/assets/js/DT_bootstrap.js') }} <!-- Text Area -->

  <!-- Plugins -->
  {{ HTML::script('/assets/js/plugins/jquery.pulsate.min.js') }} <!-- Indicador de LLamana Nueva -->
  {{ HTML::script('/assets/js/plugins/bootstrap-tabs-dynamic.js') }}  <!-- TABS -->
  {{ HTML::script('/assets/js/plugins/bootstrap-tooltip.js') }} <!-- Mensajes toolTips -->
  {{ HTML::script('/assets/js/plugins/jquery.autogrow-textarea.js') }} <!-- Text Area -->


  <!-- SCRIPTS -->

  <script>
  /*
      $(".active").pulsate({
          pause: 1000,
          color: "#bd362f"
        });
  */
  </script>

<!--  -->
  <script type="text/javascript">
  // REFRESH Para Saber si hay Llamadas Nuevas cada 2 sgs Ejecuta priemro Firstime despues de una recarga
    $(document).ready(function (){
      getIncomingCallsFirstTime(autoGetIncomingsCalls);
    });
  </script>

</body>
</html>