@extends('layouts.layout')

@section('header')
    <header class="navbar navbar-fixed-top navbar-shadow bg-dark">
      <div class="navbar-branding">
        <a class="navbar-brand" href="dashboard.html">
          <b>Urb. El Ejemplo</b>
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>

      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown menu-merge">
          <div class="navbar-btn btn-group">
            <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
              <span class="fa fa-bell-o fs14 va-m"></span>
              <span class="badge badge-danger">666</span>
            </button>
            <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">
              <div class="panel mbn">
                  <div class="panel-menu">
                     <span class="panel-icon"><i class="fa fa-clock-o"></i></span>
                     <span class="panel-title fw600"> Recent Activity</span>
                     <button class="btn btn-default light btn-xs pull-right" type="button"><i class="fa fa-refresh"></i></button>
                  </div>
                  <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                      <ol class="timeline-list">
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Michael</b> Added to his store:
                            <a href="#">Ipod</a>
                          </div>
                          <div class="timeline-date">1:25am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Sara</b> Added his store:
                            <a href="#">Notebook</a>
                          </div>
                          <div class="timeline-date">3:05am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Software</a>
                          </div>
                          <div class="timeline-date">4:15am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Apple</a>
                          </div>
                          <div class="timeline-date">7:45am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Software</a>
                          </div>
                          <div class="timeline-date">4:15am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Apple</a>
                          </div>
                          <div class="timeline-date">7:45am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Michael</b> Added his store:
                            <a href="#">Ipod</a>
                          </div>
                          <div class="timeline-date">8:25am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-system">
                            <span class="fa fa-fire"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Software</a>
                          </div>
                          <div class="timeline-date">4:15am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Sara</b> Added to his store:
                            <a href="#">Notebook</a>
                          </div>
                          <div class="timeline-date">3:05am</div>
                        </li>
                      </ol>

                  </div>
                  <div class="panel-footer text-center p7">
                    <a href="#" class="link-unstyled"> View All </a>
                  </div>
              </div>
            </div>
          </div>
        </li>


        <li class="dropdown menu-merge">
          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
            <img src="assets/img/avatars/1.jpg" alt="avatar" class="mw30 br64">
            <span class="hidden-xs pl15"> Joselin Cedeño </span>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="dropdown-header clearfix">
              <div class="pull-left ml10">
                <select id="user-status">
                  <optgroup label="Current Status:">
                    <option value="1-1">Away</option>
                    <option value="1-2">Offline</option>
                    <option value="1-3" selected="selected">Online</option>
                  </optgroup>
                </select>
              </div>

              <div class="pull-right mr10">
                <select id="user-role">
                  <optgroup label="Logged in As:">
                    <option value="1-1">Client</option>
                    <option value="1-2">Editor</option>
                    <option value="1-3" selected="selected">Admin</option>
                  </optgroup>
                </select>
              </div>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-envelope"></span> Messages
                <span class="label label-warning">2</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-user"></span> Friends
                <span class="label label-warning">6</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-bell"></span> Notifications </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="animated animated-short fadeInUp">
                <span class="fa fa-gear"></span> Settings </a>
            </li>
            <li class="dropdown-footer">
              <a href="{{ url('/logout') }}" class="">
              <span class="fa fa-power-off pr5"></span> Logout </a>
            </li>
          </ul>
        </li>
      </ul>
    </header>
@endsection


