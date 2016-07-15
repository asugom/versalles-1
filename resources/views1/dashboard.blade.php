@extends('layouts.layout')

@section('header')
   @include('header.header')
@endsection


@section('sidebar')
  @include('menu.menuadmin', array('inicio'=>'active'))
@endsection

@section('wrapper')

  <section id="content_wrapper">
      <!-- Start: Topbar -->
      <header id="topbar" class="alt" style=" min-height: 10px;padding: 10px 10px; ">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-icon">
              <a href="{{ url('/') }}">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-trail">Dashboard</li>
          </ol>
        </div>
      </header>
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

          <!-- Alerta 1 -->
          <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-warning pr10"></i>
            <strong>Notificación!</strong> Usted posee un pago pendiente.
            <a href="#" class="alert-link">Ver detalles</a>.
          </div>
          <!-- Galeria de fotos -->

          <div class="panel panel-dark " style="background-color: #eee;height: 280px">
            <div class="panel-heading ">
              <span class="panel-icon">
                <i class="glyphicon glyphicon-picture"></i>
              </span>
              <span class="panel-title">Fotos Recientes</span>
            </div>
            <div class="mw1100 center-block ">
              <!-- Autoplay -->
                <div class="slick-autoplay ">
                  <div style="padding:15px;height: 100" class=".col-xs-3" >
                    <a href="{{ URL::asset('galeria/20160616_121305.jpg') }}" data-lightbox="galeria" data-title="Foto1">
                      <img data-lazy=" {{ URL::asset('galeria/20160616_121305.jpg') }}" width="350" height="200">
                      <p class="text-center"></p>
                    </a>
                  </div>
                  <div style="padding:15px;height: 100" class=".col-xs-3" >
                    <a href="{{ URL::asset('galeria/20160616_121332.jpg') }}" data-lightbox="galeria" data-title="Foto 2">
                      <img data-lazy="{{ URL::asset('galeria/20160616_121332.jpg') }}" width="350" height="200">
                      <p class="text-center"> </p>
                    </a>
                  </div>
                </div>

              </div>
            </div>

            <!--End: Galeria de fotos -->
            <div class="row mb15 hidden" id="spy2">
              <!-- Chat Widget -->
              <div class="col-md-6 ">
                <div class="panel panel-widget chat-widget panel-system">
                  <div class="panel-heading ">
                      <span class="panel-icon">
                        <i class="fa fa-pencil"></i>
                      </span>
                    <span class="panel-title">Comentarios </span><b style="color: red; margin-left:30px">En Construccion</b>
                  </div>
                  <div class="panel-body bg-light dark panel-scroller scroller-lg pn">
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" alt="64x64" src="assets/img/avatars/2.jpg">
                        </a>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading">Juana Lopez
                          <small> - 12:30am</small>
                        </h5> Hola. ¿Como estan?
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-left">
                        <a href="#">
                          <img class="media-object" alt="64x64" src="https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/3a/3a318d90324f1897c7417c857133579980360e16_medium.jpg">
                        </a>
                      </div>
                      <div class="media-body">
                        <h5 class="media-heading">Miranda Khali
                          <small> - 8:41am</small>
                        </h5> Todo bien
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-body">
                        <h5 class="media-heading">Joe Gibbons
                          <small> - 07:16pm</small>
                        </h5> Saludos, recuerden pagar sus deudas y asistir a las reuniones.
                      </div>
                      <div class="media-right">
                        <a href="#">
                          <img class="media-object" alt="64x64" src="assets/img/avatars/1.jpg">
                        </a>
                      </div>
                    </div>

                  </div>
                  <div class="panel-footer">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Enter your message here...">
                        <span class="input-group-btn">
                          <button class="btn btn-default btn-gradient" type="button">Send Message</button>
                        </span>
                    </div>
                    <!-- /input-group -->
                  </div>


                </div>
              </div>

              <!-- Timeline Widget -->
              <div class="col-md-6">
                  <div class="panel panel-system">
                    <div class="panel-heading">
                        <span class="panel-icon">
                          <i class="fa fa-file-word-o"></i>
                        </span>
                      <span class="panel-title"> Ultimos documentos publicados</span><b style="color: red; margin-left:30px">En Construccion</b>
                    </div>
                    <div class="panel-body ptn pbn p10">
                      <ol class="timeline-list">
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            Se ha publicado el archivo:
                            <a href="#">Participantes Consejo comunal.doc</a>
                          </div>
                          <div class="timeline-date">26/01/2016 1:25am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            Se ha publicado el archivo:
                            <a href="#">Planos club, piscina y parrillera.pdf</a>
                          </div>
                          <div class="timeline-date">06/02/2016 1:01pm</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            Se ha publicado el archivo:
                            <a href="#">Planos club, piscina y parrillera.pdf</a>
                          </div>
                          <div class="timeline-date">06/02/2016 1:01pm</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            Se ha publicado el archivo:
                            <a href="#">Planos club, piscina y parrillera.pdf</a>
                          </div>
                          <div class="timeline-date">06/02/2016 1:01pm</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            Se ha publicado el archivo:
                            <a href="#">Planos club, piscina y parrillera.pdf</a>
                          </div>
                          <div class="timeline-date">06/02/2016 1:01pm</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            Se ha publicado el archivo:
                            <a href="#">Planos club, piscina y parrillera.pdf</a>
                          </div>
                          <div class="timeline-date">06/02/2016 1:01pm</div>
                        </li>
                      </ol>
                    </div>
                  </div>
              </div>
            </div>

            <div class="col-md-4 hidden ">
              <div class="panel panel-widget task-widget panel-system">
                <div class="panel-heading">
                      <span class="panel-icon">
                        <i class="fa fa-check-square-o"></i>
                      </span>
                  <span class="panel-title"> Encuesta</span><b style="color: red; margin-left:30px">En Construccion</b>
                </div>
                <div class="panel-body p10">
                  <div class="panel-title p6"><h4>¿Que comida te gusta mas?</h4></div>
                  <div class="radio-custom radio-danger mb5">
                    <input type="radio" id="radio1" name="radiopoll">
                    <label for="radio1">Pizza</label>
                  </div>
                  <div class="radio-custom radio-danger mb5">
                    <input type="radio" id="radio2" name="radiopoll">
                    <label for="radio2">Hamburguesa</label>
                  </div>
                  <div class="radio-custom radio-danger mb5">
                    <input type="radio" id="radio3" name="radiopoll">
                    <label for="radio3">Mango</label>
                  </div>
                  <button type="button" class="btn btn-dark btn-block">Votar</button>
                </div>
              </div>

            </div>

          </div>
          <!-- end: .tray-center -->

        </section>
        <!-- End: Content -->

        <!-- Begin: Page Footer -->
        <footer id="content-footer" class="affix" style="z-index: 10;margin-left: 0px;">
          <div class="row">
            <div class="col-md-6">
              <span class="footer-legal">© 2016 Sistema de Condominio</span>
            </div>
            <div class="col-md-6 text-right">
              <span class="footer-meta">Creado por <b>PubliRed24</b>  </span>
              <a href="#content" class="footer-return-top">
                <span class="fa fa-arrow-up"></span>
              </a>
            </div>
          </div>
        </footer>
        <!-- End: Page Footer -->
    </section>

  @stop

  @section('sidebarright')

  @stop

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
  @stop
