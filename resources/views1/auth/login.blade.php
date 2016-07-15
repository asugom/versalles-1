<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>Condominio</title>
  <meta name="keywords" content="condominio" />
  <meta name="description" content="Condominio">
  <meta name="author" content="PubliRed24">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="assets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="assets/admin-tools/admin-forms/css/admin-forms.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
   <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
   <![endif]-->
</head>

<body class="external-page external-alt sb-l-c sb-r-c">

  <!-- Start: Main -->
  <div id="main" class="animated fadeIn" style="background: #ffffff url('assets/img/condo.png') no-repeat right top; ">

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

      <!-- Begin: Content -->
      <section id="content">
        <div class="col-sm-12 text-center">
          <h1 class="section-heading" style="color:#000;font-size: 40px;font-weight: 900">Sistema de Condominio</h1>
        </div>
        <div class="admin-form theme-info mw500" id="login">

          <!-- Login Logo -->


          <!-- Login Panel/Form -->
          <div class="panel mt30 mb25">

            <form method="POST" action="{{ url('/login') }}" id="contact" role="form">

              {{ csrf_field() }}
              <div class="panel-body bg-light p25 pb15">

                <!-- Username Input -->
                <div class="section">
                  <label for="email" class="field-label text-muted fs18 mb10">Correo</label>
                  <label for="email" class="field prepend-icon">
                    <input type="email" name="email" id="email" class="gui-input" placeholder="Ingrese Usuario" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <label for="email" class="field-icon">
                      <i class="fa fa-user"></i>
                    </label>
                  </label>
                </div>

                <!-- Password Input -->
                <div class="section">
                  <label for="username" class="field-label text-muted fs18 mb10">Contraseña</label>
                  <label for="password" class="field prepend-icon">
                    <input type="password" name="password" id="password" class="gui-input" placeholder="Ingrese Contraseña">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <label for="password" class="field-icon">
                      <i class="fa fa-lock"></i>
                    </label>
                  </label>
                </div>
              </div>
              <div class="panel-footer clearfix">
                <button type="submit" class="button btn-primary mr10 pull-right">Sign In</button>
                <label class="switch ib switch-primary mt10">
                  <input type="checkbox" name="remember" id="remember" checked>
                  <label for="remember" data-on="SI" data-off="NO"></label>
                  <span>Recordarme</span>
                </label>
              </div>

            </form>
          
            <!-- Registration Links -->
            <div class=" panel-footer">
              <p>
                <a href="{{ url('/password/reset') }}" class="active" title="Sign In">¿Olvidaste tu contraseña?</a>
              </p>
             <!-- <p>¿No te has registrado?
                <a href="{{ url('/register') }}" title="Sign In">Registrate Aqui</a>
              </p> -->
            </div>
          </div>

          <!-- Registration Links(alt) -->
          <div class="login-links hidden">
            <a href="{{ url('/login') }}" class="active" title="Sign In">Sign In</a> |
            <a href="{{ url('/register') }}" class="" title="Register">Register</a>
          </div>

        </div>

      </section>
      <!-- End: Content -->

    </section>
    <!-- End: Content-Wrapper -->

  </div>
  <!-- End: Main -->


  <!-- BEGIN: PAGE SCRIPTS -->

  <!-- jQuery -->
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/demo/demo.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Page Javascript -->
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Theme Core      
    Core.init();

    // Init Demo JS
    Demo.init();

  });
  </script>

  <!-- END: PAGE SCRIPTS -->

</body>

</html>
