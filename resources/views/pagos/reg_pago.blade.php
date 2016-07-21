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
            <li class="crumb-trail">Registrar recibo de pago</li>
          </ol>
        </div>
      </header>
      <!-- End: Topbar -->

      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">
          <input type="hidden" id="success" value="{{ Session::get('success') }}">
          <input type="hidden" id="danger" value="{{ Session::get('danger') }}">
        <!-- begin: .tray-center -->
        <div class="tray tray-center">

          <div class="mw1000 center-block">
            <!-- Begin: Admin Form -->
            <div class="admin-form  theme-system">

              <div class="panel heading-border  panel-dark">
                <div class="panel-body bg-light">
                    <h4 class="micro-header">Registrar recibo de pago</h4>

                    {!! Form::open(array('route' => 'save_pago','method'=>'POST','id'=>'admin-form')) !!}
                          
                          @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
                              <input type="hidden" name="estado_id" value="2">
                          @else
                              <input type="hidden" name="estado_id" value="1">
                          @endif

                          <div class="section-divider mb40" id="spy1">
                              <span>Seleccione el tipo de pago realizado</span>
                          </div>
                        	<div class="option-group field">
                            @foreach($tipos as $tipo)
                              <label class="radio-inline"><input type="radio" name="optradio" value="{{ $tipo->id }}" >{{ $tipo->name }}</label>
                            @endforeach
            							  <!-- <label class="radio-inline"><input type="radio" id="radioTransf" name="optradio" >Transferencia</label>
            							  <label class="radio-inline"><input type="radio" id="radioDeposito" name="optradio" >Depósito</label> -->
            							</div>
                       
                          <div class="section-divider mv40" id="spy4">
                              <span>Datos del recibo</span>
                          </div>

                          @if((Auth::user()->id_role == 1 || Auth::user()->id_role == 2) && is_array($usuarios))
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="section">
                                      <label class="field select">
                                          {!! Form::select('usuarios', $usuarios, null, ['placeholder' => 'Seleccione un usuario']) !!}
                                          <i class="arrow"></i>
                                      </label>
                                       
                                  </div>
                              </div>
                            </div>
                          @else
                            {!! Form::hidden('usuarios', $usuarios) !!}
                          @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="concepto" id="concepto" class="gui-input" placeholder="Concepto">
                                        <label for="concepto" class="field-icon">
                                            <i class="fa fa-file-text-o"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="recibo" id="recibo" class="gui-input" placeholder="Número del Recibo">
                                        <label for="recibo" class="field-icon">
                                            <i class="fa fa-asterisk"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-6">
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
                        <div class="row">
                        	<div class="col-md-6 pull-right">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="monto" id="monto" class="gui-input" placeholder="Monto del Recibo">
                                        <label for="monto" class="field-icon">
                                            <i class="fa fa-dollar"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="button btn-primary mr10 pull-right">Guardar</button>
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


      $("#admin-form").validate({

      /* @validation states + elements 
      ------------------------------------------- */

      errorClass: "state-error",
      validClass: "state-success",
      errorElement: "em",

      /* @validation rules 
      ------------------------------------------ */

      rules: {
        concepto: {
            required: true
        },
        usuarios: {
            required: true
        },
        monto: {
            required: true,
            number: true
        },
        recibo: {
            required: true
        },
        optradio: {
            required: true
        },
        fecha:{
            required: true
        }
      },

      /* @validation error messages 
      ---------------------------------------------- */

      messages: {
        concepto: {
          required: 'Ingrese el concepto del pago'
        },
        usuarios: {
          required: 'Seleccione un usuario para realizar el pago'
        },
        monto: {
          required: 'Ingrese el monto del pago',
          number: 'Ingrese un número válido'
        },
        recibo: {
          required: 'Ingrese el número del recibo del pago'
        },
        optradio: {
          required: 'Seleccione un tipo de pago'
        },
        fecha:{
            required:'Ingrese la fecha del pago'
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

      if ($("#success").val()!='') {

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
              text: $("#success").val(),
              shadow: "true",
              opacity: "1",
              addclass: "stack_top_right",
              type: 'success',
              stack: Stacks["stack_top_right"],
              width: "350px",
              delay: 1500
          });
      }else if ($("#danger").val()!='') {
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
              text: $("#danger").val(),
              shadow: "true",
              opacity: "1",
              addclass: "stack_top_right",
              type: 'danger',
              stack: Stacks["stack_top_right"],
              width: "350px",
              delay: 1500
          });
      }

  });
  </script>
@endsection
