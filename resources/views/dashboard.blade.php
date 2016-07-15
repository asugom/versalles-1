@extends('layouts.layout')

@section('header')
   @include('header.header')
@endsection


@section('sidebar')
@if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
  @include('menu.menuadmin', array('inicio'=>'active'))
@else
  @include('menu.menuuser', array('inicio'=>'active'))
@endif
  
  
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
            <li class="crumb-trail">Inicio</li>
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
            <div class=" center-block "> <!--mw1100-->
              <!-- Autoplay -->
                <div class="slick-autoplay ">
                  <div style="padding:15px;height: 100" class=".col-xs-3" >
                    <a href="{{ URL::asset('galeria/1.jpg') }}" data-lightbox="galeria" data-title="Foto1">
                      <img data-lazy=" {{ URL::asset('galeria/1.jpg') }}" width="300" height="200">
                      <p class="text-center"></p>
                    </a>
                  </div>
                  <div style="padding:15px;height: 100" class=".col-xs-3" >
                    <a href="{{ URL::asset('galeria/2.jpg') }}" data-lightbox="galeria" data-title="Foto 2">
                      <img data-lazy="{{ URL::asset('galeria/2.jpg') }}" width="300" height="200">
                      <p class="text-center"> </p>
                    </a>
                  </div>
                    <div style="padding:15px;height: 100" class=".col-xs-3" >
                        <a href="{{ URL::asset('galeria/3.jpg') }}" data-lightbox="galeria" data-title="Foto 3">
                            <img data-lazy=" {{ URL::asset('galeria/3.jpg') }}" width="300" height="200">
                            <p class="text-center"></p>
                        </a>
                    </div>
                    <div style="padding:15px;height: 100" class=".col-xs-3" >
                        <a href="{{ URL::asset('galeria/4.jpg') }}" data-lightbox="galeria" data-title="Foto 4">
                            <img data-lazy=" {{ URL::asset('galeria/4.jpg') }}" width="300" height="200">
                            <p class="text-center"></p>
                        </a>
                    </div>
					<div style="padding:15px;height: 100" class=".col-xs-3" >
                    <a href="{{ URL::asset('galeria/5.png') }}" data-lightbox="galeria" data-title="Foto 5">
                      <img data-lazy="{{ URL::asset('galeria/5.png') }}" width="300" height="200">
                      <p class="text-center"> </p>
                    </a>
                  </div>
				  <div style="padding:15px;height: 100" class=".col-xs-3" >
                    <a href="{{ URL::asset('galeria/6.png') }}" data-lightbox="galeria" data-title="Foto 6">
                      <img data-lazy="{{ URL::asset('galeria/6.png') }}" width="300" height="200">
                      <p class="text-center"> </p>
                    </a>
                  </div>

                </div>

              </div>
            </div>

            <!--End: Galeria de fotos -->
            <div class="row mb15 " id="spy2">
              <!-- Chat Widget -->
              <div class="col-md-6 ">
                <div class="panel panel-widget chat-widget panel-dark">
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
                  <div class="panel panel-dark">
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
            <div class="row mb15 " id="spy2">
                <div class="col-md-6">
                    <!-- Pie Chart -->
                    <div class="panel panel-widget task-widget panel-dark">
                        <div class="panel-heading">
                            <span class="panel-title fw600 text-info">Resultados encuesta anterior</span>
                        </div>
                        <div class="panel-body pn">
                            <div class="panel-title p6"><h4>¿Opcion?</h4></div>
                            <div id="high-pie" style="width: 100%; height: 210px; margin: 0 auto"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6  ">
                    <div class="panel panel-widget task-widget panel-dark">
                        <div class="panel-heading">
                          <span class="panel-icon">
                            <i class="fa fa-check-square-o"></i>
                          </span>
                            <span class="panel-title"> Encuesta</span><b style="color: red; margin-left:30px"></b>
                        </div>
                      <div class="panel-body p10">
                          @include('encuesta.encuesta')
                      </div>
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
<form method="post" id="form"  >
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
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
      <!-- jQuery Validate Plugin-->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="vendor/plugins/highcharts/highcharts.js"></script>
    <script src="vendor/plugins/circles/circles.js"></script>

    <!-- Theme Javascript -->
    <script src="assets/js/utility/utility.js"></script>
    <script src="assets/js/demo/demo.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Widget Javascript -->
    <script src="assets/js/demo/widgets.js"></script>
    <script type="text/javascript">
    
    function validar_voto(){
          
      var parametros = $('#form').serializeArray();           
      $.ajax({
              data:  parametros,
              url:   'validar_voto',
              method:  'post',
              beforeSend: function () {
                $("#resp").html("Procesando, espere por favor...");
              },
              success:  function (data) {
                if (data.length>0){
                  $("#resp").html("Tu voto: "+data[0].opcion);  
                  $("#pie").show(); 
                  $("#encuesta-form").hide();

                  var arr = [];
                  @foreach ($data["encuesta_actual"] as $opcion)
                    arr.push(['{{$opcion->opcion}}',{{$opcion->votos}}]); 
                  @endforeach

                  var chart = $('#high-pie2').highcharts();
                  chart.series[0].setData(arr,true); 
                }else{
                   $("#resp").html("");
                }
              }
      });
    }

    jQuery(document).ready(function() {

      "use strict";
        validar_voto();

        
        $('#encuesta-boton').click( function() {
           
            if ($('input[name=voto]:checked', '#encuesta-form').val()){
              var parametros = $('#encuesta-form').serializeArray();
              parametros.push({name: '_token', value: $(this).data('token')});
              
              $.ajax({
                      data:  parametros,
                      url:   'votar',
                      method:  'post',
                      beforeSend: function () {
                              $("#resp").html("Procesando, espere por favor...");
                      },
                      success:  function (data) {
                          $( "#pie" ).show(); 
                          $( "#encuesta-form" ).hide();
                          $("#resp").html("");

                          var arr = [];
                          $.each( data, function( key, value ) {
                             arr.push([value.opcion,value.votos]); 
                          });

                          var chart = $('#high-pie2').highcharts();
                          chart.series[0].setData(arr,true);            
                      }
              });
            }else{
              alert("Seleccione algo");
            }
              
        } );

        $('.slick-autoplay').slick({
          dots: false,
          slidesToShow: 4,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2300,
        });

        var demoHighPies = function() {

            var pie1 = $('#high-pie');
            var pie1 = $('#high-pie2');

            if (pie1.length) {

                // Pie Chart1
                $('#high-pie').highcharts({
                    credits: false,
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: null
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            center: ['30%', '50%'],
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    colors:[bgWarning, bgPrimary, bgInfo, bgAlert,
                        bgDanger, bgSuccess, bgSystem, bgDark
                    ],
                    legend: {
                        x: 90,
                        floating: true,
                        verticalAlign: "middle",
                        layout: "vertical",
                        itemMarginTop: 10
                    },
                    series: [{
                        type: 'pie',
                        name: 'Votos',
                        data: [
                            ['Opcion 1', 35.0],
                            ['Opcion 2', 36.8],
                            {
                                name: 'Opcion 3',
                                y: 15.8,
                                sliced: true,
                                selected: true
                            },
                            ['Opcion 4', 18.5],
                        ]
                    }]
                });
                $('#high-pie2').highcharts({
                    credits: false,
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false
                    },
                    title: {
                        text: null
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    plotOptions: {
                        pie: {
                            center: ['30%', '50%'],
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                    colors:[bgSuccess,bgDanger,bgWarning, bgPrimary, bgInfo, bgAlert,
                         bgSystem, bgDark
                    ],
                    legend: {
                        x: 90,
                        floating: true,
                        verticalAlign: "middle",
                        layout: "vertical",
                        itemMarginTop: 10
                    },
                    series: [{
                        type: 'pie',
                        name: 'Votos',
                        data: [
                            ['Opcion 1', 35.0],
                            ['Opcion 2', 36.8],
                            {
                                name: 'Opcion 3',
                                y: 15.8,
                                sliced: true,
                                selected: true
                            },
                            ['Opcion 4', 18.5],
                        ]
                    }]
                });
            }
        } // End High Pie Charts Demo
        demoHighPies();

        @if(isset($message))
          new PNotify({
            title: 'Aviso',
            text: '{{$status}}',
            shadow: "true",
            opacity: "1",
            addclass: "stack_top_right",
            type: "error",
            stack: {
              "dir1": "down",
              "dir2": "left",
              "push": "top",
              "spacing1": 10,
              "spacing2": 10
            },
            width: "550px",
            delay: 3000
          });
        @endif


    });
    </script>
  @stop
