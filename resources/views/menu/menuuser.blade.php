 <aside id="sidebar_left" class="nano nano-light sidebar-light">

      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
          <li class="sidebar-label pt20">Menu</li>
          <li class="{{ $inicio or '' }}">
            <a href="{{ url('/') }}">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title">Inicio</span>
            </a>
          </li>
          <li class="{{ $usuario or '' }}">
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-user"></span>
              <span class="sidebar-title">Usuario</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav" style="">
              <li>
                <a href="{{ route('profile_edit',Auth::user()) }}">
                  <span class="glyphicon glyphicon-pencil"></span> Modificar mis datos
                </a>
              </li>
            </ul>
          </li>
          <li class="{{ $pagos or '' }}">
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-tasks"></span>
              <span class="sidebar-title">Pagos</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav" style="">
              <li>
                <a href="{{ route('registrar_pago') }}">
                  <span class="fa fa-plus"></span>Registrar pago
                </a>
              </li>
              <li>
                <a href="{{ route('ver_pago') }}">
                  <span class="fa fa-search"></span>Ver pagos
                </a>
              </li>
            </ul>
          </li>
		  <li class="{{ $servicios or '' }}">
            <a href="{{ route('ver_servicios') }}">
              <span class="glyphicon glyphicon-wrench"></span>
              <span class="sidebar-title">Servicios</span>
            </a>
          </li>
        </ul>
        <!-- End: Sidebar Menu -->

        <!-- Start: Sidebar Collapse Button -->
        <div class="sidebar-toggle-mini">
          <a href="#">
            <span class="fa fa-sign-out"></span>
          </a>
        </div>
        <!-- End: Sidebar Collapse Button -->

      </div>
      <!-- End: Sidebar Left Content -->
  </aside>