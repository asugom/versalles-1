@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
        @include('menu.menuadmin', array('pagos'=>'active'))
    @else
        @include('menu.menuuser', array('pagos'=>'active'))
    @endif
@endsection

@section('wrapper')

<section id="content_wrapper">
      <!-- Start: Topbar -->
      <header id="topbar" class="alt" style=" min-height: 10px;padding: 10px 10px; ">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-icon">
              <a href="{{route('home')}}">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-trail">Registrar saldo inicial</li>
          </ol>
        </div>
      </header>
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">
          <input type="hidden" id="message" value="{{ Session::get('message') }}">
        <!-- begin: .tray-center -->
        <div class="tray tray-center">

          <div class="mw1000 center-block">
            <!-- Begin: Admin Form -->
            <div class="admin-form  theme-system">

              <div class="panel heading-border  panel-dark">
                <div class="panel-body bg-light">
                    <h4 class="micro-header">Registrar saldo inicial</h4>

                    {!! Form::open(array('route' => 'sndcorreo','method'=>'POST','id'=>'admin-form','files'=>'true')) !!}

                        <div class="section-divider mv40" id="spy4">
                            <span>Datos del recibo</span>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="concepto" id="concepto" class="gui-input" value="Registro de saldo inicial" readonly>
                                        <label for="concepto" class="field-icon">
                                            <i class="fa fa-file-text-o"></i>
                                        </label>
                                    </label>
                                    <input type="hidden" name="tipo" id="tipo" value="0">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="monto" id="monto" class="gui-input" placeholder="Monto del Recibo">
                                        <label for="monto" class="field-icon">
                                            <i class="fa fa-dollar"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6 pull-right">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="fecha" id="fecha" class="gui-input" placeholder="Fecha del Recibo">
                                        <label for="fecha" class="field-icon">
                                            <i class="fa fa-calendar"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="button btn-primary mr10 pull-right">Guardar</button>
                    {!! Form::close() !!}
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


@endsection

@section('scripts')
    <link rel="stylesheet" type="text/css" href="vendor/plugins/datepicker/css/bootstrap-datetimepicker.css">
  <!-- jQuery -->
  <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

  <!-- DateTime Plugin -->
  <script src="{{ URL::asset('vendor/plugins/globalize/globalize.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

  <!-- jQuery Validate Plugin-->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>

  <!-- jQuery Validate Addon -->

  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}"></script>

  <!-- Theme Javascript -->
  <script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>
  <script src="{{ URL::asset('assets/js/demo/demo.js') }}"></script>
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>

  <!-- PNotify -->
  <script src="{{ URL::asset('vendor/plugins/pnotify/pnotify.js') }}"></script>

  <!-- Widget Javascript -->
  <script src="{{ URL::asset('assets/js/demo/widgets.js') }}"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {

      "use strict";
      // Init Demo JS
      Demo.init();
      // Init Theme Core
      Core.init();

      $('#fecha').datetimepicker({
          format: 'DD/MM/YYYY',
          pickTime: false
      });

      var d = new Date();

      var month = d.getMonth()+1;
      var day = d.getDate();
      var output = ((''+day).length<2 ? '0' : '') + day + '/' +
      ((''+month).length<2 ? '0' : '') + month + '/' +
      d.getFullYear();
      $('#fecha').val(output);

      $("#admin-form").validate({

      /* @validation states + elements 
      ------------------------------------------- */

      errorClass: "state-error",
      validClass: "state-success",
      errorElement: "em",

      /* @validation rules 
      ------------------------------------------ */

      rules: {
        titulo: {
            required: true
        },
        texto:{
            required:true,
            minlength:8
        }
      },

      /* @validation error messages 
      ---------------------------------------------- */

      messages: {
        titulo: {
          required: 'Ingrese el titulo'
        },
          texto:{
              required:'Ingrese el cuerpo del mensaje'
          }
      },

      /* @validation highlighting + error placement  
      ---------------------------------------------------- */

      highlight: function(element, errorClass, validClass) {
        $(element).closest('.field').addClass(errorClass).removeClass(validClass);
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).closest('.field').removeClass(errorClass).addClass(validClass);
      },
      errorPlacement: function(error, element) {
        if (element.is(":radio") || element.is(":checkbox")) {
          element.closest('.option-group').after(error);
        } else {
          error.insertAfter(element.parent());
        }
      }

    });

      if ($("#message").val()!='') {

          var Stacks = {
              stack_top_right: {
                  "dir1": "down",
                  "dir2": "left",
                  "push": "top",
                  "spacing1": 10,
                  "spacing2": 10
              }
          }

          // Create new Notification
          new PNotify({
              title: 'Aviso',
              text: $("#message").val(),
              shadow: "true",
              opacity: "1",
              addclass: "stack_top_right",
              type: "success",
              stack: Stacks["stack_top_right"],
              width: "290px",
              delay: 1000
          });
      }

  });
  </script>
@endsection
