@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @if (Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
        @include('menu.menuadmin', array('encuesta'=>'active'))
    @else
        @include('menu.menuuser', array('encuesta'=>'active'))
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
            <li class="crumb-trail">Crear nueva encuesta</li>
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
                    {!! Form::open(array('route' => 'save_encuesta','method'=>'POST','id'=>'admin-form')) !!}
                          <div class="section-divider mb40" id="spy1">
                              <span>Datos de la encuesta</span>
                          </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="consulta" id="consulta" class="gui-input" placeholder="Consulta">
                                        <label for="consulta" class="field-icon">
                                            <i class="fa fa-question"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="opcionadd" id="opcionadd" class="gui-input" placeholder="Añadir opcion a la encuesta">
                                        <label for="opcionadd" class="field-icon">
                                            <i class="fa fa-bars"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <button type="button" id="add_opcion" class="button btn-primary mr10 pull-left">+</button>
                            </div>
                        </div>
                    <fieldset id="opciones">
                        <legend>Opciones agregadas</legend>
                    </fieldset>


                        <button type="submit" class="button btn-primary mr10 pull-right">Guardar Encuesta</button>
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

  <!-- jQuery -->
  <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

  <!-- jQuery Validate Plugin-->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>

  <!-- jQuery Validate Addon -->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}"></script>


  <!-- Theme Javascript -->
  <script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>


  <!-- PNotify -->
  <script src="{{ URL::asset('vendor/plugins/pnotify/pnotify.js') }}"></script>

  <!-- Widget Javascript -->
  <script src="{{ URL::asset('assets/js/demo/widgets.js') }}"></script>
  <script type="text/javascript">
  jQuery(document).ready(function() {

      "use strict";
      var intId=0;
      $("#add_opcion").click(function() {
          if ($("#opcionadd").val() != ""){
              intId = intId + 1;

              var fieldWrapper = $("<div class='row'>" +
                      "<div class='col-md-6'>" +
                        "<div class='section'>" +
                            "<label class='field prepend-icon'>" +
                                "<input type='text' name='opcion[]' id='opcion" + intId + "' class='gui-input' value='" + $("#opcionadd").val() + "' >" +
                                    "<label for='opcion' class='field-icon'>" +
                                        "<i class='fa fa-angle-right'></i>" +
                                    "</label>" +
                            "</label>" +
                        "</div>" +
                      "</div>" +
                      "<div class='col-md-6' >" +
                        "<button type='button' id='rem_opcion' onclick='$(this).parent().parent().remove()' class='button btn-primary mr10 pull-left'>-</button>" +
                      "</div>" +
                      "</div>");
              $("#opcionadd").val("");
              $("#opciones").append(fieldWrapper);
          }else
                  alert("Ingrese un valor");
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
          consulta: {
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
          consulta: {
          required: 'Ingrese el titulo de la encuesta'
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



  });
  </script>
@endsection
