@extends('layouts.layout')

@section('header')
    @include('header.header')
@endsection


@section('sidebar')
    @include('menu.menuadmin', array('usuario'=>'active'))
@endsection

@section('wrapper')


<section id="content_wrapper">
    <!-- CSS page -->
    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/media/css/dataTables.bootstrap.css') }}">
    <!-- Datatables Editor Addon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/Editor/css/dataTables.editor.css') }}">
    <!-- Datatables ColReorder Addon CSS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css') }}">
      <!-- Start: Topbar -->
      <header id="topbar" class="alt"  style=" min-height: 10px;padding: 10px 10px;">
        <div class="topbar-left">
          <ol class="breadcrumb">
            <li class="crumb-icon">
              <a href="dashboard.html">
                <span class="glyphicon glyphicon-home"></span>
              </a>
            </li>
            <li class="crumb-trail">Listar documentoss</li>  
          </ol>
        </div>
      </header>
      <!-- End: Topbar -->
    <input type="hidden" id="message" value="{{ $status or ' ' }}">
      <!-- Begin: Content -->
      <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">
            <div class="col-md-12">
                <div class="panel panel-visible" id="spy2">
                    <div class="panel-heading">
                        <div class="panel-title hidden-xs">
                            <span class="glyphicon glyphicon-tasks"></span>Listado de documentos almacenados</div>
                    </div>
                    <div class="panel-body pn">
                        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>id</th>
                                <td></td>
                                <th>Titulo</th>
                                <th>Ruta</th>
                                <th>Fecha</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($archivos as $archivo)
                                <tr>
                                    <td>{{$archivo->id}}</td>
                                    <td><button title="Eliminar Archivo" type="button" id="rem_opcionx" onclick="eliminar({{$archivo->id}},this)" class="btn btn-xs btn-rounded btn-danger btn-block">-</button></td>
                                    <td>{{$archivo->titulo}}</td>
                                    <td>{{$archivo->ruta}}</td>
                                    <td>{{$archivo->fecha}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- end: .tray-center -->
      </section>
      <form method="post" id="form"  >
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
      </form>
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

  <!-- Datatables -->
  <script src="{{ URL::asset('vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>

  <!-- Datatables Tabletools addon -->
  <script src="{{ URL::asset('vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>

  <!-- Datatables ColReorder addon -->
  <script src="{{ URL::asset('vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>

  <!-- Datatables Bootstrap Modifications  -->
  <script src="{{ URL::asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>

  <!-- jQuery Validate Plugin-->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/jquery.validate.min.js') }}"></script>

  <!-- jQuery Validate Addon -->
  <script src="{{ URL::asset('assets/admin-tools/admin-forms/js/additional-methods.min.js') }}"></script>

  <!-- Theme Javascript -->
  <script src="{{ URL::asset('assets/js/utility/utility.js') }}"></script>
  <script src="{{ URL::asset('assets/js/demo/demo.js') }}"></script>
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>

  <!-- PNotify -->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/plugins/pnotify/pnotify.custom.min.css') }}">
  <script src="{{ URL::asset('vendor/plugins/pnotify/pnotify2.custom.min.js') }}"></script>

  <!-- Widget Javascript -->
  <script src="{{ URL::asset('assets/js/demo/widgets.js') }}"></script>
  <script type="text/javascript">
  function eliminar(id,elem){
      (new PNotify({
          title: 'Confirmación',
          text: '¿Esta seguro de borrar este documento?',
          icon: 'glyphicon glyphicon-question-sign',
          type: "success",
          width:"400px",
          hide: false,
          confirm: {
              confirm: true,
              buttons: [{
                  text: 'Borrar',
                  click: function(notice) {

                      notice.remove();
                      parametros = $('#form').serializeArray();
                      parametros.push({name: 'id', value: id});
                              
                        $.ajax({
                          data:  parametros,
                          url:   'borrar_doc',
                          method:  'post',
                          beforeSend: function () {
                            $("#resp").html("Procesando, espere por favor...");
                          },
                          success:  function (data) {

                            $(elem).parent().parent().remove();
                           
                            new PNotify({
                                  title: 'Aviso',
                                  text: 'Archivo eliminado',
                                  type: "success",
                                  width: "400px",
                                  icon: false
                              });
                          }
                        });
                  }
              },{
                  text: 'Cancelar'
              }]
          },
          buttons: {
              closer: false,
              sticker: false
          },
          history: {
              history: false
          },
          addclass: 'stack-modal',
          stack: {
              'dir1': 'down',
              'dir2': 'right',
              'modal': true
          }
      })).get().on('pnotify.confirm', function() {
        
      });
      
  }

  jQuery(document).ready(function() {
     
    $('#datatable2').dataTable({
      "aoColumnDefs": [
          {
            'bSortable': false,
            'aTargets': [-1]
          },
          {
          "targets": [0],
          "visible": false,
          "searchable": false
          }
      ],
      "oLanguage": {
          "oPaginate": {
              "sPrevious": "<",
              "sNext": ">"
          },
          "sSearch": "Buscar:"

      },
      "iDisplayLength": 25  ,
      "aLengthMenu": [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "Todos"]
      ],
      "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
      "oTableTools": {
          "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
      }
    });

    // Add Placeholder text to datatables filter bar
    $('.dataTables_filter input').attr("placeholder", "Enter Terms...");

    if ($("#message").val()!=' ') {

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
              text: 'Usuario creado con exito! ^_^',
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
