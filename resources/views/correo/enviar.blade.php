@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @include('menu.menuadmin', array('enviarmsj'=>'active'))
@endsection

@section('wrapper')
<section id="content_wrapper">
      <!-- Start: Topbar -->
      <header id="topbar" class="alt" style=" min-height: 10px;padding: 10px 10px; ">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-icon">
              <a href="dashboard.html">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-trail">Enviar Correo</li>
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
                    <h4 class="micro-header">Enviar correo electronico</h4>

                    {!! Form::open(array('route' => 'sndcorreo','method'=>'POST','id'=>'admin-form','files'=>'true')) !!}
                          <div class="section-divider mb40" id="spy1">
                              <span>Destinatarios</span>
                          </div>
                          <div class="checkbox-custom mb5">
                              <input type="checkbox" checked="" id="checkRec" name="checktodos">
                              <label for="checktodos">Todos</label>
                          </div>
                          <div class="section-divider mv40" id="spy4">
                              <span>Mensaje</span>
                          </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="titulo" id="titulo" class="gui-input" placeholder="Titulo">
                                        <label for="titulo" class="field-icon">
                                            <i class="fa fa-comments-o"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>
                          <div class="panel">
                              <div class="panel-body pn of-h" >
                                  <textarea class="summernote" name="texto"></textarea>
                              </div>
                          </div>

                        <div class="row mb10">
                            <div class="col-md-6" >
                                <button type="button" id="add_opcion" class="button btn-primary  pull-left">Agregar Adjunto</button>
                            </div>
                        </div>
                        <fieldset id="opciones">
                            <legend>Archivos Adjuntos</legend>
                        </fieldset>
                       <!-- <div class="row">
                            <div class="col-md-8">
                                <div class="section">
                                    <label class="field prepend-icon append-button file">
                                        <span class="button btn-primary">Choose File</span>
                                        <input class="gui-file" name="file1[]" id="file1" onchange="document.getElementById('uploader1').value = this.value;" type="file">
                                        <input class="gui-input" id="uploader1" placeholder="Please Select A File" type="text">
                                        <label class="field-icon">
                                            <i class="fa fa-upload"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        -->

                        <button type="submit" class="button btn-primary mr10 pull-right">Enviar correo</button>

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
<style>

    .btn-toolbar > .btn-group.note-fontname {
        display: none;
    }
    .btn-toolbar > .btn-group.note-insert {
        display: none;
    }
    .btn-toolbar > .btn-group.note-help {
        display: none;
    }
    .btn-toolbar > .btn-group.note-view {
        display: none;
    }

</style>

@endsection

@section('scripts')

  <!-- jQuery -->
  <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

  <!-- jQuery Validate Plugin-->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>

  <!-- jQuery Validate Addon -->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}"></script>

    <!-- Summernote Plugin -->
    <script src="{{ URL::asset('vendor/plugins/summernote/summernote.min.js') }}"></script>

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

      var intId=0;

      $('body').on('change', $('[id^=file]'), function() {
          var fsize = 0;
          $.each( $('[id^=file]'), function( key, value ) {
              fsize=$("#"+value.id)[0].files[0].size;
          });
          if (fsize>16000000){
              $("#"+event.target.id).parent().parent().parent().parent().remove();
              alert("Los archivos exceden el tamaño maximo permitido");
          }

      });

      $("#add_opcion").click(function() {
              intId = intId + 1;
              var fieldWrapper = $( "<div class='row'>"+
                    "<div class='col-md-8'>"+
                        "<div class='section'>"+
                            "<label class='field prepend-icon append-button file'>"+
                                "<span class='button btn-primary'>Choose File</span>"+
                                '<input class="gui-file" name="file1[]" id="file'+intId+'" onchange="document.getElementById(\'uploader'+intId+'\').value = this.value;" type="file">'+

                                "<input class='gui-input' id='uploader"+intId+"' placeholder='Seleccione un archivo' type='text'>"+
                                "<label class='field-icon'>"+
                                    "<i class='fa fa-upload'></i>"+
                                "</label>"+
                            "</label>"+
                        "</div>"+
                    "</div>"+
                      "<div class='col-md-2' >" +
                      "<button type='button' id='rem_opcion' onclick='$(this).parent().parent().remove()' class='button btn-primary mr10 pull-left'>-</button>" +
                      "</div>" +
                  "</div>");


              $("#opciones").append(fieldWrapper);
      });

      // Init Summernote Plugin
      $('.summernote').summernote({
          height: 255, //set editable area's height
          focus: false, //set focus editable area after Initialize summernote
          oninit: function() {},
          onChange: function(contents, $editable) {},
      });

      // Init Inline Summernote Plugin
      $('.summernote-edit').summernote({
          airMode: true,
          focus: false //set focus editable area after Initialize summernote
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
              delay: 1400
          });
      }

  });
  </script>
@endsection
