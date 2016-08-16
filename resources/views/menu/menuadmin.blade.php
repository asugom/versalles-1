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
              <li>
                <a href="{{ route('registrar_saldo') }}">
                  <span class="fa fa-money"></span>Registrar saldo inicial
                </a>
              </li>
            </ul>
          </li>
          <li class="{{ $deudas or '' }}">
            <a class="accordion-toggle" href="#">
              <span class="glyphicon glyphicon-usd"></span>
              <span class="sidebar-title">Cuentas por cobrar</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav" style="">
              <li>
                <a href="{{ route('deuda.create') }}">
                  <span class="fa fa-plus"></span>Registrar cuenta por cobrar
                </a>
              </li>
            </ul>
          </li>
          <li class="{{ $encuesta or '' }}">
            <a class="accordion-toggle" href="#">
              <span class="fa fa-check-square-o"></span>
              <span class="sidebar-title">Encuestas</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav" style="">
              <li>
                <a href="{{ route('crear_encuesta') }}">
                  <span class="glyphicon glyphicon-pencil"></span>Crear nueva encuesta
                </a>
              </li>
            </ul>
          </li>
          <li class="{{ $archivo or '' }}">
            <a class="accordion-toggle" href="#">
              <span class="fa fa-file-word-o"></span>
              <span class="sidebar-title">Documentos</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav" style="">
              <li>
                <a href="{{ route('adjuntar_archivo') }}">
                  <span class="glyphicon glyphicon-pencil"></span>Adjuntar nuevo archivo
                </a>
              </li>
              <li>
                <a href="{{ route('listar_docs') }}">
                  <span class="fa fa-search"></span>Ver documentos
                </a>
              </li>
            </ul>
          </li>
          <li class="{{ $galeria or '' }}">
            <a href="">
              <span class="fa fa-picture-o"></span>
              <span class="sidebar-title">Galeria de Imagenes</span>
              <span class="caret"></span>
            </a>
            <ul class="nav sub-nav" style="">
              <li>
                <a href="{{ route('galeria_rec') }}">
                  <span class="glyphicon glyphicon-pencil"></span>Modificar imagenes recientes
                </a>
              </li>
            </ul>
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