@section('sidebar')
  <aside id="sidebar_left" class="nano nano-light sidebar-light">

      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
          <li class="sidebar-label pt20">Menu</li>
          <li class="active">
            <a href="{{ url('/') }}">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title">Inicio</span>
            </a>
          </li>
          <li>
            <a href="email_templates.html">
              <span class="glyphicon glyphicon-user"></span>
              <span class="sidebar-title">Mis Datos</span>
            </a>
          </li>
          <li>
            <a href="email_templates.html">
              <span class="glyphicon glyphicon-tasks"></span>
              <span class="sidebar-title">Historial de pagos</span>
            </a>
          </li>
          <li>
            <a href="email_templates.html">
              <span class="fa fa-money"></span>
              <span class="sidebar-title">Registrar pago</span>
            </a>
          </li>
          <li>
            <a href="email_templates.html">
              <span class="fa fa-envelope-o"></span>
              <span class="sidebar-title">Buzón de Mensajes</span>
            </a>
          </li>
          <li>
            <a href="email_templates.html">
              <span class="fa fa-file-word-o"></span>
              <span class="sidebar-title">Documentos</span>
            </a>
          </li>
          <li>
            <a href="email_templates.html">
              <span class="fa fa-check-square-o"></span>
              <span class="sidebar-title">Encuentas</span>
            </a>
          </li>
          <li>
            <a href="email_templates.html">
              <span class="fa fa-picture-o"></span>
              <span class="sidebar-title">Galeria de Imagenes</span>
            </a>
          </li>
          <li>
            <a href="email_templates.html">
              <span class="fa fa-comments-o"></span>
              <span class="sidebar-title">Sugerencias y quejas</span>
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
@endsection

@section('wrapper')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
  <style>
    /* demo slider styles */
    .slick-slide h1 {
      background: #FFF;
      border: 1px solid #DDD;
      height: 200px;
      line-height: 190px;
      margin: 15px;
      text-align: center;
      font-weight: 600;
      font-size: 32px;
      color: #3498db;
    }
    .center-mode h1 {
      opacity: 0.8;
      transition: all 300ms ease;
    }
    .center-mode .slick-center h1 {
      color: #e67e22;
      opacity: 1;
      -webkit-transform: scale(1.08);
      transform: scale(1.08);
    }
  </style>
  <!-- jQuery -->
  <script src="vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- Slick Slider Plugin -->
  <script src="vendor/plugins/slick/slick.js"></script>

  <!-- Slick Slider Plugin -->
  <script src="vendor/plugins/lightbox/js/lightbox.min.js"></script>

  <!-- Theme Javascript -->
  <script src="assets/js/utility/utility.js"></script>
  <script src="assets/js/demo/demo.js"></script>
  <script src="assets/js/main.js"></script>

  <!-- Widget Javascript -->
  <script src="assets/js/demo/widgets.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {

    "use strict";

    // Init Demo JS
    Demo.init();


    // Init Theme Core
    Core.init();

    // Init Widget Demo JS
    // demoHighCharts.init();

    // Because we are using Admin Panels we use the OnFinish
    // callback to activate the demoWidgets. It's smoother if
    // we let the panels be moved and organized before
    // filling them with content from various plugins

    // Init plugins used on this page
    // HighCharts, JvectorMap, Admin Panels

    // Init Admin Panels on widgets inside the ".admin-panels" container

    $('.slick-autoplay').slick({
      dots: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2200,
    });

    // Init plugins for ".task-widget"
    // plugins: Custom Functions + jQuery Sortable
    //
    var taskWidget = $('div.task-widget');
    var taskItems = taskWidget.find('li.task-item');
    var currentItems = taskWidget.find('ul.task-current');
    var completedItems = taskWidget.find('ul.task-completed');

    // Init jQuery Sortable on Task Widget
    taskWidget.sortable({
      items: taskItems, // only init sortable on list items (not labels)
      handle: '.task-menu',
      axis: 'y',
      connectWith: ".task-list",
      update: function( event, ui ) {
        var Item = ui.item;
        var ParentList = Item.parent();

        // If item is already checked move it to "current items list"
        if (ParentList.hasClass('task-current')) {
            Item.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
        }
        if (ParentList.hasClass('task-completed')) {
            Item.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
        }

      }
    });

    // Custom Functions to handle/assign list filter behavior
    taskItems.on('click', function(e) {
      e.preventDefault();
      var This = $(this);
      var Target = $(e.target);

      if (Target.is('.task-menu') && Target.parents('.task-completed').length) {
        This.remove();
        return;
      }

      if (Target.parents('.task-handle').length) {
          // If item is already checked move it to "current items list"
          if (This.hasClass('item-checked')) {
            This.removeClass('item-checked').find('input[type="checkbox"]').prop('checked', false);
          }
          // Otherwise move it to the "completed items list"
          else {
            This.addClass('item-checked').find('input[type="checkbox"]').prop('checked', true);
          }
      }

    });

  });
  </script>
@endsection
