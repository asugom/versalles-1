<!DOCTYPE html>
<html>

<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>Sistema Condominios</title>
  <meta name="keywords" content="sistema de condominio" />
  <meta name="description" content="Sistema Condominios">
  <meta name="author" content="PubliRed24">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

    <!-- Slick.js CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/slick/slick.css') }}">

    <!-- Summernote CSS  -->
    <link rel="stylesheet" type="text/css" href="vendor/plugins/summernote/summernote.css">

    <!-- FullCalendar Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/fullcalendar/fullcalendar.min.css') }}">

  <!-- Lightbox CSS -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/lightbox/css/lightbox.min.css') }}">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/skin/default_skin/css/theme.css') }}">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/admin-tools/admin-forms/css/admin-forms.min.css') }}">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.ico') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body class="sb-top sb-top-lg">

  <!-- Start: Main -->
  <div id="main">

      <!-- Start: Header -->
      @yield('header')
      <!-- End: Header -->

      <!-- Start: Sidebar -->
      @yield('sidebar')
      <!-- End: Sidebar Left -->

      <!-- Start: Content-Wrapper -->
      @yield('wrapper')
      <!-- End: Content-Wrapper -->

      <!-- Start: Right Sidebar -->
      @yield('sidebarright')
      <!-- End: Right Sidebar -->
  </div>
  <!-- End: Main -->
  <!-- BEGIN: PAGE SCRIPTS -->
      @yield('scripts')
  
  <!-- END: PAGE SCRIPTS -->
</body>

</html>