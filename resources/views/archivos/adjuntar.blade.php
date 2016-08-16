@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @include('menu.menuadmin', array('archivo'=>'active'))
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
            <li class="crumb-trail">Adjuntar Archivo</li>
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
                    <input type="hidden" id="message" value="{{ Session::get('message') }}">
                    {!! Form::open(array('route' => 'adjuntar_archivo','method'=>'POST','id'=>'admin-form','files'=>'true')) !!}

                          <div class="section-divider mv40" id="spy4">
                              <span>Adjuntar nuevo archivo</span>
                          </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section">
                                    <label class="field prepend-icon">
                                        <input type="text" name="titulo" id="titulo" class="gui-input" placeholder="Titulo del archivo">
                                        <label for="titulo" class="field-icon">
                                            <i class="fa fa-comments-o"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="section">
                                    <label class="field prepend-icon append-button file">
                                        <span class="button btn-primary">Choose File</span>
                                        <input class="gui-file" name="file1" id="file1" onchange="document.getElementById('uploader1').value = this.value;" type="file">
                                        <input class="gui-input" id="uploader1" placeholder="Please Select A File" type="text">
                                        <label class="field-icon">
                                            <i class="fa fa-upload"></i>
                                        </label>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button btn-primary mr10 pull-right">Guardar Archivo</button>

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
  
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/pnotify/pnotify.custom.min.css') }}">
  <!-- jQuery -->
  <script src="{{ URL::asset('vendor/jquery/jquery-1.11.1.min.js') }}"></script>
  <script src="{{ URL::asset('vendor/jquery/jquery_ui/jquery-ui.min.js') }}"></script>

  <!-- jQuery Validate Plugin-->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>

  <!-- jQuery Validate Addon -->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}"></script>


  <!-- Theme Javascript -->


  <!-- PNotify -->
  <script src="{{ URL::asset('vendor/plugins/pnotify/pnotify2.custom.min.js') }}"></script>

  <script type="text/javascript">
  jQuery(document).ready(function() {

      $("#admin-form").submit(function( event ) {
        if ( $( "#titulo" ).val().length > 0 &&  $( "#file1" ).val().length>0 ) {
          return true;
        }
   new PNotify({
            title: 'Aviso',
            text: 'Ingrese los datos de la publicación',
             type: 'error',
            icon: false
        });
        event.preventDefault();
      });

      if ($("#message").val()!='') {
              
        new PNotify({
          title: 'Aviso',
          text: $("#message").val(),
          shadow: "true",
          opacity: "1",
          addclass: "stack_top_right",
          type: "success",
          stack: {
              "dir1": "down",
              "dir2": "left",
              "push": "top",
              "spacing1": 10,
              "spacing2": 10
          },
          width: "550px",
          delay: 3000,
            icon: false
      });
      }
  $("#admin-form").validate({
      errorClass: "state-error",
      validClass: "state-success",
      errorElement: "em",
      rules: {
        file1: {
            required: true, 
            accept: "image/gif,image/png,image/bmp,image/jpeg,image/jpg,application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/pdf,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel,application/vnd.ms-powerpoint,text/plain,application/pdf,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.slideshow,application/vnd.openxmlformats-officedocument.presentationml.presentation", 
            filesize: 2048576  },
        titulo: {
            required: true
        }

      },
      messages: {
        titulo: {
          required: 'Ingrese el titulo'
        },
        file1:{
          required:"Debe seleccionar un archivo",
          accept:'Se permiten archivos tipo .doc, .xls e imagenes',
          filesize:'Tamaño maximo excedido'
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
