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
                <a href="{{ route('crear_usuario') }}">
                  <span class="fa fa-plus"></span> Agregar
                </a>
              </li>
              <li>
                <a href="{{ route('listar_usuarios') }}">
                  <span class="fa fa-search"></span>Listar
                </a>
              </li>
            </ul>
          </li>
          <li  class="{{ $enviarmsj or '' }}">
            <a href="{{ route('sndcorreo') }}">
              <span class="fa fa-envelope-o"></span>
              <span class="sidebar-title">Enviar correo</span>
            </a>
          </li>
          <li class="sidebar-label pt15">En desarrollo:</li>
          <li>
            <a href="">
              <span class="glyphicon glyphicon-tasks"></span>
              <span class="sidebar-title">Historial de pagos</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="fa fa-money"></span>
              <span class="sidebar-title">Registrar pago</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="fa fa-envelope-o"></span>
              <span class="sidebar-title">Buzón de Mensajes</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="fa fa-file-word-o"></span>
              <span class="sidebar-title">Documentos</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="fa fa-check-square-o"></span>
              <span class="sidebar-title">Encuentas</span>
            </a>
          </li>
          <li>
            <a href="">
              <span class="fa fa-picture-o"></span>
              <span class="sidebar-title">Galeria de Imagenes</span>
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