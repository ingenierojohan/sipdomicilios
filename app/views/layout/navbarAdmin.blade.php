<!-- BEGIN NAVBAR -->
<header>
  <nav class="navbar navbar-blue navbar-fixed-top social-navbar">
    <div class="navbar-inner">
      <div class="container-fluid">

        <!-- BEGIN SIDEBAR COLLAPSER -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".social-sidebar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <!-- END SIDEBAR COLLAPSER -->

        <!-- BEGIN BRAND LINK -->
        <span class="brand label label-success">{{ $infouser['full_name'] }}</span>
        <!-- END BRAND LINK -->

        <!-- BEGIN NAVBAR INDICATORS -->

        <!-- NAV IZQUIERDO -->
        <ul class="nav nav-indicators">

          <!-- DIVISOR -->
          <li class="divider-vertical"></li>

          <!-- HORA -->
          <li class="brand"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<strong  id="HORA"></strong></li>
          <li class="divider-vertical"></li>
        </ul>


        <!-- NAV DERECHO -->
        <ul class="nav nav-indicators pull-right">

          <!-- PANEL NOTIFICACIONES -->
          <li class="divider-vertical"></li>

          <li class="brand"><i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp; Notificaciones Administrador </li>

          <!-- LOG OUT -->
          <li class="divider-vertical"></li>
          <li><a href="{{{ URL::to('logout') }}}"><i class="icon-off"></i>&nbsp;&nbsp;Salir</a></li>
        </ul>
        <!-- END NAVBAR INDICATORS -->

      </div>
    </div>
  </nav>
  <!-- END NAVBAR -->

</header>